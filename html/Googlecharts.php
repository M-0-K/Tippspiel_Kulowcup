<?php
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if($_SESSION['WT13']['login'] !== 'ok'){
  exit(header("Location:login.php"));
}


date_default_timezone_set("Europe/Berlin"); 
include '../script/db_connection.php'; 


$monat = array("Januar", "Februar", "März", "April", "Mai", "Juni", 
"Juli", "August", "September", "Oktober","November","Dezember");


?>

<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jahresübersichten</title>
  <link href="../css/index.css" rel="stylesheet">
  
</head>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script>
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = null;
        data = google.visualization.arrayToDataTable([
          ['Monate','Rechnungen','Geraete']

        <?php

        if ($_SERVER['REQUEST_METHOD']==='POST') {
          $jahr=$_POST['jahr'];
        } else{
          $jahr = 2020;
        }

        $abfrage = $db->query("SELECT MONTHNAME(Rechnungsdatum) AS monat, MONTH(Rechnungsdatum) AS monatcount, COUNT(MONTH(Rechnungsdatum)) AS zahl FROM rechnung WHERE YEAR(Rechnungsdatum) = '".$jahr."' GROUP by MONTH(Rechnungsdatum)");
        $abfrage2 = $db->query("SELECT COUNT(mietvertrag.M_id) AS geraete FROM rechnung INNER JOIN mietvertrag ON mietvertrag.R_id = rechnung.R_id WHERE YEAR(Rechnungsdatum) = '".$jahr."' GROUP by MONTH(Rechnungsdatum)");

        foreach ($abfrage as $row) {
          $data[] = array('monatcount' => $row->monatcount, 'monat' => $row->monat, 'zahl' => $row->zahl, 'geraete' => 0);
        }

        $i = 0;
        foreach($abfrage2 as $row){
          $data[$i]['geraete'] = $row->geraete;
          $i++;
        } 


        for ($i = 0; $i < 12; $i++) {
          $flag = false;
          foreach ($data as $row) {
            if((int)$row['monatcount']-1 == $i){
              echo ",['".$monat[$i]."', ".$row['zahl'].", ".$row['geraete']."]";
              $flag = true;
              break;
           }
          }
          if($flag === false){
            echo ",['".$monat[$i]."', 0, 0]";
          }
        }
        
        ?>
        ]);


      var options = {
          chart: {
            isStacked: true,
            title: 'Jahresübersicht ',
            subtitle: '',
          }
        };

        var options_stacked = {
          title: 'Jahresübersicht ',
          isStacked: true,
          height: 450,
          legend: {position: 'top', maxLines: 10},
          vAxis: {minValue: 0}
        };



      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
      chart.draw(data, google.charts.Bar.convertOptions(options_stacked));

    }
  </script>

<body>
  <header>
    <h2>Google Charts</h2>
 </header>
 <main>
 <form action="Googlecharts.php" method="post" onsubmit="drawChart();" style="margin: auto; text-align: center;">
    Jahr:
    <select name="jahr">
      <?php 
      $abfragejahr = $db->query("SELECT YEAR(rechnungsdatum) as jahre FROM rechnung GROUP BY YEAR(rechnungsdatum)");
      foreach($abfragejahr as $row){
        $i = $row->jahre;
        echo '<option value="'.$i.'" >'.$i.'</option>';
      }  
      ?>
    </select>
    <input type="Submit" value="Absenden" />
 </form>

 <div id="columnchart_material" style="width: 1000px; margin: auto; text-align: center;"></div>

  </body>


 </main>
 <footer>
 </footer>

</body>

</html>
