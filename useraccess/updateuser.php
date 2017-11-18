<?php
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";


$lid=$_GET['id'];
$userid = $_POST['userid'];
$usern = $_POST['username'];


echo $lid;
echo $userid;
echo $usern;






$connection2 = mysql_connect("$host", "$username", "$password");
if (!$connection2)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection2);

//$sql2="UPDATE USER SET User_Id='$userid' ,User_Name='$usern' WHERE LId='$lid'";
$sql2="UPDATE USER SET User_Id='$usern ' ,User_Name='chikasun' WHERE LId=$lid";


if (!mysql_query($sql2,$connection2))
  {
  die('Error: ' . mysql_error());
  }
  



$URL="useraccess.php?id=$lid";


header ("Location: $URL");


?>