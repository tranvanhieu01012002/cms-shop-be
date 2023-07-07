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
RUN docker-php-ext-install pdo pdo_mysql
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Add composer to cached layer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install -n --no-progress --no-autoloader


COPY . /var/www/html

# Autoload file after copy all content
RUN composer dump-autoload

# Assign permissions of the working directory to the www-data user
RUN chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache

COPY .env.docker.example .env
RUN php artisan key:generate
RUN php artisan optimize:clear

EXPOSE 9000
CMD [ "php-fpm"]
