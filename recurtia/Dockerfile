FROM php:8.2-cli

# Installation des paquets requis et des pilotes Postgres
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Récupération de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Installation de Composer sans exécuter de scripts ni d'optimisations bloquantes
RUN composer install --no-dev --no-interaction --prefer-dist --no-scripts

EXPOSE 10000

# Commande de démarrage
CMD php artisan config:clear && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=10000