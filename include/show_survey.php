
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
        <td>截止日期</td>
        <td>主題</td>
        <td>狀態</td>
        <td>已填寫</td>
        <td>結果</td>
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