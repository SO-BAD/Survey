    <?php
    session_start();
    include_once "db.php";
    if (isset($_SESSION['account']) && ($_SESSION['account']['permission']) > 0) {
        
        if (isset($_FILES['image']['tmp_name'])) {
            $src = "./ad/".$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], ".".$src);
        
        
        $sql = "INSERT INTO `ad` (`name`,`intro`, `src`)VALUES('{$_POST['name']}','{$_POST['intro']}','{$src}')";
        echo $sql;
        $pdo->exec($sql);
        header("location:../index.php?do=manage");
        exit;
        }
      

    } else {
        header("location:../index.php");
        exit;
    }
    ?>