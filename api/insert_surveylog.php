<?php
    session_start();
    include "db.php";
    echo $_POST['id']."<br>";
    print_r($_POST['r']);
    $log_col= ['s_id','q_num','answer','u_id'];
    foreach ($_POST['r'] as $key =>$data){
        $log_data = [$_POST['id'],$key,$data[0],$_SESSION['account']['id']]; 
        insert('surveylog',$log_col,$log_data);
        $sql = "SELECT `count` FROM `opts` WHERE `num` = '{$key}'AND `opt_num` = '{$data[0]}'";
        $count = $pdo->query($sql)->fetchColumn();
        $count++;
        $sql = "UPDATE `opts` SET `count`='{$count}'WHERE  `num` = '{$key}'AND `opt_num` = '{$data[0]}'";
        $pdo->exec($sql);
    }
    
    $sql = "SELECT `count` FROM `surveys` WHERE `id` = '{$_POST['id']}'";
    $count = $pdo->query($sql)->fetchColumn();
    $count++;
    $sql = "UPDATE `surveys` SET `count`='{$count}'WHERE  `id` = '{$_POST['id']}'";
    $pdo->exec($sql);
    
    
    header("location:../index.php");
?>