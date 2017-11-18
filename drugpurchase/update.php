<?php

$id = $_GET['id'];
$pr = $_GET['pr'];
$rc = $_GET['rc'];
$select = $_GET['select4'];
$unit = $_GET['Amount'];
$quantity = $_GET['quantity4'];

$total = $unit * $quantity;


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
$sql="UPDATE drug_purchased SET stock_Id = '$select' , unit_price = '$unit', quantity = '$quantity', total = '$total' WHERE Id = '$id'";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($connection);
echo "1";

exit
?> 

