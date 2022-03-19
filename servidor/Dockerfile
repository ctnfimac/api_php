FROM php:7.4-apache

RUN docker-php-ext-install mysqli

RUN echo 'extension=/usr/local/lib/php/extensions/no-debug-non-zts-20190902/mysqli.so' >> /usr/local/etc/php/php.ini-development