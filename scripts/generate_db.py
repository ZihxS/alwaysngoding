#!/usr/bin/env python3
"""Render the sanitized SQL template using the application's active DB settings."""

import argparse
import os
from pathlib import Path
import re
import shlex
import sys
import tempfile


def read_environment(path):
    values = {}
    for number, line in enumerate(path.read_text(encoding="utf-8-sig").splitlines(), 1):
        line = line.strip()
        if not line or line.startswith("#"):
            continue
        if line.startswith("export "):
            line = line[7:].lstrip()
        key, separator, value = line.partition("=")
        key = key.strip()
        if not separator or not re.fullmatch(r"[A-Za-z_][A-Za-z0-9_]*", key):
            raise ValueError(f"Invalid environment assignment on line {number}")
        lexer = shlex.shlex(value, posix=True)
        lexer.whitespace_split = True
        lexer.commenters = "#"
        try:
            values[key] = " ".join(lexer)
        except ValueError:
            raise ValueError(f"Invalid quoted environment value on line {number}") from None
    # Match immutable dotenv behavior: existing process settings take precedence.
    values.update(os.environ)
    return values


def render(source, settings):
    group = "DEV_DB_" if settings.get("CI_ENV", "development") == "development" else "DB_"
    keys = [group + suffix for suffix in ("DATABASE", "DBPREFIX", "USERNAME")]
    missing = [key for key in keys if key not in settings]
    if missing:
        raise ValueError("Missing environment settings: " + ", ".join(missing))
    database, prefix, username = (settings[key] for key in keys)
    if not re.fullmatch(r"[A-Za-z0-9_]{1,64}", database):
        raise ValueError(keys[0] + " must contain 1–64 letters, digits, or underscores")
    if not re.fullmatch(r"[A-Za-z0-9_]*", prefix):
        raise ValueError(keys[1] + " must contain only letters, digits, or underscores (or be empty)")
    if not username or any(ord(char) < 32 or ord(char) == 127 for char in username):
        raise ValueError(keys[2] + " must be nonempty and contain no control characters")
    if "__DB_DATABASE__" not in source or "__DB_PREFIX__" not in source:
        raise ValueError("Input must be the sanitized raw_db.sql template")
    for suffix in re.findall(r"__DB_PREFIX__([A-Za-z0-9_]+)", source):
        if len(prefix + suffix) > 64:
            raise ValueError(keys[1] + " makes a database object name exceed 64 characters")
    result = source.replace("__DB_DATABASE__", database).replace("__DB_PREFIX__", prefix)
    if re.search(r"__DB_[A-Z_]+__", result):
        raise ValueError("Unresolved database template marker")
    # CURRENT_USER uses the actual MySQL account, including its correct host part.
    # DB_HOSTNAME is a server address, not the host part of a MySQL account.
    header = (
        "-- Generated from the sanitized raw_db.sql template.\n"
        f"-- Environment group: {group}\n"
        f"-- Import using the configured MySQL account: {username}\n"
        "-- DEFINER=CURRENT_USER binds stored objects to the importing account.\n"
        "-- Database passwords and MySQL CREATE USER/GRANT statements are not included.\n\n"
    )
    return header + result


def main():
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("--env-file", default=".env")
    parser.add_argument("--input", default="raw_db.sql")
    parser.add_argument("--output", default="db.sql")
    args = parser.parse_args()
    output = Path(args.output)
    temporary = None
    try:
        if output.resolve() in {Path(args.input).resolve(), Path(args.env_file).resolve()}:
            raise ValueError("Output must not overwrite the SQL template or environment file")
        result = render(Path(args.input).read_text(encoding="utf-8"), read_environment(Path(args.env_file)))
        with tempfile.NamedTemporaryFile(mode="w", encoding="utf-8", dir=output.parent,
                                         prefix="." + output.name + ".", delete=False) as handle:
            temporary = Path(handle.name)
            handle.write(result)
        temporary.replace(output)
    except (OSError, ValueError) as error:
        if temporary is not None:
            temporary.unlink(missing_ok=True)
        print("Database generation failed: " + str(error), file=sys.stderr)
        return 1
    print(f"Generated {output}. Import with the MySQL account configured in the selected environment.")
    return 0


if __name__ == "__main__":
    sys.exit(main())
