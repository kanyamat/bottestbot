<?php
$data1 = $_GET["data1"];
$data2 = $_GET["data2"];
 echo $data1;
 echo $data2;
?>

<html>
  <head>
   
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
//       alert(data);
      
      function drawChart() {
       
          w1 = <?php  echo $data1; ?> ;
          w2 = <?php  echo $data2; ?>;
          w3 = 30;
          w4 = 15;
        var data = google.visualization.arrayToDataTable([
          ['week', 'BMI'],
          ['1', w1 ],
          ['2', w2 ],
          ['3', w3 ],
          ['4', w4 ]
        ]);
        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>