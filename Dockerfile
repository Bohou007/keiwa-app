
FROM bitnami/laravel:9
ENV APP_ENV=production
WORKDIR /app
COPY ["composer.json", "composer.lock", "./"]
RUN composer install --production
COPY . .
CMD ["php", "artisan", "serve"]

