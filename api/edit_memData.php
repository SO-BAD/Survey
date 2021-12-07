<?php
    session_start();
    include_once "db.php";
    if(isset($_POST['pw'])){
        print_r($_POST['pw']);
        $pw = $_POST['pw'];
        $sql = "SELECT `id` FROM `accounts` WHERE `id`= '{$_SESSION['account']['id']}' AND `password` = '{$_POST['pw'][0]}'";
        $res = $pdo->query($sql)->fetchColumn();

        if($res){
            $sql = "UPDATE `accounts` SET `password` = '{$pw[1]}' WHERE `id` = '{$_SESSION['account']['id']}'";
            $pdo->exec($sql);
            echo "<script>alert('修改成功，點擊確認回首頁');window.location.href='../index.php';</script>";
        }else{
            echo "<script>alert('修改失敗，密碼輸入失敗');window.location.href='../index.php';</script>";
        }
    }
    if(isset($_POST['mem'])){
        $mem_col = ['name','gender','birthday','live'];
        foreach($_POST['mem'] as $key =>$data){
            $tmp[] = "`".$mem_col[$key]."`='".$data."'";
        }
        $str = implode(",",$tmp);
        $sql = "UPDATE `accounts` SET ".$str." WHERE `id` = '{$_SESSION['account']['id']}'";
        $pdo->exec($sql);
        echo "<script>alert('修改成功，點擊確認回首頁');window.location.href='../index.php';</script>";
    }
?>