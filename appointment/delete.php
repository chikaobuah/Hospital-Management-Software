<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();
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

$every = $_GET['every'];
$session = $_GET['session'];
$days = $_GET['days'];
$startss = $_GET['startss'];
$sc = $_GET['sc'];
$Id = $_GET['Id'];
$ch = $_GET['ch'];



$colname_servicedays = "-1";
if (isset($_SESSION['License'])) {
  $colname_servicedays = $_SESSION['License'];
}
$colname2_servicedays = "-1";
if (isset($_GET['sc'])) {
  $colname2_servicedays = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_servicedays = sprintf("SELECT service_appointment.Status FROM newmed06.week_every     INNER JOIN newmed06.service_appointment          ON (week_every.Id = service_appointment.Week_every_FK)   INNER JOIN newmed06.service_start          ON (service_appointment.Start_time = service_start.Id)    INNER JOIN newmed06.week_days          ON (week_days.Id = service_appointment.Week_day_FK) WHERE License = %s AND service_appointment.Service_FK = %s AND service_appointment.Id = $Id ", GetSQLValueString($colname_servicedays, "int"),GetSQLValueString($colname2_servicedays, "int"));
$servicedays = mysql_query($query_servicedays, $localhost) or die(mysql_error());
$row_servicedays = mysql_fetch_assoc($servicedays);
$totalRows_servicedays = mysql_num_rows($servicedays);

if ($ch == 1) {
if ($row_servicedays['Status'] == 1)

{
	$status = 0;
	
	} else {
		
		$status = 1;
		
		} } else {
			
		$status = $row_servicedays['Status'];			
			
			}


$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);

$sql="UPDATE service_appointment SET Service_FK ='$sc', Week_day_FK = '$days', Week_every_FK = '$every', License = '$session', Start_time = '$startss', `Status` = '$status' WHERE Id = $Id";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($connection);
echo "1";

exit
?> 

