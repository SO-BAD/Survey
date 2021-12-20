<?php
    if(!isset($_SESSION['account'])){
        echo "<script>window.location.href = './login.php'</script>";
    }
?>
<div class="form_box">
    <div class = "form_header">
       新增問卷
    </div>
<form action="./api/survey_insert.php" method="POST" class="form" id= "myform">
    <div class="top">
        <input type="text" placeholder="請輸入問卷主題"  onkeyup="ck(this)" name ="s[]"><i class='fas fa-exclamation-triangle empty'></i>
        <span style="margin-left:20px;">截止日期:</span> <input  name ="s[]" type="date" onchange="compare(this),ck(this);"><i class='fas fa-exclamation-triangle empty'></i>
    </div>
    <div class="add_page">
        <div class="ques">
            <div class="q_t">
                <input type="text" class="q_t_i" name="q[0][]" placeholder="請輸入問題" onkeyup="ck(this)" ><i class='fas fa-exclamation-triangle empty'></i>
            </div>
            <div class="o_box">
                <div id = "o0-1" class="o">
                    <i class="far fa-circle"></i><input type="text" class="opt0" name="q[0][]"placeholder="請輸入選項" onkeyup="ck(this)"><i class='fas fa-exclamation-triangle empty'></i>
                </div>
            </div>
            <i class="fas fa-plus" onclick="add_o(0),reset_submit()" style="cursor: pointer; margin-left:40px; ">&ensp;新增選項</i>
        </div>
    </div>
    <div class="footer container-fluid">
        <div class="row">
            <div class = "ml-5">
                <input type="button" value="新增問題" class='btn btn-info' onclick="add_q(),reset_submit()">
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-3">
            <input type="button" id = "submit"value="建立" class='btn btn-primary' onclick="empty_ck()">
            <a href="./index.php" class='btn btn-primary ml-3'>取消</a>
        </div>
    </div>
</form>
</div>
<link rel="stylesheet" href="./css/add_survey.css">
<script src="./js/add_survey.js"></script>