<form action="./api/insert_surveylog.php" method="post">

    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <div class= "write_page"> 
        <?php


        include_once "./api/isempty.php";
        include_once "./api/islate.php";


        $sql = "SELECT `id` FROM `surveylog` WHERE `u_id` ='{$_SESSION['account']['id']}'AND `s_id`= '{$_GET['id']}'";
        $ck_res = $pdo->query($sql)->fetchColumn();
        if ($ck_res > 0) {
            echo "<script>alert('已填寫過，無法再填寫');window.location.href='./index.php';</script>";
        }

        $sql = "SELECT `opts`.`opt`,`opts`.`num`,`opts`.`opt_num`,`opts`.`count`,`surveys`.`title` FROM `opts` inner JOIN `surveys` WHERE `surveys`.`id` =`opts`.`s_id` AND `s_id` = {$_GET['id']}";
        $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo "<h1>{$res[0]['title']}</h1>";

        $total = count($res);
        $ct = 0;


        for ($i = 0; $i < $total; $i++) {
            if ($res[$i]['num'] == $ct) {
                if ($res[$i]['opt_num'] == "0") {
                    echo "<h3>" . $res[$i]['opt'] . "</h3>";
                } else {
        ?>
                    <div class= 'input_box'><input type="radio" id="<?php echo "q" . $ct . $res[$i]['opt_num']; ?>" name="r[<?= $ct ?>][]" value="<?= $res[$i]['opt_num']; ?>" <?php echo ($res[$i]['opt_num'] == "1") ? " Checked" : "";  ?>>
                    <label for='<?php echo "q" . $ct . $res[$i]['opt_num']; ?>'><?= $res[$i]['opt'] ?></label></div>
        <?php
                }
            } else {
                $ct++;
                echo "<h3>" . $res[$i]['opt'] . "</h3>";
            }
        }
        ?>
        <input type="submit" value="完成" class ="btn btn-info">
    </div>
</form>
<link rel="stylesheet" href="./css/write_survey.css">