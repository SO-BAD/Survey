<?php
$sql = "SELECT * FROM `surveys` ORDER BY `id` DESC";
$res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>
<div id="chart_back" style="position:fixed; background:rgba(0,0,0,0.3); top:0px; left:0px;">
    <div>
        <canvas id="chart" width="300" height="300"></canvas>
    </div>
</div>


<div style="width:100%; min-height:100%; padding:10px 30px;">
    <table style="width:100%;text-align:center;">
        <tr>
            <td>id</td>
            <td>問卷</td>
            <td>圓餅圖</td>
        </tr>
        <?php
        foreach ($res as $key => $data) {   ?>

            <tr>
                <td><?= $data['id']; ?></td>
                <td><?= $data['title']; ?></td>
                <td onclick="model_block(<?= $data['id']; ?>)">分析圖</td>
            </tr>

        <?php } ?>

    </table>



    <!-- <canvas id="chart" width="800" height="600"></canvas> -->

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<style>
    #chart_back {
        display: none;
    }
</style>
<script>
    function model_block(s_id) {
        let w = window.innerWidth;
        let h = window.innerHeight;
        document.getElementById("chart_back").style.width = w + "px";
        document.getElementById("chart_back").style.height = h + "px";
        document.getElementById("chart_back").style.display = "block";



        // $.post("./api/query_model_data.php", {
        //         s_id: s_id
        //     },
        //     model()
        // );



        // function model() {
        //     var ctx = document.getElementById("chart").getContext('2d');
        //     var chart = new Chart(ctx, {
        //         type: 'pie',
        //         data: {
        //             labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange", "Orange"],
        //             datasets: [{
        //                 label: '# of Votes',
        //                 data: [2, 9, 3, 5, 2, 3, 0]
        //             }]
        //         }
        //     });
        // }



    }
    window.click
</script>