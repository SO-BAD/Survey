
<?php
$sql = "SELECT * FROM `surveys` ORDER BY `id` DESC";
$res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
<table style="width:100%; text-align:center;">
    <tr>
        <th colspan=5>Survey</th>
    </tr>
    <tr>
        <th>主題</th>
        <th>狀態</th>
        <th>截止日期</th>
        <th>已填寫人數</th>
        <th>結果</th>
    </tr>
    <?php foreach ($res as $data) { ?>
        <tr>
            <td><?=$data['title']?></td>
            <td><a href="./index.php?do=write_survey&id=<?=$data['id']?>">填寫</a> </td>
            <td><?=$data['end_time']?></td>
            <td><?=$data['count']?></td>
            <td>結果</td>
        </tr>
    <?php } ?>
</table>