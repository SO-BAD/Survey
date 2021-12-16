<?php
$orderType_active = ['', '', ''];
$orderType_link = ['', '', ''];
$orderType_arrow = ['', '', ''];
$arrow = ['fas fa-arrow-up', 'fas fa-arrow-down'];
$search_sql = '';
$page_num = 3;
if(isset($_GET['page']) && is_numeric($_GET['page'])){
    $page =$_GET['page'];
}else{
    $page = 1;
}



if(isset($_GET['search'])){
    $search_link = "&search={$_GET['search']}";
    $search_sql = " WHERE `title` LIKE '%".$_GET['search']."%' ";
    for($i=0;$i<3;$i++){
        $orderType_link[$i] = $orderType_link[$i].$search_link;
    }
}else{
    $search_link ='';
}



if (isset($_GET['orderby_type']) && $_GET['orderby_type'] > -1 && $_GET['orderby_type'] < 3) {
    if (isset($_GET['orderby_AD']) && ($_GET['orderby_AD'] == 0 || $_GET['orderby_AD'] == 1)) {
        $o_ad_arr = ['DESC', 'ASC'];
        $o_ad = $o_ad_arr[$_GET['orderby_AD']];
        $orderType_link[$_GET['orderby_type']] = $orderType_link[$_GET['orderby_type']]."&orderby_AD=" . (($_GET['orderby_AD'] + 1) % 2);
        $orderType_arrow[$_GET['orderby_type']] = $arrow[$_GET['orderby_AD']];
        if ($_GET['orderby_type'] == 1)
            $orderType_arrow[$_GET['orderby_type']] = $arrow[(($_GET['orderby_AD'] + 1) % 2)];
    } else {
        $orderType_link[$_GET['orderby_type']] = $orderType_link[$_GET['orderby_type']]."&orderby_AD=1";
        $orderType_arrow[$_GET['orderby_type']] = $arrow[0];
        if ($_GET['orderby_type'] == 1) {
            $o_ad = 'ASC';
            $orderType_link[$_GET['orderby_type']] = $orderType_link[$_GET['orderby_type']]."&orderby_AD=0";
        } else {
            $o_ad = 'DESC';
        }
    }
    $orderType_active[$_GET['orderby_type']] = 'order_active';

    $order_arr = ['end_time', 'status', 'count'];
    
    $sql_count = "SELECT count(*) FROM `surveys`" .$search_sql." ORDER BY `" . $order_arr[$_GET['orderby_type']] . "` " . $o_ad;
    $count = $pdo->query($sql_count)->fetchColumn();
    
    $total_page = ($count%$page_num !=0)?($count-$count%$page_num)/$page_num+1:($count/$page_num);
    if($total_page >0 && $page <= $total_page){
        $start = ($page-1) *$page_num;
        $sql_LIMIT = ' LIMIT '.$start.", " . $page_num;
    }else{
        $sql_LIMIT = ' LIMIT '.$page_num;
    }
   
   
    $sql = "SELECT * FROM `surveys`" .$search_sql." ORDER BY `" . $order_arr[$_GET['orderby_type']] . "` " . $o_ad . $sql_LIMIT;

} else {
    
    $sql_count = "SELECT count(*) FROM `surveys`" .$search_sql." ORDER BY `id` DESC";
    $count = $pdo->query($sql_count)->fetchColumn();
    
    $total_page = ($count%$page_num !=0)?($count-$count%$page_num)/$page_num+1:($count/$page_num);
    if($total_page >0 && $page <= $total_page){
        $start = ($page-1) *$page_num;
        $sql_LIMIT = ' LIMIT '.$start.", " . $page_num;
    }else{
        $sql_LIMIT = ' LIMIT '.$page_num;
    }
    
    
    
    
    
    
    $sql = "SELECT * FROM `surveys` ".$search_sql." ORDER BY `id` DESC". $sql_LIMIT;;
}
$res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);









?>
<div class="table_box">
    <div class="table_header">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <form action="" class="mr-5">
                    <input type="text" name="search" id="">
                    <button><i class="fas fa-search"></i></button>
                </form>
                <a href="./index.php?do=add_survey"><i class="fas fa-plus"></i>&nbsp;NEW</a>
            </div>
        </div>
    </div>
    <table>
        <tr>
            <th class="th <?= $orderType_active[0]; ?>">
                <a href="./index.php?orderby_type=0<?= $orderType_link[0]; ?>">截止日期<i class="<?= $orderType_arrow[0]; ?> ml-1"></i></a>
            </th>
            <th>主題</th>
            <th class="th <?= $orderType_active[1]; ?>">
                <a href="./index.php?orderby_type=1<?= $orderType_link[1]; ?>">狀態<i class="<?= $orderType_arrow[1]; ?> ml-1"></i></a>
            </th>
            <th class="th <?= $orderType_active[2]; ?>">
                <a href="./index.php?orderby_type=2<?= $orderType_link[2]; ?>">填寫數<i class="<?= $orderType_arrow[2]; ?> ml-1"></i></a>
            </th>
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
                        } else if ($data['status'] == 2) {
                            echo "已截止";
                        } else {
                            echo "關閉中";
                        }
                        $res_box = "<a href='./index.php?do=res_survey&id=" . $data['id'] . "'>查看</a>";
                    } else {
                        echo "<a href='./login.php'>填寫</a>";
                        $res_box = "<a href='./login.php'>查看</a>";
                    }

                    ?>
                </td>

                <td><?= $data['count'] ?></td>
                <td><?php echo $res_box; ?></td>
            </tr>
        <?php } ?>
    </table>
    <div class="container-fluid">
        <div class="row d-flex justify-content-end">
            <div class="col-3">
                <?php 
                    if (isset($_GET['orderby_type']) && $_GET['orderby_type'] > -1 && $_GET['orderby_type'] < 3) {
                        $type_link ='&orderby_type='.$_GET['orderby_type'];
                    }else{
                        $type_link = "";
                    }

                    if (isset($_GET['orderby_AD']) && ($_GET['orderby_AD'] == 0 || $_GET['orderby_AD'] ==1)) {
                        $ad_link ='&orderby_AD='.$_GET['orderby_AD'];
                    }else{
                        $ad_link = "";
                    }
                    if($page >$total_page) $page =1;
                    if( $total_page >1 && $total_page <=5){
                        for($i=1;$i<=$total_page;$i++){
                            if($page == $i){
                                echo $i."&ensp;";
                            }else{
                                echo "<a href='./index.php?page={$i}{$search_link}{$type_link}{$ad_link}'>$i</a>&ensp;";
                            }
                        }
                    }else if( $total_page >5){
                        if(($page -2) >0){
                            for($i=($page -2);$i<($page +3);$i++){
                                if($page == $i){
                                    echo $i."&ensp;";
                                }else{
                                    if($i <=$total_page){
                                        echo "<a href='./index.php?page={$i}{$search_link}{$type_link}{$ad_link}'>$i</a>&ensp;";
                                    }
                                }
                            }
                        }else{
                            for($i=1;$i<=5;$i++){
                                if($page == $i){
                                    echo $i."&ensp;";
                                }else{
                                    echo "<a href='./index.php?page={$i}{$search_link}{$type_link}{$ad_link}'>$i</a>&ensp;";
                                }
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="./css/show_survey.css">