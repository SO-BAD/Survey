
<?php

if (isset($_SESSION['account'])) {
    $member = "<div class='btn btn-primary'>".$_SESSION['account']['name']."</div>";
    $button_link =  "<a href='./api/logout.php'><button class='btn btn-primary'>登出</button></a>";
} else {
    $member ="";
    $button_link =  "<a href='./login.php'><button class='btn btn-primary'>登入</button></a>";
}
?>

<div class= "online_box">
    <?= $member; ?>
</div>
<div class="button_box">
    <?= $button_link; ?>
</div>
<style>
    .online_box{
        text-align: center;
        width: 140px;
        height: 60px;
        padding-top: 10px;
    }
    .button_box{
        width: 60px;
        height: 60px;
        padding-top: 10px;
    }
</style>