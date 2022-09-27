FROM alpine:edge
FROM drewviles/php-pdo:8.0.18-fpm
# FROM php:8.0.5
FROM composer:2.4.1
FROM dopanel/php-postgres-oracle-redis:8.1
FROM elbidouilleur/php-postgresql:php-8.1

# RUN apk add --no-cache php-pgsql=8
# RUN sudo systemctl restart apache2

# RUN set -ex \
#     && apk --no-cache add \
#     postgresql-server-dev=9.5
# RUN docker-php-ext-install pdo

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


# FROM composer:2.1.10 as build
# WORKDIR /app
# COPY . /app
# RUN composer install && composer dumpautoload

# FROM php:8.1.0RC5-apache-buster
# RUN docker-php-ext-install pdo pdo_mysql

# EXPOSE 8080
# COPY --from=build /app /var/www/
# COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf
# RUN chmod 777 -R /var/www/storage/ && \
#     echo "Listen 8080">>/etc/apache2/ports.conf && \
#     chown -R www-data:www-data /var/www/ && \
#     a2enmod rewrite

# CMD ["php","artisan","serve", "--host=0.0.0.0", "--port=8080"]



# FROM ubuntu:22.04
# FROM composer:2.4.1

# RUN apt-get update
# RUN apt-get upgrade -y
# RUN apt-get install -y php8.1 --no-install-recommends
# RUN apt-get install php8.1-mbstring --no-install-recommends
# RUN apt-get install php8.1-xml --no-install-recommends
# RUN apt-get install php8.1-curl --no-install-recommends
# RUN apt-get install php8.1-common --no-install-recommends
# RUN apt-get install php8.1-pgsql --no-install-recommends
# RUN apt-get install php8.1-cli --no-install-recommends
# RUN apt-get install -y libpq-dev --no-install-recommends
# RUN apt-get clean
# RUN rm -rf /var/lib/apt/lists/\*

# WORKDIR /app

# COPY ["composer.json", "composer.lock*", "./"]
# COPY . .
# RUN php --ini
# RUN composer install --ignore-platform-req=ext-gd

# RUN php artisan key:generate

# RUN php artisan optimize && \
#     php artisan config:clear && \
#     php artisan route:clear && \
#     php artisan view:clear && \
#     php artisan config:cache && \
#     php artisan route:cache && \
#     php artisan view:cache

# RUN composer dump-autoload -o

# CMD ["php","artisan","serve", "--host=0.0.0.0", "--port=8080"]
# EXPOSE 8080
