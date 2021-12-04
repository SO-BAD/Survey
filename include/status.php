<?php

if (isset($_SESSION['account'])) {
    echo $_SESSION['account']['name'];
    echo "<a href='./api/logout.php'><button class='btn btn-primary'>登出</button></a>";
} else {
    echo "<a href='./login.php'><button class='btn btn-primary'>登入</button></a>";
}
?>