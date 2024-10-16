FROM php:8.2-fpm-alpine

# Cài đặt các gói phụ thuộc cần thiết
RUN apk add --no-cache \
    $PHPIZE_DEPS \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    oniguruma-dev \
    zlib-dev \
    icu-dev \
    g++ \
    make \
    autoconf

# Cài đặt các extension PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl gd

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
