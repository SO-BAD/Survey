<div class="managePage">
    <div class="manage_header">
        
        Ad Manage
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            <i class="fas fa-plus"></i>
        </button>
    </div>
    <?php
    if (isset($_SESSION['account']) && ($_SESSION['account']['permission']) > 0) {
        if (isset($_GET['id'])){
            $id_sql = "SELECT * FROM `ad` WHERE `id` = '{$_GET['id']}'";
            $id_res = $pdo->query($id_sql)->fetch();

            if (!$id_res) {
                echo "<script>alert('無此廣告');window.location.href='./index.php';</script>";
            }

            $change_status =($id_res['status']+1)%2;
            $update ="UPDATE `ad` SET `status` = '{$change_status}' WHERE `id` = '{$_GET['id']}'";
            $pdo->exec($update);
            
        }


        $sql = "SELECT * FROM `ad` ORDER BY `id` DESC";
        $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $i = 0;
        foreach ($res as $key => $data) { ?>
            <div class='manage_box o<?= $data['status']; ?>'>
                <?php echo "<img class='img_box' src ='{$data['src']}' alt=''>"; ?>
                <div class='edit_box'>
                    <div>
                        <input class='intro' type="text" value="<?= $data['intro']; ?>">
                        <button class="intro_btn">修改</button>
                    </div>
                    <div>
                        <?php
                        echo "<div class='status st" . $data['status'] . "' onclick='change_status(this," . ($data['id'] - 1) . ",$i";
                        echo ")'> <a href='./index.php?do=manage&id=".$data['id']."'>";
                        echo ($data['status'] == "0") ? "上架中" : "未上架";
                        echo "</a></div>";
                        ?>
                    </div>
                </div>
            </div>

    <?php
            $i++;
        }
    } else {
        header("location:./index.php");
        exit;
    }
    ?>

</div>
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ADD</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="./api/add.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        選擇廣告圖:
                    </td>
                    <td>
                        <input type="file" name = "image">
                    </td>
                </tr>
                <tr>
                    <td>
                        廣告名稱
                    </td>
                    <td> 
                        <input type="text" name = "name">
                    </td>
                </tr>
                <tr>
                    <td>
                        廣告文字
                    </td>
                    <td><input type="text" name = "intro"></td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        <input type="submit" class= "btn btn-info">
                    </td>
                </tr>
            </table>
        </form>
        </div>
      </div>
    </div>
  </div>

<script>
    function change_status(obj,id,num){
    //     console.log(num);
    //     let status = document.getElementsByClassName("manage_box")[num].classList[1].substr(1,1);
    //     console.log(status);
    //     document.getElementsByClassName("manage_box")[num].classList.remove(("o"+status));
    //     document.getElementsByClassName("status")[num].classList.remove(("st"+status));
    //     status = (parseInt(status)+1)%2;
    //     document.getElementsByClassName("manage_box")[num].classList.add(("o"+status));
    //     document.getElementsByClassName("status")[num].classList.add(("st"+status));
    //     document.getElementsByClassName("status")[num].innerText = (status ==1) ?"未上架":"上架";
    }
</script>
<link rel="stylesheet" href="./css/manage.css">