<?php require_once('../Connections/localhost.php'); 
session_start();

$eff = $_GET['eff'];
$session = $_GET['session'];
$ef = $_GET['ef'];
$ls = $_GET['ls'];
$sc = $_GET['sc'];


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
$sql="INSERT INTO loading_effective ( 
	Effective ,
	License	,
	Service_FK
    )
VALUES
('$eff','$session','$sc')";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }


mysql_close($connection);
echo "1";
exit
?> 

