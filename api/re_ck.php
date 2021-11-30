<?php 
    include "db.php";
    $re_res = select("accounts",$_POST['col'],$_POST['col'],$_POST['value']);
    
    if(count($re_res)>0){
        echo "1";
    }else{
        echo "0";
    }

?>