#!/bin/sh
set -eu

mkdir -p /var/lib/alwaysngoding/sessions
if [ -z "${APP_ENCRYPTION_KEY:-}" ]; then
    key_file=/var/lib/alwaysngoding/app-key
    if [ ! -s "$key_file" ]; then
        php -r 'file_put_contents($argv[1], bin2hex(random_bytes(32)));' "$key_file"
        chmod 600 "$key_file"
    fi
    APP_ENCRYPTION_KEY=$(cat "$key_file")
    export APP_ENCRYPTION_KEY
fi

chown www-data:www-data /var/lib/alwaysngoding/sessions
mkdir -p media
chown www-data:www-data media
for directory in \
    media/foto-pengguna \
    media/iklan \
    media/lowongan-kerja \
    media/pencapaian \
    media/sertifikat \
    media/thumbnail-artikel \
    aplikasi/cache \
    aplikasi/logs \
    perpustakaan/berkas \
    perpustakaan/filemanager/source \
    perpustakaan/filemanager/thumbs
do
    mkdir -p "$directory"
    chown -R www-data:www-data "$directory"
done

exec docker-php-entrypoint "$@"
