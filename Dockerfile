FROM php:8.2-apache
WORKDIR /var/www/html
COPY . .
EXPOSE 3000
CMD ["php", "-S", "0.0.0.0:3000", "-t", "/var/www/html"]
