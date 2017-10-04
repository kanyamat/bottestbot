<?php
$conn_string = "host=ec2-23-21-220-167.compute-1.amazonaws.com port=5432 dbname=dh3dj7jtq6jct user=kywyvkvocykcqg password=76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47 ";
$dbconn = pg_pconnect($conn_string);

if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}


// $check = pg_query($dbconn,"SELECT his_preg_week ,his_preg_weight FROM history_preg" );
// $data = array();
//                 while ($row= pg_fetch_assoc($check)) {
//                   //echo $result = $row[0],$row[1]."</br>";
//                   $data[] = $row;

//                 } 

// echo json_encode($data);


$check = pg_query($dbconn,"SELECT user_weight FROM user_data ");
                while ($row= pg_fetch_row($check)) {
              
                 $result = $row[0];
  
                } 
$a =[];
$arrayName=[];
$check_q = pg_query($dbconn,"SELECT his_preg_week ,his_preg_weight FROM history_preg ");
                while ($arr= pg_fetch_array($check_q)) {
                  $week = $arr[0];
                  $weight = $arr[1]-$result;
         
                  $arrayName[] = array( 'date' => $week,
                                      'duration'=> $weight);
                }   
$data = json_encode($arrayName);
echo "var data = '$data';";
?>

<html>
  <head>

    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/xy.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/none.js"></script>
    <div id="chartdiv"></div>     

    <style type="text/css">
      #chartdiv {
        width   : 100%;
        height    : 500px;
        font-size : 11px;
      }             
    </style>

    <script>
    var chartData = generateChartData();
    var chart = AmCharts.makeChart( "chartdiv", {
      "type": "xy",
      "theme": "none",
      "dataProvider": chartData,

      "valueAxes": [ {
        "position": "bottom",
        "axisAlpha": 0,
        "dashLength": 1,
        "id": "x",
        "title": "Week"
      // } ],
        // "valueAxes": [ {
        // "axisAlpha": 0,
        // "dashLength": 1,
        // "position": "left",
        // "id": "y",
        // "title": "Y Axis"
      } ],
      "startDuration": 1,
      "graphs": [ {
        "balloonText": "x:[[x]] y:[[y]]",
        "fillAlphas": 0.3,
        "fillToAxis": "x",
        "lineAlpha": 1,
        "xField": "ax",
        "yField": "ay",
        "lineColor": "#FCD202"
      } ],  
      "marginLeft": 64,
      "marginBottom": 60,
      "chartScrollbar": {},
      "chartCursor": {},
      "export": {
        "enabled": true,
        "position": "bottom-right"
      }
    } );
    chart.addListener("dataUpdated", zoomChart);
function zoomChart() {
    // chart.zoomToDates(new Date(2012, 0, 3), new Date(2012, 0, 11));
}
// generate some random data, quite different range
function generateChartData() {
   var chartData = <?php 
$conn_string = "host=ec2-54-163-233-201.compute-1.amazonaws.com port=5432 dbname=dchdrsngrf50pd user=njppbbukwreesq password=c6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04";
$dbconn = pg_pconnect($conn_string);
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}
// $user = $_GET["data"];
$user = "U2dc636d2cd052e82c29f5284e00f69b9";
$user_id = pg_escape_string($user);
 // echo $user_id;
$check = pg_query($dbconn,"SELECT user_weight FROM user_data ");
                while ($row= pg_fetch_row($check)) {
              
                 $result = $row[0];
  
                } 
$arrayName=[];
$check_q = pg_query($dbconn,"SELECT his_preg_week ,his_preg_weight FROM history_preg order by 'his_preg_week'*1  ASC  ");
                while ($arr= pg_fetch_array($check_q)) {
                  $week = $arr[0];
                  $weight = $arr[1]-$result;
         
                  $arrayName[] = array( 'date' =>  $week ,
                                       'duration'=> $weight);
                }    
echo $data = json_encode($arrayName);
 ?>;
    // chartData.push({
    //     "date": "2012-01-04",
    //     "duration": 408
    // }, {
    //     "date": "2012-02-04",
    //     "duration": 482
    // }, {
    //     "date": "2012-03-04",
    //     "duration": 562
    // }, {
    //     "date": "2012-04-04",
    //     "duration": 379
    // });
    return chartData;
}
    </script>
  </head>
  <body>
    
<!-- HTML -->
<div id="chartdiv"></div>
   <!--  <div id="curve_chart" style="width: 900px; height: 500px"></div> -->
   
  </body>
</html>
