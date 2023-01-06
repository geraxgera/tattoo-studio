FROM php:8.0.2-fpm

RUN apt-get update && apt-get install -y git
RUN apt-get update && apt-get install -y curl
RUN apt-get update && apt-get install -y zip
RUN apt-get update && apt-get install -y unzip
RUN  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /var/www

