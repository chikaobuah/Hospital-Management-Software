<?php require_once('../Connections/localhost.php'); ?>
<?php



$en=$_GET['en'];
$vi=$_GET['vi'];
$created= date('Y-m-d h:m:s'); 
$vitals_fk=$_GET['vitals_fk'];
$reading=$_GET['reading'];
$creator=$_SESSION["userlid"];

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

mysql_select_db($database_localhost, $localhost);
$query_Rec = "SELECT * FROM visit_vital";
$Rec = mysql_query($query_Rec, $localhost) or die(mysql_error());
$row_Rec = mysql_fetch_assoc($Rec);
$totalRows_Rec = mysql_num_rows($Rec);
 
session_start();
$host="localhost"; 
$username="root";
$database="newmed06";
$password="";




$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO visit_vital 

( Enrolee, Created , Creator, Visit , Vital_FK , Reading) VALUES 
( '$en','$created','$creator','$created','$vitals_fk','$reading')";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
echo " done";


mysql_free_result($Rec);
?>

<table border="1">
  <tr>
    <td>Vital_FK</td>
    <td>Reading</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Rec['Vital_FK']; ?></td>
      <td><?php echo $row_Rec['Reading']; ?></td>
    </tr>
    <?php } while ($row_Rec = mysql_fetch_assoc($Rec)); ?>
</table>
