#!/bin/sh
# The official MySQL entrypoint sources non-executable .sh initialization files.
# Import as the application account so CURRENT_USER definers match that account.
MYSQL_PWD="$MYSQL_PASSWORD" mysql \
    --protocol=socket \
    --user="$MYSQL_USER" \
    --database="$MYSQL_DATABASE" \
    < /docker-seed/10-app.sql
