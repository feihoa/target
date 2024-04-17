FROM php:7.4-apache

RUN apt-get update
RUN apt-get install --yes --force-yes libgd-dev

RUN docker-php-ext-configure gd --with-freetype
RUN docker-php-ext-install gd

COPY ./ /var/www/html/
EXPOSE 80
