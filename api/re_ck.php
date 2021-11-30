<?php 
    include "db.php";
    $res = select("accounts",$_POST['col'],$_POST['col'],$_POST['value']);
    
    if(count($res)>0){
        echo "1";
    }else{
        echo "0";
    }

?>