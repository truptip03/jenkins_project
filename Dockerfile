FROM php:8.1-apache
COPY index.html /var/www/html/
COPY index.php /var/www/html/
RUN docker-php-ext-install mysqli
EXPOSE 80
