<?php
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

$id=$_GET['id'];
$lid=$_GET['lid'];
$rol=$_GET['rol'];






$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO user_role (User,Role,License)VALUES('$id','$rol',$lid)";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  



$URL="useraccess.php?id=$id&lid=$lid";


header ("Location: $URL");


?>