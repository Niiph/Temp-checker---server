<?
$arrLocales = array('pl_PL', 'pl', 'Polish_Poland.28592');
setlocale(LC_ALL, $arrLocales);


function makechart($s)
{
	global $link;
	$query = "SELECT symbol, name, minimum, maximum FROM `sensorsg` WHERE id = " . $s . "";
	if ($result = mysqli_query($link, $query)) {
		while ($row = mysqli_fetch_array($result)) {
			$sensor = $row['symbol'] . ", " . $row['name'];
			$min = $row['minimum'];
			$max = $row['maximum'];
		}
	}
?>
	<!-- Step 1 - Include the fusioncharts core library -->
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<!-- Step 2 - Include the fusion theme -->
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
	<!-- 
<script type="text/javascript" src="wykresy/js/fusioncharts.js"></script>
<script type="text/javascript" src="wykresy/js/themes/fusioncharts.theme.carbon.js"></script>
!-->

	<script type="text/javascript">
		FusionCharts.ready(function() {
			var revenueChart = new FusionCharts({
				"type": "spline",
				"renderAt": "chartContainer",
				"width": "100%",
				"height": "600",
				"dataFormat": "json",

				"dataSource": {
					"chart": {
						"caption": "Wykres temperatur",
						"subCaption": "<? echo $sensor; ?>",
						"xAxisName": "Data/Godzina",
						"yAxisName": "Temperatura",
						"numbersuffix": "°C",
						"showvalues": "0",
						"labelDisplay": "rotate",
						"slantLabel": "0",
						"rotateValues": "1",
						"labelStep": "2",
						"showhovereffect": "1",
						"theme": "fusion",
						"decimalSeparator": ",",
						"thousandSeparator": ".",
						"yAxisMaxValue": "40",
						"yAxisMinValue": "10"
					},
					"data": [
						<?
						//			"setadaptiveymin": "1", <- dynamiczny Y

						//$Dquery="SELECT value, date FROM readg WHERE sensorid = ".$s." ORDER BY date ASC LIMIT 48";
						$Dquery = "SELECT * FROM (
				SELECT value, date FROM readg WHERE sensorid = " . $s . " ORDER BY date DESC LIMIT 96
				) sub
			ORDER BY date ASC";

						if ($Dresult = mysqli_query($link, $Dquery)) {
							while ($Drow = mysqli_fetch_array($Dresult)) {
								$d = new DateTime($Drow['date']);
								echo '{ "label": "' . $d->format("Y-m-d H:i") . '",';
								echo '"value": "' . ($Drow['value']) . '"},';
							}
						}
						?>
					],
					"trendlines": [{
						"line": [{
								"startvalue": "<? echo $min; ?>",
								"color": "#ff0000",
								"displayvalue": "Minimum",
								"dashed": "1",
								"valueOnRight": "1"
							},
							{
								"startvalue": "<? echo $max; ?>",
								"color": "#ff0000",
								"displayvalue": "Maximum",
								"dashed": "1",
								"valueOnRight": "1"
							}
						]
					}]
				}

			});
			revenueChart.render();
		});
	</script>
	<div id="chartContainer">FusionCharts XT will load here!</div>

<?php
}

function makechart2($s)
{
	global $link;
	$query = "SELECT symbol, name, minimum, maximum FROM `sensorsg` WHERE id = " . $s . "";
	if ($result = mysqli_query($link, $query)) {
		while ($row = mysqli_fetch_array($result)) {
			$sensor = $row['symbol'] . ", " . $row['name'];
			$min = $row['minimum'];
			$max = $row['maximum'];
		}
	}

	$Dquery = "SELECT * FROM (
				SELECT value, date FROM readg WHERE sensorid = " . $s . " ORDER BY date DESC LIMIT 48
				) sub
			ORDER BY date ASC";
	echo "[\n";
	if ($Dresult = mysqli_query($link, $Dquery)) {
		while ($Drow = mysqli_fetch_array($Dresult)) {
			echo "[\n" . '"' . $Drow['date'] . '",' . "\n";
			echo ($Drow['value']) . "\n],\n";
		}
	}
	echo "]\n";
}

function makechart3($s)
{
	global $link;
	$query = "SELECT symbol, name, minimum, maximum FROM `sensorsg` WHERE id = " . $s . "";
	if ($result = mysqli_query($link, $query)) {
		while ($row = mysqli_fetch_array($result)) {
			$sensor = $row['symbol'] . ", " . $row['name'];
			$min = $row['minimum'];
			$max = $row['maximum'];
		}
	}

	$Dquery = "SELECT * FROM (
				SELECT value, date FROM readg WHERE sensorid = " . $s . " ORDER BY date DESC LIMIT 48
				) sub
			ORDER BY date ASC";

	$types = array();

	if ($Dresult = mysqli_query($link, $Dquery)) {
		while (($Drow =  mysqli_fetch_assoc($Dresult))) {
			$types[] = $Drow['value'];
			$myJSON = json_encode($Drow);
		}
	}

	echo $myJSON;
}
?>