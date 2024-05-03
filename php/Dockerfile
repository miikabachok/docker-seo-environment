FROM php:8.2.7-fpm

COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
		git \
		wget \
		libpng-dev \
		libzip-dev \
		libicu-dev \
		libcurl4-openssl-dev pkg-config libssl-dev \
	&& docker-php-ext-install \
		gd \
		zip \
		intl \
		opcache \
		pdo_mysql \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

COPY ./php.ini-development /usr/local/etc/php/php.ini