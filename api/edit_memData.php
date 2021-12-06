<?
    session_start();
    include_once "db.php";
    $pw = $_POST['pw'];
    $sql = "SELECT `id` FROM `accounts` WHERE `id`= '{$_SESSION['account']['id']}' AND `password` = '{$_POST['pw'][0]}'";
    $res = $pdo->query($sql)->fetchColumn();

    if($res){
        $sql = "UPDATE `accounts` SET `password` = '{$pw[1]}' WHERE `id` = '{$_SESSION['account']['id']}'";
        $pdo->exec($sql);
        echo "<script>alert('修改成功，點擊確認回首頁');window.location.href='../index.php';</script>";
    }else{
        echo "<script>alert('修改失敗，舊密碼輸入失敗');window.location.href='../index.php';</script>";
    }

?>