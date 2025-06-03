#!/usr/bin/env bash
set -e  # Para que el script pare si hay error

echo "Running composer install..."
composer install --no-dev --optimize-autoloader --working-dir=/var/www/html

echo "Caching config and routes..."
php /var/www/html/artisan config:cache
php /var/www/html/artisan route:cache

echo "Running migrations..."
php /var/www/html/artisan migrate --force