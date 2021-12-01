<form action="" method="POST" class="form">
    <div class="left">
        title
    </div>
    <div class="right">
        <input type="text">
    </div>
    <div class="content">
        <div class="ques">
            <div class="q_t">
                <span>Question: <input type="text" class="q_t_i"name="q[0][]"></span>
            </div>
            <div class="q_o">
                <div id="q_o0-1" class="q_o0-1">option:<input type="text" name="q[0][]"></div>
                <div id="q_o0-2" class="q_o0-2">option:<input type="text" name="q[0][]"></div>
            </div>
            <div class="q_add">
                <i class="fas fa-plus" onclick="add_o(0)" style="cursor: pointer; ">&ensp;option</i>
            </div>
        </div>
    </div>
    <div class="footer">
        <input type="button" value="add question" onclick="add_q()">
        <input type="submit" value="送出">
    </div>
</form>
<link rel="stylesheet" href="./css/add_survey.css">
<script src="./js/add_survey.js"></script>