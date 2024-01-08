FROM php:7.4-apache

WORKDIR /var/www/html

# Copiar archivos de la aplicación
COPY . /var/www/html

# Instalar dependencias de Laravel
RUN apt-get update && \
    apt-get install -y libzip-dev zip && \
    docker-php-ext-install zip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install

# Configuraciones adicionales según sea necesario

CMD ["apache2-foreground"]
