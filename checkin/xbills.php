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



  $enr = $_GET['en'];
  $date = date ('Y-m-d');

mysql_select_db($database_localhost, $localhost);
$query_lablist = sprintf("SELECT transaction.Licensee     , transaction.LId     , transaction.Created     , transaction.Creator     , transaction.Scheme     , transaction.Principal     , transaction.Enrolee     , service.Blocks     , transaction.Visit     , transaction.Service     , transaction.Quantity     , transaction.Unit_Price     , transaction.Total_Price     , transaction.Liability     , transaction.upsize_ts     , transaction.Status     , transaction.Transaction_code     , transaction.Capitation     , transaction.Provider     , service.Short     , procedure.Procedure 

FROM newmed06.transaction     
INNER JOIN newmed06.service   ON (transaction.Service = service.Id)     
INNER JOIN newmed06.procedure   ON (transaction.Detail = procedure.Id)																																																																																																																																																																												WHERE service.Blocks = 2 AND transaction.Visit LIKE %s AND transaction.Enrolee = %s", 
																																																																																																																																																																																							GetSQLValueString("%" . $date . "%", "date"),GetSQLValueString($enr, "int"));
$lablist = mysql_query($query_lablist, $localhost) or die(mysql_error());

$row_lablist = mysql_fetch_assoc($lablist);
$totalRows_lablist = mysql_num_rows($lablist);



mysql_select_db($database_localhost, $localhost);
$query_lablist2 = sprintf("SELECT transaction.Licensee     , transaction.LId     , transaction.Created     , transaction.Creator     , transaction.Scheme     , transaction.Principal     , transaction.Enrolee     , service.Blocks     , transaction.Visit     , transaction.Service     , transaction.Quantity     , transaction.Unit_Price     , transaction.Total_Price     , transaction.Liability     , transaction.upsize_ts     , transaction.Status     , transaction.Transaction_code     , transaction.Capitation     , transaction.Provider     , service.Short     , procedure.Procedure 
FROM newmed06.transaction     
INNER JOIN newmed06.service          ON (transaction.Service = service.Id)     
INNER JOIN newmed06.procedure          ON (transaction.Detail = procedure.Id) 
																																																																																																																																																																																							   WHERE service.Blocks = 2 AND transaction.Visit LIKE %s AND transaction.Enrolee = %s", 
																																																																																																																																																																																							GetSQLValueString("%" . $date . "%", "date"),GetSQLValueString($enr, "int"));
$lablist2 = mysql_query($query_lablist2, $localhost) or die(mysql_error());
$row_lablist2 = mysql_fetch_assoc($lablist2);
$totalRows_lablist2 = mysql_num_rows($lablist2);




mysql_select_db($database_localhost, $localhost);
$query_lablisttwo = sprintf("SELECT transaction.Licensee     , transaction.LId     , transaction.Created     , transaction.Creator     , transaction.Scheme     , transaction.Principal     , transaction.Enrolee     , service.Blocks     , transaction.Visit     , transaction.Service     , transaction.Quantity     , transaction.Unit_Price     , transaction.Total_Price     , transaction.Liability     , transaction.upsize_ts     , transaction.Status     , transaction.Transaction_code     , transaction.Capitation     , transaction.Provider     , service.Short     , procedure.Procedure FROM newmed06.transaction     INNER JOIN newmed06.service          ON (transaction.Service = service.Id)     INNER JOIN newmed06.procedure          ON (transaction.Detail = procedure.Id) 
																																																																																																																																																																																								 WHERE service.Blocks = 16 AND transaction.Visit LIKE %s AND transaction.Enrolee = %s", 
																																																																																																																																																																																								GetSQLValueString("%" . $date . "%", "date"),GetSQLValueString($enr, "int"));
$lablisttwo = mysql_query($query_lablisttwo, $localhost) or die(mysql_error());
$row_lablisttwo = mysql_fetch_assoc($lablisttwo);
$totalRows_lablisttwo = mysql_num_rows($lablisttwo);




mysql_select_db($database_localhost, $localhost);
$query_lablisttwo2 = sprintf("SELECT transaction.Licensee     , transaction.LId     , transaction.Created     , transaction.Creator     , transaction.Scheme     , transaction.Principal     , transaction.Enrolee     , service.Blocks     , transaction.Visit     , transaction.Service     , transaction.Quantity     , transaction.Unit_Price     , transaction.Total_Price     , transaction.Liability     , transaction.upsize_ts     , transaction.Status     , transaction.Transaction_code     , transaction.Capitation     , transaction.Provider     , service.Short     , procedure.Procedure FROM newmed06.transaction     INNER JOIN newmed06.service          ON (transaction.Service = service.Id)     INNER JOIN newmed06.procedure          ON (transaction.Detail = procedure.Id) 
																																																																																																																																																																																								  WHERE service.Blocks = 16 AND transaction.Visit = %s AND transaction.Enrolee = %s", 
																																																																																																																																																																																								GetSQLValueString("%" . $date . "%", "date"),GetSQLValueString($enr, "int"));
$lablisttwo2 = mysql_query($query_lablisttwo2, $localhost) or die(mysql_error());
$row_lablisttwo2 = mysql_fetch_assoc($lablisttwo2);
$totalRows_lablisttwo2 = mysql_num_rows($lablisttwo2);




mysql_select_db($database_localhost, $localhost);
$query_pays = sprintf("SELECT transaction_credit.Created  ,transaction_credit.Amount   , transaction_credit.Creator     , transaction_credit.Scheme     , transaction_credit.Principal     , transaction_credit.Enrolee     , transaction_credit.Visit     , transation_credit_detail.Short     , transaction_credit.Capitation     , user.User_Name 
					  
FROM newmed06.transaction_credit     
INNER JOIN newmed06.transation_credit_detail          ON (transaction_credit.Detail = transation_credit_detail.Id)     
INNER JOIN newmed06.user          ON (transaction_credit.Creator = user.LId) WHERE transaction_credit.Enrolee = %s AND      transaction_credit.Visit = %s AND transation_credit_detail.Group = 2", 
																																																																																																																																					GetSQLValueString($enr, "int"),GetSQLValueString($date, "date"));
$pays = mysql_query($query_pays, $localhost) or die(mysql_error());
$row_pays = mysql_fetch_assoc($pays);
$totalRows_pays = mysql_num_rows($pays);




mysql_select_db($database_localhost, $localhost);
$query_pays1 = sprintf("SELECT transaction_credit.Created  ,transaction_credit.Amount   , transaction_credit.Creator     , transaction_credit.Scheme     , transaction_credit.Principal     , transaction_credit.Enrolee     , transaction_credit.Visit     , transation_credit_detail.Short     , transaction_credit.Capitation     , user.User_Name FROM newmed06.transaction_credit     INNER JOIN newmed06.transation_credit_detail          ON (transaction_credit.Detail = transation_credit_detail.Id)     INNER JOIN newmed06.user          ON (transaction_credit.Creator = user.LId) WHERE transaction_credit.Enrolee = %s AND      transaction_credit.Visit = %s AND transation_credit_detail.Group = 2", GetSQLValueString($enr, "int"),GetSQLValueString($date, "date"));
$pays1 = mysql_query($query_pays1, $localhost) or die(mysql_error());
$row_pays1 = mysql_fetch_assoc($pays1);
$totalRows_pays1 = mysql_num_rows($pays1);




mysql_select_db($database_localhost, $localhost);
$query_pays2 = sprintf("SELECT transaction_credit.Created ,transaction_credit.Transaction_code ,transaction_credit.Amount   , transaction_credit.Creator     , transaction_credit.Scheme     , transaction_credit.Principal     , transaction_credit.Enrolee     , transaction_credit.Visit     , transation_credit_detail.Short     , transaction_credit.Capitation     , user.User_Name FROM newmed06.transaction_credit     INNER JOIN newmed06.transation_credit_detail          ON (transaction_credit.Detail = transation_credit_detail.Id)     INNER JOIN newmed06.user          ON (transaction_credit.Creator = user.LId) WHERE transaction_credit.Enrolee = %s AND      transaction_credit.Visit = %s AND transation_credit_detail.Group = 1", 
																																																																																																																																															GetSQLValueString($enr, "int"),GetSQLValueString($date, "date"));
$pays2 = mysql_query($query_pays2, $localhost) or die(mysql_error());
$row_pays2 = mysql_fetch_assoc($pays2);
$totalRows_pays2 = mysql_num_rows($pays2);




mysql_select_db($database_localhost, $localhost);
$query_pays21 = sprintf("SELECT transaction_credit.Created ,transaction_credit.Transaction_code ,transaction_credit.Amount   , transaction_credit.Creator     , transaction_credit.Scheme     , transaction_credit.Principal     , transaction_credit.Enrolee     , transaction_credit.Visit     , transation_credit_detail.Short     , transaction_credit.Capitation     , user.User_Name FROM newmed06.transaction_credit     INNER JOIN newmed06.transation_credit_detail          ON (transaction_credit.Detail = transation_credit_detail.Id)     INNER JOIN newmed06.user          ON (transaction_credit.Creator = user.LId) WHERE transaction_credit.Enrolee = %s AND      transaction_credit.Visit = %s AND transation_credit_detail.Group = 1", 
																																																																																																																																															GetSQLValueString($enr, "int"),GetSQLValueString($date, "date"));
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
    <?php } while ($row_lablist2 = mysql_fetch_assoc($lablist2)); // bill for all labs n procedures?>
    
    
    <?php do { ?>
      <?php $row_lablisttwo2['Total_Price']; ?>
     <?php $ttpricetwo = $ttpricetwo + $row_lablisttwo2['Total_Price']; ?>
    <?php } while ($row_lablisttwo2 = mysql_fetch_assoc($lablisttwo2)); // bill for all drugs  n injections?>
    
    
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
      <td align="left"><?php echo $row_lablist['Total_Price']; ?></td>
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
	border-bottom:1px solid #ddd;"><?php echo $row_lablisttwo['Short']; ?> - <?php echo $row_lablisttwo['Procedure']; ?></td>
      <td align="left"><?php echo $row_lablisttwo['Total_Price']; ?></td>
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
