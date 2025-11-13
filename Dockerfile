FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

WORKDIR /var/www/html

COPY . .

EXPOSE 3000
CMD ["php", "-S", "0.0.0.0:3000", "-t", "/var/www/html"]
