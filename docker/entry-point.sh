composer update --ignore-platform-reqs
php artisan key:generate
php artisan storage:link
chmod -R 777 public
chmod -R 777 storage
chown -R $USER:www-data storage
chown -R $USER:www-data bootstrap/cache
php artisan migrate --seed
