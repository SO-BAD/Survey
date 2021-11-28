<?php
    echo $_SESSION['account']['id'] ."---".$_SESSION['account']['name'];
    echo "<form action ='./index.php' method='POST'><input type ='hidden' name ='out'><input type ='submit' value ='登出'><form>";
?>