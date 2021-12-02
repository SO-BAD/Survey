<form action="./api/insert_surveylog.php" method="post">

    <input type="hidden" name ="id" value="<?=$_GET['id'];?>">
<?php
    
if (isset($_GET['id']) && $_GET['id'] != "") {

    $sql = "SELECT * FROM `opts` WHERE `s_id` = {$_GET['id']}";
    $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $total = count($res);
    $ct = 0;
    for ($i = 0; $i < $total; $i++) {
        if ($res[$i]['num'] == $ct) {
            if ($res[$i]['opt_num'] == "0") {
                echo "Q:" . $res[$i]['opt'] . "<br>";
            } else {
?>
                <input type="radio" id="<?php echo "q".$ct.$res[$i]['opt_num'];?>" name="r[<?= $ct ?>][]" value="<?=$res[$i]['opt_num'];?>" <?php echo ($res[$i]['opt_num'] == "1")?" Checked":"";  ?>>
                <label for='<?php echo "q".$ct.$res[$i]['opt_num'];?>'><?= $res[$i]['opt'] ?></label><br>
<?php
            }
        } else {
            $ct++;
            echo "Q:" . $res[$i]['opt'] . "<br>";
        }
    }
} else {
    include "./include/show_survey.php";
}
?>
<input type="submit" value= "完成">
</form>
<link rel="stylesheet" href="./css/write_survey.css">