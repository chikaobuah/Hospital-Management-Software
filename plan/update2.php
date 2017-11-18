<?php require_once('../Connections/localhost.php'); 
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

$colname_schemes = "-1";
if (isset($_GET['scheme'])) {
  $colname_schemes = $_GET['scheme'];
}
mysql_select_db($database_localhost, $localhost);
$query_schemes = sprintf("SELECT * FROM scheme WHERE LId = %s", GetSQLValueString($colname_schemes, "int"));
$schemes = mysql_query($query_schemes, $localhost) or die(mysql_error());
$row_schemes = mysql_fetch_assoc($schemes);
$totalRows_schemes = mysql_num_rows($schemes);

 do {  $Licensee = $row_schemes['Licensee']; 
  			   $LId2 = $row_schemes['LId']; 
      $Created = $row_schemes['Created']; 
     $Creator = $row_schemes['Creator'];
      $Scheme = $row_schemes['Scheme']; 
      $Program_FK = $row_schemes['Program_FK'];
      $HMO_FK = $row_schemes['HMO_FK'];
      $Retainer_FK = $row_schemes['Retainer_FK'];
      $Frequency_FK = $row_schemes['Frequency_FK'];
      $Commenced = $row_schemes['Commenced'];
      $Capitation2 = $row_schemes['Capitation'];
      $Bed_Type_FK = $row_schemes['Bed_Type_FK'];
      $Stay_duration = $row_schemes['Stay_duration'];
      $Status = $row_schemes['Status'];
      $Status_Note = $row_schemes['Status_Note'];
      $upsize_ts = $row_schemes['upsize_ts'];
     $Company_FK = $row_schemes['Company_FK'];
      $Stay_frequency = $row_schemes['Stay_frequency'];
      $Paying = $row_schemes['Paying'];
     $Fee = $row_schemes['Fee'];
   
   
   $LId = '';


$scheme2 = $_GET['scheme2'];
$plan = $_GET['plan'];
$company = $_GET['company'];
$Commenced2 = $_GET['Commenced2']; 
$capitation = $_GET['capitation']; 
$fre = $_GET['fre']; 
$id = $_GET['id'];

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
$sql="INSERT INTO scheme_history (Licensee, LId, Created, Creator, Scheme, Program_FK, HMO_FK, Retainer_FK, Frequency_FK, Commenced, Capitation, Bed_Type_FK, Stay_duration, Status, Status_Note, upsize_ts, Company_FK, Stay_frequency, Paying, LId_FK)
VALUES
('$Licensee','$LId','$Created','$Creator','$Scheme','$Program_FK','$HMO_FK','$Retainer_FK','$Frequency_FK','$Commenced','$Capitation2','Bed_Type_FK','$Stay_duration','$Status','$Status_Note','$upsize_ts','$Company_FK','$Stay_frequency','$Paying','$scheme2')";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO scheme_capitation ( 
	 Scheme
    , Capitation
    , Effective
    , Frequency)
VALUES
('$scheme2','$capitation','$Commenced2','$fre')";


if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }


mysql_close($connection);


} while ($row_schemes = mysql_fetch_assoc($schemes)); 

mysql_free_result($schemes);
echo "1";
exit


?>
