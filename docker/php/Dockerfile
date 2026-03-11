FROM php:8.5.3-fpm-alpine3.22

RUN apk add --no-cache postgresql-dev \
    && docker-php-ext-install pdo_pgsql pgsql

WORKDIR /var/www/project
