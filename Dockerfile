FROM php:8.2-cli

# Dépendances système + extensions PHP nécessaires (dont Postgres)
RUN apt-get update && apt-get install -y \
        git curl zip unzip libpq-dev libzip-dev libonig-dev \
    && docker-php-ext-install pdo pdo_pgsql zip \
    && rm -rf /var/lib/apt/lists/*

# Node.js (pour compiler les assets Tailwind/Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

RUN npm ci && npm run build

RUN mkdir -p storage/framework/{cache,sessions,testing,views} storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD php artisan migrate --force && php artisan config:cache && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
