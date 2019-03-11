FROM php:7.1-alpine

ADD . /my_app

WORKDIR /my_app

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN chmod +x composer-install.sh
RUN ./composer-install.sh
RUN composer --version

RUN composer global require hirak/prestissimo
RUN composer install

RUN set -ex \
    && apk update \
    && apk add \
    && apk add --update nodejs \
    && apk add nodejs-npm

RUN node -v \
    && npm -v

RUN npm install -g grunt-cli \
    && npm install grunt --save-dev \
    && npm install grunt-contrib-concat --save-dev

RUN grunt

CMD php artisan optimize
CMD php artisan cache:clear
CMD php artisan config:clear
CMD php artisan route:clear
CMD php artisan view:clear

EXPOSE 80

CMD php artisan serve --port=80 --host=0.0.0.0