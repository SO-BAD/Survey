<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
    <link rel="stylesheet" href="./css/homePage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="header">
            <div class= "logo">LOGO</div>
            <div class ="member_box">
                <?php
                    if(isset($_POST['out'])){
                        unset($_SESSION['account']);
                    };
                    if(isset($_SESSION['account'])){
                        include "loggedin.php";
                    }else{
                        echo "<a href='login.php'><button>登入</button></a>";
                    }
                ?>
            </div>
        </div>
    </header>
    