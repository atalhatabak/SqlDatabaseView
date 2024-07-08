    <!DOCTYPE html><html lang=tr>
<head>
    <title><?= isset($_GET['page']) ? $_GET['page'] : "Index"; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="main.js"></script>   
    <link href="https://cdn.jsdelivr.net/gh/google/code-prettify@master/src/prettify.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/src/prettify.js"></script>


</head>   
<body onload="prettyPrint()">  
<?php

$host = '127.0.0.1';
$dbname = 'Xen';
$user = 'postgres';
$pass = 'Pass';


try {
    $dsn = "pgsql:host=$host;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}

$CreateTable = 'querys/CreateTable.sql';
$SeedData = 'querys/SeedData.sql';
$AddProcedure = 'querys/AddProcedure.sql';

if(isset($_GET['view'])){
$view=$_GET['view'];
$sql = file_get_contents("querys/$view.sql");
echo "<div class='prettyprint lang-sql editor'><pre class='prettyprint lang-sql'>$sql</pre></div>";
}

if(isset($_GET['comm'])){
    $comm=$_GET['comm'];
    if($comm != "ok"){
        $sql = file_get_contents("querys/$comm.sql");
        $pdo->exec($sql);
        $url = MakeUrl("comm=ok");
        header("Location: $url");
    }

}


function MakeUrl($X,$Y="None"){
    $X=explode("=",$X);
    $params = $_GET;
    
    $params['code']=$Y;

    if(isset($params[$X[0]])){
        $params[$X[0]] = $X["1"];
        $url="?";
    }
    else{
        $url="?$X[0]=$X[1]&";
    }

    $keys = array_keys($params);
    
    foreach($keys as $key){
            $url=$url.$key."=".$params[$key]."&";
    }

    
    return $url;
}

if(isset($_GET['SepeteEkle'])){
    $urunid=$_GET['SepeteEkle'];
    $userid=$_GET['user'];
    if($urunid != "ok"){
        $sql = "CALL SepeteUrunEkle($userid, $urunid)";
        $stmt = $pdo->query($sql);
        $ekle = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $url = MakeUrl("SepeteEkle=ok",$sql);
        header("Location: $url");
    }

}

if(isset($_GET['sepettenkaldir'])){
    $id=$_GET['sepettenkaldir'];
    if($id != "ok"){
        $sql = "delete from sepet where sepetid=$id";
        $stmt = $pdo->query($sql);
        $delete = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $url = MakeUrl("sepettenkaldir=ok",$sql);
        header("Location: $url");
    }

}

if(isset($_GET['SiparisiTamamla'])){
    $id=$_GET['SiparisiTamamla'];
    if($id != "ok"){
        $sql = "call YeniSiparis($id)";
        $stmt = $pdo->query($sql);
        $okee = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $url = MakeUrl("SiparisiTamamla=ok",$sql);
        header("Location: $url");
    }
}

if(isset($_GET['SiparisIptal'])){
    
    $id=$_GET['SiparisIptal'];
    if($id != "ok"){
        $uyeid=$_GET['user'];
        $sql = "call SiparisIptal($uyeid,$id)";
        $stmt = $pdo->query($sql);
        $okee = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $url = MakeUrl("SiparisIptal=ok",$sql);
        header("Location: $url");
    }
}

include "aside.php";
include "section.php";
include "article.php";
include "navbar.php";




?>




