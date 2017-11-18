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

$colname_schemes4 = "-1";
if (isset($_POST['sc'])) {
  $colname_schemes4 = $_POST['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_schemes4 = sprintf("SELECT * FROM enrolee_scheme WHERE Scheme = %s", GetSQLValueString($colname_schemes4, "int"));
$schemes4 = mysql_query($query_schemes4, $localhost) or die(mysql_error());
$row_schemes4 = mysql_fetch_assoc($schemes4);
$totalRows_schemes4 = mysql_num_rows($schemes4);



session_start();


echo $scheme = $_POST['sc'];
echo $plan = $_POST['pl'];
echo $company = $_POST['company'];

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

$sql="INSERT INTO scheme_payment (Id, Scheme_FK, Amount, Paying, Frequency, Expiry_date, Created, Creator, Enrolee_count,Licensee, Start_date)
VALUES
('$_POST[Id]','$_POST[Scheme_FK]','$_POST[Amount]','$_POST[paying]','$_POST[Frequency]','$_POST[Expiry_date]','$_POST[Created]','$_POST[Creator]','$_POST[Enrolee_count]','$_POST[Licensee]','$_POST[Start_date]')";


if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  echo "1 record added";

?>
<?php  
$URL = "plan.php?co=$company&pl=$plan&sc=$scheme&id=$id"; 
header ("Location: $URL");
mysql_close($connection)

?>
