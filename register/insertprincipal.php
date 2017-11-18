<?php
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";
$enr=$_GET['id'];
$prn=$_GET['prn'];
//$rl=$_GET['rl'];
$st=1;





// checking if prn is a principal
$connection3 = mysql_connect("$host", "$username", "$password");
if (!$connection3)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection3);
$sql3 = " SELECT COUNT(Enrolee) AS myCount FROM  newmed06.principal WHERE enrolee=$prn";
$ticket= mysql_query($sql3) ;
$row_ticket = mysql_fetch_array($ticket);
$ticketc= $row_ticket['myCount']; 
if (!mysql_query($sql3,$connection3))
  {
  die('Error: ' . mysql_error());
  }
  
  




//if prn is not a principal n is not equal to ern do d following
if (($ticketc<1) && ($enr!=$prn))
{


$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO enrolee_principal (Enrolee,Principal,Status)VALUES('$prn','$prn',$st)";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  
  
  
  
$connection2 = mysql_connect("$host", "$username", "$password");
if (!$connection2)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql1="INSERT INTO principal (Enrolee)VALUES('$prn')";

if (!mysql_query($sql1,$connection2))
  {
  die('Error: ' . mysql_error());
  }
  
  
  
  
  
  
  
  $connection4 = mysql_connect("$host", "$username", "$password");
if (!$connection4)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection4);
$sql4="INSERT INTO enrolee_principal (Enrolee,Principal,Status)VALUES('$enr','$prn',$st)";

if (!mysql_query($sql4,$connection4))
  {
  die('Error: ' . mysql_error());
  }


}


elseif (($ticketc<1) && ($enr==$prn))


{






$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO enrolee_principal (Enrolee,Principal,Status)VALUES('$prn','$prn',$st)";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  
  
  
  
$connection2 = mysql_connect("$host", "$username", "$password");
if (!$connection2)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql1="INSERT INTO principal (Enrolee)VALUES('$prn')";

if (!mysql_query($sql1,$connection2))
  {
  die('Error: ' . mysql_error());
  }
  
  }



elseif (($ticketc>0) && ($enr!=$prn)) 

{
	
	  
  $connection5 = mysql_connect("$host", "$username", "$password");
if (!$connection5)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection5);
$sql5="INSERT INTO enrolee_principal (Enrolee,Principal,Status)VALUES('$enr','$prn',$st)";

if (!mysql_query($sql5,$connection5))
  {
  die('Error: ' . mysql_error());
  }
  

	
}

else

{}



$URL="registern.php?a=3&id=$enr";

header ("Location: $URL");


?> 