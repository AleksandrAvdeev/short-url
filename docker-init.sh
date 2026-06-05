#!/bin/sh

# 1. Установка зависимостей PHP
if [ ! -f "vendor/autoload.php" ]; then
    echo "--- Installing Composer dependencies ---"
    composer install --no-interaction --prefer-dist
fi

# 2. Миграции
echo "--- Running migrations ---"
php artisan migrate --force

# 3. Установка прав доступа на папки
echo "--- Install folders access ---"
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "--- Setup finished! ---"
