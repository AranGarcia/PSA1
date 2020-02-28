FROM php:7.2-apache

RUN apt-get -y update \
    && apt-get -y upgrade \
    && apt-get install -y gpg vim less 

# Apache config
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# SSL support for Apache
# RUN apt-get install -y software-properties-common \
#     && add-apt-repository ppa:certbot/certbot \
#     && apt-get install -y python-certbot-apache
RUN a2enmod ssl rewrite

# RUN certbot --apache -m admin@admin.com --agree-tos -d www.site1.com