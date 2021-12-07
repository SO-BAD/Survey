<div class="managePage">
    <h1>Ad Manage</h1>
    <?php
    if (isset($_SESSION['account']) && ($_SESSION['account']['permission']) > 0) {
        $sql = "SELECT * FROM `ad`";
        $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($res as $key => $data) {   ?>
            <div class='manage_box'>
                <?php echo "<img class='img_box' src ='{$data['src']}' alt=''>"; ?>
                <div class='edit_box'>
                    <div>
                        <input  class='intro' type="text"  value="<?= $data['intro']; ?>">
                        <button class="intro_btn">修改</button>
                    </div>
                    <div>
                        <?php 
                            echo "<div class='status st".$data['status']."' onclick='change_status(this,".($data['id']-1);
                            echo ")'>";
                            echo ($data['status']=="0")? "上架中":"未上架";
                            echo "</div>";
                        ?>
                        
                    </div>
                </div>
            </div>

    <?php
        }
    } else {
        header("location:./index.php");
        exit;
    }
    ?>

</div>
<script>
    function change_status(obj,num){
        console.log(obj);
        console.log(num);
    }
</script>
<link rel="stylesheet" href="./css/manage.css">