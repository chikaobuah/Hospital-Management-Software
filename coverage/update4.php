<?php require_once('../Connections/localhost.php'); ?>
<?php

set_time_limit(0);

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$sc = $_GET['sc'];


mysql_select_db($database_localhost, $localhost);
$query_drug = "SELECT * FROM drug WHERE drug.Service_direction_FK = $sc";
$drug = mysql_query($query_drug, $localhost) or die(mysql_error());
$row_drug = mysql_fetch_assoc($drug);
$totalRows_drug = mysql_num_rows($drug);


session_start();


 do { $Id2 = $row_drug['Id']; 
 
 $ef = $_GET['ef'];
$li = $_GET['li'];
$sc = $_GET['sc'];
$che = $_GET['che'];
$license = $_SESSION['License'];

 mysql_select_db($database_localhost, $localhost);
$query_cover2 = "SELECT * FROM cover_drug WHERE Drug_FK = $Id2 AND Effective = $ef AND Capitation = $li AND License = $license";
$cover2 = mysql_query($query_cover2, $localhost) or die(mysql_error());
$row_cover2 = mysql_fetch_assoc($cover2);
$totalRows_cover2 = mysql_num_rows($cover2);

$status = 2 ;
	



if ($totalRows_cover2 == 0)

{
	$status = 1 ;
	
	} 
	

if ($status == 2)
{
	$query = "UPDATE cover_drug SET Status ='$che' WHERE Drug_FK ='$Id2' AND Effective = $ef AND Capitation = $li AND License = $license";
	
}

else

{
  $query = "INSERT INTO cover_drug ( 
                            Drug_FK ,
                            Status,
                            Capitation,
                            Effective,
							License
                            )
                        VALUES
                        ('$Id2','$che','$li','$ef','$license')" ;	
  
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





} while ($row_drug = mysql_fetch_assoc($drug));

mysql_close($connection);
mysql_free_result($drug);
echo "1";

exit
?>