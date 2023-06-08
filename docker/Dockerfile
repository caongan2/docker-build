FROM webdevops/php-nginx:8.0
COPY . /var/www/html
COPY ./docker/nginx.conf /etc/nginx/conf.d/
WORKDIR /var/www/html
EXPOSE 80
