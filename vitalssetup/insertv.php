<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();

$vitals = $_POST['vitals'];
$session = $_POST['session'];
$measure = $_POST['measure'];



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
$sql="INSERT INTO vital ( 
	 Vital
	, Measure
    , License
    )
VALUES
('$vitals','$measure','$session')";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";


$URL="vitalssetup.php";
header ("Location: $URL");

mysql_close($connection)


?> 

