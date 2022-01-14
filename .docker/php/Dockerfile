FROM php:8.0-fpm

WORKDIR /var/www

RUN rm -rf /var/www/html
RUN ln -s public html
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libonig-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    sudo
    # supervisor

# RUN mkdir -p /var/log/supervisor
# RUN chmod 777 /var/log/supervisor
# COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install zip pdo_mysql mbstring exif pcntl sockets
RUN docker-php-ext-configure gd
RUN docker-php-ext-install gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www
COPY --chown=www:www . /var/www

# RUN chmod -R 777 /var/www/storage

USER www

EXPOSE 9000

CMD ["php-fpm"]
