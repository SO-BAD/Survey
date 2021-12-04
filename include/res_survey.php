<div class="display_res">
    <div class="display_who">

    </div>
</div>
<div class="table_box">
    <table>
        <?php

        include_once "./api/isempty.php";


        echo "<input type='hidden' value='{$_GET['id']}' id ='id'>";
        $sql = "SELECT * FROM `opts` WHERE `s_id` = {$_GET['id']}";
        $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $total = count($res);
        $ct = 0;
        for ($i = 0; $i < $total; $i++) {
            if ($res[$i]['num'] == $ct) {
                if ($res[$i]['opt_num'] == "0") {
                    echo  "<tr><th>" . $res[$i]['opt'] . "</th><th>總數</th></tr>";
                } else {
                    echo  "<tr onclick ='query_opt(this),query_who({$_GET['id']},{$ct},{$res[$i]['opt_num']})'><td>" . $res[$i]['opt'] . "</td><td>" . $res[$i]['count'] . "</td></tr>";
                }
            } else {
                $ct++;
                echo "<tr><th>" . $res[$i]['opt'] . "</th><th>總數</th></tr>";
            }
        }
        ?>
    </table>
    <div style="display:flex; justify-content:center; padding-top:5px;">
        <a href="./index.php" style="margin:auto;">首頁</a>
    </div>
</div>

<link rel="stylesheet" href="./css/res_survey.css">
<script src="./js/query_who.js"></script>