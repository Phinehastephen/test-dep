# Use official PHP 8.2 with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install and enable mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy all project files
COPY . .

# Expose port 3000 (matches your app settings)
EXPOSE 3000

# Start PHP's built-in server
CMD ["php", "-S", "0.0.0.0:3000", "-t", "/var/www/html"]

