<?php
$sql = "SELECT * FROM `surveys` ORDER BY `id` DESC";
$res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>
<div id="chart_back" style="position:fixed; background:rgba(0,0,0,0.3); top:0px; left:0px;">
    <div id="chart_box">
        <canvas id="chart" width="600" height="400"></canvas>
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




</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<style>
    #chart_back {
        display: none;
    }

    #chart_box {
        width: 600px;
        min-height: 500px;
        background-color: white;
        margin: 50px auto;
    }
</style>
<script>
    function model_block(s_id) {
        let w = window.innerWidth;
        let h = window.innerHeight;
        document.getElementById("chart_back").style.width = w + "px";
        document.getElementById("chart_back").style.height = h + "px";
        document.getElementById("chart_back").style.display = "block";
        document.getElementById("chart_back").style.zIndex = 99;


        $.post("./api/query_model_data.php", {
                s_id: s_id
            },
            function(res) {
                let arr = res.split("-");
                let arr_labels = new Array();
                let arr_labels2 = new Array();
                let arr_count = new Array();
                let arr_count2 = new Array();

                let ques_arr = new Array();


                let q_ct = 0;
                for (let i = 0; i < arr.length / 5; i++) {
                    if (arr[5 * i + 2] != "0" && q_ct < 2) {
                        arr_labels.push(arr[5 * i]);
                        arr_count.push(arr[5 * i + 3]);
                    } else if (arr[5 * i + 2] != "0" && q_ct > 1) {
                        arr_labels2.push(arr[5 * i]);
                        arr_count2.push(arr[5 * i + 3]);
                    } else {
                        ques_arr.push(arr[5 * i]);
                        q_ct++;
                    }
                }
                console.log(q_ct);
                var box = document.getElementById("chart_box");
                while (box.hasChildNodes()) {
                    box.removeChild(box.lastChild);
                }
                if (q_ct > 1) {
                    let labels_total = new Array();
                    let count_total = new Array();
                    labels_total.push(arr_labels);
                    labels_total.push(arr_labels2);
                    count_total.push(arr_count);
                    count_total.push(arr_count2);
                    for (let i = 0; i < 2; i++) {
                        let c = document.createElement("canvas");
                        c.setAttribute("class", "chart");
                        box.appendChild(c);
                        var ctx = document.getElementsByClassName("chart")[i].getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: labels_total[i],
                                datasets: [{
                                    label: ques_arr[i],
                                    data: count_total[i],
                                    backgroundColor: [
                                        'rgba(255,99,132,1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(75, 12, 192, 1)'
                                    ]
                                }]
                            }
                        });
                    }
                } else {
                    let c = document.createElement("canvas");
                    c.setAttribute("class", "chart");

                    box.appendChild(c);
                    var ctx = document.getElementsByClassName("chart")[0].getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: arr_labels,
                            datasets: [{
                                label: ques_arr[0],
                                data: arr_count,
                                backgroundColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 12, 192, 1)'
                                ]
                            }]
                        }
                    });
                }


            }
        );



        // function model() {
        //     
        //     
        // }



    }
    document.getElementById("chart_back").onclick = function(e) {
        let chart_box = document.getElementById("chart_box");
        let chart = document.getElementById("chart");
        if (e.target == document.getElementById("chart_back")) {
            document.getElementById("chart_back").style.display = "none";
            document.getElementById("chart_back").style.zIndex = -99;
        }
    }
</script>