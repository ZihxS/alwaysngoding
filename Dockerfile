FROM python:3.13-alpine AS database-seed
WORKDIR /opt/alwaysngoding
COPY scripts/generate_db.py scripts/generate_db.py
COPY raw_db.sql .env.example ./
RUN mkdir /generated
CMD ["sh", "-c", "python3 scripts/generate_db.py --env-file .env.example --output /generated/10-app.sql && chmod 0644 /generated/10-app.sql"]

FROM mysql:8.4 AS database
COPY --chmod=0644 docker/init-db.sh /docker-entrypoint-initdb.d/10-app.sh

FROM node:22-alpine AS socket
WORKDIR /app
COPY socket/package.json socket/package-lock.json ./
RUN npm ci --omit=dev --no-audit --no-fund
COPY socket/ang.js socket/index.html socket/LICENSE ./
COPY docker/socket-dev.js /usr/local/bin/alwaysngoding-socket-dev.js
USER node
EXPOSE 1315
CMD ["node", "ang.js"]

FROM php:8.3-apache-bookworm AS app
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libfreetype6-dev libjpeg62-turbo-dev libpng-dev libonig-dev libzip-dev unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" gd mysqli pdo_mysql mbstring zip bcmath exif opcache \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
WORKDIR /var/www/html
COPY composer.json composer.lock ./
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install \
    --no-dev --prefer-dist --no-interaction --no-progress --optimize-autoloader
COPY . .
# Only the public example is included; container environment values take precedence.
COPY .env.example .env
COPY docker/apache.conf /etc/apache2/conf-available/alwaysngoding.conf
COPY docker/php.ini /usr/local/etc/php/conf.d/alwaysngoding.ini
COPY docker/app-entrypoint.sh /usr/local/bin/alwaysngoding-entrypoint
RUN a2enconf alwaysngoding \
    && a2enmod headers \
    && chmod +x /usr/local/bin/alwaysngoding-entrypoint
EXPOSE 80
ENTRYPOINT ["alwaysngoding-entrypoint"]
CMD ["apache2-foreground"]
