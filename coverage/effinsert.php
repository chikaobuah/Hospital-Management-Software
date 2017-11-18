<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();

$eff = $_GET['eff'];
$session = $_SESSION['License'];



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
$sql="INSERT INTO cover_effective ( 
	Effective ,
	License
    )
VALUES
('$eff','$session')";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1";

mysql_close($connection);

exit

?> 

