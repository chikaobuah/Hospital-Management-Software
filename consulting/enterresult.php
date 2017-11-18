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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO visit_result (Enrolee, Created, Creator, `Procedure`, `Result`, Result_Date, Result_Note, upsize_ts) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Enrolee'], "int"),
                       GetSQLValueString($_POST['Created'], "date"),
                       GetSQLValueString($_POST['Creator'], "int"),
                       GetSQLValueString($_POST['Procedure'], "int"),
                       GetSQLValueString($_POST['Result'], "varchar"),
                       GetSQLValueString($_POST['Result_Date'], "date"),
                       GetSQLValueString($_POST['Result_Note'], "text"),
                       GetSQLValueString($_POST['upsize_ts'], "date"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center" width="100%">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="hidden" name="Procedure" value="<?php echo $_GET['pro']?>" size="32" />
      <input type="hidden" name="Result_Date" value="<?php echo date('Y-m-d h:m:s'); ?>" size="32" />
      <input type="hidden" name="Creator" value="<?php echo $_GET['LId']?>" size="32" />
      <input type="hidden" name="Created" value="<?php echo date('Y-m-d h:m:s'); ?>" size="32" />
      <input type="hidden" name="Enrolee" value="<?php echo $_GET['en']?>" size="32" />
      <input type="hidden" name="upsize_ts" value="<?php echo date('Y-m-d h:m:s'); ?>" size="32" /></td>
    </tr>
    <tr valign="top">
      <td nowrap="nowrap" align="right">Result:</td>
      <td>
          <textarea name="Result" id="Result" cols="45" rows="5"></textarea>
      </td>
    </tr>
    <tr valign="top">
      <td nowrap="nowrap" align="right">Result Note:</td>
      <td>
      <textarea name="Result_Note" id="Result_Note" cols="45" rows="3"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>