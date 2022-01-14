FROM php:8.0-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libfreetype6-dev \
    zip \
    unzip \
    libzip-dev \
    curl \
    sudo \
    supervisor

RUN mkdir -p /var/log/supervisor

RUN chmod 777 /var/log/supervisor

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN docker-php-ext-install zip pdo_mysql mbstring exif pcntl sockets

CMD ["/usr/bin/supervisord"]