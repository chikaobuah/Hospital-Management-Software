
<?php require_once('../Connections/localhost.php'); 


$ef = $_GET['id'];
$company = $_GET['co'];
$scheme = $_GET['sc'];
$plan = $_GET['pl'];
$enrolee = $_GET['enrolee'];
$che = $_GET['che']; 
$che2 = $_GET['che2']; 


$license = $_GET['license'];

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


$colname_enroleescheme = $scheme;
mysql_select_db($database_localhost, $localhost);
$query_enroleescheme = sprintf("SELECT * FROM enrolee_scheme WHERE Scheme = %s", GetSQLValueString($colname_enroleescheme, "int"));
$enroleescheme = mysql_query($query_enroleescheme, $localhost) or die(mysql_error());
$row_enroleescheme = mysql_fetch_assoc($enroleescheme);
$totalRows_enroleescheme = mysql_num_rows($enroleescheme);



session_start();



  do { 
   $en = $row_enroleescheme['Enrolee']; 
    $row_enroleescheme['Principal']; 
     $sc = $row_enroleescheme['Scheme']; 
      $row_enroleescheme['COY_ID_No']; 
      $row_enroleescheme['HMO_Reg_No'];
      $row_enroleescheme['HMO_ID_No'];
      $row_enroleescheme['HMO_Registered'];
     $row_enroleescheme['NHIS_Reg_No'];
      $row_enroleescheme['NHIS_ID_No'];
      $row_enroleescheme['Status'];
      $row_enroleescheme['Status_Note'];
      $row_enroleescheme['upsize_ts'];
 
	  
	$colname_status = $scheme;
	$colname2_status = $enrolee;

mysql_select_db($database_localhost, $localhost);
$query_status = sprintf("SELECT * FROM enrolee_scheme_status WHERE Scheme_FK = %s AND Enrolee_FK = %s AND Effective_FK = $ef", GetSQLValueString($colname_status, "int"),GetSQLValueString($colname2_status, "int"));
$status = mysql_query($query_status, $localhost) or die(mysql_error());
$row_status = mysql_fetch_assoc($status);
$totalRows_status = mysql_num_rows($status);

$sta = $row_status['Sta'];
$Id2 = $row_status['Id'];

$status = $sta - 1;




	


if ($status == 1)

{
	$query = "UPDATE enrolee_scheme_status SET Status ='$che2',Sta ='2' WHERE Id ='$Id2'";
	
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

 } while ($row_enroleescheme = mysql_fetch_assoc($enroleescheme)); 


mysql_free_result($enroleescheme);



mysql_close($connection);

echo "1";

exit


?>
