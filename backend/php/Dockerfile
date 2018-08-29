FROM php:7-fpm-alpine

RUN   apk update \
  &&   apk add ca-certificates wget \
  &&   update-ca-certificates

RUN docker-php-ext-install mysqli