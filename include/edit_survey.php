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
                    <input type="radio" id="<?php echo "q" . $ct ."-". $res[$i]['opt_num']; ?>" name="r[<?= $ct ?>][]" value="<?= $res[$i]['opt_num']; ?>" <?php echo ($res[$i]['opt_num'] == $res[$i]['answer']) ? " Checked" : "";  ?>>
                    <?php echo "<label for='"."q" . $ct . "-".$res[$i]['opt_num']."'"; echo ($res[$i]['opt_num'] == $res[$i]['answer'])?"class='original'>":">"; 
                    ?>
                    
                    <?= $res[$i]['opt'] ?></label><br>
        <?php
                }
            }else{
                $ct++;
                echo "<h3>" . $res[$i]['opt'] . "</h3>";
                $answer[] = $res[$i]['num']."-".$res[$i]['answer'];
            }
        }
        $answer_str = implode(",",$answer);
        $str = $_GET['id']."/".$_SESSION['account']['id']."/".$answer_str;
    }
?>
<style>
    .original{
        color:red;
    }
</style>
<button class="btn btn-info" onclick="edit_ck('<?= $str;?>')">修改</button>
<a href="./index.php" class="btn btn-info">首頁</a>
<script>
    var ct = 0;
    function re_ck(data){
        answer = data.split("-");
        if(document.getElementById(("q"+answer[0]+"-"+answer[1])).checked == true){
            ct++;
        }
    }
    function edit_ck(str){
        let arr_checked = Array();
        let input = document.getElementsByTagName("input");
        for (let i = 0;i<input.length;i++){
            if(input[i].checked){
                let str1 = input[i].id.split("-");
                let num = str1[0].substr(1,(str1[0].length-1));
                arr_checked.push(num +"-"+str1[1]);
            }
        }
        ct = 0 ;
        let noid_str = str.split("/");
        let arr = noid_str[2].split(",");
        arr.forEach(data => re_ck(data));
        if(ct == arr.length){
            alert("未修改選項");
        }else{
            edit_log((str +"/" +arr_checked.join()));
        }
    }

    function edit_log(str) {
            $.post("./api/edit_surveylog.php", {
                    str: str
                },
                function(res) {
                    alert(res);
                    window.location.href='./index.php';
                }
            );
        }
</script>