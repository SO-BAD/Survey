
<?php

if (isset($_SESSION['account'])) {
    $id = $_SESSION['account']['name'];
    $member = "<i class='fas fa-user-cog ' onclick='sw()' style='cursor: pointer;'></i>";
    $edit =" <a class = 'btn btn-primary out' href='./index.php?do=edit_member'>edit</a>";
    $button_link =  "<a class= 'out' href='./api/logout.php'><button class='btn btn-primary'>登出</button></a>";
} else {
    $id = "";
    $member ="";
    $edit ="";
    $button_link =  "<a href='./login.php'><button class='btn btn-primary'>登入</button></a>";
}
?>

<div class= "online_box">

</div>
<div class="button_box" >
    <div>
        <?= $member ?>
        <?= $edit ?>
        <?= $button_link; ?>
    </div>
</div>
<script>
    var st =0;
    function sw(){
        st= (st+1)%2;
        document.getElementsByClassName("out")[0].style.display =(st ==0)? "none":"block";
        document.getElementsByClassName("out")[1].style.display =(st ==0)? "none":"block";
    }
</script>
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
    .button_box i{
        width: 60px;
        height: 40px;
        text-align: center;
        font-size: 20px;
        line-height: 40px;
        border:1px solid #ccc;
    }
    .button_box:hover i{
        box-shadow: 0 0 10px rgba(0,0,0, 0.3);
    }
    .out{
        display: none;
    } 
    
</style>