
<?php

$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

$pass = $_GET['id'];





$connection4 = mysql_connect("$host", "$username", "$password");
if (!$connection4)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection4);
$sql4="SELECT   User_Id FROM  newmed06.user WHERE LId='$pass'";
$resultall=mysql_query($sql4); 
$rowall=mysql_fetch_array($resultall);
$User_Id=$rowall['User_Id'];
if (!mysql_query($sql4,$connection4))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";



$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="UPDATE user SET User_Password='$User_Id' WHERE LId='$pass'";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";




$URL="useraccess.php?id=$pass"; 
header ("Location: $URL");


?>
