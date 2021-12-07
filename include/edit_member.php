<?php
if (isset($_SESSION['account'])) {
    $sql = "SELECT * FROM `accounts` WHERE `id` = '{$_SESSION['account']['id']}'";
    $res = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
} else {
    echo "<script>alert('請先登入');window.location.href='index.php';</script>";
}


?>
<form action="./api/edit_memData.php" id="pwForm" method="post">
    <table>

        <tr>
            <td><label for="mem0">name</label></td>
            <td><input class="mem_input" id="name" type="text" name="mem[]" value="<?= $res['name'] ?>" onkeyup="re_ck(this);"><i id="name_i" class='fas fa-exclamation-triangle empty'></i>
                <span id="name_alert"></span>
            </td>
        </tr>
        <tr>
            <td>性別:</td>
            <td><input class="mem_input" id="man" type="radio" name="mem[]" value="1" checked><label for="man">男</label>
                <input class="mem_input" id="woman" type="radio" name="mem[]" value="0"><label for="woman">女</label>
            </td>
        </tr>
        <tr>
            <td><label for="mem2">生日</label></td>
            <td> <input class="mem_input" id="b" type="date" name="mem[]" value="<?= $res['birthday'] ?>" onchange="empty(this)"><i id = "b_i"class='fas fa-exclamation-triangle empty'></i></td>
        </tr>
        <tr>
            <td><label for="live">live</label></td>
            <td><select name="mem[]" id="live">
                    <option value="A">臺北市</option>
                    <option value="B">臺中市</option>
                    <option value="C">基隆市</option>
                    <option value="D">臺南市</option>
                    <option value="E">高雄市</option>
                    <option value="F">新北市</option>
                    <option value="G">宜蘭縣</option>
                    <option value="H">桃園縣</option>
                    <option value="J">新竹縣</option>
                    <option value="K">苗栗縣</option>
                    <option value="L">臺中縣</option>
                    <option value="M">南投縣</option>
                    <option value="N">彰化縣</option>
                    <option value="P">雲林縣</option>
                    <option value="Q">嘉義縣</option>
                    <option value="R">臺南縣</option>
                    <option value="S">高雄縣</option>
                    <option value="T">屏東縣</option>
                    <option value="U">花蓮縣</option>
                    <option value="V">臺東縣</option>
                    <option value="X">澎湖縣</option>
                    <option value="Y">陽明山</option>
                    <option value="W">金門縣</option>
                    <option value="Z">連江縣</option>
                    <option value="I">嘉義市</option>
                    <option value="O">新竹市</option>
                </select>
            </td>
        </tr>
    </table>
    <input id = "submit"class="btn btn-info mx-auto pw_btn" type="button" onclick="update_ck()" style="display:block;" value="修改">
</form>
<style>
    #pwForm {
        width: 400px;
        height: 500px;
        margin: 20px auto;
        padding: 20px 30px;
    }

    #pwForm * {
        margin-top: 10px;
    }

    td:nth-child(1) {
        width: 60px;
        font-size: 20px;
        font-weight: bolder;
        text-align: center;
    }

    td:nth-child(2) {
        padding-left: 10px;
        width: 280px;
    }

    .empty {
        color: red;
        margin-left: 10px;
        display: none;
    }
</style>
<script>
    var st = {
            'name': 0,
            'birthday': 0,
        };
    function re_ck(obj) {
        if (obj.value.length >= 3) {
            $.post("./api/re_ck.php", {
                    col: obj.id,
                    value: obj.value,
                },
                function(res) {
                    if (res == 0) {
                        document.getElementById((obj.id + "_alert")).innerText = "OK";
                        document.getElementById((obj.id + "_alert")).style.color = "green";
                        document.getElementById((obj.id + "_i")).style.display = "none";
                        st.name = 1;
                    } else {
                        document.getElementById((obj.id + "_alert")).innerText = "NO";
                        document.getElementById((obj.id + "_alert")).style.color = "red";
                        document.getElementById((obj.id + "_i")).style.display = "none";
                        st.name = 0;
                    }
                }
            );
        } else if (obj.value.length > 0) {
            document.getElementById((obj.id + "_alert")).innerText = "至少3字元";
            document.getElementById((obj.id + "_alert")).style.color = "red";
            document.getElementById((obj.id + "_i")).style.display = "none";
            st.name = 0;
        } else {
            document.getElementById((obj.id + "_alert")).innerText = "";
            document.getElementById((obj.id + "_i")).style.display = "inline-block";
            st.name = 0;
        }
    }

    function empty(obj) {
        if(obj.value == ""){
            document.getElementById((obj.id+"_i")).style.display = "inline-block" ;
            st.birthday = 0;
        }else{
            document.getElementById((obj.id+"_i")).style.display = "none";
            st.birthday = 1;
        }
    }

    function update_ck() {
        let sum = 0;
        let name = document.getElementById("name");
        let b = document.getElementById("b");
        empty(b);
        re_ck(name);
        for (let value of Object.entries(st)) {
                sum = sum + value[1];
            }
            if (sum == 2) {
                document.getElementById('submit').type = 'submit';
                document.getElementById('submit').click();
            }
    }
</script>