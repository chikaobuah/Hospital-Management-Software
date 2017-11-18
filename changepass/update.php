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

$colname_user = "-1";
if (isset($_POST['LId'])) {
  $colname_user = $_POST['LId'];
}
mysql_select_db($database_localhost, $localhost);
$query_user = sprintf("SELECT * FROM `user` WHERE LId = %s", GetSQLValueString($colname_user, "int"));
$user = mysql_query($query_user, $localhost) or die(mysql_error());
$row_user = mysql_fetch_assoc($user);
$totalRows_user = mysql_num_rows($user);

?>
<?php

$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

$old = $_POST['old'];
$password3 = $_POST['password'];
$LId = $_POST['LId'];

$oldpass = $row_user['User_Password'];

if ($old == $oldpass)

{
$connection = mysql_connect("$host", "$username", "$password");

if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="UPDATE user SET User_Password='$password3' WHERE LId='$LId'";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";



$re = 1;
}


else 

{
	$re = 2;
	}

$URL="changepass.php?report=$re"; 
header ("Location: $URL");

mysql_close($connection);

mysql_free_result($user);
?>
