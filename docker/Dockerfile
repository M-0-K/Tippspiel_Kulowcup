FROM php:8.2-apache

# benötigte PHP Extensions
RUN docker-php-ext-install pdo_mysql mysqli

# optional, aber häufig sinnvoll:
# RUN apt-get update && apt-get install -y libzip-dev && docker-php-ext-install zip

# Apache: mod_rewrite oft nötig (falls du .htaccess nutzt)
RUN a2enmod rewrite

WORKDIR /var/www/html
