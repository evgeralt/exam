FROM php:7.4.25-fpm
# Install modules

RUN docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

COPY config/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

EXPOSE 9000
EXPOSE 18999

WORKDIR /var/www

CMD ["php-fpm"]
