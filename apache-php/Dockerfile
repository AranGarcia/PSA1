FROM php:7.2-apache
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Enable apache rewrite
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

#Copy php ini
# COPY php.ini /usr/local/etc/php/php.ini
# RUN a2enmod rewrite