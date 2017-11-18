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

mysql_select_db($database_localhost, $localhost);
$query_disease = "SELECT disease.Disease FROM disease";
$disease = mysql_query($query_disease, $localhost) or die(mysql_error());
$row_disease = mysql_fetch_assoc($disease);
$totalRows_disease = mysql_num_rows($disease);

$query_diesease = "SELECT disease.Disease FROM disease";
$diesease = mysql_query($query_diesease, $localhost) or die(mysql_error());
$row_diesease = mysql_fetch_assoc($diesease);
$totalRows_diesease = mysql_num_rows($diesease);
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
<table width="260" border="0" align="center">
  <tr>
    <td width="58">Diagnosis</td>
    <td width="120"><form id="form14" name="form15" method="post" action="">
      <label>
        <select name="select" id="select" size="1" style="width:100%">
          <?php
do {  
?>
          <option value="<?php echo $row_disease['Disease']?>"><?php echo $row_disease['Disease']?></option>
          <?php
} while ($row_disease = mysql_fetch_assoc($disease));
  $rows = mysql_num_rows($disease);
  if($rows > 0) {
      mysql_data_seek($disease, 0);
	  $row_disease = mysql_fetch_assoc($disease);
  }
?>
        </select>
      </label>
    </form></td>
    <td width="68"><form id="form23" name="form1" method="post">
      <input type="button" name="see history4" id="see history4" value="Diagnose" />
    </form></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($disease);
?>
