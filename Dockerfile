FROM php:7.4-alpine
WORKDIR /home/php/app
RUN apk add --update alpine-sdk
RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin
COPY composer.json composer.lock ./
COPY src ./src
RUN composer install
COPY . .
CMD ["make", "all"]
