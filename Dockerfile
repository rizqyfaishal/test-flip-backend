FROM php:cli-stretch
MAINTAINER Rizqy Faishal "rizqyfaishal27@gmail.com"

ADD . /var/www/flip
WORKDIR /var/www/flip

RUN php migration.php

EXPOSE 3000

CMD ['php', '-S', '0.0.0.0:3000', '-t', '.']
