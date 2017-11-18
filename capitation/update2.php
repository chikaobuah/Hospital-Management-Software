<?php require_once('../Connections/localhost.php'); ?>
<?php
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
if (isset($_POST['scheme'])) {
  $colname_schemes = $_POST['scheme'];
}
mysql_select_db($database_localhost, $localhost);
$query_schemes = sprintf("SELECT * FROM scheme WHERE LId = %s", GetSQLValueString($colname_schemes, "int"));
$schemes = mysql_query($query_schemes, $localhost) or die(mysql_error());
$row_schemes = mysql_fetch_assoc($schemes);
$totalRows_schemes = mysql_num_rows($schemes);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table>
  <tr>
    <td>Licensee</td>
    <td>LId</td>
    <td>Created</td>
    <td>Creator</td>
    <td>Scheme</td>
    <td>Program_FK</td>
    <td>HMO_FK</td>
    <td>Retainer_FK</td>
    <td>Frequency_FK</td>
    <td>Commenced</td>
    <td>Capitation</td>
    <td>Bed_Type_FK</td>
    <td>Stay_duration</td>
    <td>Status</td>
    <td>Status_Note</td>
    <td>upsize_ts</td>
    <td>Company_FK</td>
    <td>Stay_frequency</td>
    <td>Paying</td>
    <td>Fee</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $Licensee = $row_schemes['Licensee']; ?></td>
      <td><?php echo $LId2 = $row_schemes['LId']; ?></td>
      <td><?php echo $Created = $row_schemes['Created']; ?></td>
      <td><?php echo $Creator = $row_schemes['Creator']; ?></td>
      <td><?php echo $Scheme = $row_schemes['Scheme']; ?></td>
      <td><?php echo $Program_FK = $row_schemes['Program_FK']; ?></td>
      <td><?php echo $HMO_FK = $row_schemes['HMO_FK']; ?></td>
      <td><?php echo $Retainer_FK = $row_schemes['Retainer_FK']; ?></td>
      <td><?php echo $Frequency_FK = $row_schemes['Frequency_FK']; ?></td>
      <td><?php echo $Commenced = $row_schemes['Commenced']; ?></td>
      <td><?php echo $Capitation2 = $row_schemes['Capitation']; ?></td>
      <td><?php echo $Bed_Type_FK = $row_schemes['Bed_Type_FK']; ?></td>
      <td><?php echo $Stay_duration = $row_schemes['Stay_duration']; ?></td>
      <td><?php echo $Status = $row_schemes['Status']; ?></td>
      <td><?php echo $Status_Note = $row_schemes['Status_Note']; ?></td>
      <td><?php echo $upsize_ts = $row_schemes['upsize_ts']; ?></td>
      <td><?php echo $Company_FK = $row_schemes['Company_FK']; ?></td>
      <td><?php echo $Stay_frequency = $row_schemes['Stay_frequency']; ?></td>
      <td><?php echo $Paying = $row_schemes['Paying']; ?></td>
      <td><?php echo $Fee = $row_schemes['Fee']; ?></td>
    </tr>
 <?php echo $LId = '';?>


<?php 


echo $scheme2 = $_POST['scheme'];
echo $plan = $_POST['plan'];
echo $company = $_POST['company'];
echo $Commenced2 = $_POST['Commenced']; 
echo $capitation = $_POST['capitation']; 
echo $fre = $_POST['fre']; 
echo $id = $_POST['id'];

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
echo "1 record added";

$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO scheme_capitation ( 
	Id
    , Scheme
    , Capitation
    , Effective
    , Frequency)
VALUES
('$Licence','$scheme2','$capitation','$Commenced2','$fre')";


if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";


$URL="plan.php?co=$company&pl=$plan&sc=$scheme2&id=$id"; 
header ("Location: $URL");

mysql_close($connection)


?>
    
<?php } while ($row_schemes = mysql_fetch_assoc($schemes)); ?>
</table>



 <?php
 
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
$sql="INSERT scheme SET Commenced='$Commenced', Capitation ='$capitation', Frequency_FK ='$fre' WHERE LId ='$scheme'";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";


$URL="capitation.php?co=$company&pl=$plan&sc=$scheme2"; 
header ("Location: $URL");

mysql_close($connection)

?>



  


</body>
</html>
<?php
mysql_free_result($schemes);
?>
