<?php
    include_once "db.php";
    if(isset($_POST['intro']) && isset($_POST['id'])){
        $sql = "UPDATE `ad` SET `intro`='{$_POST['intro']}' WHERE `id` = '{$_POST['id']}'";
        $pdo->exec($sql);
        echo "修改成功";
    }else if(isset($_POST['order']) && isset($_POST['id'])){
        $sql = "UPDATE `ad` SET `orderNum`='{$_POST['order']}' WHERE `id` = '{$_POST['id']}'";
        $pdo->exec($sql);
        echo "修改成功";
    }else{
        echo "error";
    }

?>