FROM php:7.2-fpm

MAINTAINER Deeptha <deeptha.wickrema@hotmail.fr>

ENV PHPREDIS_VERSION 4.2.0
ENV RABBITMQ_VERSION 3.7.8
# https://getcomposer.org/doc/03-cli.md#composer-allow-superuser
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN apt-get update \
&&  apt-get install -y \
    vim \
    git \
    zip \
    unzip \
    librabbitmq-dev \
    libssh-dev \
    && docker-php-ext-install \
     sockets \
    && pecl install amqp \
    && docker-php-ext-enable amqp

WORKDIR /api

RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-configure mysqli --with-mysqli=mysqlnd \
    && docker-php-ext-install pdo pdo_mysql bcmath opcache \
    && curl -sS https://getcomposer.org/installer | \
        php -- --install-dir=/usr/bin/ --filename=composer \
    && echo 'alias sf="php bin/console"' >> ~/.bashrc

## APCu
RUN  pecl install apcu && docker-php-ext-enable apcu

RUN curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz \
    && tar xfz /tmp/redis.tar.gz \
    && mkdir -p /usr/src/php/ext \
    && rm -r /tmp/redis.tar.gz \
    && mv phpredis-$PHPREDIS_VERSION /usr/src/php/ext/redis \
    && docker-php-ext-install redis

RUN openssl genrsa -out private.key 2048 \
    && openssl rsa -in private.key -pubout > public.key \
    && chown -R www-data:www-data /api
#
#RUN composer install && composer update

EXPOSE 80
