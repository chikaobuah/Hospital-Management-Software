<?php 
session_start();
$host="localhost"; 
$username="root";
$database="newmed06";
$password="";


$en=$_GET['en'];
$vi=$_GET['vi'];
$created= date('Y-m-d h:m:s'); 
$vitals_fk=$_GET['vitals_fk'];
$reading=$_GET['reading'];
$creator=$_SESSION["userlid"];


$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO visit_vital 

( Enrolee, Created , Creator, Visit , Vital_FK , Reading) VALUES 
( '$en','$created','$creator','$created','$vitals_fk','$reading')";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  





$connection2 = mysql_connect("$host", "$username", "$password");
if (!$connection2)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection2);
$sql2="SELECT
    Visit
    , Visit
    , Created
    , Creator
    , Visit
    , Vital_FK
    , Reading
FROM
    newmed06.visit_vital";
	
	
	
$resultq=mysql_query($sql2); 
$numrows=mysql_num_rows($resultq);
$row=mysql_fetch_array($resultq);

do {

$vReading =$row['Reading'];
echo $vReading . "<br/>";
}

while($row=mysql_fetch_array($resultq));	
	
	
	
	

if (!mysql_query($sql2,$connection2))
  {
  die('Error: ' . mysql_error());
  }
  





?>