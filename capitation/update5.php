<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();

echo $company = $_GET['co']; echo "&nbsp";
echo $scheme = $_GET['sc'];echo "&nbsp";
echo $plan = $_GET['pl'];echo "&nbsp"; 

$che = 1;

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
$sql="UPDATE enrolee_scheme SET Sta ='$che' WHERE Scheme ='$scheme'";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";


$URL="capitation.php?co=$company&pl=$plan&sc=$scheme"; 
header ("Location: $URL");

mysql_close($connection)

?>
