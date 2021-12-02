<?php

if (isset($_SESSION['account'])) {
    echo $_SESSION['account']['id'] . "---" . $_SESSION['account']['name'];
    echo "<a href='./api/logout.php'><button>登出</button></a>";
} else {
    echo "<a href='login.php'><button>登入</button></a>";
    echo "<a href='insert.php'><button>註冊</button></a>";
}
?>