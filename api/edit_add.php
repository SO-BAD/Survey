<?php
    include_once "db.php";
    
    if($_POST['intro'] == "" || $_POST['id'] == ""){
        echo "error";
    }else{
        $sql = "UPDATE `ad` SET `intro`='{$_POST['intro']}' WHERE `id` = '{$_POST['id']}'";
        $pdo->exec($sql);
        echo "修改成功";
    }

?>