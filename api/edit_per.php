<?php
    include_once "db.php";

    foreach($_POST['id'] as $data){
        if($data == ""){
            header("location:../index.php");
            exit;
        }
    }
    foreach($_POST['per'] as $data){
        if($data == ""){
            header("location:../index.php");
            exit;
        }
    }
    foreach($_POST['id'] as $key => $value){
        $sql = "UPDATE `accounts` SET `permission` = '{$_POST['per'][$key]}' WHERE `id` = '{$value}'";
        $pdo->exec($sql);
    }
    echo "修改成功";

?>