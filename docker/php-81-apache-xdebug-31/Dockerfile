FROM php:8.1-apache
RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd
RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-install zip
RUN a2enmod rewrite
#RUN apt-get install -y libreoffice
#RUN apt-get install -y unoconv
#RUN apt-get install -y cutycapt
#RUN apt-get install -y xvfb
RUN docker-php-ext-install mysqli
RUN pecl install xdebug-3.1.5
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/php.ini

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer