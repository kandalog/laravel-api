#!/bin/bash
set -e

# chown -R www-data:www-data ./
# chmod -R 777 storage bootstrap/cache
php artisan migrate
  
exec "$@"