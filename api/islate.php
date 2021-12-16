<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else if(isset($_POST['id'])){
    $id = $_POST['id'];
}

$time_sql = "SELECT `end_time`,`status` FROM `surveys` WHERE `id` = '{$id}'";
$time_res = $pdo->query($time_sql)->fetch(PDO::FETCH_ASSOC);

if($time_res['status'] ==  2){
    echo "<script>alert('已過截止日期，無法填寫');window.location.href='./index.php';</script>";
}else{
    date_default_timezone_set("Asia/Taipei");
    $end_time = strtotime($time_res['end_time']);
    $now_time = strtotime(date("Y-m-d"));
    if ($now_time > $end_time) {
        $st_sql = "UPDATE `surveys` SET `status` ='2' WHERE `id` = '{$id}'";
        $pdo->exec($st_sql);
        echo "<script>alert('已過截止日期，無法填寫');window.location.href='./index.php';</script>";
    }
}

?>