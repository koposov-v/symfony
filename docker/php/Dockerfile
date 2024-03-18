FROM php:8.2-cli

COPY --from=composer:latest /usr/bin/composer  /usr/bin/composer


RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"


RUN apt-get update && apt-get install -y \
    libonig-dev \
    libicu-dev \
    libbz2-dev \
    libpq-dev \
    libcurl4-openssl-dev \
    wget \
    zlib1g-dev \
    libmcrypt-dev \
    libzip-dev \
    vim \
    git \
    sudo


RUN docker-php-ext-install pdo pgsql pdo_pgsql zip intl mbstring curl bz2


RUN if [ ! -f /usr/local/bin/symfony ]; then \
    wget https://get.symfony.com/cli/installer -O - | bash; \
    mv /root/.symfony5/bin/symfony /usr/local/bin/symfony;\
    fi

WORKDIR /app

RUN useradd -m koposov_v && echo "koposov_v:koposov_v" | chpasswd && adduser koposov_v sudo
USER koposov_v

EXPOSE 8000
CMD symfony server:start