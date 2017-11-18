<?php
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

$idspec=$_GET['id'];
$ddfrspec=$_GET['lid'];
$uspid=$_GET['spe'];






$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO user_specialty (User,specialty,Licensee)VALUES('$idspec','$uspid',$ddfrspec)";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  



$URL="useraccess.php?id=$idspec&lid=$ddfrspec";


header ("Location: $URL");


?>