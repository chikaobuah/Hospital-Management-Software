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

$colname_lablist = "-1";
if (isset($_GET['id'])) {
  $colname_lablist = $_GET['id'];
}
$colname2_lablist = "-1";
if (isset($_GET['en'])) {
  $colname2_lablist = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_lablist = sprintf("
						 
SELECT 
transaction.Licensee     , 
transaction.LId     , 
transaction.Created     , 
transaction.Creator     , 
transaction.Scheme     , 
transaction.Principal     , 
transaction.Enrolee     , 
service.Blocks     , 
transaction.Visit     , 
transaction.Service     , 
transaction.Quantity     , 
transaction.Unit_Price     , 
transaction.Total_Price     , 
transaction.Liability     , 
transaction.upsize_ts     , 
transaction.Status     , 
transaction.Transaction_code     , 
transaction.Capitation     , 
transaction.Provider     , 
service.Short     , 
procedure.Procedure 
FROM newmed06.transaction     
INNER JOIN newmed06.service          
ON (transaction.Service = service.Id)     
INNER JOIN newmed06.procedure          
ON (transaction.Detail = procedure.Id) 
WHERE service.Blocks = 2 AND transaction.Visit = %s AND transaction.Enrolee = %s", GetSQLValueString($colname_lablist, "date"),GetSQLValueString($colname2_lablist, "int"));
$lablist = mysql_query($query_lablist, $localhost) or die(mysql_error());
$row_lablist = mysql_fetch_assoc($lablist);
$totalRows_lablist = mysql_num_rows($lablist);


$colname_lablist2 = "-1";
if (isset($_GET['id'])) {
  $colname_lablist2 = $_GET['id'];
}
$colname2_lablist2 = "-1";
if (isset($_GET['en'])) {
  $colname2_lablist2 = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_lablist2 = sprintf("
SELECT 
transaction.Quantity     , 
transaction.Unit_Price     , 
transaction.Total_Price     , 
transaction.Status      
FROM newmed06.transaction     
INNER JOIN newmed06.service          
ON (transaction.Service = service.Id)     
INNER JOIN newmed06.procedure          
ON (transaction.Detail = procedure.Id) WHERE service.Blocks = 2 AND transaction.Visit = %s AND transaction.Enrolee = %s AND transaction.Status = 1", GetSQLValueString($colname_lablist2, "date"),GetSQLValueString($colname2_lablist2, "int"));
$lablist2 = mysql_query($query_lablist2, $localhost) or die(mysql_error());
$row_lablist2 = mysql_fetch_assoc($lablist2);
$totalRows_lablist2 = mysql_num_rows($lablist2);


$colname_lablisttwo = "-1";
if (isset($_GET['id'])) {
  $colname_lablisttwo = $_GET['id'];
}
$colname2_lablisttwo = "-1";
if (isset($_GET['en'])) {
  $colname2_lablisttwo = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_lablisttwo = sprintf("
SELECT transaction.Licensee     , 
transaction.LId     , 
transaction.Created     , 
transaction.Creator     , 
transaction.Scheme     , 
transaction.Principal     , 
transaction.Enrolee     , 
service.Blocks     , 
transaction.Visit     , 
transaction.Service     , 
transaction.Quantity     , 
transaction.Unit_Price     , 
transaction.Total_Price     , 
transaction.Liability     , 
transaction.upsize_ts     , 
transaction.Status     , 
transaction.Transaction_code     , 
transaction.Capitation     , 
transaction.Provider     , 
service.Short     , 
drug.Drug  ,
drug.Short as dshort
FROM newmed06.transaction     
INNER JOIN newmed06.service          
ON (transaction.Service = service.Id)     
INNER JOIN newmed06.drug          
ON (transaction.Detail = drug.Id) WHERE service.Blocks = 16 AND transaction.Visit = %s AND transaction.Enrolee = %s", GetSQLValueString($colname_lablisttwo, "date"),GetSQLValueString($colname2_lablisttwo, "int"));
$lablisttwo = mysql_query($query_lablisttwo, $localhost) or die(mysql_error());
$row_lablisttwo = mysql_fetch_assoc($lablisttwo);
$totalRows_lablisttwo = mysql_num_rows($lablisttwo);


$colname_lablisttwo2 = "-1";
if (isset($_GET['id'])) {
  $colname_lablisttwo2 = $_GET['id'];
}
$colname2_lablisttwo2 = "-1";
if (isset($_GET['en'])) {
  $colname2_lablisttwo2 = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_lablisttwo2 = sprintf("
SELECT 
transaction.Quantity     , 
transaction.Unit_Price     , 
transaction.Total_Price     ,
drug.Drug 
FROM newmed06.transaction     
INNER JOIN newmed06.service          
ON (transaction.Service = service.Id)     
INNER JOIN newmed06.drug          
ON (transaction.Detail = drug.Id) WHERE service.Blocks = 16 AND transaction.Visit = %s AND transaction.Enrolee = %s AND transaction.Status = 1", GetSQLValueString($colname_lablisttwo2, "date"),GetSQLValueString($colname2_lablisttwo2, "int"));
$lablisttwo2 = mysql_query($query_lablisttwo2, $localhost) or die(mysql_error());
$row_lablisttwo2 = mysql_fetch_assoc($lablisttwo2);
$totalRows_lablisttwo2 = mysql_num_rows($lablisttwo2);


$colname_pays = "-1";
if (isset($_GET['en'])) {
  $colname_pays = $_GET['en'];
}
$colname2_pays = "-1";
if (isset($_GET['id'])) {
  $colname2_pays = $_GET['id'];
}
mysql_select_db($database_localhost, $localhost);
$query_pays = sprintf("
SELECT 
transaction_credit.Created  ,
transaction_credit.Amount   , 
transaction_credit.Creator     , 
transaction_credit.Scheme     , 
transaction_credit.Principal     , 
transaction_credit.Enrolee     , 
transaction_credit.Visit     , 
transation_credit_detail.Short     , 
transaction_credit.Capitation     , 
user.User_Name 
FROM newmed06.transaction_credit     
INNER JOIN newmed06.transation_credit_detail          
ON (transaction_credit.Detail = transation_credit_detail.Id)     
INNER JOIN newmed06.user          
ON (transaction_credit.Creator = user.LId) 
WHERE transaction_credit.Enrolee = %s AND      
transaction_credit.Visit = %s 
AND transation_credit_detail.Group = 2", GetSQLValueString($colname_pays, "int"),GetSQLValueString($colname2_pays, "date"));
$pays = mysql_query($query_pays, $localhost) or die(mysql_error());
$row_pays = mysql_fetch_assoc($pays);
$totalRows_pays = mysql_num_rows($pays);


$colname_pays1 = "-1";
if (isset($_GET['en'])) {
  $colname_pays1 = $_GET['en'];
}
$colname2_pays1 = "-1";
if (isset($_GET['id'])) {
  $colname2_pays1 = $_GET['id'];
}
mysql_select_db($database_localhost, $localhost);
$query_pays1 = sprintf("SELECT 
transaction_credit.Created  ,
transaction_credit.Amount   , 
user.User_Name 
FROM newmed06.transaction_credit     
INNER JOIN newmed06.transation_credit_detail          
ON (transaction_credit.Detail = transation_credit_detail.Id)     
INNER JOIN newmed06.user          
ON (transaction_credit.Creator = user.LId) 
WHERE transaction_credit.Enrolee = %s AND      
transaction_credit.Visit = %s 
AND transation_credit_detail.Group = 2", GetSQLValueString($colname_pays1, "int"),GetSQLValueString($colname2_pays1, "date"));
$pays1 = mysql_query($query_pays1, $localhost) or die(mysql_error());
$row_pays1 = mysql_fetch_assoc($pays1);
$totalRows_pays1 = mysql_num_rows($pays1);


$colname_pays2 = "-1";
if (isset($_GET['en'])) {
  $colname_pays2 = $_GET['en'];
}
$colname2_pays2 = "-1";
if (isset($_GET['id'])) {
  $colname2_pays2 = $_GET['id'];
}
mysql_select_db($database_localhost, $localhost);
$query_pays2 = sprintf("
SELECT transaction_credit.Created ,
transaction_credit.Transaction_code ,
transaction_credit.Amount   , 
transaction_credit.Creator     , 
transaction_credit.Scheme     , 
transaction_credit.Principal     , 
transaction_credit.Enrolee     , 
transaction_credit.Visit     , 
transation_credit_detail.Short     , 
transaction_credit.Capitation     , 
user.User_Name 
FROM newmed06.transaction_credit     
INNER JOIN newmed06.transation_credit_detail          
ON (transaction_credit.Detail = transation_credit_detail.Id)     
INNER JOIN newmed06.user          ON (transaction_credit.Creator = user.LId) WHERE transaction_credit.Enrolee = %s AND      transaction_credit.Visit = %s AND transation_credit_detail.Group = 1", GetSQLValueString($colname_pays2, "int"),GetSQLValueString($colname2_pays2, "date"));
$pays2 = mysql_query($query_pays2, $localhost) or die(mysql_error());
$row_pays2 = mysql_fetch_assoc($pays2);
$totalRows_pays2 = mysql_num_rows($pays2);


$colname_pays21 = "-1";
if (isset($_GET['en'])) {
  $colname_pays21 = $_GET['en'];
}
$colname2_pays21 = "-1";
if (isset($_GET['id'])) {
  $colname2_pays21 = $_GET['id'];
}
mysql_select_db($database_localhost, $localhost);
$query_pays21 = sprintf("SELECT 
transaction_credit.Amount   , 
user.User_Name 
FROM newmed06.transaction_credit     
INNER JOIN newmed06.transation_credit_detail          
ON (transaction_credit.Detail = transation_credit_detail.Id)     
INNER JOIN newmed06.user          ON (transaction_credit.Creator = user.LId) WHERE transaction_credit.Enrolee = %s AND      transaction_credit.Visit = %s AND transation_credit_detail.Group = 1", GetSQLValueString($colname_pays21, "int"),GetSQLValueString($colname2_pays21, "date"));
$pays21 = mysql_query($query_pays21, $localhost) or die(mysql_error());
$row_pays21 = mysql_fetch_assoc($pays21);
$totalRows_pays21 = mysql_num_rows($pays21);


$ttprice = 0;
$ttpricetwo = 0;
$ttpay1 = 0;
$ttpay21 = 0;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="1" style="border:thin; border-color:#000; border-collapse:collapse;">
  <tr>
    <td width="80%" align="right"><strong>Total--&gt;</strong></td>
    <td width="20%" align="left"><strong><?php do { ?>
      <?php $row_lablist2['Total_Price']; ?>
     <?php $ttprice = $ttprice + $row_lablist2['Total_Price']; ?>
    <?php } while ($row_lablist2 = mysql_fetch_assoc($lablist2)); ?>
    
    
    <?php do { ?>
      <?php $row_lablisttwo2['Total_Price']; ?>
     <?php $ttpricetwo = $ttpricetwo + $row_lablisttwo2['Total_Price']; ?>
    <?php } while ($row_lablisttwo2 = mysql_fetch_assoc($lablisttwo2)); ?>
    
    
     <?php do { ?>
    <?php $row_pays1['Amount']; ?>
    <?php $ttpay1 = $ttpay1 + $row_pays1['Amount']; ?>
  <?php } while ($row_pays1 = mysql_fetch_assoc($pays1)); ?>
    
    <?php do { ?>
    <?php $row_pays21['Amount']; ?>
    <?php $ttpay21 = $ttpay21 + $row_pays21['Amount']; ?>
  <?php } while ($row_pays21 = mysql_fetch_assoc($pays21)); ?>
    
   <?php $tfinal = $ttprice+$ttpricetwo-$ttpay1-$ttpay21;
   
   echo $tfinal;
   ?></strong>
    
  </tr>
  
  
  
  
  
  
   <?php if ($totalRows_lablist2 > 0) { ?>
  <?php do { ?>
    <tr>
      <td align="left" style="background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;"><?php echo $row_lablist['Short']; ?> - <?php echo $row_lablist['Procedure']; ?></td>
      <td align="left"><?php  if ($row_lablist['Status'] == 2)
	  {echo "covered";} else { echo $row_lablist['Total_Price']; }
	  
	   ?></td>
    </tr>
    <?php } while ($row_lablist = mysql_fetch_assoc($lablist)); ?>
     <?php } ?>
</table>
<table width="100%" border="1" style="border:thin; border-color:#000; border-collapse:collapse;">
<?php if ($totalRows_lablisttwo > 0) { ?>
  <?php do { ?>
    <tr>
      <td align="left" width="80%" style="background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;"><?php echo $row_lablisttwo['Short']; ?> - <?php echo $row_lablisttwo['dshort']; ?></td>
      <td align="left"><?php  if ($row_lablisttwo['Status'] == 2)
	  {echo "covered";} else { echo $row_lablisttwo['Total_Price']; }
	  
	   ?></td>
    </tr>
    <?php } while ($row_lablisttwo = mysql_fetch_assoc($lablisttwo)); ?>
     <?php } ?>
</table>
<table width="100%" border="1" style="border:thin; border-color:#000; border-collapse:collapse;">
  <?php if ($totalRows_pays > 0) { ?>
  <?php do { ?>
  <tr>
    <td align="left" width="80%" style="background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;"><?php echo $row_pays['Short']; ?> - <?php echo $row_pays['User_Name']; ?></td>
    <td align="left"><?php echo $row_pays['Amount']; ?></td>
  </tr>
  <?php } while ($row_pays = mysql_fetch_assoc($pays)); ?>
  <?php } ?>
</table>
<table width="100%" border="1" style="border:thin; border-color:#000; border-collapse:collapse;">
  <?php if ($totalRows_pays2 > 0) { ?>
  <?php do { ?>
  <tr>
    <td align="left" width="80%" style="background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;"><?php echo $row_pays2['Short']; ?> - <?php echo $row_pays2['Transaction_code']; ?></td>
    <td align="left"><?php echo $row_pays2['Amount']; ?></td>
  </tr>
  <?php } while ($row_pays2 = mysql_fetch_assoc($pays2)); ?>
  <?php } ?>
</table>
</body>
</html>
<?php
mysql_free_result($lablist);

mysql_free_result($lablisttwo);

mysql_free_result($pays);

mysql_free_result($pays2);
?>
