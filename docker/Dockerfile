FROM php:7.4-apache
COPY ./php/php.ini /usr/local/etc/php/
COPY ./apache/*.conf /etc/apache2/sites-enabled/

RUN apt-get update \
  && apt-get install -y libzip-dev \
  # && apt-get install -y unzip \
  # && apt-get install -y zlib1g-dev mariadb-client \
  # && docker-php-ext-install zip pdo_mysql
  && apt-get install -y zlib1g-dev libpq-dev mariadb-client unzip\
  && docker-php-ext-install zip pdo_mysql mysqli \
  && docker-php-ext-enable mysqli

#Composer install
# COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


ENV COMPOSER_ALLOW_SUPERUSER 1

ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin


WORKDIR /var/www/html

RUN composer global require "laravel/installer"
