<?php
    $dsn = "mysql:host=localhost;charset=utf8;dbname=survey";
    $pdo = new PDO($dsn,'root','');
    // $dsn = "mysql:host=localhost;charset=utf8;dbname=s1100404";
    // $pdo = new PDO($dsn,'s1100404','s1100404');

   

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
            $str_data="'".$acc_data."'";
        }

        $sql = "INSERT INTO `$table`(".$str_col.") VALUES (".$str_data.")";
        echo $sql;
        $pdo->exec($sql);
    }

    
    // live 
    $live = array(
        'A'=> '臺北市', 
        'B'=> '臺中市', 
        'C'=> '基隆市', 
        'D'=> '臺南市', 
        'E'=> '高雄市', 
        'F'=> '新北市', 
        'G'=> '宜蘭縣', 
        'H'=> '桃園縣', 
        'J'=> '新竹縣', 
        'K'=> '苗栗縣', 
        'L'=> '臺中縣', 
        'M'=> '南投縣', 
        'N'=> '彰化縣', 
        'P'=> '雲林縣', 
        'Q'=> '嘉義縣', 
        'R'=> '臺南縣', 
        'S'=> '高雄縣', 
        'T'=> '屏東縣', 
        'U'=> '花蓮縣', 
        'V'=> '臺東縣', 
        'X'=> '澎湖縣', 
        'Y'=> '陽明山', 
        'W'=> '金門縣', 
        'Z'=> '連江縣', 
        'I'=> '嘉義市', 
        'O'=> '新竹市'  
    ); 
    

?>