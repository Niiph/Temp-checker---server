<?php
include('config.php');

$type = $_POST['type'];
$symbol = $_POST['symbol'];
$name = $_POST['name'];
$pinid = $_POST['pinid'];
$address = $_POST['address'];
$sensor = $_POST['s'];
if (isset($_POST['active']))
	$active = 1;
else
	$active = 0;
if (isset($_POST['minimum']))
	$minimum = $_POST['minimum'];
if (isset($_POST['maximum']))
	$maximum = $_POST['maximum'];

global $link;

if ($type == 'edit') {
	$query = "UPDATE `sensorsg` 
	SET 
	symbol='$symbol', 
	name='$name', 
	pinid='$pinid', 
	address='$address', 
	active='$active', 
	minimum='$minimum', 
	maximum='$maximum' 
	WHERE id='$sensor'";

	if (mysqli_query($link, $query)) {
		echo "Zmiany zostały zapisane";
		echo "</br><a href=\"javascript:history.go(-1)\">GO BACK</a>";
	} else {
		echo "Error updating record: " . mysqli_error($link);
	}
}

if ($type == 'new') {
	$query = "INSERT INTO `sensorsg` 
	(symbol, name, pinid, address, active, minimum, maximum) 
	VALUES 
	('$symbol', '$name', '$pinid', '$address', '$active', '$minimum', '$maximum')";

	if (mysqli_query($link, $query)) {
		echo "Czujnik został dodany";
		echo "</br><a href=\"javascript:history.go(-1)\">GO BACK</a>";
	} else {
		echo "Error updating record: " . mysqli_error($link);
	}
}
