<?php require_once('../Connections/localhost.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


 
if (isset($_POST['mod'])){
$mod = $_POST['mod'];}
else{
$mod = $_GET['mod'];}

$pr = $_GET['pr'];
$en = $_GET['en'];
$sc = $_GET['sc'];
$id = $_GET['id']; 
$st = $_GET['st']; 
$cap = $_GET['cap']; 
$lc2 = $_GET['lc2']; 
$lc = $_GET['lc']; 
$id2 = $_GET['id2']; 
$next = $_GET['theid'];
$thetask = $_GET['thetask'];
$date = date('Y-m-d h:i:s');

$host="localhost"; 
$username="root";
$password="";
$database="newmed06";



if ($mod == "AddButton"){

$connection2 = mysql_connect("$host", "$username", "$password");
if (!$connection2)
  {
  die('Could not connect: ' . mysql_error());
  }
  
mysql_select_db("newmed06", $connection2);
$sql2="UPDATE visit_queue SET Next_task = '$next' AND Exited = '$date' WHERE Id = $thetask";
if (!mysql_query($sql2,$connection2))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($connection2);

	$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
  
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO visit_queue ( 
     Enrolee
    , Visit_date
	, Visit
	, Queued
	, Task
    )
VALUES
('$en','$date','$id','$date','$next')";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($connection);

echo "1";
  exit;
  
}

mysql_free_result($anypro);

mysql_free_result($anypre);
?>
