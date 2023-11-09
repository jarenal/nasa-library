FROM php:8.2-apache-bullseye

ARG DEBIAN_FRONTEND=noninteractive
#ARG USER

ENV APACHE_DOCUMENT_ROOT /var/www/public

RUN set -eux; \
    apt-get update && apt-get install -y --no-install-recommends \
    acl git zip libzip-dev vim less unzip libpng-dev tzdata libcurl4-gnutls-dev libicu-dev wget \
    && apt clean \
    && apt autoclean \
    && apt autoremove \
    && docker-php-ext-install zip gd curl intl \
    && pecl install xdebug-3.2.1 \
    && docker-php-ext-enable --ini-name 05-opcache.ini opcache xdebug \
    && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    && a2enmod rewrite

RUN setfacl -R -m u:www-data:rwX /var/www \
    && setfacl -dR -m u:www-data:rwX /var/www

COPY ./docker/web/bin/symfony /usr/local/bin/symfony

WORKDIR /var/www

#RUN useradd -ms /bin/bash ${USER}
#USER ${USER}
