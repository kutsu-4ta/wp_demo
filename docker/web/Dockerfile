FROM php:8.0.3-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

COPY php.ini /usr/local/etc/php/
