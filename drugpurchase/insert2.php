<?php require_once('../Connections/localhost.php'); 
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


$pr = $_GET['pr'];
$rc = $_GET['rc'];
$select = $_GET['select2'];
$unit = $_GET['unit2'];
$quantity = $_GET['quantity'];


$creator = $row_recuser['LId']; 
$created = date('Y-m-d h:m:s'); 
$License = $_SESSION['License']; 
$date = date('Y-m-d h:i:s'); 


$total = $unit * $quantity;


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
$sql="INSERT INTO drug_purchased ( 
     stock_Id
    , unit_price
    , quantity
    , supplier
    , Creator
    , Created
    , License
    , total
    , Purchase_FK )
VALUES
('$select','$unit','$quantity','$pr','$creator','$date','$License','$total','$rc')";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }


mysql_close($connection);
echo "1";

exit
?> 

