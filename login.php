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
            width: 400px;
            height: 500px;
            border: 3px solid #aaabaa;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
        }

        .top {
            flex-basis: 60px;
            margin-top: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .input_box {
            flex-basis: 200px;
            padding: 0px 30px;
            display: flex;
            flex-wrap: wrap;
            align-content: flex-start;
        }

        .input_box * {
            margin-top: 30px;
        }

        .input_box label {
            width: 100px;
            height: 20px;
            text-align: center;
            line-height: 18px;
        }

        .input_box input {
            width: 180px;
            height: 20px;
        }

        .empty {
            opacity: 0;
            color: red;
            font-size: 20px;
            margin-left: 10px;
        }
        .reg_box{
            font-size: 12px;
            margin-left: 50px;
        }
        .reg_box a{
            text-decoration: none;
        }
    </style>
    <script>
        function section_mt() {
            let h = window.innerHeight;
            document.getElementsByClassName('section')[0].style.marginTop = (h > 500) ? ((h - 500) / 2 + "px") : "0";
        }

        function input_ck() {
            let ct = 0;
            let input = document.getElementsByTagName("input");
            let empty = document.getElementsByClassName("empty");
            for (let i = 0; i < input.length; i++) {
                if (input[i].value == "") {
                    empty[i].style.opacity = 1;
                } else {
                    empty[i].style.opacity = 0;
                    ct++;
                }
            }
            if (ct == 2) acc_ck();
        }

        function acc_ck() {
            let account = document.getElementById("account").value;
            let password = document.getElementById("password").value;
            $.post("./api/login_ck.php", {
                    account: account,
                    password: password
                },
                function(res) {
                    if (res == 1) {
                        window.location.href = './index.php';
                    } else {
                        alert("帳號或密碼錯誤，請重新輸入");
                    }
                }
            );
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body onload="section_mt()" onresize="section_mt()">
    <section class="section">
        <header class="top">
            <h1>Login</h1>
        </header>
        <div class="input_box">
            <label for="account">Account</label><input type="text" name="account" id="account">
            <i class='fas fa-exclamation-triangle empty'></i>
            <label for="password">Password</label><input type="password" name="password" id="password">
            <i class='fas fa-exclamation-triangle empty'></i>
            <button class="btn btn-info mt-3 py-1" style="margin-left:100px;" onclick="input_ck()">登入</button>
            <a href="./index.php" class="btn btn-info mt-3 ml-3 py-1">取消</a>
        </div>
        <div class ="reg_box">
            點此<a href="./insert.php">註冊</a>
        </div>
    </section>
</body>


</html>