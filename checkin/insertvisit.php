
<?php require_once('../Connections/localhost.php'); 
session_start();

?>
<?php
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";


$en=$_GET['enr'];
$serv=$_GET['serv'];
$cdate= date("Y-m-d h:i:s");
$date= date("Y-m-d");

$ctor=$_SESSION["userlid"];
$v=$_SESSION["License"];
$lmp=$cdate;


$Appointed=$cdate;
$Status=1;
$principal=$_GET['enr'];
$schemen=36;





mysql_select_db($database_localhost, $localhost);
$query_Recvp2 = "SELECT
    visit.Created
    , enrolee_checkin.Licensee
   , COUNT(visit.Created) AS count 
FROM
    newmed06.visit
    INNER JOIN newmed06.enrolee_checkin 
        ON (visit.Enrolee = enrolee_checkin.LId) WHERE  enrolee_checkin.Licensee=$v ";
		

		
	
$Recvp2 = mysql_query($query_Recvp2, $localhost) or die(mysql_error());
$row_Recvp2 = mysql_fetch_assoc($Recvp2);
$totalRows_Recvp2 = mysql_num_rows($Recvp2);
$tickno= $row_Recvp2['count'];

$ticketn=$tickno+1;





$connection6 = mysql_connect("$host", "$username", "$password");
if (!$connection6)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection6);

$sql="INSERT INTO visit (Enrolee,Created,Creator,Service,Ticket_No,Appointed,Status,Principal,Scheme)VALUES
						('$en','$cdate','$ctor','$serv','$ticketn','$Appointed','$Status','$principal','$schemen')";

 
if (!mysql_query($sql,$connection6))
  {
  die('Error: ' . mysql_error());
  }
  



//update 
$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);

$sql="UPDATE enrolee_checkin
SET enrolee_checkin.Status=1 WHERE enrolee_checkin.LId=$en ";

 
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  





?> 



















<?php

switch ($serv)
{
case 1:
 
$task=9;

$connection1 = mysql_connect("$host", "$username", "$password");
if (!$connection1)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection1);

$sql1="INSERT INTO visit_queue (Enrolee,Visit,Visit_date,Queued,Task)VALUES
						('$en','$cdate','$cdate','$cdate','$task')";

 
if (!mysql_query($sql1,$connection1))
  {
  die('Error: ' . mysql_error());
  }
 
echo "<input  style=\"background: url(../images/nav-bg.png) repeat-x;\"  value=\"On queue at Vitals\"  type=\"button\" />" ;
 
   
  break;
case 39:


 
$task=9;

$connection2 = mysql_connect("$host", "$username", "$password");
if (!$connection2)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection2);

$sql2="INSERT INTO visit_queue (Enrolee,Visit,Visit_date,Queued,Task)VALUES
						('$en','$cdate','$cdate','$cdate','$task')";

 
if (!mysql_query($sql2,$connection2))
  {
  die('Error: ' . mysql_error());
  }
 

echo "<input  style=\"background: url(../images/nav-bg.png) repeat-x;\"  value=\"On queue at Vitals\"  type=\"button\" />" ;



  break;
case 30:
  
  
  
  $task=23;

$connection3 = mysql_connect("$host", "$username", "$password");
if (!$connection3)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection3);

$sql3="INSERT INTO visit_queue (Enrolee,Visit,Visit_date,Queued,Task)VALUES
						('$en','$cdate','$cdate','$cdate','$task')";

 
if (!mysql_query($sql3,$connection3))
  {
  die('Error: ' . mysql_error());
  }
 
  echo "<input  style=\"background: url(../images/nav-bg.png) repeat-x;\"  value=\"On queue at Other-services\"  type=\"button\" />" ;
  
  
  break;
case 40:


  $task=19;

$connection4 = mysql_connect("$host", "$username", "$password");
if (!$connection4)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection4);

$sql4="INSERT INTO visit_queue (Enrolee,Visit,Visit_date,Queued,Task)VALUES
						('$en','$cdate','$cdate','$cdate','$task')";

 
if (!mysql_query($sql4,$connection4))
  {
  die('Error: ' . mysql_error());
  }

echo "<input  style=\"background: url(../images/nav-bg.png) repeat-x;\"  value=\"On queue at Cashier\"  type=\"button\" />" ;
  
  break;
  
case 41:


  $task=10;

$connection5 = mysql_connect("$host", "$username", "$password");
if (!$connection5)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection5);

$sql5="INSERT INTO visit_queue (Enrolee,Visit,Visit_date,Queued,Task)VALUES
						('$en','$cdate','$cdate','$cdate','$task')";

 
if (!mysql_query($sql5,$connection5))
  {
  die('Error: ' . mysql_error());
  }
echo "<input  style=\"background: url(../images/nav-bg.png) repeat-x;\"  value=\"On queue at Consulting\"  type=\"button\" />" ;
  break;
  

  

default:
  echo "No Action";
} 
?>
