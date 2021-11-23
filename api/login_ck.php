<?php
    session_start();
    $dsn = "mysql:host=localhost; charset=utf8;dbname=survey";
    $pdo = new PDO($dsn,'root','');
    $account = $_POST['account'];
    $password = $_POST['password'];
    $sql ="SELECT `account` FROM `accounts` WHERE `account`='$account' AND `password` = '$password'";

    $res= $pdo->query($sql)->fetchColumn();
    if ($res == $account){
        $_SESSION['account']=$account;
        echo 1;
    }else{
        echo 0;
    }

?>