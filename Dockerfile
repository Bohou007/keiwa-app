FROM php:8.0.5
FROM composer:2.4.1 as composer
FROM alpine:20220715 as base

RUN apk add --update --no-cache \
    bash

# RUN pip install libpq-dev==9.4.3


WORKDIR /app

FROM base as local

RUN apk add --no-cache --update \
    libpq-dev==9.4.3 \
    RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql pgsql


COPY ["composer.json", "composer.lock*", "./"]
COPY . .
RUN php --ini
RUN composer install --ignore-platform-req=ext-gd

RUN php artisan key:generate

RUN php artisan optimize && \
    php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

RUN composer dump-autoload -o

CMD ["php","artisan","serve", "--host=0.0.0.0", "--port=8080"]
EXPOSE 8080
