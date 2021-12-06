<?php
    if(isset($_SESSION['account'])){

    }else{
        echo "<script>alert('請先登入');window.location.href='index.php';</script>";
    }


?>
<form action="./api/edit_memData.php" id = "pwForm" method="post">
    <label class="pw_word"for="pw0">請輸入舊密碼</label><input class="pw_input"id= "pw0" onkeyup ="empty(this)"type="password" name="pw[]"><i class='fas fa-exclamation-triangle empty'></i>
    <label class="pw_word"for="pw1">請輸入新密碼</label><input class="pw_input"id= "pw1" onkeyup ="empty(this)"type="password" name="pw[]"><i class='fas fa-exclamation-triangle empty'></i>
    <label class="pw_word"for="pw2">請再確認新密碼</label><input class="pw_input"id= "pw2" onkeyup ="empty(this)"type="password" name="pw[]"><i class='fas fa-exclamation-triangle empty'></i>
    <span class="pw_ck"></span>
    <input class="btn btn-info mx-auto pw_btn"type="button" onclick ="update_ck()"style="display:block;"value="修改">
</form>
<style>
    #pwForm{
        width: 400px;
        height: 500px;
        margin: 20px auto;
        padding: 20px 30px;
        border: 1px solid black;
    }
    #pwForm *{
        margin-top: 10px;
    }
    .pw_word{
        width: 120px;
    }
    .pw_input{
        width: 180px;
    }
    .empty{
        opacity: 0;
        color:red;
        margin-left: 10px;
    }
    .pw_ck{
        display: block;
        width:340px;
        height: 40px;
        text-align: center;
        font-size: 20px;
        font-weight: bolder;
        color: red;
    }
</style>
<script>
    function empty(obj){
        let s = parseInt((obj.id)[2]);
        console.log(s);
        document.getElementsByClassName("empty")[s].style.opacity = (obj.value == "")? 1:0;
    }
    function update_ck(){
        let input = document.getElementsByClassName("pw_input");
        for (let i=0;i<input.length;i++){
            document.getElementsByClassName("empty")[i].style.opacity = (input[i].value == "")? 1:0;
        }
        let pw1 = document.getElementById("pw1").value;
        let pw2 = document.getElementById("pw2").value;
        if(pw1 == pw2 && pw1 != ""){
            if(document.getElementById("pw0").value !=""){
                document.getElementsByClassName("pw_btn")[0].type = "submit";
                document.getElementsByClassName("pw_btn")[0].click();
            }else{
                document.getElementsByClassName("pw_ck")[0].innerText = "請確認新密碼輸入或不得為空";
                document.getElementsByClassName("pw_btn")[0].type = "button";
            }
        }else{
            document.getElementsByClassName("pw_ck")[0].innerText = "請確認新密碼輸入或不得為空";
        }
    }
</script>