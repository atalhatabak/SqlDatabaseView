<section>
Kullanıcı Seç::
        <?php
        $sql = "SELECT UyeID, k_adi FROM Uyeler";
        $stmt = $pdo->query($sql);          
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($users as $user){
            $id=$user['uyeid'];
            $ad=$user['k_adi'];
            $url="?user=$id&";
            echo "<a href=$url> $ad </a>";
        }
        ?>
<h1>Son Çalıştırılan Kod</h1>
<div  class='prettyprint lang-sql info ' id="info">
<code class='prettyprint lang-sql info '>

<?php
if(isset($_GET['code'])){
    $code=$_GET['code'];
    echo $code;
}
else{
    echo "None";
}
?>
</code>
</div>

</section>