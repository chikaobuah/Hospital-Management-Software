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



$colname_recuser = "-1";
if (isset($_SESSION['username'])) {


  $colname_recuser = $_SESSION['username'];
}
mysql_select_db($database_localhost, $localhost);
$query_recuser = sprintf("SELECT LId FROM `user` WHERE User_Id = %s", GetSQLValueString($colname_recuser, "text"));
$recuser = mysql_query($query_recuser, $localhost) or die(mysql_error());
$row_recuser = mysql_fetch_assoc($recuser);
$totalRows_recuser = mysql_num_rows($recuser);

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


$creator = $_GET['creator'];
$created = date('Y-m-d h:m:s'); 
$vitals_fk = $_GET['vitals_fk'];
$reading = $_GET['reading'];

if ($mod == "LoadVital"){
	
	$maxRows_recvitals = 1000;
$pageNum_recvitals = 0;
if (isset($_GET['pageNum_recvitals'])) {
  $pageNum_recvitals = $_GET['pageNum_recvitals'];
}
$startRow_recvitals = $pageNum_recvitals * $maxRows_recvitals;

$colname_recvitals = "-1";
if (isset($_GET['id2'])) {
  $colname_recvitals = $_GET['id2'];
}
$colname2_recvitals = "-1";
if (isset($_GET['en'])) {
  $colname2_recvitals = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_recvitals = sprintf("SELECT vital.Vital     , vital.Measure  , vital.Short   , visit_vital.Reading FROM newmed06.visit_vital     INNER JOIN newmed06.visit          ON (visit_vital.Enrolee = visit.Enrolee)     INNER JOIN newmed06.vital          ON (visit_vital.Vital_FK = vital.Id) WHERE visit_vital.Visit LIKE %s AND visit_vital.Enrolee =  %s GROUP BY visit_vital.Created", GetSQLValueString("%" . $colname_recvitals . "%", "date"),GetSQLValueString($colname2_recvitals, "int"));
$query_limit_recvitals = sprintf("%s LIMIT %d, %d", $query_recvitals, $startRow_recvitals, $maxRows_recvitals);
$recvitals = mysql_query($query_limit_recvitals, $localhost) or die(mysql_error());
$row_recvitals = mysql_fetch_assoc($recvitals);

if (isset($_GET['totalRows_recvitals'])) {
  $totalRows_recvitals = $_GET['totalRows_recvitals'];
} else {
  $all_recvitals = mysql_query($query_recvitals);
  $totalRows_recvitals = mysql_num_rows($all_recvitals);
}
$totalPages_recvitals = ceil($totalRows_recvitals/$maxRows_recvitals)-1;
	
echo	"<table align=\"left\" width=\"100%\" style=\"border:thin; border-color:#FFF; border-collapse:collapse;\" >";
	
	  do { 
echo	"<tr>";
echo    "<td width=\"60%\" align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
echo $row_recvitals['Short']; 
echo "  ";
echo $row_recvitals['Measure'];
echo 	"</td>";
echo	"<td  width=\"40%\" align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
echo $row_recvitals['Reading']; 
echo	"</tr>";
      } while ($row_recvitals = mysql_fetch_assoc($recvitals)); 
	
echo "</table>";	
	
	} else if ($mod == "AddVital"){
				
$query2 = "INSERT INTO visit_vital ( 
	        Enrolee
    , Created
    , Creator
    , Visit
    , Vital_FK
    , Reading)
VALUES
('$en','$created','$creator','$id','$vitals_fk','$reading')";

$host2="localhost"; 
$username2="root";
$password2="";
$database2="newmed06";

$connection2 = mysql_connect("$host2", "$username2", "$password2");
if (!$connection2)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection2);

$sql2=$query2;

if (!mysql_query($sql2,$connection2))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($connection2);

	echo "1";
  exit;
}
?> 

