# FROM nginx:1.23.1
# FROM php:8.2.0RC1-cli-bullseye
# FROM composer:2.4.1

# RUN docker-php-ext-install pdo pdo_mysql sockets
# # RUN curl -sS https://getcomposer.org/installer​ | php -- \
# #     --install-dir=/usr/local/bin --filename=composer

# # COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# WORKDIR /app

# COPY ["composer.json", "composer.lock*", "./"]

# COPY . .
# RUN php --ini
# RUN composer install --ignore-platform-req=ext-gd
# # RUN  php artisan migrate

# RUN php artisan config:cache && \
#     php artisan route:cache && \
#     php artisan optimize

# RUN composer dump-autoload -o
# EXPOSE 9080

# CMD ["php","artisan","serve", "--port=9080"]


# FROM php:8.2.0RC1-cli-bullseye
# FROM composer:2.4.1

# ENV APP_ENV=production

# WORKDIR /app

# COPY ["composer.json", "composer.lock*", "./"]

# COPY . .
# RUN php --ini

# RUN composer install --ignore-platform-req=ext-gd

# RUN php artisan config:cache && \
#     php artisan route:cache && \
#     php artisan optimize

# RUN composer dump-autoload -o

# CMD ["php","artisan","serve"]

FROM php:8.0.5
FROM composer:2.4.1

RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /app
COPY ["composer.json", "composer.lock*", "./"]
COPY . .
RUN php --ini
RUN composer install

RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan optimize

RUN composer dump-autoload -o

# CMD php artisan serve --host=0.0.0.0 --port=8080
CMD ["php","artisan","serve", "--host=0.0.0.0", "--port=8080"]
EXPOSE 8080
