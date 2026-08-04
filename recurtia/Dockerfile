FROM php:8.2-apache

# 1. Installation des dépendances système et du driver PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# 2. Redirection d'Apache vers le dossier public/ de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . .

# 3. Installation de Composer et des dépendances PHP
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 4. Ajustement des permissions
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80

# 5. Démarrage (Cache + Migrations DB + Serveur Apache)
CMD php artisan config:cache && \
    php artisan route:cache && \
    php artisan migrate --force && \
    apache2-foreground