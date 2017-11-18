<?php require_once('../Connections/localhost.php'); ?>
 <?php
session_start();
if($_SESSION["username"]=="") {
	header("location: ../index.php");
}
?>
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

mysql_select_db($database_localhost, $localhost);
$query_drug_type = "SELECT drug_type.type FROM drug_type";
$drug_type = mysql_query($query_drug_type, $localhost) or die(mysql_error());
$row_drug_type = mysql_fetch_assoc($drug_type);
$totalRows_drug_type = mysql_num_rows($drug_type);

mysql_select_db($database_localhost, $localhost);
$query_drug = "SELECT drug.Drug FROM drug";
$drug = mysql_query($query_drug, $localhost) or die(mysql_error());
$row_drug = mysql_fetch_assoc($drug);
$totalRows_drug = mysql_num_rows($drug);

mysql_select_db($database_localhost, $localhost);
$query_dosage = "SELECT dosage.Dosage FROM dosage";
$dosage = mysql_query($query_dosage, $localhost) or die(mysql_error());
$row_dosage = mysql_fetch_assoc($dosage);
$totalRows_dosage = mysql_num_rows($dosage);

mysql_select_db($database_localhost, $localhost);
$query_usage = "SELECT style.Style FROM style";
$usage = mysql_query($query_usage, $localhost) or die(mysql_error());
$row_usage = mysql_fetch_assoc($usage);
$totalRows_usage = mysql_num_rows($usage);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/menu.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
</head>

<body>
<table width="565" border="0" align="center">
  <tr>
    <td width="103"><form id="form24" name="form14" method="post" action="">
      <label>Type
        <select name="select6" id="select6" size="1" style="width:100%">
          <?php
do {  
?>
          <option value="<?php echo $row_drug_type['type']?>"><?php echo $row_drug_type['type']?></option>
          <?php
} while ($row_drug_type = mysql_fetch_assoc($drug_type));
  $rows = mysql_num_rows($drug_type);
  if($rows > 0) {
      mysql_data_seek($drug_type, 0);
	  $row_drug_type = mysql_fetch_assoc($drug_type);
  }
?>
        </select>
      </label>
    </form></td>
    <td width="113">&nbsp;</td>
    <td width="107">&nbsp;</td>
    <td width="107">&nbsp;</td>
    <td width="113">&nbsp;</td>
  </tr>
  <tr>
    <td><form id="form10" name="form14" method="post" action="">
      <label>Drug
        <select name="select2" id="select2" size="1" style="width:100%">
          <?php
do {  
?>
          <option value="<?php echo $row_drug['Drug']?>"><?php echo $row_drug['Drug']?></option>
          <?php
} while ($row_drug = mysql_fetch_assoc($drug));
  $rows = mysql_num_rows($drug);
  if($rows > 0) {
      mysql_data_seek($drug, 0);
	  $row_drug = mysql_fetch_assoc($drug);
  }
?>
        </select>
      </label>
    </form></td>
    <td><form id="form12" name="form14" method="post" action="">
      <label>Dosage
        <select name="select3" id="select3" size="1" style="width:100%">
          <?php
do {  
?>
          <option value="<?php echo $row_dosage['Dosage']?>"><?php echo $row_dosage['Dosage']?></option>
          <?php
} while ($row_dosage = mysql_fetch_assoc($dosage));
  $rows = mysql_num_rows($dosage);
  if($rows > 0) {
      mysql_data_seek($dosage, 0);
	  $row_dosage = mysql_fetch_assoc($dosage);
  }
?>
        </select>
      </label>
    </form></td>
    <td><form id="form13" name="form14" method="post" action="">
      <label>Usage
        <select name="select4" id="select4" size="1" style="width:100%">
          <?php
do {  
?>
          <option value="<?php echo $row_usage['Style']?>"><?php echo $row_usage['Style']?></option>
          <?php
} while ($row_usage = mysql_fetch_assoc($usage));
  $rows = mysql_num_rows($usage);
  if($rows > 0) {
      mysql_data_seek($usage, 0);
	  $row_usage = mysql_fetch_assoc($usage);
  }
?>
        </select>
      </label>
    </form></td>
    <td><form id="form17" name="form14" method="post" action="">
      <label>Duration
        <input type="text" name="patid" id="patid" style="width:100%"/>
      </label>
    </form></td>
    <td><form id="form3" name="form1" method="post">&nbsp;
      <input type="button" name="see history7" id="see history7" value="Prescribe" style="width:100%" />
    </form></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($drug_type);

mysql_free_result($drug);

mysql_free_result($dosage);

mysql_free_result($usage);
?>
