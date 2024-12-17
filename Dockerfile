FROM php:fpm

RUN apt -y update && apt -y upgrade

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

RUN apt-get install -y libzip-dev zip \
  && docker-php-ext-install zip

RUN apt-get install libsodium-dev -y \
  && docker-php-ext-install sodium

RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev && \
  docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ --with-webp && \
  docker-php-ext-install gd

RUN docker-php-ext-install opcache

RUN apt-get install git libssl-dev -y
RUN pecl install mongodb && docker-php-ext-enable mongodb

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

WORKDIR /var/www/html

# COPY --from=composer /app/vendor /var/www/html/app/vendor

