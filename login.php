<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey-Login</title>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Microsoft JhengHei';
        }

        .section {
            margin: auto;
            width: 500px;
            height: 550px;
            padding: 10px 50px;
            border: 3px solid #aaabaa;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
        }

        .top {
            flex-basis: 100px;
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            text-align: center;
        }

        .input_box {
            flex-basis: 400px;
            height: 300px;
            margin-top: 10px;
            padding: 0px 50px;
            display: flex;
            flex-wrap: wrap;
            align-content: flex-start;
            background-color: lightcyan;
        }

        .input_box * {
            margin-top: 30px;
        }

        .input_box label {
            width: 100px;
            height: 20px;
            text-align: center;
        }

        .input_box input {
            width: 180px;
            height: 20px;
            margin-left: 10px;

        }

        .error {
            width: 260px;
            height: 20px;
            margin-top: 0px;
            padding-left: 30px;
            text-align: center;
            color: red;
        }

        #submit {
            width: 50px;
            height: 20px;
            margin: auto;
            margin-top: 20px;
        }
    </style>
    <script>
        function section_mt() {
            let h = window.innerHeight;
            document.getElementsByClassName('section')[0].style.marginTop = (h > 600) ? ((h - 550) / 2 + "px") : "0";
        }

        function input_ck() {
            let acc = ['account', 'password'];
            let alert = "請輸入";
            let count= 0;
            for (let i = 0; i < 2; i++) {
                if (document.getElementById(acc[i]).value == "") {
                    if (count != 0) alert = alert + "、";
                    count++;
                    alert = alert + acc[i];
                }
            }
            if(count == 0){
                document.getElementsByClassName("error")[0].innerText = "";
                acc_ck();
            }else{
                document.getElementsByClassName("error")[0].innerText = alert;
            }
        }
        function acc_ck(){
            let account = document.getElementById("account").value;
            let password = document.getElementById("password").value;
            $.post("./api/login_ck.php",
            {
                account:account,
                password:password
            },
                function(res){
                    if(res ==1){
                        window.location.href='./index.php';
                    }else{
                        alert("帳號或密碼錯誤，請重新輸入");
                    }
                }
            );
        }
    </script>
</head>

<body onload="section_mt()" onresize="section_mt()">
    <section class="section">
        <header class="top">
            <b style="font-size:25px;">Survey</b>
            <b style="font-size:20px;">Login</b>
        </header>
        <div class="input_box">
            <label for="account">Account</label><input type="text" name="account" id="account">
            <label for="password">Password</label><input type="password" name="password" id="password">
            <span class="error"></span>
            <input type="button" name="" id="submit" value="登入" onclick="input_ck()">
        </div>
    </section>
</body>


</html>