FROM ambientum/php:7.4-nginx

WORKDIR /var/www/app

USER root

RUN apk upgrade --update && apk add \
    curl \
    nano \
    bash \
    shadow \
    libtool \
    zlib-dev \
    exiftool \
    libpng-dev

RUN apk upgrade --update && apk add \
    nodejs \
    nodejs-npm

USER ambientum




