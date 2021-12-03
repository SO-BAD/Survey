<?php
    include_once "db.php";
    
    $sql = "SELECT `surveylog`.`u_id`,`accounts`.`name` FROM `surveylog` INNER JOIN `accounts`
    ON `surveylog`.`u_id`=`accounts`.`id` AND `s_id` = '{$_POST['id']}' AND  `q_num` = '{$_POST['q_num']}' AND  `answer` = '{$_POST['answer']}'";
    // $sql ="SELECT `u_id` FROM `surveylog` 
    // WHERE `s_id` = '3' AND  `q_num` = '0' AND  `answer` = '2'";
    $res= $pdo->query($sql)->fetchAll();
    $res_str = "";
    if(count($res)>0){
        $tmp=Array();
        foreach ($res as $key => $data) {
            $tmp[] = $data['name'];
        }
        $res_str = implode(",",$tmp);
    }
    echo $res_str;
?>