FROM php:7.4.3-fpm-alpine as php

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk update && apk add libzip-dev
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN set -eux; \
	composer global require "hirak/prestissimo:^0.3" --prefer-dist --no-progress --no-suggest --classmap-authoritative; \
	composer clear-cache

WORKDIR /var/www/html

COPY composer.json ./

RUN set -eux; \
	composer install --prefer-dist --no-dev --no-autoloader --no-scripts --no-progress --no-suggest; \
	composer clear-cache

COPY src ./

RUN set -eux; \
    composer dump-autoload --classmap-authoritative

ARG XDEBUG_VERSION=2.8.0beta1

RUN mkdir -p /usr/src/php/ext/xdebug && \
    curl -fsSL https://xdebug.org/files/xdebug-${XDEBUG_VERSION}.tgz | tar xz -C /usr/src/php/ext/xdebug --strip 1 && \
    docker-php-ext-install xdebug && \
    echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini
