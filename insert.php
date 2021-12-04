<?php include_once "./api/db.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
        }

        .insert_box {
            width: 600px;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
        }

        .alert {
            width: 600px;
            height: 30px;
        }

        .label {
            width: 198px;
        }

        .input {
            width: 398px;
        }

        .gender {
            width: 398px;
        }

        #submit {
            width: 60px;
        }
    </style>
    <script>
        var st ={'account':0,
            'password':0,
            'name':0,
            'birthday':0,
        };
        function insert_ck(){
            let sum =0;
            for (let value of Object.entries(st)){
                sum = sum +value[1];
            }
            document.getElementById("submit").type = (sum==4)?"submit":"button";
        }
        function re_ck(obj) {
            let l = (obj.id =="account")? 8:3;
            if (obj.value.length >= l) {
                $.post("./api/re_ck.php", {
                        col: obj.id,
                        value: obj.value,
                    },
                    function(res) {
                        if (res == 0) {
                            document.getElementById((obj.id+"_alert")).innerText = "OK";
                            document.getElementById((obj.id+"_alert")).style.color = "green";
                            st[obj.id] =1;
                            insert_ck();
                        } else {
                            document.getElementById((obj.id+"_alert")).innerText = "NO";
                            document.getElementById((obj.id+"_alert")).style.color = "red";
                            st[obj.id] =0;
                        }
                    }
                );
            }else if(obj.value.length >0){
                document.getElementById((obj.id+"_alert")).innerText = "長度至少為"+l+"字元";
                document.getElementById((obj.id+"_alert")).style.color = "red";
                st[obj.id] =0;
            }else{
                document.getElementById((obj.id+"_alert")).innerText = "";
                st[obj.id] =0;
            }
        }
        function non_empty(obj){
            if(obj.value ==""){
                document.getElementById((obj.id+"_alert")).innerText = "不得為空";
                document.getElementById((obj.id+"_alert")).style.color = "red";
                st[obj.id] =0;
            }else{
                document.getElementById((obj.id+"_alert")).innerText = "";
                st[obj.id] =1;
                insert_ck();
            }
        }
    </script>
</head>

<body>
    <div class="insert_box">
        <form action="./api/acc_insert.php" method="POST">
            <label class="label" for="account">Account</label>
            <input type="text" id="account" class="input" name="account[]" onkeyup="re_ck(this);">
            <div class="alert">
                <span id="account_alert"></span>
            </div>
            <label class="label" for="password">password</label>
            <input type="password" id="password" class="input" name="account[]" onkeyup="non_empty(this)">
            <div class="alert">
            <span id="password_alert"></span>
            </div>
            <label class="label" for="name">name</label>
            <input type="text" id="name" class="input" name="account[]"onkeyup="re_ck(this);">
            <div class="alert">
            <span id="name_alert"></span>
            </div>
            <div class="gender">
                gender:
                <input type="radio" id="man" name="account[]" value="1" checked><label for="man">男</label>
                <input type="radio" id="woman" name="account[]" value="0"><label for="woman">女</label>
            </div>
            <label class="label" for="birthday">birthday</label><input type="date" id = "birthday"name="account[]" class="input"onchange="non_empty(this)">
            <div class="alert">
            <span id="birthday_alert"></span>
            </div>
            <label class="label" for="live">live</label>
            <div class="input">
                <select name="account[]" id="live">
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
            <input type="button" id="submit" value="送出">
        </form>
        <a href='index.php'><button>首頁</button></a>
    </div>
    <script src="./js/jquery-3.6.0.min.js"></script>
</body>

</html>