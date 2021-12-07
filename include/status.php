<?php

if (isset($_SESSION['account'])) {
    $member = "<i class='fas fa-user-cog ' onclick='sw()' style='cursor: pointer;'></i>";
    $edit = " <a class = 'list-group-item out' href='./index.php?do=edit_member'>編輯資料</a>";
    $edit_pw = " <a class = 'list-group-item out' href='./index.php?do=edit_pw'>修改密碼</a>";
    $button_link =  "<a class= 'out list-group-item' href='./api/logout.php'>登出</a>";
} else {
    $member = "";
    $edit = "";
    $edit_pw = "";
    $button_link =  "<a href='./login.php'><button class='btn btn-primary'>登入</button></a>";
}
?>
<div class="online_box">

</div>
<div class="button_box" >
    <div>
        <?= $member ?>
        <?php
            if(isset($_SESSION['account'])&&($_SESSION['account']['permission']) > 0){
                echo " <a class = 'list-group-item out' href='./index.php?do=ad_manage'>廣告管理</a>";
            }
        ?>
        <?= $edit ?>
        <?= $edit_pw ?>
        <?= $button_link; ?>
    </div>
</div>
<script>
    var st = 0;

    function sw() {
        st = (st + 1) % 2;
        let out = document.getElementsByClassName("out");
        for (let i = 0; i < out.length; i++) {
            document.getElementsByClassName("out")[i].style.display = (st == 0) ? "none" : "block";
        }
    }

    
</script>
<style>
    .online_box {
        text-align: center;
        width: 140px;
        height: 60px;
        padding-top: 10px;
    }

    .button_box {
        width: 60px;
        height: 60px;
        padding-top: 10px;
    }

    .button_box i {
        width: 60px;
        height: 40px;
        text-align: center;
        font-size: 20px;
        line-height: 40px;
        border: 1px solid #ccc;
    }

    .button_box:hover i {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .out {
        font-size: 12px;
        width: 100px;
        height: 40px;
        display: none;
    }
</style>