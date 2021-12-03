
<?php
session_start();
include "db.php";
header("Cache-Control:private");
$acc_col = ['title','end_time','author'];
$acc_data =[$_POST['s'][0],$_POST['s'][1],$_SESSION['account']['name']];

insert('surveys',$acc_col,$acc_data);

$sql = "SELECT `id` FROM `surveys` WHERE `author`='".$_SESSION['account']['name']."' ORDER BY `id` DESC LIMIT 0,1";


$id = $pdo->query($sql)->fetchColumn();

$opt_col = ['s_id','num','opt_num','opt'];

foreach($_POST['q'] as $key => $data){
    foreach ($data as $key1 => $value) {
        $opt_data = [$id,$key,$key1,$value];
        insert('opts',$opt_col,$opt_data);
    }
}
header("location:../index.php");
?>