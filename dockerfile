
FROM ubuntu:latest


RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php php-mysql

COPY . /var/www/html/

EXPOSE 80

CMD ["apachectl", "-D", "FOREGROUND"]