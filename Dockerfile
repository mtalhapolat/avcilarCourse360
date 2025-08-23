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

# PHP extension'larını kur
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath intl

# GD extension'ını özel konfigürasyonla kur
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Composer'ı kur
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ÖNEMLİ: Önce sadece composer dosyalarını kopyala (Docker cache optimizasyonu)
COPY composer.json composer.lock* ./

# Vendor klasörünü oluştur
RUN mkdir -p vendor

# Composer bağımlılıklarını yükle (cache'den yararlanmak için önce dependencies)
RUN composer install --no-scripts --no-autoloader --ansi --no-interaction

# Şimdi tüm uygulama dosyalarını kopyala
COPY . .

# Composer autoload'u optimize et
RUN composer dump-autoload --optimize --no-dev --classmap-authoritative

# Storage dizinlerini oluştur
RUN mkdir -p storage/logs \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    bootstrap/cache

# .env dosyası yoksa .env.example'dan kopyala
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Laravel key generate (hata olursa devam et)
RUN php artisan key:generate --no-interaction || true

# Dosya izinlerini ayarla (daha kapsamlı)
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Vendor klasörünün oluştuğunu doğrula ve listele
RUN ls -la /var/www/vendor && echo "✅ Vendor klasörü başarıyla oluşturuldu!"

# Port 9000'i aç
EXPOSE 9000

CMD ["php-fpm"]
