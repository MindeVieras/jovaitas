FROM php:5.6.39-apache

# Install git (for composer)
RUN apt-get update && apt-get install -y git

# Install MySQL client (for drush)
RUN apt-get update && apt-get install -y mysql-client

# Custom php ini settings
COPY php/php.ini /usr/local/etc/php/

RUN apt-get update && apt-get install -y libpng-dev

RUN apt-get update \
    &&  docker-php-ext-install pdo_mysql opcache zip gd

# Xdebug
RUN yes | pecl install xdebug-2.5.5 \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini

# Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer
ENV PATH /root/.composer/vendor/bin:$PATH

# Drush
RUN composer global require "drush/drush:8.*"

# Copy apache config file
COPY apache/e.jovaitas.lt.conf /etc/apache2/sites-available/

# Enable apache modules
RUN a2enmod rewrite

# Enable the site
RUN a2ensite e.jovaitas.lt

# Set the working directory
WORKDIR /var/www