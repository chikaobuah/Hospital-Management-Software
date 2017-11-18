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

$colname_Recordset90 = "-1";
if (isset($_SESSION['License'])) {
  $colname_Recordset90 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset90 = sprintf("SELECT * FROM scheme WHERE Licensee = %s", GetSQLValueString($colname_Recordset90, "int"));
$Recordset90 = mysql_query($query_Recordset90, $localhost) or die(mysql_error());
$row_Recordset90 = mysql_fetch_assoc($Recordset90);
$totalRows_Recordset90 = mysql_num_rows($Recordset90);

$colname_schemeslist = "-1";
if (isset($_SESSION['License'])) {
  $colname_schemeslist = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_schemeslist = sprintf("SELECT scheme.Scheme     ,    scheme.Licensee     , scheme.LId     , scheme.Created     , scheme.Creator     , scheme.Scheme     , scheme.Program_FK     , scheme.HMO_FK     , scheme.Retainer_FK   , scheme.Paying     , scheme.Fee,     scheme.Company_FK     , scheme.Stay_frequency,scheme.Frequency_FK     , scheme.Commenced     , scheme.Capitation     , scheme.Bed_Type_FK     , scheme.Stay_duration     , scheme.Status     , scheme.Status_Note, scheme_payment.Amount     , scheme_payment.Enrolee_count     , scheme_payment.Start_date     , scheme_payment.Expiry_date     , scheme_status.Status,  DATE_FORMAT(scheme_payment.Expiry_date,  ' %%D %%b %%Y') AS formatted_date FROM newmed06.scheme     INNER JOIN newmed06.scheme_payment          ON (scheme.Fee = scheme_payment.Id)     INNER JOIN newmed06.scheme_status          ON (scheme.Status = scheme_status.Id) WHERE scheme.Licensee = %s ORDER BY scheme_payment.Expiry_date", GetSQLValueString($colname_schemeslist, "int"));
$schemeslist = mysql_query($query_schemeslist, $localhost) or die(mysql_error());
$row_schemeslist = mysql_fetch_assoc($schemeslist);
$totalRows_schemeslist = mysql_num_rows($schemeslist);


$days =date('Y-m-d h:m:s');	
$end_date = strtotime(date("Y-m-d", strtotime($days)) . " +30 day");
$end_date = date("Y-m-d", $end_date);
$end_date;


$date = date('Y-m-d h:m:s');

$colname_Recordset100 = "-1";
if (isset($_SESSION['License'])) {
  $colname_Recordset100 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset100 = sprintf("SELECT     scheme.Licensee     , scheme.LId     , scheme.Created     , scheme.Creator     , scheme.Scheme     , scheme.Program_FK     , scheme.HMO_FK     , scheme.Retainer_FK     , scheme.Frequency_FK     , scheme.Commenced     , scheme.Capitation     , scheme.Bed_Type_FK     , scheme.Stay_duration     , scheme.Status     , scheme.Status_Note     , scheme.Company_FK     , scheme.Stay_frequency     , scheme.Paying     , scheme.Fee, scheme.Scheme     , scheme_payment.Amount     , scheme_payment.Enrolee_count     , scheme_payment.Start_date     , scheme_payment.Expiry_date     , scheme_status.Status,  DATE_FORMAT(scheme_payment.Expiry_date,  ' %%D %%b %%Y') AS formatted_date FROM newmed06.scheme     INNER JOIN newmed06.scheme_payment          ON (scheme.Fee = scheme_payment.Id)     INNER JOIN newmed06.scheme_status          ON (scheme.Status = scheme_status.Id) WHERE scheme.Licensee = %s AND scheme_payment.Expiry_date <= '$end_date' AND scheme.Status = 1", GetSQLValueString($colname_Recordset100, "int"));
$Recordset100 = mysql_query($query_Recordset100, $localhost) or die(mysql_error());
$row_Recordset100 = mysql_fetch_assoc($Recordset100);
$totalRows_Recordset100 = mysql_num_rows($Recordset100);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">var GB_ROOT_DIR = "http://localhost/advance_php_paging/greybox/";</script>
<script type="text/javascript" src="../greybox/AJS.js"></script>
<script type="text/javascript" src="../greybox/AJS_fx.js"></script>
<script type="text/javascript" src="../greybox/gb_scripts.js"></script>
<link href="../greybox/gb_styles.css" rel="stylesheet" type="text/css" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" align="left" border="0">
  <tr align="left" bgcolor="#F4A468" >
    <td width="52%"><strong>Scheme</strong></td>
    <td width="48%"><strong>Expiry date</strong></td>
  </tr>
  <?php do { ?>
  <tr align="left" bgcolor="#F8C8B8" >
    <td style="padding:3px 1px;" ><?php echo $row_Recordset100['Scheme']; ?></td>
    <td><?php echo $row_Recordset100['formatted_date']; ?></td>
    </tr>
  <?php } while ($row_Recordset100 = mysql_fetch_assoc($Recordset100)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset90);

mysql_free_result($schemeslist);

mysql_free_result($Recordset100);
?>
