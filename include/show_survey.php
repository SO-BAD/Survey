<?php
$sql = "SELECT * FROM `surveys` ORDER BY `id` DESC";
$res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="table_box">
    <div class="table_header">
        <h1>問卷</h1><a href="./index.php?do=add_survey"><i class="fas fa-plus"></i>&nbsp;NEW</a>
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
                <td><?= $data['end_time'] ?></td>
                <td><?= $data['title'] ?></td>
                <td>
                    <?php
                    if (isset($_SESSION['account'])) {
                        if ($data['status'] == 0) {
                            $sql = "SELECT `id` FROM `surveylog` WHERE `u_id` ='{$_SESSION['account']['id']}'AND `s_id`= '{$data['id']}'";
                            $ck_res = $pdo->query($sql)->fetchColumn();
                            if ($ck_res) {
                                echo "<a href='./index.php?do=edit_survey&id=" . $data['id'] . "'>修改</a>";
                            } else {
                                echo "<a href='./index.php?do=write_survey&id=" . $data['id'] . "'>填寫</a>";
                            }
                        } else if ($data['status'] == 1){
                            echo "已截止";
                        }else{
                            echo "關閉中";
                        }
                        $res_box ="<a href='./index.php?do=res_survey&id=" . $data['id'] . "'>查看</a>";
                    } else {
                        echo "<a href='./login.php'>填寫</a>";
                        $res_box ="<a href='./login.php'>查看</a>";
                    }

                    ?>
                </td>

                <td><?= $data['count'] ?></td>
                <td><?php echo $res_box; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
<link rel="stylesheet" href="./css/show_survey.css">