<?php require_once('../Connections/localhost.php'); 
session_start();

$Service = $_GET['Client'];
$session = $_GET['session'];
$effective = $_GET['effective'];
$Loading = $_GET['Loading'];
$list = $_GET['list'];
$Id = $_GET['Id'];
$Id2 = $_GET['Id2'];
$sc = $_GET['sc'];

if (preg_match("/^(-){0,1}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,1}([0-9]*)$/", $_GET['Loading'])) { 


if ($Id2 >= 1)

{
	$query = "UPDATE service_loading SET Loading ='$Loading' WHERE Id ='$Id2'";
	
}

else

{
  $query = "INSERT INTO service_loading ( 
  License
    , Service_FK
    , Loading
	, Effective_FK)
VALUES
('$session','$Id','$Loading','$effective')" ;	
  
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
$sql= $query;

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($connection);

} else {
echo "Pls enter numbers only";

}

echo "1";
exit

?>
