<div class="table_box">
<table>
<?php
    if (isset($_GET['id']) && $_GET['id'] != "") {

        $sql = "SELECT * FROM `opts` WHERE `s_id` = {$_GET['id']}";
        $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $total = count($res);
        $ct = 0;
        for ($i = 0; $i < $total; $i++) {
            if ($res[$i]['num'] == $ct) {
                if ($res[$i]['opt_num'] == "0") {
                    echo  "<tr><th>".$res[$i]['opt'] . "</th><th>總數</th></tr>";
                } else {
                    echo  "<tr><td>".$res[$i]['opt'] . "</td><td>".$res[$i]['count'] ."</td></tr>";
                }
            } else {
                $ct++;
                echo "<tr><th>".$res[$i]['opt'] . "</th><th>總數</th></tr>";
            }
        }
    } else {
        include "./include/show_survey.php";
    }
?>
</table>
</div>
<link rel="stylesheet" href="./css/res_survey.css">