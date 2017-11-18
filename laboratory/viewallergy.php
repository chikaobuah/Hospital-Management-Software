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

$colname_enrolaly = "-1";
if (isset($_GET['en'])) {
  $colname_enrolaly = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_enrolaly = sprintf("SELECT enrolee_allergy.id     , drug.Drug , drug.Short   , enrolee_allergy.Drug AS drug_FK     , enrolee_allergy.Enrolee     , enrolee_allergy.Status     , enrolee.First_Name     , enrolee.Other_Name     , enrolee.Surname FROM newmed06.enrolee_allergy     INNER JOIN newmed06.enrolee          ON (enrolee_allergy.Enrolee = enrolee.LId)     INNER JOIN newmed06.drug          ON (enrolee_allergy.Drug = drug.Id) WHERE Enrolee = %s AND enrolee_allergy.Status = 1", GetSQLValueString($colname_enrolaly, "int"));
$enrolaly = mysql_query($query_enrolaly, $localhost) or die(mysql_error());
$row_enrolaly = mysql_fetch_assoc($enrolaly);
$totalRows_enrolaly = mysql_num_rows($enrolaly);
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
    <td><strong>Drug</strong></td>
  </tr>
  <?php do { ?>
    <tr>
      <td width="90%" align="left" style="background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;"><?php echo $row_enrolaly['Short']; ?></td>
    </tr>
    <?php } while ($row_enrolaly = mysql_fetch_assoc($enrolaly)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($enrolaly);
?>
