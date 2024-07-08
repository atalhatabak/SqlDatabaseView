<aside>
    <div class="infao" id="inafo">

    </div>

    <a href=?>Ahmet Talha Tabak</a><a class="right" href=? >Küçük Bir Sql Görüntüleyici </a><br><br>
    <a href=<?= MakeUrl("comm=CreateTable"); ?>>Tabloları Oluştur</a><a class="right" href=<?= MakeUrl("view=CreateTable"); ?>>Kodu Görüntüle</a><br><br>
    <a href=<?= MakeUrl("comm=SeedData"); ?>>Örnek Veri Ekle</a><a class="right" href=<?= MakeUrl("view=SeedData"); ?>>Kodu Görüntüle</a><br><br>
    <a href=<?= MakeUrl("comm=AddProcedure"); ?>>Prosedür Ekle</a><a class="right" href=<?= MakeUrl("view=AddProcedure"); ?>>Kodu Görüntüle</a><br><br>
    <hr>

    <div class="sepet">
        <?php
        if(isset($_GET['user'])){
            $id=$_GET['user'];
            $sql = "SELECT k_adi FROM Uyeler where uyeid=$id";
            $stmt = $pdo->query($sql);
            $name = $stmt->fetchAll(PDO::FETCH_COLUMN);

            echo "<h2>".$name[0]." Kullanıcısının Sepeti</h2><hr>";
            echo "<div class=box>";
            $sql = "SELECT  s.sepetid, u.UrunAdi, u.Aciklama, u.Fiyat, s.miktar, s.miktar*u.Fiyat FROM Sepet s JOIN Urunler u ON s.UrunID = u.UrunID WHERE s.UyeID =".$_GET['user']." ORDER BY SepetID ASC";
            $stmt = $pdo->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(isset($rows[0])){
                $keys = array_keys($rows[0]);
                echo "<div class=row>İşlemler</div>";
                foreach ($keys as $key) {
                    echo "<div class=row>$key</div>";
                }
                echo "</div>";
            
                foreach ($rows as $row) {
                    echo "<div class=box>"; 
                    $id=$row['sepetid'];
                    $url=MakeUrl("sepettenkaldir=$id");
                    echo "<div class=row><a href=$url >Sepetten Kaldır</a></div>";
                    foreach ($keys as $key) {
                        echo "<div class=row >$row[$key]</div>";
                        
                    }
                    echo "</div>";
            
                }
                $url=MakeUrl("SiparisiTamamla=".$_GET['user']);
                echo "<a href=$url>Siparişi Oluştur</a>";
            }
            else{
                echo "</div>";
                echo "Veri Yok";
            }
    echo "</div><div class=sepet>";

            echo "<h2>".$name[0]." Kullanıcısının Siparişleri</h2><hr>";
            echo "<div class=box>";
            $sqlSS = "SELECT  * FROM Siparisler s  WHERE s.UyeID =".$_GET['user']." ORDER BY SiparisID ASC";
            $stmtSS = $pdo->query($sqlSS);
            $rowsSS = $stmtSS->fetchAll(PDO::FETCH_ASSOC);
            if(isset($rowsSS[0])){
                $keys = array_keys($rowsSS[0]);
                echo "<div class=row>İşlemler</div>";
                foreach ($keys as $key) {
                    echo "<div class=row>$key</div>";
                }
                echo "</div>";
            
                foreach ($rowsSS as $row) {
                    echo "<div class=box>";
                    $code="select u.UrunAdi, u.Fiyat, s.miktar from urunsiparis s   JOIN Urunler u ON s.UrunID = u.UrunID where siparisid=".$row['siparisid'];
                    $url1=MakeUrl("SiparisAyrinti=".$row['siparisid'],str_replace(' ', '&nbsp;', $code));
                    $url2=MakeUrl("SiparisIptal=".$row['siparisid'],"code");
                    echo "<div class=row><a href=$url1>Ayrıntı</a><br>  <a href=$url2>İptal</a></div>";

                    foreach ($keys as $key) {
                        echo "<div class=row contenteditable=true>$row[$key]</div>";
                        
                    }
                    echo "</div>";
            
                }
            }
            else{
                echo "</div>";
                echo "Veri Yok";
            }

            if(isset($_GET['SiparisAyrinti'])){
                $siparisid=$_GET['SiparisAyrinti'];

                echo "<h2>".$siparisid." Numaralı Sipariş Ayrıntıları</h2><hr>";
                echo "<div class=box>";
                $sqlA = "select u.UrunAdi,  u.Fiyat, s.miktar from urunsiparis s   JOIN Urunler u ON s.UrunID = u.UrunID where siparisid=".$siparisid;
                $stmtA = $pdo->query($sqlA);
                $rowsAA = $stmtA->fetchAll(PDO::FETCH_ASSOC);
                if(isset($rowsAA[0])){
                    $keys = array_keys($rowsAA[0]);
                    foreach ($keys as $key) {
                        echo "<div class=row>$key</div>";
                    }
                    echo "</div>";
                
                    foreach ($rowsAA as $row) {
                        echo "<div class=box>";

                        foreach ($keys as $key) {
                            echo "<div class=row contenteditable=true>$row[$key]</div>";
                            
                        }
                        echo "</div>";
                
                    }
                }
                else{
                    echo "</div>";
                    echo "Veri Yok";
                }


            }
            
            
        }
        else{
            echo "Kullanıcı Seç";
        }
        ?>
    </div>
</aside>     
