CREATE TABLE Kategoriler (
    KategoriID SERIAL PRIMARY KEY,
    KategoriAdi VARCHAR(100) NOT NULL,
    Aciklama TEXT
);

CREATE TABLE Urunler (
    UrunID SERIAL PRIMARY KEY,
    UrunAdi VARCHAR(100) NOT NULL,
    Aciklama TEXT,
    Fiyat DECIMAL(10, 2) NOT NULL,
    StokMiktari INT NOT NULL DEFAULT 0,
    KategoriID INT,
    FOREIGN KEY (KategoriID) REFERENCES Kategoriler(KategoriID)
);



CREATE TABLE Uyeler (
    UyeID SERIAL PRIMARY KEY,
    K_Adi VARCHAR(50) NOT NULL,
    Parola VARCHAR(100) NOT NULL,
    TamAd VARCHAR(100),
    Email VARCHAR(100),
    Adres TEXT,
    Telefon VARCHAR(20)
);

CREATE TABLE Sepet (
    SepetID SERIAL PRIMARY KEY,
    UyeID INT NOT NULL,
    UrunID INT NOT NULL,
    Miktar INT NOT NULL DEFAULT 1,
    FOREIGN KEY (UyeID) REFERENCES Uyeler(UyeID),
    FOREIGN KEY (UrunID) REFERENCES Urunler(UrunID)
);

CREATE TABLE Siparisler (
    SiparisID SERIAL PRIMARY KEY,
    UyeID INT NOT NULL,
    SiparisZamani TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ToplamTutar DECIMAL(10, 2) NOT NULL,
    Durum VARCHAR(50) NOT NULL DEFAULT 'Pending',
    FOREIGN KEY (UyeID) REFERENCES Uyeler(UyeID)
);

CREATE TABLE UrunSiparis (
    UrunID INT,
    SiparisID INT,
    Miktar INT,
    PRIMARY KEY (UrunID, SiparisID),
    FOREIGN KEY (UrunID) REFERENCES Urunler(UrunID),
    FOREIGN KEY (SiparisID) REFERENCES Siparisler(SiparisID)
); 
