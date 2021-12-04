<?php
    session_start();
    header("Cache-Control:private");
    include_once "db.php";
    include_once "islate.php";
      
        
    
    $sql ="SELECT `id` FROM `surveylog` WHERE `u_id` ='{$_SESSION['account']['id']}'AND `s_id`= '{$_POST['id']}'";
    $ck_res = $pdo->query($sql)->fetchColumn(); 
    if($ck_res>0){
        echo "<script>alert('已填寫過，無法再填寫');window.location.href='../index.php';</script>";
    }else{
    $log_col= ['s_id','q_num','answer','u_id'];
    foreach ($_POST['r'] as $key =>$data){
        $log_data = [$_POST['id'],$key,$data[0],$_SESSION['account']['id']]; 
        insert('surveylog',$log_col,$log_data);
        $sql = "SELECT `count` FROM `opts` WHERE `s_id` = '{$_POST['id']}' AND `num` = '{$key}' AND `opt_num` = '{$data[0]}'";
        $count = $pdo->query($sql)->fetchColumn();
        $count = (int)$count+1;
        $sql = "UPDATE `opts` SET `count`='{$count}' WHERE `s_id` = '{$_POST['id']}' AND `num` = '{$key}'AND `opt_num` = '{$data[0]}'";
        $pdo->exec($sql);
    }
    
    $sql = "SELECT `count` FROM `surveys` WHERE `id` = '{$_POST['id']}'";
    $count = $pdo->query($sql)->fetchColumn();
    $count++;
    $sql = "UPDATE `surveys` SET `count`='{$count}'WHERE  `id` = '{$_POST['id']}'";
    $pdo->exec($sql);
    
    header("location:../index.php");
    }
?>