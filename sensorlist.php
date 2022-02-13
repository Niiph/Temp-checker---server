<?php  
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('config.php');

$r = $_GET['r'];

switch ($r) {
	case "number":
		number();
		break;
	case "sensor":
		sensor();
		break;
	case "data":
		write();
		break;	
}
 function number() {
	 global $link;
	 $query="SELECT COUNT(*) FROM sensorsg WHERE active=1";
	 $result = mysqli_query($link, $query);
	 //$no = mysql_fetch_assoc($result);
	 echo($result->fetch_row()[0]);
 }
 
 function sensor() {
	 global $link; 
	 $s = $_GET['s'] - 1;
	 
//  ping.pinno AS pin, 	 
//  sensorsg.pinid AS pin,
	 
$query = "
  SELECT 
  sensorsg.id,
  ping.pinno AS pin, 
  address AS address  
  FROM sensorsg
  JOIN ping ON sensorsg.pinid = ping.id
  WHERE active=1
  ORDER BY pinno ASC
  LIMIT ".$s.", 1"; 
 if ($result = mysqli_query($link, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        //printf ("%s (pin - %s, adres - %s)", $row[0], $row[1], $row[2]);
		echo $row[0] ."/". $row[1]."/". $row[2];
    }

    /* free result set */
    mysqli_free_result($result);
}

/*  $result = mysqli_query($link, $queryP);
  
 $rows = array();
 $i=0; 
 echo"-".($result->fetch_row()[2])."-<br>";
 
 
while($r = mysqli_fetch_assoc($result)) { 
$i+=1;
//$idp = $r['id'];
$rows[$i]["id"] = (int) $r["id"];
$rows[$i]["pin"] = (int) $r["pin"];
$rows[$i]["address"] = $r["address"];
//$rows[$i]["address"][$an] = sprintf("0x%X", (($r["a".$an])));
//echo $i.'<br>';
}
//$rows["count"]["no"] = $i; 
//print json_encode($rows);
//var_dump($rows);
echo "<br><br>";
*/

/*  
 function displayArrayContentFunction($arrayname,$tab="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp",$indent=0) {
 $curtab ="";
 $returnvalues = "";
 while(list($key, $value) = each($arrayname)) {
  for($i=0; $i<$indent; $i++) {
   $curtab .= $tab;
   }
  if (is_array($value)) {
   $returnvalues .= "$curtab$key : Array: <br />$curtab{<br />\n";
   $returnvalues .= displayArrayContentFunction($value,$tab,$indent+1)."$curtab}<br />\n";
   }
  else $returnvalues .= "$curtab$key => $value<br />\n";
  $curtab = NULL;
  }
 return $returnvalues;
}
echo displayArrayContentFunction($rows);
echo "<br>";
//var_dump($rows); 
*/

 }
 
 function write() {

global $link; 
	$s = $_GET['s'];
	$v = $_GET['v'];
$query = "INSERT INTO `readg`(sensorid ,value) VALUES (".$s.", ".$v.")";
if ($s)
mysqli_query($link, $query); 
 }
 
  mysqli_close($link);
