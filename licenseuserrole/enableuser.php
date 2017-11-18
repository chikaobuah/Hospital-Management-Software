<?php
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";


$LId=$_GET['lid'];







$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="UPDATE USER SET STATUS=1  WHERE LId='$LId'";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  



$URL="licenseuserrole.php?id=$LId";


header ("Location: $URL");


?>