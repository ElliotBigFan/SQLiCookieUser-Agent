FROM php:8.1-apache
RUN docker-php-ext-install mysqli
COPY . /var/www/html/
RUN chown -R root:www-data /var/www/html
RUN chmod -R 755 /var/www/html
RUN chmod 700 flag.txt
RUN chmod 700 init.sql
RUN chmod 700 Dockerfile
RUN chmod 700 docker-compose.yml