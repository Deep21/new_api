FROM php:7-3-fpm

MAINTAINER Deeptha <deeptha.wickrema@hotmail.fr>

# https://getcomposer.org/doc/03-cli.md#composer-allow-superuser
ENV COMPOSER_ALLOW_SUPERUSER 1

RUN apt-get update \
&& apt-get install -y \
    vim

WORKDIR /api

RUN \
    docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-configure mysqli --with-mysqli=mysqlnd \
    && docker-php-ext-install pdo_mysql \
    &&  curl -sS https://getcomposer.org/installer | \
        php -- --install-dir=/usr/bin/ --filename=composer \
    && openssl genrsa -out private.key 2048 \
    && openssl rsa -in private.key -pubout > public.key \
    && usermod -u 1000 www-data
    && composer install \
    && composer update

EXPOSE 80
