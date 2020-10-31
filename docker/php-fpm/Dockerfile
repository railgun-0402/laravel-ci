FROM php:7.3-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
  libpq-dev \
  libzip-dev \
  npm \
  postgresql \
  unzip \
  && docker-php-ext-install \
    pdo_pgsql \
    sockets \
    zip \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/*

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
