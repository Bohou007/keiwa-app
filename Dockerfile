FROM php:8.0.5
FROM composer:2.4.1

WORKDIR /app
COPY ["composer.json", "composer.lock*", "./"]
COPY . .
RUN php --ini
RUN composer install --ignore-platform-req=ext-gd

RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan optimize

RUN composer dump-autoload -o
RUN php artisan key:generate

CMD ["php","artisan","serve", "--host=0.0.0.0", "--port=8080"]
EXPOSE 8080
