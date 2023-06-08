composer update --ignore-platform-reqs
cp .env.example .env
php artisan key:generate
chmod -R 777 public
chmod -R 777 storage
php artisan storage:link
chown -R $USER:www-data storage
chown -R $USER:www-data bootstrap/cache
php artisan migrate --seed
