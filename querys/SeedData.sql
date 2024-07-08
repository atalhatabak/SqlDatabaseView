INSERT INTO Kategoriler (KategoriAdi, Aciklama) VALUES ('Kuruyemiş', 'Kuruyemiş');
INSERT INTO Kategoriler (KategoriAdi, Aciklama) VALUES ('Yöresel', 'Ev Yapımı Yerel ürünler');
INSERT INTO Kategoriler (KategoriAdi, Aciklama) VALUES ('Diğer', 'Diğer Ürünler');

INSERT INTO Urunler (UrunAdi, Aciklama, Fiyat, StokMiktari, KategoriID) VALUES ('Fındık', 'Kg İle', 100, 80, 1);
INSERT INTO Urunler (UrunAdi, Aciklama, Fiyat, StokMiktari, KategoriID) VALUES ('Antep Fıstığı', 'Kg İle', 120, 70, 1);
INSERT INTO Urunler (UrunAdi, Aciklama, Fiyat, StokMiktari, KategoriID) VALUES ('Yer Fıstığı', 'Kg İle', 60, 78, 1);
INSERT INTO Urunler (UrunAdi, Aciklama, Fiyat, StokMiktari, KategoriID) VALUES ('Kaju', 'Kg İle', 150, 65, 1);
INSERT INTO Urunler (UrunAdi, Aciklama, Fiyat, StokMiktari, KategoriID) VALUES ('Badem', 'Kg İle', 110, 46, 1);
INSERT INTO Urunler (UrunAdi, Aciklama, Fiyat, StokMiktari, KategoriID) VALUES ('Çekirdek', 'Kg İle', 60, 120, 1);
INSERT INTO Urunler (UrunAdi, Aciklama, Fiyat, StokMiktari, KategoriID) VALUES ('Tarhana', 'Kilo İle', 150, 200, 2);
INSERT INTO Urunler (UrunAdi, Aciklama, Fiyat, StokMiktari, KategoriID) VALUES ('Sucuk', 'Adet İle', 20, 250, 2);
INSERT INTO Urunler (UrunAdi, Aciklama, Fiyat, StokMiktari, KategoriID) VALUES ('Pekmez', 'Litre İle', 60, 170, 2);
INSERT INTO Urunler (UrunAdi, Aciklama, Fiyat, StokMiktari, KategoriID) VALUES ('Cezerye', 'Adet İle', 8, 1200, 2);
INSERT INTO Urunler (UrunAdi, Aciklama, Fiyat, StokMiktari, KategoriID) VALUES ('Ceviz', 'Adet İle', 3, 10, 1);

INSERT INTO Uyeler (K_Adi, Parola, TamAd, Email, Adres, Telefon) VALUES ('atalhatabak', 'Talha', 'Talha', 'email@gmail.com', 'Biyer', '+901234567891');
INSERT INTO Uyeler (K_Adi, Parola, TamAd, Email, Adres, Telefon) VALUES ('matem', 'Metehan', 'Metehan', 'email2@gmail.com', 'Başka Biyer', '+901234567891');
INSERT INTO Uyeler (K_Adi, Parola, TamAd, Email, Adres, Telefon) VALUES ('methy', 'Metin', 'Metin', 'email@hotmail.com', 'felan filan', '+901234567891');

    -- INSERT INTO Sepet (UyeID, UrunID, Miktar ) VALUES (1, 1, 5 );
    -- INSERT INTO Sepet (UyeID, UrunID, Miktar ) VALUES (1, 2, 7 );
    -- INSERT INTO Sepet (UyeID, UrunID, Miktar ) VALUES (1, 3, 12 );
    -- INSERT INTO Sepet (UyeID, UrunID, Miktar ) VALUES (1, 4, 8 );
    -- INSERT INTO Sepet (UyeID, UrunID, Miktar ) VALUES (2, 2, 4 );
    -- INSERT INTO Sepet (UyeID, UrunID, Miktar ) VALUES (2, 5, 6 );
    -- INSERT INTO Sepet (UyeID, UrunID, Miktar ) VALUES (3, 7, 20 );
    -- INSERT INTO Sepet (UyeID, UrunID, Miktar ) VALUES (3, 8, 14 );
    -- INSERT INTO Sepet (UyeID, UrunID, Miktar ) VALUES (3, 6, 12 );
    -- INSERT INTO Sepet (UyeID, UrunID, Miktar ) VALUES (3, 10, 11 );
    -- INSERT INTO Sepet (UyeID, UrunID, Miktar ) VALUES (3, 9, 6 );


    -- INSERT INTO Siparisler (UyeID, ToplamTutar ) VALUES (1, 80 );
    -- INSERT INTO Siparisler (UyeID, ToplamTutar ) VALUES (2, 240 );
    -- INSERT INTO Siparisler (UyeID, ToplamTutar ) VALUES (3, 200 );

    -- INSERT INTO UrunSiparis (UrunID, SiparisID, Miktar ) VALUES (1, 1, 3 );
    -- INSERT INTO UrunSiparis (UrunID, SiparisID, Miktar ) VALUES (3, 1, 5 );
    -- INSERT INTO UrunSiparis (UrunID, SiparisID, Miktar ) VALUES (6, 1, 7 );
    -- INSERT INTO UrunSiparis (UrunID, SiparisID, Miktar ) VALUES (7, 1, 6 ); 
