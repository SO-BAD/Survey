<?php
if (isset($_POST['out'])) {
    unset($_SESSION['account']);
};
if (isset($_SESSION['account'])) {
    echo $_SESSION['account']['id'] . "---" . $_SESSION['account']['name'];
    echo "<form action ='./index.php' method='POST'><input type ='hidden' name ='out'><input type ='submit' value ='登出'><form>";
} else {
    echo "<a href='login.php'><button>登入</button></a>";
    echo "<a href='insert.php'><button>註冊</button></a>";
}
