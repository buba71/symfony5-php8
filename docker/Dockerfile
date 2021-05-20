FROM php:8.0.3-apache

# Apache
COPY ./conf/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY ./conf/apache.conf /etc/apache2/conf-available/z-app.conf
RUN a2enconf z-app

# PHP extensions
RUN docker-php-ext-install -j$(nproc) opcache pdo_mysql
COPY ./conf/php.ini /usr/local/etc/php/conf.d/app.ini

EXPOSE 80
WORKDIR /var/www