FROM php:7.2-apache
# RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN apt-get -y update \
    && apt-get -y upgrade \
    # For config tests in containers
    && apt-get install -y vim less

# Enable apache rewrite
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf