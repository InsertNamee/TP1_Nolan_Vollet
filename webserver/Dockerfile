FROM ubuntu 
    
RUN apt-get update && apt-get install -y apache2 php8.2 libapache2-mod-php

COPY ./php/ /var/www/html/

WORKDIR /var/www/html/

RUN echo ubuntu:1234 | chpasswd

RUN a2enmod rewrite

EXPOSE 80

CMD ["apachectl", "-D", "FOREGROUND"]