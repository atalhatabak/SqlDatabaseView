# Nedir:

* Basit bir e-ticaret sitesi senaryosu için hazırlanmış ilişkisel veritabanı. Üyeler, ürünler, sepete ekleme ve sipariş oluşturma gibi işlevleri barındırıyor.
* Sql kodları postgresql için yazıldı ve test edildi diğer veritabanlarında sorun çıkartabilir.
* Ayrıca bu veritabanının işleyişini gösteren grafik olarak kötü yazılmış sadece sql kodlarını çalıştıran php kodu.
* Php bölümünde butonlar sadece sql kodlarını çalıştırıyor ve tabloların değişikliklerini gösteriyor, bunu yazma sebebim kolay şekilde sql kodlarını çalıştırmak ve değişiklikleri gözlemlemek tamamen eğitim amaçlı

# Nasıl kullanılır:
* Sisteminize postgresql veritabanını kurun
* Php ve herhangi bir http server servisi kurun (apache veya nginx)
* Php için postgresql eklentisini kurun ve etkinleştirin
* index.php içindeki veritabanı bağlantı bilgilerini kendi veritabanınıza göre değiştirin


'''php
  $host = '127.0.0.1';
  $dbname = 'DatabaseName';
  $user = 'UserName';
  $pass = 'Password';
'''



https://github.com/atalhatabak/SqlDatabaseView/assets/56918326/061f5b7c-1c35-4d84-abd3-68c927ecb201

