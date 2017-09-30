<?php
$conn_string = "host=ec2-23-21-220-167.compute-1.amazonaws.com port=5432 dbname=dh3dj7jtq6jct user=kywyvkvocykcqg password=76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47 ";
$dbconn = pg_pconnect($conn_string);

$res_c = pg_query($dbconn,"SELECT his_preg_week ,his_preg_weight";

$query = "SELECT industry,count(industry) FROM company GROUP BY industry ";
$res_c = $mysqli->query($query);
 
if (!$res_c) {
    die('<p><strong style="color:#FF0000">!! Invalid query:</strong> ' . $mysqli->error.'</p>');
}
?>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
$(function () {
    $('#barchart').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'กำหนด title ของกราฟ'
        },
/*        subtitle: {
            text: ''
        },*/
        xAxis: {
            categories: [
   <?php
   $c_field = $res_c->field_count-1;
    $c=0; while($row = $res_c->fetch_array(MYSQLI_NUM)){ $c++; ?>
   <?php if($c>1){ ?>,<?php } 
   $data[] = $row[$c_field]; 
   ?>
                '<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row[0]))))); ?>'
   <?php } ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Values'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:,.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
    dataLabels: {
     enabled: true
    }
   }
        },
  credits: {
   enabled: false
  },
        series: [{
            name: 'Values',
            data: [<?php echo join(',',$data); ?>]
 
        }]
    });
});
</script>
<!--แสดงกราฟ-->
<div id="barchart"></div>