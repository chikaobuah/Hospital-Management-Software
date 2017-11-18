<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();

  
$cover = $_GET['procedure'];
$ef = $_GET['ef'];
$li = $_GET['li'];
$sc = $_GET['sc'];
$cov = $_GET['id2'];
$che = $_GET['che'];
$license = $_SESSION['License'];

  
mysql_select_db($database_localhost, $localhost);
$query_cover2 = "SELECT * FROM cover_procedure WHERE Procedure_FK = $cover AND Effective = $ef AND Capitation = $li AND License = $license";
$cover2 = mysql_query($query_cover2, $localhost) or die(mysql_error());
$row_cover2 = mysql_fetch_assoc($cover2);
$totalRows_cover2 = mysql_num_rows($cover2);

$status = 2 ;
	$che = 1 ;



if ($totalRows_cover2 == 0)

{
	$status = 1 ;
	
	} 
	
if ($row_cover2['Status'] == 1)
 {
	 
	 $che = 0 ;
	 
	 }


if ($status == 2)

{
	$query = "UPDATE cover_procedure SET Status ='$che' WHERE Id ='$cov'";
	
}

else

{
  $query = "INSERT INTO cover_procedure ( 
                            Procedure_FK ,
                            `Status`,
                            Capitation,
                            Effective,
							License
                            )
                        VALUES
                        ('$cover','$che','$li','$ef','$license')" ;	
  
	}
	

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
$sql= $query;
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1";


mysql_close($connection);
exit
?>
