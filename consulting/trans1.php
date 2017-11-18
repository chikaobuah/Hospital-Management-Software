<html>
<head>
<?php require_once('Connections/localhost.php'); ?>
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


$colname3_Recordset1 = "-1";
if (isset($_GET['src'])) {
  $colname3_Recordset1 = $_GET['src'];
}
$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
$colname2_Recordset1 = "-1";
if (isset($_GET['en'])) {
  $colname2_Recordset1 = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = sprintf("SELECT transaction.Licensee     , transaction.LId     , transaction.Created     , transaction.Creator     , transaction.Scheme     , transaction.Principal     , transaction.Enrolee     , transaction.Visit     , transaction.Detail     , transaction.Quantity     , transaction.Unit_Price     , transaction.Total_Price     , transaction.upsize_ts     , transaction.Status     , transaction.Service     , cover_service.Tariff FROM newmed06.transaction     INNER JOIN newmed06.cover_service          ON (transaction.Service = cover_service.Service_FK) WHERE cover_service.Cover = %s AND cover_service.Service_FK = 1 AND Visit = %s and Enrolee = %s GROUP BY transaction.upsize_ts ASC ", GetSQLValueString($colname3_Recordset1, "int"),GetSQLValueString($colname_Recordset1, "date"),GetSQLValueString($colname2_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>

</head>

<body>

<p>&nbsp;</p>
<table>
  <tr>
    <td>Licensee</td>
    <td>LId</td>
    <td>Created</td>
    <td>Creator</td>
    <td>Scheme</td>
    <td>Principal</td>
    <td>Enrolee</td>
    <td>Visit</td>
    <td>Detail</td>
    <td>Quantity</td>
    <td>Unit_Price</td>
    <td>Total_Price</td>
    <td>upsize_ts</td>
    <td>Status</td>
    <td>Service</td>
    <td>Tariff</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['Licensee']; ?></td>
      <td><?php echo $row_Recordset1['LId']; ?></td>
      <td><?php echo $row_Recordset1['Created']; ?></td>
      <td><?php echo $row_Recordset1['Creator']; ?></td>
      <td><?php echo $row_Recordset1['Scheme']; ?></td>
      <td><?php echo $row_Recordset1['Principal']; ?></td>
      <td><?php echo $row_Recordset1['Enrolee']; ?></td>
      <td><?php echo $row_Recordset1['Visit']; ?></td>
      <td><?php echo $row_Recordset1['Detail']; ?></td>
      <td><?php echo $row_Recordset1['Quantity']; ?></td>
      <td><?php echo $row_Recordset1['Unit_Price']; ?></td>
      <td><?php echo $row_Recordset1['Total_Price']; ?></td>
      <td><?php echo $row_Recordset1['upsize_ts']; ?></td>
      <td><?php echo $row_Recordset1['Status']; ?></td>
      <td><?php echo $row_Recordset1['Service']; ?></td>
      <td><?php echo $row_Recordset1['Tariff']; ?></td>
    </tr><?php  $tariff = $row_Recordset1['Tariff'];
					$LId = $row_Recordset1['LId'];?>
    
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</body>
<?php
  

 

echo $LId; 
echo $tariff;

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

$sql="UPDATE transaction SET Unit_Price ='$tariff', Total_Price = '$tariff' WHERE LId ='$LId'";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";


$Capitation = $_GET['cap'];
$Principal = $_GET['pr'];
$Enrolee = $_GET['en'];
$Scheme = $_GET['sc'];
$procedurecover = $_GET['prc'];
$servicecover = $_GET['src'];
$drugcover = $_GET['drc'];
$status = $_GET['st'];
$VisitID = $_GET['id'];
$VisitID2 = $_GET['id2'];

$URL="consulting.php?pr=$Principal&en=$Enrolee&sc=$Scheme&st=$status&prc=$procedurecover&src=$servicecover&drc=$drugcover&cap=$Capitation&id=$VisitID&date=$date&id2=$VisitID2"; 
header ("Location: $URL");




mysql_close($connection)


?> 
</html>
<?php
mysql_free_result($Recordset1);
?>
