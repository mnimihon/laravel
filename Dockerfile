FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev default-mysql-client

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN mkdir -p /var/run/php
RUN chown www-data:www-data /var/run/php

RUN echo 'listen = /var/run/php/php-fpm.sock' >> /usr/local/etc/php-fpm.d/zz-docker.conf
RUN echo 'listen.owner = www-data' >> /usr/local/etc/php-fpm.d/zz-docker.conf
RUN echo 'listen.group = www-data' >> /usr/local/etc/php-fpm.d/zz-docker.conf
RUN echo 'listen.mode = 0666' >> /usr/local/etc/php-fpm.d/zz-docker.conf

USER www-data

WORKDIR /var/www/html

CMD ["php-fpm"]