FROM php:8.1-fpm

WORKDIR /var/www/html

COPY composer.json /var/www/html/
COPY composer.lock /var/www/html/

# Install dependencies for the operating system software
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    libzip-dev \
    unzip \
    git \
    libonig-dev \
    curl

# Clear cache
RUN apt-get clean &&  rm -rf /var/lib/apt/lists/*

# Install extenstion for PHP
RUN docker-php-ext-install mysqli mysqlnd pdo pdo_mysql zip 
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Add composer to cached layer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html

RUN composer install --no-progress --no-suggest -o -n
# Assign permissions of the working directory to the www-data user
RUN chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache

EXPOSE 8000
CMD [ "php-fpm" ]