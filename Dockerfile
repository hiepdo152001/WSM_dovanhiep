FROM php:7.4-fpm
RUN apt-get update && docker-php-ext-install pdo pdo_mysql mysqli


# RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
