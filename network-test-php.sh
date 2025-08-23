#!/bin/bash

echo "🔍 PHP İLE NETWORK VE DATABASE BAĞLANTI TESTİ"
echo "============================================="
echo ""

# 1. PHP ile DNS çözümleme testi
echo "1. 📡 DNS ÇÖZÜMLEMESİ TESTİ:"
sudo docker exec laravel-app php -r "
\$ip = gethostbyname('db');
if (\$ip === 'db') {
    echo '❌ DNS çözümleme başarısız - db hostname çözümlenemiyor' . PHP_EOL;
} else {
    echo '✅ DNS çözümleme başarılı - db IP adresi: ' . \$ip . PHP_EOL;
}
"
echo ""

# 2. PHP ile port bağlantı testi  
echo "2. 🔌 PORT BAĞLANTI TESTİ:"
sudo docker exec laravel-app php -r "
\$host = 'db';
\$port = 3306;
\$timeout = 5;

\$connection = @fsockopen(\$host, \$port, \$errno, \$errstr, \$timeout);
if (\$connection) {
    echo '✅ Port bağlantısı başarılı - db:3306 erişilebilir' . PHP_EOL;
    fclose(\$connection);
} else {
    echo '❌ Port bağlantısı başarısız - Hata: ' . \$errstr . ' (Kod: ' . \$errno . ')' . PHP_EOL;
}
"
echo ""

# 3. MySQL bağlantı testi
echo "3. 🗄️ MYSQL BAĞLANTI TESTİ:"
sudo docker exec laravel-app php -r "
try {
    \$host = 'db';
    \$db = 'laravel';
    \$user = 'root';
    \$pass = 'root';
    
    \$dsn = \"mysql:host=\$host;port=3306;dbname=\$db;charset=utf8mb4\";
    \$options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_TIMEOUT => 5
    ];
    
    \$pdo = new PDO(\$dsn, \$user, \$pass, \$options);
    
    echo '✅ MySQL bağlantısı BAŞARILI!' . PHP_EOL;
    
    // Veritabanı bilgilerini al
    \$stmt = \$pdo->query('SELECT VERSION() as version, DATABASE() as current_db, USER() as current_user');
    \$info = \$stmt->fetch();
    
    echo '   MySQL Version: ' . \$info['version'] . PHP_EOL;
    echo '   Current Database: ' . (\$info['current_db'] ?: 'NULL') . PHP_EOL;
    echo '   Current User: ' . \$info['current_user'] . PHP_EOL;
    
    // Tablo sayısını kontrol et
    \$stmt = \$pdo->query('SHOW TABLES');
    \$tables = \$stmt->fetchAll(PDO::FETCH_COLUMN);
    echo '   Mevcut Tablo Sayısı: ' . count(\$tables) . PHP_EOL;
    
    if (count(\$tables) > 0) {
        echo '   İlk 5 Tablo: ' . implode(', ', array_slice(\$tables, 0, 5)) . PHP_EOL;
    }
    
} catch (PDOException \$e) {
    echo '❌ MySQL bağlantısı BAŞARISIZ!' . PHP_EOL;
    echo '   Hata: ' . \$e->getMessage() . PHP_EOL;
    echo '   Hata Kodu: ' . \$e->getCode() . PHP_EOL;
} catch (Exception \$e) {
    echo '❌ Genel hata: ' . \$e->getMessage() . PHP_EOL;
}
"
echo ""

# 4. Laravel .env kontrolü
echo "4. 📄 LARAVEL .ENV KONTROLÜ:"
if sudo docker exec laravel-app test -f .env; then
    echo "✅ .env dosyası mevcut"
    echo "Database ayarları:"
    sudo docker exec laravel-app cat .env | grep -E \"^DB_\" | head -6 || echo "DB_ ayarları bulunamadı"
else
    echo "❌ .env dosyası bulunamadı!"
fi
echo ""

# 5. PHP MySQL uzantı kontrolü
echo "5. 🐘 PHP MYSQL UZANTI KONTROLÜ:"
sudo docker exec laravel-app php -r "
echo 'PDO: ' . (extension_loaded('pdo') ? '✅ Yüklü' : '❌ Eksik') . PHP_EOL;
echo 'PDO MySQL: ' . (extension_loaded('pdo_mysql') ? '✅ Yüklü' : '❌ Eksik') . PHP_EOL;
echo 'MySQLi: ' . (extension_loaded('mysqli') ? '✅ Yüklü' : '❌ Eksik') . PHP_EOL;

if (extension_loaded('pdo_mysql')) {
    echo 'MySQL Sürücü Bilgileri:' . PHP_EOL;
    \$drivers = PDO::getAvailableDrivers();
    echo '  Mevcut PDO Sürücüleri: ' . implode(', ', \$drivers) . PHP_EOL;
}
"
echo ""

# 6. Laravel Artisan database testi
echo "6. 🎯 LARAVEL ARTISAN TESTİ:"
if sudo docker exec laravel-app php artisan --version &>/dev/null; then
    echo "✅ Laravel Artisan çalışıyor"
    
    # Config kontrolü
    if sudo docker exec laravel-app php artisan config:show database.default &>/dev/null; then
        echo "Database bağlantı ayarları:"
        sudo docker exec laravel-app php artisan config:show database.default 2>/dev/null || echo "Config gösterilemiyor"
        sudo docker exec laravel-app php artisan config:show database.connections.mysql.host 2>/dev/null || echo "MySQL host gösterilemiyor"
    fi
    
    # Migration durumu
    echo "Migration durumu testi:"
    sudo docker exec laravel-app php artisan migrate:status 2>&1 | head -3
    
else
    echo "❌ Laravel Artisan çalışmıyor"
fi
echo ""

echo "7. 💡 SONUÇLAR VE ÖNERİLER:"
echo "=========================="
