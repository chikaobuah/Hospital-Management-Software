
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


$colname_programfk = "-1";
if (isset($_GET['plan'])) {
  echo $colname_programfk = $_GET['plan'];
}
mysql_select_db($database_localhost, $localhost);
$query_programfk = sprintf("SELECT Id FROM program WHERE Service_FK = %s", GetSQLValueString($colname_programfk, "int"));
$programfk = mysql_query($query_programfk, $localhost) or die(mysql_error());
$row_programfk = mysql_fetch_assoc($programfk);
$totalRows_programfk = mysql_num_rows($programfk);

echo "the id is this" ; echo $theid = $row_programfk['Id'];



$scheme = $_GET['scheme2'];
$scheme_FK = $_GET['scheme_FK'];
$plan = $_GET['plan'];
$company = $_GET['company'];
$che = $_GET['che'];   
$creator = $row_recuser['LId']; 
$created = date('Y-m-d h:m:s'); 
$Licence = $_SESSION['License']; 
$client = $_GET['client']; 
$id = $_GET['id'];

if ($che == 1)

{
	$che = 1 ;
	}

else
{
	$che = 0 ;
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
('$Licence','$created','$creator','$scheme','$theid','$client','1','$company')";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

echo $sql;
mysql_close($connection);
echo "1";
exit


?>

<?php
mysql_free_result($recuser);

mysql_free_result($programfk);
?>
