<?php
require_once('../Connections/localhost.php'); 
session_start();
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

$sqlall="  SELECT COUNT(Id) AS coun FROM newmed06.licensee ";
$resultall=mysql_query($sqlall); 
$rowall=mysql_fetch_array($resultall);
$lcount=$rowall['coun'];
$lic = $lcount+1;





$ln = $_GET['ln'];
$sn = $_GET['sn'];
$nhis = $_GET['nhis'];
$nhisdate = $_GET['nhisdate'];
$lcost = $_GET['lcost'];
$lkey = $_GET['lkey'];
$contact = $_GET['contact']; 
$jobtitle = $_GET['jobtitle'];
$bphone = $_GET['bphone'];
$mphone = $_GET['mphone'];
$email = $_GET['email'];
$addr = $_GET['addr'];
$country = $_GET['country'];
$state = $_GET['state'];
$lga = $_GET['lga'];
$city = $_GET['city'];
$postcode = $_GET['postcode'];

$biz = $_GET['biz'];
$webpage = $_GET['webpage'];
$CAC_reg_no = $_GET['CAC_reg_no'];
$NHMIS_HF_Code = $_GET['NHMIS_HF_Code'];
$Statement = $_GET['Statement'];


$creator=$_SESSION["userlid"];
$created= date("Y-m-d");

 






$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO licensee (Id,licensee,Short,Licensee_Hqs,Created,Creator,City,Licensed,License_Cost,License_Key,NHIS_Reg_No,NHIS_Registered,Contact,Contact_Business_Phone,Contact_Mobile_Phone,Contact_Email,Contact_Job_Title,Country_FK,State_FK,LGA_FK,Address,PostCode,Licensee_Business,Statement,Webpage,CAC_reg_no,NHMIS_HF_Code)
VALUES
('$lic','$ln','$sn','$lic','$created','$creator','$city','$created','$lcost','$lkey','$nhis','$nhisdate','$contact','$bphone','$mphone','$email','$jobtitle','$country','$state','$lga','$addr','$postcode','$biz','$Statement','$webpage','$CAC_reg_no','$NHMIS_HF_Code')";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  
  
  
  
  
  
  $connection1 = mysql_connect("$host", "$username", "$password");
if (!$connection1)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection1);
$sql1="INSERT INTO licensee_hqs (Licensee)
VALUES
('$lic')";

if (!mysql_query($sql1,$connection1))
  {
  die('Error: ' . mysql_error());
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
echo "License Hq inserted";







?>