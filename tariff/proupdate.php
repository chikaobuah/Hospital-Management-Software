<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();

  

echo $provider = $_POST['provider']; echo "&nbsp";
echo $pr = $_POST['pr']; echo "&nbsp";
echo $ef = $_POST['ef'];echo "&nbsp";
echo $che = $_POST['che']; echo "&nbsp";  

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
$sql="UPDATE provider SET Status ='$che' WHERE Id ='$provider'";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";


$URL="tariff.php?pr=$pr&ef=$ef";
header ("Location: $URL");

mysql_close($connection)

?>
