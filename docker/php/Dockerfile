FROM php:7.4-fpm
COPY php.ini /usr/local/etc/php/

RUN apt-get update \
  && apt-get install -y wget git unzip libzip-dev libpq-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
  && docker-php-ext-install zip pdo_mysql \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) gd

#Composer install
COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY --from=node:10.22 /usr/local/bin /usr/local/bin
COPY --from=node:10.22 /usr/local/lib /usr/local/lib

ENV COMPOSER_ALLOW_SUPERUSER 1

ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin


WORKDIR /var/www/

RUN composer global require "laravel/installer"
