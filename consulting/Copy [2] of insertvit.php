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


echo $pr = $_POST['pr'];
echo $en = $_POST['en'];
echo $sc = $_POST['sc'];
echo $id = $_POST['id']; 
echo $st = $_POST['st']; 
echo $cap = $_POST['cap']; 
echo $lc2 = $_POST['lc2']; 
echo $lc = $_POST['lc']; 
echo $id2 = $_POST['id2']; 


echo $creator = $_POST['id2'];
echo $created = date('Y-m-d h:m:s'); 
echo $vitals_fk = $_POST['vitals_fk'];
echo $reading = $_POST['reading'];


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
$sql="INSERT INTO visit_vital ( 
	        Enrolee
    , Created
    , Creator
    , Visit
    , Vital_FK
    , Reading)
VALUES
('$en','$created','$creator','$id','$vitals_fk','$reading')";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";


$URL="consulting.php?pr=$pr&en=$en&sc=$sc&id=$id&st=$st&cap=$cap&lc2=$lc2&lc=$lc&id2=$id2"; 
header ("Location: $URL");

mysql_close($connection)


?> 

