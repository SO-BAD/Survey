<?php


if (isset($_SESSION['account']) && $_SESSION['account']['permission'] < 3) {
    echo "<script>window.location.href='./index.php';</script>";
}

if (isset($_GET['id'])) {
    $id_sql = "SELECT * FROM `surveys` WHERE `id` = '{$_GET['id']}'";
    $id_res = $pdo->query($id_sql)->fetch();

    if (!$id_res) {
        echo "<script>alert('無此廣告');window.location.href='./index.php';</script>";
    }

    $change_status = ($id_res['status'] + 2) % 4;
    $update = "UPDATE `surveys` SET `status` = '{$change_status}' WHERE `id` = '{$_GET['id']}'";
    $pdo->exec($update);
    echo "<script>window.location.href='./index.php?do=survey_manage';</script>";
}




$sql = "SELECT * FROM `surveys` ORDER BY `id` DESC";
$res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$survey_status = ['投票中', '已截止', '關閉中'];

?>


<div style="width:100%; min-height:100%; padding:10px 30px;">
    <table style="width:100%;text-align:center;">
        <tr>
            <td>id</td>
            <td>問卷</td>
            <td>狀態</td>
            <td>狀態管理</td>
        </tr>
        <?php
        foreach ($res as $key => $data) {   ?>

            <tr>
                <td><?= $data['id']; ?></td>
                <td><?= $data['title']; ?></td>
                <td><?= $survey_status[$data['status']]; ?></td>
                <td><?php if ($data['status'] != "1") echo "<a href='./index.php?do=survey_manage&id={$data['id']}'>修改</a>" ?></td>
            </tr>

        <?php } ?>

    </table>


</div>
<style>
    td {
        height: 35px;
        transition: 0.3s;
    }
    tr:hover{
        background-color:lightblue;
    }
</style>