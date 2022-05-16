<?php
require_once 'db.php';
?>

<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
<link type="text/css" rel="StyleSheet" href="https://bootstraptema.ru/plugins/2016/shieldui/style.css" />
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="https://bootstraptema.ru/plugins/2016/shieldui/script.js"></script>

<br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <!-- График --><div id="chart">
                <?php
                $sql = "SELECT date FROM application";
                $dates = $pdo->prepare($sql);
                $dates->execute();
                $dates=$dates->fetchAll(PDO::FETCH_ASSOC);

                $date = [];
                $asd = [];
                foreach ($dates as $datess=>$d) {
                    $date[] = '"'. $d['date'].'"';
                    $asd[] =$d['date'];
                }

                $d = implode(',', $date)
                ?>
                <?php


                echo '<pre>';
                print_r($asd);
                echo '</pre>';
                $countSql = "SELECT COUNT(*) FROM application WHERE date = ?";
                $count = $pdo->prepare($countSql);
                $c = $count->execute($asd)

                ?>
                <!--<script>
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
                                categoricalValues: [<?/*=$d*/?>]
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
                                data: [<?/*=$c*/?>]
                            }]
                        });
                    });
                </script>-->

            </div><!-- /.col-md-8 col-md-offset-2 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
