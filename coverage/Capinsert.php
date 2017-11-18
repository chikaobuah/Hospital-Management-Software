<?php require_once('../Connections/localhost.php'); 

$eff = $_GET['cap'];
$session = $_GET['session'];
$ef = $_GET['ef'];
$li = $_GET['li'];
$sc = $_GET['sc'];


$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

$connection3 = mysql_connect("$host", "$username", "$password");
if (!$connection3)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection3);
$sql3="INSERT INTO capitation ( 
	Amount ,
	Licensee,
	Effective_FK
    )
VALUES
('$eff','$session','$ef')";
if (!mysql_query($sql3,$connection3))
  {
  die('Error: ' . mysql_error());
  }
echo "1";


mysql_close($connection3);

exit
?>

