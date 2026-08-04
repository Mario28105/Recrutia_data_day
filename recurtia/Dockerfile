FROM php:8.2-cli

# Installation des extensions PHP nécessaires pour Laravel et de la base de données
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip git \
    && docker-php-ext-install pdo pdo_mysql mbstring gd

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copie de tout le projet dans le conteneur
COPY . .

RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql
    
# Installation des dépendances Laravel via Composer
RUN composer install --no-dev --optimize-autoloader

# Configuration des permissions pour les dossiers de stockage et de cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Port d'écoute requis par Render
EXPOSE 10000

# Commande de démarrage : optimisation + exécution des migrations DB + lancement du serveur
CMD php artisan config:cache && \
    php artisan route:cache && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=10000