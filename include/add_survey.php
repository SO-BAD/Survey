<form action="" method="POST" class="form">
    <div class="top">
        <input type="text" placeholder="請輸入主題">
    </div>
    <div class="content">
        <div class="ques">
            <div class="q_t">
                <input type="text" class="q_t_i" name="q[0][]" placeholder="Input Question">
            </div>
            <div class="o_box">
                <div id = "o0-1" class="o">
                    <i class="far fa-circle"></i><input type="text" class="opt" name="q[0][]"placeholder="Option">
                </div>
            </div>
            <i class="fas fa-plus" onclick="add_o(0)" style="cursor: pointer; "></i>
        </div>
    </div>
    <div class="footer">
        <input type="button" value="add question" onclick="add_q()">
        <input type="submit" value="建立">
    </div>
</form>
<link rel="stylesheet" href="./css/add_survey.css">
<script src="./js/add_survey.js"></script>