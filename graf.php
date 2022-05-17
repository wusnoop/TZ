<?php
require_once 'db.php';
if (isset($_POST['back'])){
    header('Location: index.php');
}
?>

<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
<link type="text/css" rel="StyleSheet" href="https://bootstraptema.ru/plugins/2016/shieldui/style.css" />
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="https://bootstraptema.ru/plugins/2016/shieldui/script.js"></script>

<br><br><br>

<div class="container">
    <form action="" method="post">
        <button type="submit" class="btn btn-danger" name="back">Назад</button>

    </form>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <!-- График --><div id="chart">
                <?php
                $sql = "SELECT DISTINCT date FROM application";
                $dates = $pdo->prepare($sql);
                $dates->execute();
                $dates=$dates->fetchAll(PDO::FETCH_ASSOC);

                $date = [];
                $sortDate = [];
                foreach ($dates as $datess=> $dateStr) {
                    $date[] = '"'. $dateStr['date'].'"';
                    $sortDate[] =$dateStr['date'];
                }
                asort($date);
                asort($sortDate);

                $dateStr = implode(',', $date)

                ?>
                <?php

                $countApp = [];
                foreach ($sortDate as $value){
                    $countSql = 'SELECT COUNT(*) as cnt FROM application WHERE `date` = ?';
                    $count = $pdo->prepare($countSql);

                    $count->execute([$value]);
                    $countConnect = $count->fetchAll(PDO::FETCH_ASSOC);


                    foreach ($countConnect as $v=> $value) {
                        $countApp[] = $value['cnt'];

                    }
                }

                $countApp = implode(',', $countApp);






?>

                <script>
                    $(document).ready(function () {
                        $("#chart").shieldChart({
                            theme: "light",
                            primaryHeader: {
                                text: "Обзор"
                            },
                            exportOptions: {
                                image: false,
                                print: false
                            },
                            axisX: {
                                categoricalValues: [<?=$dateStr?>]
                            },
                            tooltipSettings: {
                                chartBound: true,
                                axisMarkers: {
                                    enabled: true,
                                    mode: 'xy'
                                }
                            },
                            dataSeries: [{
                                seriesType: 'line',
                                collectionAlias: "Количество заявок",
                                data: [<?=$countApp?>]
                            }]
                        });
                    });
                </script>

            </div><!-- /.col-md-8 col-md-offset-2 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
