<?php
    session_start();
    header("Cache-Control:private");
    include "db.php";
    $acc_col =['account','password','name','gender','birthday','live'];
    insert('accounts',$acc_col,$_POST['account']);
    
    $acc = ['id','name'];
    $res = select("accounts",$acc,"account",$_POST['account'][0]);
    $_SESSION['account']=['id'=>$res[0]['id'],'name'=>$res[0]['name']];
    header("location:../index.php");
?>