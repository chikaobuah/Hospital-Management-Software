<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();

echo $LId = $_POST['LId']; echo "&nbsp";
echo $scheme = $_POST['scheme'];echo "&nbsp";
echo $scheme_FK = $_POST['scheme_FK'];echo "&nbsp";
echo $plan = $_POST['plan'];echo "&nbsp";
echo $company = $_POST['company'];echo "&nbsp";
echo $client = $_POST['client']; echo "&nbsp";
echo $che = $_POST['che']; echo "&nbsp";  
echo $id = $_POST['id']; echo "&nbsp";

if ($che == 1)

{
	$che = 1 ;
	}

else
{
	$che = 0 ;
	}


echo $che;

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
$sql="UPDATE scheme SET Scheme='$scheme', HMO_FK ='$client', Status ='$che' WHERE LId ='$LId'";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";


$URL="capitation.php?co=$company&pl=$plan&sc=$scheme_FK&id=$id"; 
header ("Location: $URL");

mysql_close($connection)

?>
