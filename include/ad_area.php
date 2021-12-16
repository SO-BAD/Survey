
<?php
    $sql = "SELECT * FROM `ad` WHERE `status` = '0' ORDER BY `orderNum` DESC";
    $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    foreach ($res as $key => $data) {
        echo "<div style=' width:190px;padding:5px; background:white;margin-bottom:10px; border-radius:5px;'>";
        echo "<a href='#'><img style=' width:180px;' src ='{$data['src']}' alt=''></a>";
        echo "<div style=' width:180px; text-align:center;'><a href='#'>{$data['intro']}</a>";
        echo "</div></div>";
    }

?>