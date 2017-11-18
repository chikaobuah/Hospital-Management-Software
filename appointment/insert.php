<?php require_once('../Connections/localhost.php'); 
session_start();

$start = $_GET['select6'];
$weey = $_GET['select2'];
$session = $_GET['session'];
$weed = $_GET['select3'];
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
$sql="INSERT INTO service_appointment ( 
	 Service_FK
    , Week_day_FK
    , Week_every_FK
    , License
	, Start_time
	, Status
    )
VALUES
('$sc','$weed','$weey','$session','$start','1')";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($connection);
echo '1';

?> 

