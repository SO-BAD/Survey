<?php 
    include_once "db.php";
    //    s_id / u_id / origin / check
    $str = $_POST['str'];
    $arr = explode("/",$str);
    if(strpos($arr[3],",")){
        $origin =  explode(",",$arr[2]);
        $check =  explode(",",$arr[3]);
        foreach($check as $key =>$data){
            $num = explode("-",$data);
            $sql ="UPDATE `surveylog` SET `answer` = '{$num[1]}' WHERE `s_id` = '{$arr[0]}' AND `u_id` = '{$arr[1]}' AND `q_num` = '{$num[0]}'";
            $pdo->exec($sql);
            $sql  ="SELECT `opt_num`,`count` FROM `opts` WHERE `num` = '{$num[0]}' AND `s_id` = '{$arr[0]}' AND `opt_num` = '{$num[1]}'";
            $res = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
            $res['count']++;
            $sql ="UPDATE `opts` SET `count` = '{$res['count']}' WHERE `opt_num` = '{$res['opt_num']}' AND `s_id` = '{$arr[0]}' AND `num` = '{$num[0]}'";
            $pdo->exec($sql);
        }
        
        foreach($origin as $key =>$data){
            $ori_num = explode("-",$data);
            $sql  ="SELECT `opt_num`,`count` FROM `opts` WHERE `num` = '{$ori_num[0]}' AND `s_id` = '{$arr[0]}' AND `opt_num` = '{$ori_num[1]}'";
            $res = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
            $res['count']--;
            $sql ="UPDATE `opts` SET `count` = '{$res['count']}' WHERE `opt_num` = '{$res['opt_num']}' AND `s_id` = '{$arr[0]}' AND `num` = '{$ori_num[0]}'";
            $pdo->exec($sql);
        }
            
    
    
    
    
    
    
    
    
    }else{
        $origin_num = explode("-",$arr[2]);
        $check_num = explode("-",$arr[3]);
        $sql ="UPDATE `surveylog` SET `answer` = '{$check_num[1]}' WHERE `s_id` = '{$arr[0]}' AND `u_id` = '{$arr[1]}' AND `q_num` = '{$check_num[0]}'";
        $pdo->exec($sql);
        $sql  ="SELECT `opt_num`,`count` FROM `opts` WHERE `num` = '{$check_num[0]}' AND `s_id` = '{$arr[0]}' AND (`opt_num` = '{$check_num[1]}' OR `opt_num` = '{$origin_num[1]}')";
        
        $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach($res as $key =>$data){
            if($data['opt_num'] == $check_num[1]){
                $res[$key]['count']++;
                $sql ="UPDATE `opts` SET `count` = '{$res[$key]['count']}' WHERE `opt_num` = '{$check_num[1]}' AND `s_id` = '{$arr[0]}' AND `num` = '{$check_num[0]}'";
                $pdo->exec($sql);
            }
            if($data['opt_num'] == $origin_num[1]){
                $res[$key]['count']--;
                $sql ="UPDATE `opts` SET `count` = '{$res[$key]['count']}' WHERE `opt_num` = '{$origin_num[1]}' AND `s_id` = '{$arr[0]}' AND `num` = '{$check_num[0]}'";
                $pdo->exec($sql);
            }
        }
    }
    echo "修改完成";

?>