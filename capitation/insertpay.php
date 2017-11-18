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
if (isset($_GET['sc'])) {
  $colname_schemes4 = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_schemes4 = sprintf("SELECT * FROM enrolee_scheme WHERE Scheme = %s", GetSQLValueString($colname_schemes4, "int"));
$schemes4 = mysql_query($query_schemes4, $localhost) or die(mysql_error());
$row_schemes4 = mysql_fetch_assoc($schemes4);
$totalRows_schemes4 = mysql_num_rows($schemes4);



session_start();


$scheme = $_GET['sc'];
$plan = $_GET['pl'];
$company = $_GET['co'];

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

$sql="INSERT INTO scheme_payment (Scheme_FK, Amount, Paying, Frequency,Created, Creator, Enrolee_count,Licensee, Start_date)
VALUES
('$_GET[Scheme_FK]','$_GET[Amount]','$_GET[paying]','$_GET[Frequency]','$_GET[Created]','$_GET[Creator]','$_GET[Enrolee_count]','$_GET[Licensee]','$_GET[Start_date]')";


if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  mysql_close($connection);
  echo "1";
  exit

?>
