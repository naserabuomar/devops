# استخدام صورة أساسية من Ubuntu
FROM ubuntu:latest

# تحديث الحزم وتثبيت Apache و PHP
RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php php-mysql

# نسخ ملفات التطبيق إلى مجلد Apache
COPY . /var/www/html/

# تعريض المنفذ 80
EXPOSE 80

# تشغيل Apache عند بدء الحاوية
CMD ["apachectl", "-D", "FOREGROUND"]