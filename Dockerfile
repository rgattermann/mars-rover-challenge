FROM php:7.1-cli-alpine

LABEL MAINTAINER Rodrigo Gattermann <rodrigo.gattermann@gmail.com>

ENV COMPOSER_ALLOW_SUPERUSER 1

COPY . /app
WORKDIR /app

RUN curl --silent --show-error https://getcomposer.org/installer | php && \
    php composer.phar install --prefer-dist --no-progress --no-suggest --no-dev --optimize-autoloader --classmap-authoritative  --no-interaction && \
    php composer.phar clear-cache && \
    rm -rf /usr/src/php