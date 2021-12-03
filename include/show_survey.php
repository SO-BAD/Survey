
<?php
$sql = "SELECT * FROM `surveys` ORDER BY `id` DESC";
$res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="table_box">
    <div class= "table_header">
    Survey
    </div>
<table>
    <tr>
        <th>截止日期</th>
        <th>主題</th>
        <th>狀態</th>
        <th>已填寫</th>
        <th>結果</th>
    </tr>
    <?php foreach ($res as $data) { ?>
        <tr>
            <td><?=$data['end_time']?></td>
            <td><?=$data['title']?></td>
            <td>
                <?php
                    if(isset($_SESSION['account'])){
                        $sql ="SELECT `id` FROM `surveylog` WHERE `u_id` ='{$_SESSION['account']['id']}'AND `s_id`= '{$data['id']}'";
                        $ck_res = $pdo->query($sql)->fetchColumn(); 
                        if($ck_res){
                            echo "已填寫";
                        }else{
                            echo "<a href='./index.php?do=write_survey&id=".$data['id']."'>填寫</a>";
                        }
                    }else{
                        echo "<a href='./index.php?do=write_survey&id=".$data['id']."'>填寫</a>";
                    }
                    
                ?>
            </td>
            <td><?=$data['count']?></td>
            <td><?php echo "<a href='./index.php?do=res_survey&id=".$data['id']."'>查看</a>";?></td>
        </tr>
    <?php } ?>    
</table>
</div>
<link rel="stylesheet" href="./css/show_survey.css">