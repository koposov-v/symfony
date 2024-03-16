FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    wget \
    zlib1g-dev \
    libmcrypt-dev \
    libzip-dev \
    vim \
    git

RUN docker-php-ext-install pdo pgsql pdo_pgsql

COPY docker/php/conf.d/* /usr/local/etc/php/conf.d/

RUN if [ ! -f /usr/local/bin/symfony ]; then \
    wget https://get.symfony.com/cli/installer -O - | bash; \
    mv /root/.symfony5/bin/symfony /usr/local/bin/symfony;\
    fi


COPY --from=composer:latest /usr/bin/composer  /usr/bin/composer

WORKDIR /app

RUN useradd -m koposov_v && echo "koposov_v:koposov_v" | chpasswd && adduser koposov_v sudo

USER koposov_v