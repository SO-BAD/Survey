<pre>
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
                <input type="radio" id="" name="r[<?= $ct ?>][]" value="1" <?php echo ($res[$i]['opt_num'] == "1")?" Checked":"";  ?>>
                <label for=''><?= $res[$i]['opt'] ?></label><br>
<?php
            }
        } else {
            $ct++;
            echo "Q:" . $res[$i]['opt'] . "<br>";
        }
    }
    // foreach ($res as $data) {

    //     if($data['num'] == 0&&$data['opt_num']==0){
    //         echo "問題:".$data['opt']."<br>";
    //     }else{}
    // }
} else {
    include "./include/show_survey.php";
}

// print_r($res);
?>
</pre>