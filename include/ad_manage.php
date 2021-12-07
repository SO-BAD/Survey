<?php
    if(isset($_SESSION['account'])&&($_SESSION['account']['permission']) > 0){
        $sql = "SELECT * FROM `ad` WHERE `status` = '0'";
            $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            foreach ($res as $key => $data) {
                echo "<a href='#'><img style=' width:180px;' src ='{$data['src']}' alt='{}'></a>";
                echo "<div style=' width:180px; margin-bottom:10px;text-align:center;'><a href='#'>{$data['intro']}</a>";
                echo "</div>";
            }
    }else{
        header("location:./index.php");
        exit;
    }
?>