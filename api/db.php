<?php
    $dsn = "mysql:host=localhost;charset=utf8;dbname=survey";
    $pdo = new PDO($dsn,'root','');

    //select

    function select($table, $col,$id_class,$id_value){
        global $pdo;
        if(is_array($col)){
            foreach($col as $value){
                $tmp[]= "`".$value."`";
            }
            $cols = implode(",",$tmp);
        }else{
            $cols="`".$col."`";
        }
        
        $sql = "SELECT $cols FROM `$table` WHERE `$id_class`='$id_value'";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    

    // insert

    function insert($table,$acc_col,$acc_data){
        global $pdo;
        if(is_array($acc_col)){
            foreach($acc_col as $value){
                $tmp[]= "`".$value."`";
            }
            $str_col = implode(",",$tmp);
        }else{
            $str_col="`".$acc_col."`";
        }
        if(is_array($acc_data)){
            foreach($acc_data as $value){
                $tmp_v[]= "'".$value."'";
            }
            $str_data = implode(",",$tmp_v);
        }else{
            $str_data="'".$value."'";
        }

        $sql = "INSERT INTO `$table`(".$str_col.") VALUES (".$str_data.");";
        echo $sql;
        $pdo->exec($sql);
    }


?>