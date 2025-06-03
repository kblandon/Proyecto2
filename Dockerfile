
FROM richarvey/nginx-php-fpm:1.7.2

# Copia todo el proyecto al directorio esperado
COPY . /var/www/html

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
