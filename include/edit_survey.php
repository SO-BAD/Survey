<?php
    include_once "./api/isempty.php";
    include_once "./api/islate.php";

    $sql ="SELECT * FROM `surveylog` WHERE `u_id` ='{$_SESSION['account']['id']}'AND `s_id`= '{$_GET['id']}'";
    $ck_res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC); 
    if(count($ck_res) == 0){
        echo "<script>alert('無填寫紀錄，請先填寫');window.location.href='./index.php?do=write_survey&id={$_GET['id']}';</script>";
    }else{
        $sql = "SELECT `opts`.`s_id`,`opts`.`num`,`opts`.`opt_num`,`opts`.`opt`,`surveylog`.`answer`,`surveys`.`title` FROM `opts` INNER  JOIN`surveylog`  JOIN `surveys`
                WHERE `surveylog`.`s_id`=`surveys`.`id` AND `opts`.`s_id`=`surveylog`.`s_id`  AND `opts`.`num`=`surveylog`.`q_num` AND `surveylog`.`u_id` ='{$_SESSION['account']['id']}'AND `surveylog`.`s_id`= '{$_GET['id']}'";
        $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC); 
        $ct = 0;
        echo "<h3>{$res[0]['title']}</h3>";
        for($i =0;$i<count($res);$i++){
            if($res[$i]['num'] == $ct){
                if($res[$i]['opt_num'] == "0" ){
                    echo "<h3>" . $res[$i]['opt'] . "</h3>";
                    $answer[] = $res[$i]['num']."-".$res[$i]['answer'];
                }else{
        ?>
                    <input type="radio" id="<?php echo "q" . $ct . $res[$i]['opt_num']; ?>" name="r[<?= $ct ?>][]" value="<?= $res[$i]['opt_num']; ?>" <?php echo ($res[$i]['opt_num'] == $res[$i]['answer']) ? " Checked" : "";  ?>>
                    <label for='<?php echo "q" . $ct . $res[$i]['opt_num']; ?>'><?= $res[$i]['opt'] ?></label><br>
        <?php
                }
            }else{
                $ct++;
                echo "<h3>" . $res[$i]['opt'] . "</h3>";
                $answer[] = $res[$i]['num']."-".$res[$i]['answer'];
            }
        }
        $answer_str = implode(",",$answer);
    }
?>
<script>
    var ct = 0;
    function re_ck(data){
        answer = data.split("-");
        if(document.getElementById(("q"+answer[0]+answer[1])).checked == true){
            ct++;
        }
    }
    function edit_ck(str){
        ct = 0 ;
        let arr = str.split(",");
        arr.forEach(data => re_ck(data));
        if(ct == arr.length){
            alert("未修改選項");
        }else{
            edit_log(str);
        }
    }

    function edit_log(str) {
            $.post("./api/edit_surveylog.php", {
                    str: str,
                    id:id
                },
                function(res) {
                    alert(res);
                }
            );
        }
</script>
<button class="btn btn-info" onclick="edit_ck('<?= $answer_str;?>')">修改</button>
<a href="./index.php" class="btn btn-info">首頁</a>