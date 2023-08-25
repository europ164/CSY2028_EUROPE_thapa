FROM php:8.0-apache

# Install PHP extensions and enable Apache modules
RUN docker-php-ext-install pdo pdo_mysql && \
    a2enmod rewrite

# Your application-specific configurations and copying of source code should go here

# Start Apache web server (this is optional, as the official image usually starts it automatically)
CMD ["apache2-foreground"]

