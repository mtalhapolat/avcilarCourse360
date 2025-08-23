FROM php:8.1-fpm

# Çalışma dizini
WORKDIR /var/www

# Sistem paketlerini güncelle ve gerekli paketleri kur
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

# PHP extension'larını tek tek kur
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install zip
RUN docker-php-ext-install exif
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install intl

# GD extension'ını özel konfigürasyonla kur
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Composer'ı kur
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Laravel dosyalarını kopyala
COPY . /var/www

# Dosya izinlerini ayarla (daha kapsamlı)
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Storage alt dizinlerini de kontrol et
RUN mkdir -p /var/www/storage/logs
RUN mkdir -p /var/www/storage/framework/cache
RUN mkdir -p /var/www/storage/framework/sessions
RUN mkdir -p /var/www/storage/framework/views
RUN chown -R www-data:www-data /var/www/storage
RUN chmod -R 775 /var/www/storage

# Composer bağımlılıklarını yükle
RUN composer install --optimize-autoloader --no-dev --no-interaction

RUN if [ ! -f .env ]; then cp .env.example .env; fi
RUN php artisan key:generate --no-interaction || true

# Port 9000'i aç
EXPOSE 9000

CMD ["php-fpm"]
