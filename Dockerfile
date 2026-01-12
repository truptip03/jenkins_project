FROM php:8.2-apache
RUN docker-php-ext-install mysqli
COPY index.html /var/www/html
COPY index.php /var/www/html
RUN a2enmod rewrite
EXPOSE 80
