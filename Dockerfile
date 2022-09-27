FROM alpine:edge
FROM drewviles/php-pdo:8.0.18-fpm
FROM composer:2.4.1
FROM dopanel/php-postgres-oracle-redis:8.1
FROM elbidouilleur/php-postgresql:php-8.1

WORKDIR /app

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
