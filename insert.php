<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body {
            margin: 0;
        }
        .insert_box{
            width: 600px;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
        }
        .alert{
            width: 600px;
            height: 30px;
        }
        .label{
            width:198px;
        }
        
        .input{
            width: 398px;
        }
        .gender{
            width: 398px;
        }
        #submit{
            width: 60px;
        }
    </style>
    <script>
    </script>
</head>

<body>
    <div class ="insert_box">
        <form action="./api/acc_insert.php" method ="POST">
        <label class = "label"for="account">Account</label>
        <input type="text" id="account" class="input"name ="account[]">
        <div class ="alert">
            <!-- <button>檢查</button><span>error</span> -->
        </div>
        <label class = "label"for="password">password</label>
        <input type="password" id="password" class="input" name ="account[]">
        <!-- <label class = "label"for="password">password_ck</label>
        <input type="password" id="password" class="input"> -->
        <div class ="alert">
            <!-- <button>檢查</button><span>error</span> -->
        </div>
        <label class = "label"for="">name</label>
        <input type="text" id="" class="input" name ="account[]">
        <div class ="alert">
            <!-- <button>檢查</button><span>error</span> -->
        </div>
        <label class = "label"for="">gender:</label>
        <div class="gender">
            <label for="">男</label><input type="radio" id="" name ="account[]" value="1">
            <label for="">女</label><input type="radio" id="" name ="account[]" value="0">
        </div>
        <label  class = "label" for="">birthday</label><input type="date" name ="account[]" class="input">
        <label  class = "label" for="">live</label>
        <div class="input">
            <select  name ="account[]" id="">
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
        <input type="submit" id="submit" >
        </form>
        <a href='index.php'><button>首頁</button></a>
    </div>
</body>

</html>