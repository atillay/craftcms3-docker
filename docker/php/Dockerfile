FROM php:7.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zlib1g-dev \
    libjpeg-dev\
    libpng-dev\
    libfreetype6-dev \
    libpq-dev \
    libicu-dev g++ \
    libcurl4-openssl-dev \
    libxml2-dev \
    mysql-client

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

RUN docker-php-ext-install pdo pdo_mysql zip json mbstring curl iconv zip dom

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install gd

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

COPY ./php.ini /usr/local/etc/php/

RUN ln -s /var/www/craft /usr/local/bin

WORKDIR /var/www
