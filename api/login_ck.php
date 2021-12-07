<?php
    session_start();
    include_once "db.php";
    
    date_default_timezone_set("Asia/Taipei");
    $time_sql = "SELECT * FROM `surveys` WHERE `status` ='0'";
    $time_res = $pdo->query($time_sql)->fetchAll(PDO::FETCH_ASSOC);

    foreach($time_res as $data){
        $end_time = strtotime($data['end_time']);
        $now_time = strtotime(date("Y-m-d"));
        if($now_time > $end_time){
            $st_sql ="UPDATE `surveys` SET `status` ='1' WHERE `id` = '{$data['id']}'";
            $pdo->exec($st_sql);
        }
    }




    $account = $_POST['account'];
    $password = $_POST['password'];
    $sql ="SELECT `id`,`account`,`name`,`permission` FROM `accounts` WHERE `account`='$account' AND `password` = '$password'";

    $res= $pdo->query($sql)->fetch();
    if ($res['account'] == $account){
        $_SESSION['account']=['id'=>$res['id'],'name'=>$res['name'],'permission'=>$res['permission']];
        echo 1;
    }else{
        echo 0;
    }

?>