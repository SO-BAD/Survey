<?php
include_once "./api/db_story.php";
$show_storys = new DB("storys");

$res = $show_storys->all();
?>




<div style="width:100%;" class="d-flex flex-column p-5">
    <div style="width:100%;">

    </div>
    <div class="storys_box d-flex flex-column">
        <?php foreach ($res as $key => $value) { ?>
            <div style="display:flex; padding:5px 10px;">
                <img src="<?=$res[0]['src']?>" style="width:120px;" alt="">
                <div style="width:120px; display:flex; " class="flex-column">
                    <div><?=$res[0]['title']?></div>
                    <div><?=$res[0]['intro']?></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<style>
    .storys_box {
        width: 100%;
        height: 80px;
        border: 1px solid black;
    }
</style>