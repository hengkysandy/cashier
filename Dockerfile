FROM php:7.1-alpine

ADD . /my_app

WORKDIR /my_app

RUN chmod +x composer-install.sh
RUN ./composer-install.sh
RUN composer --version

RUN composer global require hirak/prestissimo
RUN composer install


EXPOSE 80

CMD php artisan serve --port=80 --host=0.0.0.0