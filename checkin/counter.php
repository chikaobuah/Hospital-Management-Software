<?php
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";


$en=$_GET['enr'];
$cdate= date("Y-m-d h:i:s ");
//$ctor=$_GET['ctor'];
$ctor=20000;
//$serv=$_GET['serv'];
$serv=1;
$ticketn=$_GET['tn'];
$questatus=$_GET['sts'];
$tprincipal=$_GET['ppl'];
$schemen=$_GET['sch'];

$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);

$sql="INSERT INTO visit (Enrolee,Created,Creator,Service,LMP,Ticket_No,Appointed,Loading,,Status,Principal,Scheme)VALUES
('$cm','$cdate','$ctor','$serv','$lmp'$ticketn','$questatus','$tprincipal','$schemen')";

 
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";



?> 