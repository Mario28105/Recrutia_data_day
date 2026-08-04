FROM php:8.2-cli

# Installation des dépendances Postgres + utilitaires
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

# Installation des dépendances Composer sans exécuter les scripts post-install pendant le build
RUN composer install --no-dev --optimize-autoloader --no-scripts

EXPOSE 10000

# Démarrage : Cache + Migrations DB + Lancement du serveur
CMD php artisan config:cache && \
    php artisan route:cache && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=10000