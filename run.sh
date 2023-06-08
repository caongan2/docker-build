git pull origin HEAD
cd docker
docker-compose up --build -d
cd $(pwd)
docker exec test_app composer update --ignore-platform-reqs
docker exec test_app cp .env.example .env
docker exec test_app php artisan key:generate
docker exec test_app chmod -R 777 public
docker exec test_app chmod -R 777 storage
docker exec test_app php artisan storage:link
docker exec test_app php artisan optimize
docker exec test_app chown -R $USER:www-data storage
docker exec test_app chown -R $USER:www-data bootstrap/cache
docker exec test_app php artisan migrate
