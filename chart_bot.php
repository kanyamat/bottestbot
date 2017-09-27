
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
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}							
</style>
<script>
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "xy",
  "theme": "none",
  "dataProvider": [ {
    "ax": 1,
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
    
   <!--  <div id="curve_chart" style="width: 900px; height: 500px"></div> -->
  </body>
</html>