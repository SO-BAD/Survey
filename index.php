<?php session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include "./api/db.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/home.css">
    <script>
        function display_size() {
            let w = window.innerWidth;
            var h = window.innerHeight;
            document.getElementsByClassName("display_box")[0].style.width = w + "px";
            document.getElementsByClassName("display_box")[0].style.height = h + "px";

            document.getElementsByClassName("display_res")[0].style.left = (w > 300) ? (((w - 300) / 2) + "px") : "0px";
            document.getElementsByClassName("display_res")[0].style.top = (h > 500) ? ((100) + "px") : "0px";

        }

        function nodisplay() {
            document.getElementsByClassName("display_box")[0].style.display = "none";
            document.getElementsByClassName("display_res")[0].style.display = "none";
        }
    </script>
</head>

<body onload="display_size();" onresize="display_size();">
    <div class="display_box" onclick="nodisplay()">
    </div>
    <div class="display_res">
        <div class="res_header">

        </div>
        <div class="res_content">

        </div>
    </div>
    <nav class="">
        <div class="header">
            <div class="survey_box ">
                <a href="./index.php">Survey</a>
            </div>
            <div class="story_box">
                <a href="./index.php">Story</a>
            </div>
            <div class="status_box">
                <?php include "./include/status.php"; ?>
            </div>
        </div>
    </nav>
    <section class="page">
        <div class="content">
            <?php
            if (isset($_GET['do']) && file_exists(("./include/" . $_GET['do'] . ".php"))) {
                $str = "./include/" . $_GET['do'] . ".php";
                include $str;
            } else {
                include "./include/show_survey.php";
            }
            ?>
        </div>
        <div class="aside">
            <?php include "./include/ad_area.php"; ?>
        </div>
    </section>
    <footer>

    </footer>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
</body>

</html>