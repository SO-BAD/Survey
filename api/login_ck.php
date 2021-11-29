<?php
    session_start();
    $dsn = "mysql:host=localhost; charset=utf8;dbname=survey";
    $pdo = new PDO($dsn,'root','');
    $account = $_POST['account'];
    $password = $_POST['password'];
    $sql ="SELECT `id`,`account`,`name` FROM `accounts` WHERE `account`='$account' AND `password` = '$password'";

    $res= $pdo->query($sql)->fetch();
    if ($res['account'] == $account){
        $_SESSION['account']=['id'=>$res['id'],'name'=>$res['name']];
        echo 1;
    }else{
        echo 0;
    }

?>