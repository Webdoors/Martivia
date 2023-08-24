FROM php:7.4-apache

# Install system dependencies and PHP extensions required
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd && \
    docker-php-ext-install mysqli pdo pdo_mysql mbstring exif xml

# Set the working directory
WORKDIR /var/www/html

# Copy the application's source code
COPY . .

EXPOSE 80
