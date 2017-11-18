<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();
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

$colname_count = "-1";
if (isset($_GET['sc'])) {
  $colname_count = $_GET['sc'];
}
$colname2_count = "-1";
if (isset($_GET['id'])) {
  $colname2_count = $_GET['id'];
}
mysql_select_db($database_localhost, $localhost);
$query_count = "SELECT `Status` FROM enrolee_scheme_status WHERE Scheme_FK =  $colname_count AND enrolee_scheme_status.Effective_FK = $colname2_count";
$count = mysql_query($query_count, $localhost) or die(mysql_error());
$row_count = mysql_fetch_assoc($count);
$totalRows_count = mysql_num_rows($count);




$ef = $_GET['id']; 
$company = $_GET['co']; 
$scheme = $_GET['sc'];
$plan = $_GET['pl'];
$enrolee = $_GET['enrolee'];
$che = $_GET['che']; 
$id2 = $_GET['id2'];
$sta = $_GET['sta'];
$license = $_GET['license'];


$status = $sta - 1;



if ($status == 1)

{
	
	if ($row_count['Status'] == 1){
		$che = 0;
		} else {$che = 1;}
		
	
	$query = "UPDATE enrolee_scheme_status SET Status ='$che',Sta ='2' WHERE Id ='$id2'";
	
}

else if ($status == '-1')

{
  $query = "INSERT INTO enrolee_scheme_status ( 
											   
      Enrolee_FK
    , Scheme_FK
    , License
    , `Status`
    , Effective_FK
	, Sta
                            )
                        VALUES
                        ('$enrolee','$scheme','$license','1','$ef','2')" ;	
  
	}
	
	$query;
	


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
