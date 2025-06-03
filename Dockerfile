
FROM php:8.1-fpm

# Instala las extensiones y dependencias necesarias
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install mbstring pdo pdo_mysql zip

WORKDIR /var/www/html
# Copia todo el proyecto al directorio esperado
COPY . /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Variables de entorno
ENV SKIP_COMPOSER=1
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1
ENV REAL_IP_HEADER=1
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV COMPOSER_ALLOW_SUPERUSER=1

EXPOSE 8080

#CMD ["/start.sh"]
# Copia el script dentro de la imagen
COPY scripts/00-laravel-deploy.sh /usr/local/bin/00-laravel-deploy.sh

# Dale permisos de ejecución
RUN chmod +x /usr/local/bin/00-laravel-deploy.sh

# Usa ese script para arrancar (CMD o ENTRYPOINT)
CMD ["/usr/local/bin/00-laravel-deploy.sh"]
