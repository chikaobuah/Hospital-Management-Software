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

$colname2_results = "-1";
if (isset($_GET['en'])) {
  $colname2_results = $_GET['en'];
}
$colname_results = "-1";
if (isset($_GET['id2'])) {
  $colname_results = $_GET['id2'];
}
mysql_select_db($database_localhost, $localhost);
$query_results = sprintf("SELECT procedure.Procedure  ,  DATE_FORMAT(visit_result.Created, '%%D %%b %%Y') AS formatted_date   , visit_result.Enrolee     , visit_result.Created     , visit_result.Creator     , visit_result.Result     , visit_result.Result_Date     , visit_result.Result_Note     , visit_result.upsize_ts     , visit_result.Visit FROM newmed06.visit_result     INNER JOIN newmed06.procedure          ON (visit_result.Procedure = procedure.Id) WHERE Visit  LIKE %s AND Enrolee = %s", GetSQLValueString("%" . $colname_results . "%", "date"),GetSQLValueString($colname2_results, "int"));
$results = mysql_query($query_results, $localhost) or die(mysql_error());
$row_results = mysql_fetch_assoc($results);
$totalRows_results = mysql_num_rows($results);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%">
  <tr>
    <td width="15%" align="left"><strong>Created</strong></td>
    <td width="39%" align="left"><strong>Procedure</strong></td>
    <td width="21%" align="left"><strong>Result</strong></td>
    <td width="25%" align="left"><strong>Result Note</strong></td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_results['formatted_date']; ?></td>
      <td><?php echo $row_results['Procedure']; ?></td>
      <td><?php echo $row_results['Result']; ?></td>
      <td><?php echo $row_results['Result_Note']; ?></td>
    </tr>
    <?php } while ($row_results = mysql_fetch_assoc($results)); ?>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($results);
?>
