# Establecer la imagen base
FROM php:7.4-fpm

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libzip-dev \
    libonig-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Limpiar caché
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensiones
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/
RUN docker-php-ext-install gd

# Instalar composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecer directorio de trabajo
WORKDIR /var/www

# Eliminar el directorio html predeterminado
RUN rm -rf /var/www/html

# Copiar el directorio de la aplicación existente
COPY . /var/www

# Enlazar el directorio de la aplicación public a html
RUN ln -s public html

# Instalar dependencias
RUN composer install

# Cambiar el propietario del directorio de la aplicación a www-data
RUN chown -R www-data:www-data /var/www

# Cambiar los permisos del directorio de almacenamiento
RUN chmod -R 755 /var/www/storage

# Exponer el puerto 8000 y empezar
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
