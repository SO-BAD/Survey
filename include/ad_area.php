<?php
    $sql = "SELECT * FROM `ad` WHERE `status` = '0' ORDER BY `id` DESC";
    $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    foreach ($res as $key => $data) {
        echo "<a href='#'><img style=' width:180px;' src ='{$data['src']}' alt=''></a>";
        echo "<div style=' width:180px; margin-bottom:10px;text-align:center;'><a href='#'>{$data['intro']}</a>";
        echo "</div>";
    }

?>
