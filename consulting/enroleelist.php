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

$colname_Recordset22 = "-1";
if (isset($_GET['sc'])) {
  $colname_Recordset22 = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset22 = sprintf("SELECT     enrolee_scheme.Enrolee     , enrolee.Surname     , enrolee.First_Name     , enrolee.Other_Name FROM     newmed06.enrolee_scheme     INNER JOIN newmed06.enrolee          ON (enrolee_scheme.Enrolee = enrolee.LId) WHERE Scheme = %s", GetSQLValueString($colname_Recordset22, "int"));
$Recordset22 = mysql_query($query_Recordset22, $localhost) or die(mysql_error());
$row_Recordset22 = mysql_fetch_assoc($Recordset22);
$colname_Recordset22 = "-1";
if (isset($_GET['sc'])) {
  $colname_Recordset22 = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset22 = sprintf("SELECT COUNT(*) AS 'count' , enrolee_scheme.Enrolee     , enrolee.Surname     , enrolee.First_Name     , enrolee.Other_Name FROM     newmed06.enrolee_scheme     INNER JOIN newmed06.enrolee          ON (enrolee_scheme.Enrolee = enrolee.LId) WHERE Scheme = %s", GetSQLValueString($colname_Recordset22, "int"));
$Recordset22 = mysql_query($query_Recordset22, $localhost) or die(mysql_error());
$row_Recordset22 = mysql_fetch_assoc($Recordset22);
$totalRows_Recordset22 = mysql_num_rows($Recordset22);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0">
<tr>
      <td bgcolor="#C6DBFB" ><?php echo $row_Recordset22['count']; ?>&nbsp;Enrolee(s) Registered </td>
    </tr>
  <?php do { ?>
    <tr>
      <td align="left" bgcolor="#DFFCFF"><?php echo $row_Recordset22['Surname']; ?>&nbsp;<?php echo $row_Recordset22['First_Name']; ?>&nbsp;<?php echo $row_Recordset22['Other_Name']; ?>&nbsp;</td>
    </tr>
    <?php } while ($row_Recordset22 = mysql_fetch_assoc($Recordset22)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset22);
?>
