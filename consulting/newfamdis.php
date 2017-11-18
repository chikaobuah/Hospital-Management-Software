
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
  $insertSQL = sprintf("INSERT INTO family_disease (Enrolee, Relationship, Disease, Enrolee_Id) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['Enrolee'], "int"),
                       GetSQLValueString($_POST['Relationship'], "int"),
                       GetSQLValueString($_POST['Disease'], "int"),
                       GetSQLValueString($_POST['Enrolee_Id'], "int"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());
}

mysql_select_db($database_localhost, $localhost);
$query_recrelationship = "SELECT * FROM relationship";
$recrelationship = mysql_query($query_recrelationship, $localhost) or die(mysql_error());
$row_recrelationship = mysql_fetch_assoc($recrelationship);
$totalRows_recrelationship = mysql_num_rows($recrelationship);

mysql_select_db($database_localhost, $localhost);
$query_recdisease = "SELECT * FROM disease";
$recdisease = mysql_query($query_recdisease, $localhost) or die(mysql_error());
$row_recdisease = mysql_fetch_assoc($recdisease);
$totalRows_recdisease = mysql_num_rows($recdisease);

session_start();
if($_SESSION["username"]=="") {
	header("location: ../index.php");
}
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
      <td nowrap="nowrap" align="right">Relationship:</td>
      <td>
        <label>
          <select name="Relationship" id="relationship">
            <?php
do {  
?>
            <option  value="<?php echo $row_recrelationship['Id']?>"> <?php echo $row_recrelationship['Relationship']?></option>
            <?php
} while ($row_recrelationship = mysql_fetch_assoc($recrelationship));
  $rows = mysql_num_rows($recrelationship);
  if($rows > 0) {
      mysql_data_seek($recrelationship, 0);
	  $row_recrelationship = mysql_fetch_assoc($recrelationship);
  }
?>
          </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Disease:</td>
      <td>
        <label>
          <select name="Disease" id="disease">
            <?php
do {  
?>
            <option value="<?php echo $row_recdisease['Id']?>"><?php echo $row_recdisease['Disease']?></option>
            <?php
} while ($row_recdisease = mysql_fetch_assoc($recdisease));
  $rows = mysql_num_rows($recdisease);
  if($rows > 0) {
      mysql_data_seek($recdisease, 0);
	  $row_recdisease = mysql_fetch_assoc($recdisease);
  }
?>
          </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"></td>
      <td><input type="hidden" name="Enrolee_Id" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"></td>
      <td><input type="hidden" name="Enrolee" value="<?php echo $_GET['en']; ?>" size="32" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($recrelationship);

mysql_free_result($recdisease);
?>
