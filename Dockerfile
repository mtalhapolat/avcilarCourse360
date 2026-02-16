# Dockerfile
FROM php:8.2-fpm

# Sistem paketlerini kur
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    zip \
    unzip \
    nginx \
    && rm -rf /var/lib/apt/lists/*

# PHP uzantılarını kur
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl

# Composer'ı kur
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Çalışma dizinini ayarla
WORKDIR /var/www

# Proje dosyalarını kopyala
COPY . .

# İzinleri ayarla
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

# Nginx konfigürasyonunu kopyala
COPY nginx.conf /etc/nginx/sites-available/default

EXPOSE 80

CMD php-fpm & nginx -g "daemon off;"
