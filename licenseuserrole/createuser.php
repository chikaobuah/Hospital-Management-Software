<?php
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";


$lcnhq=$_GET['li'];
$userid = $_POST['userid'];
$usern = $_POST['username'];
$userpw=$userid;
$status=1;



$connection5 = mysql_connect("$host", "$username", "$password");
if (!$connection5)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection5);
$sql5 = " SELECT COUNT(*) AS myCount FROM  newmed06.user WHERE Licensee_Hqs=$lcnhq";
$ticket= mysql_query($sql5) ;
$row_ticket = mysql_fetch_array($ticket);
$tcount= $row_ticket['myCount']; 
if (!mysql_query($sql5,$connection5))
  {
  die('Error: ' . mysql_error());
  }










	

$lid=$lcnhq* 10000;
$lid=$lid+$tcount;

$connection2 = mysql_connect("$host", "$username", "$password");
if (!$connection2)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection2);
$sql2="INSERT INTO user (Licensee_Hqs,LId,User_Id,User_Password,User_Name,Status)VALUES
('$lcnhq','$lid','$userid','$userpw','$usern','$status')";

if (!mysql_query($sql2,$connection2))
  {
  die('Error: ' . mysql_error());
  }
  



$URL="licenseuserrole.php?li=2&id=$lcn&lcnhq=$lcnhq";

//li=2&id=$id&lid=$lid"
header ("Location: $URL");


?>