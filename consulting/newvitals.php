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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO visit_vital (Enrolee, Created, Creator, Visit, Vital_FK, Reading) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Enrolee'], "int"),
                       GetSQLValueString($_POST['Created'], "date"),
                       GetSQLValueString($_POST['Creator'], "int"),
                       GetSQLValueString($_POST['Visit'], "date"),
                       GetSQLValueString($_POST['Vital_FK'], "int"),
                       GetSQLValueString($_POST['Reading'], "int"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

  $insertGoTo = "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_recuser = "-1";
if (isset($_SESSION['username'])) {
  $colname_recuser = $_SESSION['username'];
}
mysql_select_db($database_localhost, $localhost);
$query_recuser = sprintf("SELECT LId FROM `user` WHERE User_Id = %s", GetSQLValueString($colname_recuser, "text"));
$recuser = mysql_query($query_recuser, $localhost) or die(mysql_error());
$row_recuser = mysql_fetch_assoc($recuser);
$totalRows_recuser = mysql_num_rows($recuser);

mysql_select_db($database_localhost, $localhost);
$query_recvitalslist = "SELECT * FROM vital";
$recvitalslist = mysql_query($query_recvitalslist, $localhost) or die(mysql_error());
$row_recvitalslist = mysql_fetch_assoc($recvitalslist);
$totalRows_recvitalslist = mysql_num_rows($recvitalslist);
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
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Vital:</td>
      <td><label>
        <select name="Vital_FK" id="vitals">
          <?php
do {  
?>
          <option value="<?php echo $row_recvitalslist['Id']?>"><?php echo $row_recvitalslist['Vital']?></option>
          <?php
} while ($row_recvitalslist = mysql_fetch_assoc($recvitalslist));
  $rows = mysql_num_rows($recvitalslist);
  if($rows > 0) {
      mysql_data_seek($recvitalslist, 0);
	  $row_recvitalslist = mysql_fetch_assoc($recvitalslist);
  }
?>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Reading:</td>
      <td><input type="text" name="Reading" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Add new" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="hidden" name="Enrolee" value="<?php echo $_GET['en']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="hidden" name="Created" value="<?php echo date('Y-m-d h:m:s'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="hidden" name="Creator" value="<?php echo $row_recuser['LId']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="hidden" name="Visit" value="<?php echo $_GET['id']; ?>" size="32" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($recuser);

mysql_free_result($recvitalslist);
?>
