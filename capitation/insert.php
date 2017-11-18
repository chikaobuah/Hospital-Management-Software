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


echo $scheme = $_POST['scheme2'];
echo $scheme_FK = $_POST['scheme_FK'];
echo $plan = $_POST['plan'];
echo $company = $_POST['company'];
echo $che = $_POST['che'];   
echo $creator = $row_recuser['LId']; 
echo $created = date('Y-m-d h:m:s'); 
echo $Licence = $_SESSION['License']; 
echo $client = $_POST['client']; 
echo $id = $_POST['id']; echo "&nbsp";

if ($che == 1)

{
	$che = 1 ;
	}

else
{
	$che = 0 ;
	}


echo $che;


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
$sql="INSERT INTO scheme ( 
	Licensee
    , Created
    , Creator
	, Scheme
    , Program_FK
    , HMO_FK
    , status
    , Company_FK )
VALUES
('$Licence','$created','$creator','$scheme','$plan','$client','$che','$company')";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";


$URL="capitation.php?co=$company&pl=$plan&sc=$scheme_FK&id=$id"; 
header ("Location: $URL");

mysql_close($connection)


?> 

