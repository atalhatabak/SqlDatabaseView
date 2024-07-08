<article>
    
<?php
$table=isset($_GET['table']) ? $_GET['table'] : "None";


echo "<b>Tablolar::: </b>";
$sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'public' AND table_type = 'BASE TABLE';";
$stmt = $pdo->query($sql);
$tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
foreach ($tables as $tablex) {
    echo "<a href=".MakeUrl("table=$tablex",str_replace(' ', '&nbsp;', "SELECT * FROM $tablex")).">$tablex  </a>";
}


echo "<hr>";
print( isset($_GET['table'])  ? "Görüntüleniyor: ".$table : "Tablo Seçin"); 

if(isset($_GET['table'])){
    echo "<div class=box>";
    $sql = "SELECT * FROM $table";
    $stmt = $pdo->query($sql);

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    if(isset($rows[0])){
        $keys = array_keys($rows[0]);
        echo $table=="urunler"  ? "<div class=row >İşlem</div>" : "";
        foreach ($keys as $key) {
            echo "<div class=row>$key</div>";
        }
        echo "</div>";
    
        foreach ($rows as $row) {
            echo "<div class=box>";

            if($table=="urunler"){
                $urunid=$row['urunid'];
                $url=MakeUrl("SepeteEkle=$urunid");
                echo $table=="urunler"  ? "<div class=row ><a href=$url >Sepete Ekle</a></div>" : "";
            }   
            foreach ($keys as $key) {
                echo "<div class=row contenteditable=true>$row[$key]</div>";
                
            }
            echo "</div>";
    
        }
    }
}
else{
    echo "Veri Yok";
}
    


?>
</article>