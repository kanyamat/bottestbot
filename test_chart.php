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

$check2 = pg_query($dbconn,"SELECT user_weight FROM user_data" );
                while ($row= pg_fetch_row($check2)) {
              
                 echo $result2 = $row[0];
  
               }
// $query = "SELECT industry,count(industry) FROM company GROUP BY industry ";
// $res_c = $mysqli->query($query);
 
// if (!$result) {
//     die('<p><strong style="color:#FF0000">!! Invalid query...:</strong> ' . $mysqli->error.'</p>');
// }
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
   //  <?php
   // $c_field = $result->field_count-1;
   //  $c=0; while($row = $result->fetch_array(MYSQLI_NUM)){ $c++; ?>
   // <?php if($c>1){ ?>,<?php } 
   // $data[] = $row[$c_field]; 
   // ?>
   //              '<?php 
   // echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row[0]))))); ?>'
   // <?php } ?>
    var chart = AmCharts.makeChart( "chartdiv", {
      "type": "xy",
      "theme": "none",
      "dataProvider": [ {
        "ax": <?php echo join(',',$data); ?>, //weekของแต่ละweek ในแนว X
        "ay": 0.5,
        "bx": 1,
        "by": 2.2
      }, {
        "ax": 2,
        "ay": 1.3,
        "bx": 2,
        "by": 4.9
      }, {
        "ax": 3,
        "ay": 2.3,
        "bx": 3,
        "by": 5.1
      }, {
        "ax": 4,
        "ay": 2.8,
        "bx": 4,
        "by": 5.3
      }, {
        "ax": 5,
        "ay": 3.5,
        "bx": 5,
        "by": 6.1
      }, {
        "ax": 6,
        "ay": 5.1,
        "bx": 6,
        "by": 8.3
      }, {
        "ax": 7,
        "ay": 6.7,
        "bx": 7,
        "by": 10.5
      }, {
        "ax": 8,
        "ay": 8,
        "bx": 8,
        "by": 12.3
      }, {
        "ax": 9,
        "ay": 8.9,
        "bx": 9,
        "by": 14.5
      }, {
        "ax": 10,
        "ay": 9.7,
        "bx": 10,
        "by": 15
      }, {
        "ax": 11,
        "ay": 10.4,
        "bx": 11,
        "by": 18.8
      }, {
        "ax": 12,
        "ay": 11.7,
        "bx": 12,
        "by": 21
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


