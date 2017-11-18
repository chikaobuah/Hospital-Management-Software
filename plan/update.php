<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();

$LId = $_GET['LId'];
$scheme = $_GET['scheme'];
$scheme_FK = $_GET['scheme_FK'];
$plan = $_GET['plan'];
$company = $_GET['company'];
$client = $_GET['client'];
$che = $_GET['che']; 
$id = $_GET['id'];


$_GET['out'];

if ($_GET['out'] == 1){
	
if ($che == 1)

{
	$che = 0 ;
	$query ="UPDATE scheme SET Scheme='$scheme', HMO_FK ='$client', Status ='$che' WHERE LId ='$LId'";

	}

else
{
	$che = 1 ;
	$query ="UPDATE scheme SET Scheme='$scheme', HMO_FK ='$client', Status ='$che' WHERE LId ='$LId'";

	} } else { $query ="UPDATE scheme SET Scheme='$scheme', HMO_FK ='$client' WHERE LId ='$LId'";}



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
$sql=$query;
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }


mysql_close($connection);
echo "1";
exit

?>
