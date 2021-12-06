<?php
    session_start();
    if(isset($_SESSION['account'])){
        echo "<script>alert('已登入');window.location.href='index.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .page {
            width: 500px;
            height: 680px;
            border-radius: 20px;
            border: 3px solid #aaa;
            margin: 50px auto;
        }

        .reg_form {
            display: flex;
            flex-wrap: wrap;
        }

        h1 {
            width: 100%;
            height: 40px;
            margin-top: 20px;
            font-size: 30px;
            text-align: center;
        }

        .data_box {
            width: 100%;
            height: 60px;
            margin-top: 20px;
            display: flex;
        }

        .data_box>label {
            width: 200px;
            font-size: 24px;
            font-weight: bolder;
            line-height: 55px;
            text-align: center;
            border-right: 3px solid #aaa;
        }

        .input_box {
            padding-left: 30px;
            width: 280px;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .input_box * {
            margin-top: 5px;
            margin-left: 10px;
        }

        .input {
            width: 180px;
            height: 20px;
        }

        .empty {
            opacity: 0;
            color: red;
        }

        .input_box span {
            width: 180px;
            height: 20px;
            color: red;
        }

        .footer_box {
            width: 100%;
            height: 60px;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <script>
        var st = {
            'account': 0,
            password: 0,
            'name': 0,
            'birthday': 0,
        };

        function insert_ck() {
            let sum = 0;
            let input = document.getElementsByTagName("input");
            for (let [key, data] of Object.entries(input)) {
                ck(data);
            }
            for (let value of Object.entries(st)) {
                sum = sum + value[1];
            }
            if (sum == 4) {
                document.getElementById('submit').type = 'submit';
                document.getElementById('submit').click();
            }
        }

        function ck(obj) {
            if (obj.type == "text") {
                re_ck(obj);
            } else if (obj.type == "password") {
                document.getElementById((obj.id + "_i")).style.opacity = (obj.value == "") ? 1 : 0;
                let pw1 = document.getElementById("password1").value;
                let pw2 = document.getElementById("password2").value;
                if (pw1 == pw2 && pw1 !== '') {
                    document.getElementById("password_alert").innerText = "";
                    st.password = 1;
                } else {
                    document.getElementById("password_alert").innerText = "密碼確認不相同";
                    st.password = 0;
                }
            } else if (obj.type == "date") {
                if (obj.value == "") {
                    document.getElementById((obj.id + "_i")).style.opacity = 1;
                    st[obj.id] = 0;
                } else {
                    document.getElementById((obj.id + "_i")).style.opacity = 0;
                    st[obj.id] = 1;
                }
            }
        }

        function re_ck(obj) {
            let l = (obj.id == "account") ? 8 : 3;
            if (obj.value.length >= l) {
                $.post("./api/re_ck.php", {
                        col: obj.id,
                        value: obj.value,
                    },
                    function(res) {
                        if (res == 0) {
                            document.getElementById((obj.id + "_alert")).innerText = "OK";
                            document.getElementById((obj.id + "_alert")).style.color = "green";
                            document.getElementById((obj.id + "_i")).style.opacity = 0;
                            st[obj.id] = 1;
                        } else {
                            document.getElementById((obj.id + "_alert")).innerText = "NO";
                            document.getElementById((obj.id + "_alert")).style.color = "red";
                            document.getElementById((obj.id + "_i")).style.opacity = 0;
                            st[obj.id] = 0;
                        }
                    }
                );
            } else if (obj.value.length > 0) {
                document.getElementById((obj.id + "_alert")).innerText = "長度至少為" + l + "字元";
                document.getElementById((obj.id + "_alert")).style.color = "red";
                document.getElementById((obj.id + "_i")).style.opacity = 0;
                st[obj.id] = 0;
            } else {
                document.getElementById((obj.id + "_alert")).innerText = "";
                document.getElementById((obj.id + "_i")).style.opacity = 1;
                st[obj.id] = 0;
            }
        }
    </script>
</head>

<body>
    <div class="page">
        <form action="./api/acc_insert.php" method="POST" class="reg_form">
            <h1>Register</h1>
            <div class="data_box">
                <label class="label" for="account">Account</label>
                <div class="input_box">
                    <input type="text" id="account" class="input" name="account[]" onkeyup="re_ck(this)">
                    <i id="account_i" class='fas fa-exclamation-triangle empty'></i>
                    <span id="account_alert"></span>
                </div>

            </div>
            <div class="data_box" style="height:90px">
                <label class="label" for="password">password</label>
                <div class="input_box">
                    <input type="password" id="password1" class="input" name="account[]"  onkeyup="ck(this)">
                    <i id="password1_i" class='fas fa-exclamation-triangle empty'></i>
                    <input type="password" id="password2" class="input" onkeyup="ck(this)">
                    <i id="password2_i" class='fas fa-exclamation-triangle empty'></i>
                    <span id="password_alert"></span>
                </div>
            </div>
            <div class="data_box">
                <label class="label" for="name">name</label>
                <div class="input_box">
                    <input type="text" id="name" class="input" name="account[]" onkeyup="re_ck(this)">
                    <i id="name_i" class='fas fa-exclamation-triangle empty'></i>
                    <span id="name_alert"></span>
                </div>
            </div>
            <div class="data_box">
                <label class="label" for="name">gender</label>
                <div class="input_box" style="margin-top:15px">
                    <input type="radio" id="man" name="account[]" value="1" checked><label for="man">男</label>
                    <input type="radio" id="woman" name="account[]" value="0"><label for="woman">女</label>
                </div>
            </div>
            <div class="data_box">
                <label class="label" for="birthday">birthday</label>
                <div class="input_box" style="padding-top:13px">
                    <input type="date" id="birthday" name="account[]" class="input">
                    <i id="birthday_i" class='fas fa-exclamation-triangle empty'></i>
                </div>
            </div>
            <div class="data_box">
                <label class="label" for="live">live</label>
                <div class="input_box">
                    <select name="account[]" id="live" style="height:20px; margin-top:20px;">
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
                </div>
            </div>
            <div class="footer_box">
                <input class="btn btn-info" type="button" id="submit" value="送出" onclick="insert_ck()">
                <a class="btn btn-info" href='index.php' style="margin-left:5px;">取消</a>
            </div>
        </form>
    </div>
    <script src="./js/jquery-3.6.0.min.js"></script>
</body>

</html>