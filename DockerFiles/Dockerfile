#
#   TechniqueFinder - Dockerfile
#
#    Description:
#    Author:           Intersect Australia Ltd
#    Created:          12 Aug 2019
#    Source:           https://github.com/IntersectAustralia/TechniqueFinder
#    License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
#                      Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
#                      https://creativecommons.org/licenses/by-nc-sa/4.0/
#
FROM php:7.2-fpm

RUN docker-php-ext-install mysqli

RUN apt-get update && \
apt-get install -y --no-install-recommends \
    curl \
    libmemcached-dev \
    libz-dev \
    libpq-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libssl-dev \
    libmcrypt-dev \
    unzip

# Install 'composer' so that Auth0 libraries can be installed
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer

RUN apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git telnet iputils-ping net-tools

RUN rm -rf /var/lib/apt/lists/*

#   rm -rf /var/lib/apt/lists/* && docker-php-ext-install xsl
RUN pecl install xdebug-2.7.2 && docker-php-ext-enable xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" >> /usr/local/etc/php/php.ini  \
    && echo "xdebug.remote_port=9001" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_connect_back=0" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_host=docker.for.mac.localhost" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.idekey=IDEA_DEBUG" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_log=/tmp/xdebug.log" >> /usr/local/etc/php/php.ini




