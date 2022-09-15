FROM vanio/php-postgres:latest
FROM gjuniioor/php-pdo-composer
FROM mchauvel/php-pdo-mysql
FROM ronaldmiranda/php-pdo
FROM php:8.0.5
FROM composer:2.4.1

# RUN apt-get updat

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
