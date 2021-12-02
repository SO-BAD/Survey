<form action="./api/survey_insert.php" method="POST" class="form" id= "myform">
    <div class="top">
        <input type="text" placeholder="請輸入主題" onkeyup="ck(this)" name ="s[]"><i class='fas fa-exclamation-triangle empty'></i>
        <span style="margin-left:20px;">截止日期:</span> <input  name ="s[]" type="date" onchange="compare(this),ck(this);"><i class='fas fa-exclamation-triangle empty'></i>
    </div>
    <div class="content">
        <div class="ques">
            <div class="q_t">
                <input type="text" class="q_t_i" name="q[0][]" placeholder="Input Question" onkeyup="ck(this)"><i class='fas fa-exclamation-triangle empty'></i>
            </div>
            <div class="o_box">
                <div id = "o0-1" class="o">
                    <i class="far fa-circle"></i><input type="text" class="opt" name="q[0][]"placeholder="Option" onkeyup="ck(this)"><i class='fas fa-exclamation-triangle empty'></i>
                </div>
            </div>
            <i class="fas fa-plus" onclick="add_o(0)" style="cursor: pointer; margin-left:40px; ">&ensp;Option</i>
        </div>
    </div>
    <div class="footer">
        <input type="button" value="add question" onclick="add_q()">
        <input type="button" id = "submit"value="建立" onclick="empty_ck()">
        
    </div>
</form>
<link rel="stylesheet" href="./css/add_survey.css">
<script src="./js/add_survey.js"></script>