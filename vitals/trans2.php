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
if (isset($_GET['drc'])) {
  $colname3_Recordset1 = $_GET['drc'];
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
$query_Recordset1 = sprintf("SELECT transaction.Licensee     ,  transaction.LId     ,  transaction.Created     ,  transaction.Creator     ,  transaction.Scheme     ,  transaction.Principal     ,  transaction.Enrolee     ,  transaction.Visit     ,  transaction.Detail     ,  transaction.Quantity     ,  transaction.Unit_Price     ,  transaction.Total_Price     ,  transaction.upsize_ts     ,  transaction.Status     ,  transaction.Service     ,  visit_prescription.Style     ,  visit_prescription.Dosage_Qty     ,  visit_prescription.Fixed_Qty     ,  visit_prescription.Usage     ,  visit_prescription.Status     ,  cover_drug.Cover , transaction.Enrolee , cover_drug.Tariff FROM newmed06.transaction      INNER JOIN newmed06.visit_prescription           ON (transaction.Created = visit_prescription.Created)      INNER JOIN newmed06.cover_drug           ON (visit_prescription.Drug = cover_drug.Drug_FK) WHERE cover_drug.Cover = %s AND transaction.Visit = %s and transaction.Enrolee = %s GROUP BY transaction.upsize_ts ASC ", GetSQLValueString($colname3_Recordset1, "int"),GetSQLValueString($colname_Recordset1, "date"),GetSQLValueString($colname2_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset2 = $_GET['id'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset2 = sprintf("SELECT  Fixed_Qty     , Style     , Dosage_Qty     , Visit     , Created , Fixed_Qty * Style * Dosage_Qty FROM visit_prescription WHERE Visit = %s ORDER BY Created ASC", GetSQLValueString($colname_Recordset2, "date"));
$Recordset2 = mysql_query($query_Recordset2, $localhost) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
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
    <td>Style</td>
    <td>Dosage_Qty</td>
    <td>Fixed_Qty</td>
    <td>Usage</td>
    <td>Status</td>
    <td>Cover</td>
    <td>Enrolee</td>
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
      <td><?php echo $row_Recordset1['Style']; ?></td>
      <td><?php echo $row_Recordset1['Dosage_Qty']; ?></td>
      <td><?php echo $row_Recordset1['Fixed_Qty']; ?></td>
      <td><?php echo $row_Recordset1['Usage']; ?></td>
      <td><?php echo $row_Recordset1['Status']; ?></td>
      <td><?php echo $row_Recordset1['Cover']; ?></td>
      <td><?php echo $row_Recordset1['Enrolee']; ?></td>
      <td><?php echo $row_Recordset1['Tariff']; ?></td>
    </tr><?php  $tariff = $row_Recordset1['Tariff'];
					$LId = $row_Recordset1['LId'];?>
                    
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

$sql="UPDATE transaction SET Unit_Price ='$tariff' WHERE LId ='$LId'";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";


?>                 
                    
                    
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<table>
  <tr>
    <td>Fixed_Qty</td>
    <td>Style</td>
    <td>Dosage_Qty</td>
    <td>Visit</td>
    <td>Created</td>
    <td>Fixed_Qty * Style * Dosage_Qty</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset2['Fixed_Qty']; ?></td>
      <td><?php echo $row_Recordset2['Style']; ?></td>
      <td><?php echo $row_Recordset2['Dosage_Qty']; ?></td>
      <td><?php echo $row_Recordset2['Visit']; ?></td>
      <td><?php echo $row_Recordset2['Created']; ?></td>
      <td><?php echo $row_Recordset2['Fixed_Qty * Style * Dosage_Qty']; ?></td>
    </tr><?php  $total = $row_Recordset2['Fixed_Qty * Style * Dosage_Qty'];
					$time = $row_Recordset2['Created'];?>
    <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
</table>
</body>


<?php

echo $total; 
echo $time;

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

$sql2="UPDATE visit_prescription SET Gross_Qty ='$total' WHERE Created ='$time'";

if (!mysql_query($sql2,$connection))
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
$date = $_GET['date'];

?>

<?php

echo $LId; 
echo $tariff;

$final = $total * $tariff;

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

$sql3="UPDATE transaction SET Quantity ='$total', Total_Price = '$final'  WHERE LId ='$LId'";

if (!mysql_query($sql3,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

$URL="consulting.php?pr=$Principal&en=$Enrolee&sc=$Scheme&st=$status&prc=$procedurecover&src=$servicecover&drc=$drugcover&cap=$Capitation&id=$VisitID&date=$date&id2=$VisitID2"; 
header ("Location: $URL");


mysql_close($connection)

?>            




</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
