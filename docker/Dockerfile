FROM webdevops/php-nginx:8.0
COPY . /var/www/html
COPY ./docker/nginx.conf /etc/nginx/conf.d/
WORKDIR /var/www/html
RUN ["chmod", "+x", "docker/entry-point.sh"]
RUN docker/entry-point.sh
EXPOSE 80
