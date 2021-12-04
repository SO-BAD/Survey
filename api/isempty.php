<?php 

$id_sql = "SELECT * FROM `surveys` WHERE `id` = '{$_GET['id']}'";
$id_res = $pdo->query($id_sql)->fetchColumn();

if(!$id_res){
    echo "<script>alert('無此問卷');window.location.href='./index.php';</script>";
}


?>