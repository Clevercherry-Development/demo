FROM php:fpm

RUN apt-get update && apt-get install -y \
    libmongoc-dev \
    && docker-php-ext-install -j$(nproc) mongodb \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --from=composer /app/vendor /var/www/html/vendor

