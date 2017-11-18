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

$colname_visit_pre = "-1";
if (isset($_GET['en'])) {
  $colname_visit_pre = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_visit_pre = sprintf("SELECT COUNT(Visit) as count FROM newmed06.visit_prescription WHERE Enrolee = %s AND `Status`= 1", GetSQLValueString($colname_visit_pre, "int"));
$visit_pre = mysql_query($query_visit_pre, $localhost) or die(mysql_error());
$row_visit_pre = mysql_fetch_assoc($visit_pre);
$totalRows_visit_pre = mysql_num_rows($visit_pre);

$colname_visit_pro = "-1";
if (isset($_GET['en'])) {
  $colname_visit_pro = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_visit_pro = sprintf("SELECT COUNT(Visit) as count FROM newmed06.visit_procedure WHERE Enrolee = %s AND `Status`= 1", GetSQLValueString($colname_visit_pro, "int"));
$visit_pro = mysql_query($query_visit_pro, $localhost) or die(mysql_error());
$row_visit_pro = mysql_fetch_assoc($visit_pro);
$totalRows_visit_pro = mysql_num_rows($visit_pro);

$colname_visit = "-1";
if (isset($_GET['en'])) {
  $colname_visit = $_GET['en'];
}
$colname2_visit = "-1";
if (isset($_GET['id2'])) {
  $colname2_visit = $_GET['id2'];
}
mysql_select_db($database_localhost, $localhost);
$query_visit = sprintf("SELECT  service.Service     ,  visit.Enrolee     ,  visit.Created     ,  visit.Creator     ,  visit.Service AS service_id     ,  visit.LMP     ,  visit.Ticket_No     ,  visit.Appointed     ,  visit.Loading     ,  visit.upsize_ts     ,  visit.Status     ,  visit.Principal     ,  visit.Scheme  FROM newmed06.visit      INNER JOIN newmed06.service           ON (visit.Service = service.Id)  WHERE Enrolee = %s AND Created LIKE %s", GetSQLValueString($colname_visit, "int"),GetSQLValueString("%" . $colname2_visit . "%", "date"));
$visit = mysql_query($query_visit, $localhost) or die(mysql_error());
$row_visit = mysql_fetch_assoc($visit);
$totalRows_visit = mysql_num_rows($visit);

$colname_transaction = "-1";
if (isset($_GET['en'])) {
  $colname_transaction = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_transaction = sprintf("SELECT COUNT(LId) as count FROM newmed06.transaction WHERE Enrolee = %s AND `Status`= 1", GetSQLValueString($colname_transaction, "int"));
$transaction = mysql_query($query_transaction, $localhost) or die(mysql_error());
$row_transaction = mysql_fetch_assoc($transaction);
$totalRows_transaction = mysql_num_rows($transaction);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" >
 <tr>
<td height="22"  align="center" valign="top" bgcolor="#999999"><strong >Clinic</strong></td> </tr>
<tr>
    <td align="left"><?php echo $row_visit['Service'];?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($visit);

mysql_free_result($transaction);

mysql_free_result($visit_pre);

mysql_free_result($visit_pro);
?>
