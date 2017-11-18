<?php
session_start();
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

//$lcn=$_GET['lic'];
//$rolename = $_GET['en'];
$ln = $_GET['ln'];
$sn = $_GET['sn'];
$lic = $_GET['lic'];
$created = $_GET['created'];

$creator=$_SESSION["userlid"];
$nhis = $_GET['nhis'];
$nhisdate = $_GET['nhisdate'];
$lcost = $_GET['lcost'];
$lkey = $_GET['lkey'];
$sn = $_GET['sn'];
$jobtitle = $_GET['jobtitle'];
$bphone = $_GET['bphone'];
$mphone = $_GET['mphone'];
$email = $_GET['email'];
$city = $_GET['city'];

$cac = $_GET['cac'];

$contact = $_GET['contact']; 
$country = $_GET['country'];
$state = $_GET['state'];
$lga = $_GET['lga'];
$addr = $_GET['addr'];
$postcode = $_GET['postcode'];
$biz = $_GET['biz'];


$Statement = $_GET['Statement'];
$CAC_reg_no = $_GET['CAC_reg_no'];
$NHMIS_HF_Code = $_GET['NHMIS_HF_Code'];
$webpage = $_GET['webpage'];

 

 






$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO licensee (licensee,Short,Licensee_Hqs,Created,Creator,City,Licensed,License_Cost,License_Key,NHIS_Reg_No,NHIS_Registered,Contact,Contact_Business_Phone,Contact_Mobile_Phone,Contact_Email,Contact_Job_Title,Country_FK,State_FK,LGA_FK,Address,PostCode,Licensee_Business,Statement,Webpage,CAC_reg_no,NHMIS_HF_Code)
VALUES
('$ln','$sn','$lic','$created','$creator','$city','$created','$lcost','$lkey','$nhis','$nhisdate','$contact','$bphone','$mphone','$email','$jobtitle','$country','$state','$lga','$addr','$postcode','$biz','$Statement','$webpage','$CAC_reg_no','$NHMIS_HF_Code')";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  



    echo "Insert done";







?>