FROM php:8.1-fpm
WORKDIR /var/www

# Sistem paketlerini kur
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# PHP extension'larını kur
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath intl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Composer'ı kur
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Laravel dosyalarını kopyala
COPY . /var/www

# ÖNEMLİ: Composer install'ı buraya koyun
RUN composer install --no-dev --optimize-autoloader --no-interaction

# .env ayarları
RUN if [ ! -f .env ]; then cp .env.example .env; fi
RUN php artisan key:generate --no-interaction || true

# Dosya izinlerini ayarla
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Storage dizinlerini oluştur
RUN mkdir -p /var/www/storage/logs \
    /var/www/storage/framework/cache \
    /var/www/storage/framework/sessions \
    /var/www/storage/framework/views && \
    chown -R www-data:www-data /var/www/storage && \
    chmod -R 775 /var/www/storage

EXPOSE 9000
CMD ["php-fpm"]
