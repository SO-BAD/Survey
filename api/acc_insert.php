<?php
    include "db.php";
    $acc_col =['account','password','name','gender','birthday','live'];
    insert('accounts',$acc_col,$_POST['account']);
    header("location:../index.php")
?>