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
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# PHP extension'larını tek tek kur
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install zip
RUN docker-php-ext-install exif
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install bcmath

# GD extension'ını özel konfigürasyonla kur
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Composer'ı kur
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Laravel dosyalarını kopyala
COPY . /var/www

# Dosya izinlerini ayarla
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www/storage
RUN chmod -R 755 /var/www/bootstrap/cache

# Composer bağımlılıklarını yükle
RUN composer install --optimize-autoloader --no-dev --no-interaction

# Port 9000'i aç
EXPOSE 9000

CMD ["php-fpm"]
