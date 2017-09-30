<?php
$conn_string = "host=ec2-23-21-220-167.compute-1.amazonaws.com port=5432 dbname=dh3dj7jtq6jct user=kywyvkvocykcqg password=76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47 ";
$dbconn = pg_pconnect($conn_string);

if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}

$check = pg_query($dbconn,"SELECT his_preg_week ,his_preg_weight FROM history_preg" );
                while ($row= pg_fetch_array($check)) {
                  echo $result = $row[0];
                
                } 
// Set proper HTTP response headers
header( 'Content-Type: application/json' );

// Print out rows
$data = array();
while ( $row = $result->fetch_assoc() ) {
  $data[] = $row;
}
echo json_encode( $data );

// $check2 = pg_query($dbconn,"SELECT user_weight FROM user_data" );
//                 while ($row= pg_fetch_row($check2)) {
              
//                  echo $result2 = $row[0];
  
//                }
// $query = "SELECT industry,count(industry) FROM company GROUP BY industry ";
// $res_c = $mysqli->query($query);
 
// if (!$result) {
//     die('<p><strong style="color:#FF0000">!! Invalid query...:</strong> ' . $mysqli->error.'</p>');
// }



// Print out rows
// while ( $row = $result->fetch_assoc() ) {
//   echo $row['category'] . ' | ' . $row['value1'] . ' | ' .$row['value2'] . "n";
// }

// // Close the connection
// mysqli_close($link);


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
    var chart = AmCharts.makeChart( "chartdiv", {
      "type": "xy",
      "theme": "none",
      "dataProvider": [ {
        "ax": 1, //weekของแต่ละweek ในแนว X
        "ay": 0.5,
        "bx": 1,
        "by": 2.2
      }, {
        "ax": 2,
        "ay": 1.3,
        "bx": 2,
        "by": 4.9
      
      } ],
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

    </script>
  </head>
  <body>
    
<!-- HTML -->
<div id="chartdiv"></div>
   <!--  <div id="curve_chart" style="width: 900px; height: 500px"></div> -->
   
  </body>
</html>
