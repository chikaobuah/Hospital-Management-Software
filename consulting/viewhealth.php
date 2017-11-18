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


$colname_enrolhea = "-1";
if (isset($_GET['en'])) {
  $colname_enrolhea = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_enrolhea = sprintf("SELECT disease.Disease     , family_disease.Enrolee     , family_disease.Relationship  AS rel,  relationship.Relationship FROM newmed06.family_disease          INNER JOIN newmed06.disease           ON (family_disease.Disease = disease.Id)      INNER JOIN newmed06.relationship           ON (family_disease.Relationship = relationship.Id) WHERE family_disease.Enrolee = %s AND family_disease.Status = 1", GetSQLValueString($colname_enrolhea, "int"));
$enrolhea = mysql_query($query_enrolhea, $localhost) or die(mysql_error());
$row_enrolhea = mysql_fetch_assoc($enrolhea);
$totalRows_enrolhea = mysql_num_rows($enrolhea);
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
    <td width="23%">&nbsp;</td>
    <td width="77%" align="left"><strong>Disease</strong></td>
  </tr>
  <?php do { ?>
    <tr>
      <td style="background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;" align="left"><?php echo $row_enrolhea['Relationship']; ?></td>
      <td style="background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;"  align="left">&nbsp;&nbsp;<?php echo $row_enrolhea['Disease']; ?></td>
    </tr>
    <?php } while ($row_enrolhea = mysql_fetch_assoc($enrolhea)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($enrolhea);
?>
