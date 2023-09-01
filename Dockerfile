# Use the PHP image with Apache
FROM php:7.4-apache

# Install MySQL extension for PHP & enable mod_rewrite
RUN docker-php-ext-install mysqli pdo pdo_mysql && \
    a2enmod rewrite && \
    a2enmod headers && \
    echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Install additional dependencies if needed
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zlib1g-dev \
    libicu-dev \
    g++ && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd && \
    docker-php-ext-install intl && \
    docker-php-ext-install zip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www/html

# Copy your application's files to the image
COPY . .

# Expose port 80
EXPOSE 80

# By default, Apache will run in the foreground keeping the container alive.
CMD ["apache2-foreground"]
