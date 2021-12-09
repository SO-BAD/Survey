<?php
    if (isset($_SESSION['account']) && ($_SESSION['account']['permission']) > 0) {

    $sql = "SELECT * FROM `accounts` ";
    $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    echo "<table>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Name</th>";
    echo "<th>Permission</th>";
    echo "</tr>";
    foreach ($res as $data) {   
        if($data['permission']<$_SESSION['account']['permission']){
        ?>
        <tr>
            <td>
                <?= $data['id']; ?>
            </td>
            <td>
                <?= $data['name']; ?>
            </td>
            <td>
                <select name="" id="">
                    <?php
                        for($i=($_SESSION['account']['permission']-1);$i>-1;$i--){
                            
                            echo "<option value ='{$i}'";
                            if($data['permission'] == $i){
                                echo " selected";
                            }
                            echo ">$i</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>


<?php   }
    }
    echo "</table>";
} else {
    header("location:./index.php");
    exit;
}

?>
<button onclick="data()"class ="btn btn-primary d-block mx-auto mt-3">修改</button>
<style>
    table{
        width: 40%;
        margin: auto;
    }
    th{
        text-align: center;
    }
    td{
        height: 30px;
        text-align: center;
    }
    td:nth-child(1){
        width: 40px;
    }
    td:nth-child(2){
        width: 150px;
    }
    td:nth-child(3){
        width: 60px;
    }

</style>
<script>
    var origin_id = new Array();
    var origin_per = new Array();
    function origin_data(){
        let td = document.getElementsByTagName("td");
        let select = document.getElementsByTagName("select");
        for(let i =0;i<(td.length/3); i++){
            let id_num = td[(0+3*i)].innerText;
            origin_id.push(id_num);
            origin_per.push(select[i].value);
        }
    }


    function data(){
        let id = new Array();
        let per = new Array();
        let td = document.getElementsByTagName("td");
        let select = document.getElementsByTagName("select");
        for(let i =0;i<select.length; i++){
            if(select[i].value != origin_per[i]){
                id.push(td[(0+3*i)].innerText);
                console.log(td[(0+3*i)].innerText);
                per.push(select[i].value);
                console.log(select[i].value);
            }
        }
        if(id.length >0){
            $.post("./api/edit_per.php",{
                id:id,
                per:per
            },function(res){
                if(!res){
                    alert("error");
                }else{
                    alert(res);
                }
            }
            )
        }
    }
    origin_data();
</script>