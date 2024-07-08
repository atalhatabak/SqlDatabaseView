CREATE OR REPLACE PROCEDURE YeniSiparis(p_UyeID INT)
LANGUAGE plpgsql
AS $$
DECLARE
    siparis_id INT;
    toplam_miktar DECIMAL(10, 2);
    urun_id INT;
    urun_miktar INT;
BEGIN
    
    --   sepetteki üyeye ait ürünlerin fiyat toplamını alıyor ve siparişler tablosuna ekliyor

    SELECT SUM(Miktar) INTO toplam_miktar FROM Sepet WHERE UyeID = p_UyeID;
    INSERT INTO Siparisler (UyeID, ToplamTutar) VALUES (p_UyeID, toplam_miktar)
    RETURNING SiparisID INTO siparis_id; -- önceki işlemden oluşturulan yeni id yi çekiyoruz

    -- sepetteki ürünlerin idsini ve miktar değerlerini alıp UrunSiparis ara tablosuna ekliyor ve ürün stoğunu sipariş edilen miktar kadar azaltıyor

    FOR urun_id IN
        SELECT UrunID FROM Sepet WHERE UyeID = p_UyeID
    LOOP
        SELECT Miktar INTO urun_miktar FROM Sepet WHERE UyeID = p_UyeID AND UrunID = urun_id;

        IF (SELECT StokMiktari FROM Urunler WHERE UrunID = urun_id) < urun_miktar THEN
            RAISE EXCEPTION 'Yetersiz stok: UrunID = %', urun_id;
        END IF;

        INSERT INTO UrunSiparis (UrunID, Miktar, SiparisID)
        VALUES (urun_id, urun_miktar, siparis_id);

        UPDATE Urunler SET StokMiktari = StokMiktari - urun_miktar WHERE UrunID = urun_id;
    END LOOP;

    DELETE FROM Sepet WHERE UyeID = p_UyeID;

END;
$$;


CREATE OR REPLACE PROCEDURE SiparisIptal(
    p_UyeID INT,
    p_SiparisID INT
    )
LANGUAGE plpgsql
AS $$
DECLARE
    urun_id INT;
    mevcut_durum VARCHAR(50);
BEGIN
    SELECT Durum INTO mevcut_durum FROM Siparisler WHERE SiparisID = p_SiparisID AND UyeID = p_UyeID;
    
    IF mevcut_durum != 'İptal' THEN
        UPDATE Siparisler SET Durum = 'İptal' WHERE SiparisID = p_SiparisID AND UyeID = p_UyeID;

        FOR urun_id IN
            SELECT UrunID FROM UrunSiparis WHERE SiparisID = p_SiparisID
        LOOP
            UPDATE Urunler SET StokMiktari = StokMiktari + (SELECT Miktar FROM UrunSiparis WHERE SiparisID = p_SiparisID AND UrunID = urun_id) WHERE UrunID = urun_id;
        END LOOP;
    ELSE
        RAISE NOTICE 'Sipariş zaten iptal edilmiş.';
    END IF;
    
END;
$$;


CREATE OR REPLACE PROCEDURE SepeteUrunEKle(
    p_UyeID INT,
    p_UrunID INT
    )
LANGUAGE plpgsql
AS $$
DECLARE
    siparis_id INT;
    urun_id INT;
BEGIN
    
    IF EXISTS (SELECT 1 FROM Sepet WHERE UyeID = p_UyeID AND UrunID = p_UrunID) THEN
        UPDATE Sepet SET Miktar = Miktar + 1 WHERE UyeID = p_UyeID AND UrunID = p_UrunID;
    ELSE
        INSERT INTO Sepet (UyeID, UrunID, Miktar) VALUES (p_UyeID, p_UrunID, 1);
    END IF;

END;
$$; 