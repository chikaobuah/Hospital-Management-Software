<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();
if($_SESSION["username"]=="") {
	header("location: ../index.php");
}
?>
<?php
$Trans = $_POST['email'];
$VisitID = $_POST['VisitID'];
$Principal = $_POST['Principal']; 
$Scheme = $_POST['Scheme']; 
$procedurecover = $_POST['procedurecover']; 
$servicecover = $_POST['servicecover']; 
$drugcover = $_POST['drugcover']; 
$Redirect = $_POST['Redirect'];
$Enrolee = $_POST['Enrolee'];
$User = $_POST['User'];?>

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
  $insertSQL = sprintf("INSERT INTO visit_procedure (Enrolee, Created, Creator, Visit, `Procedure`, Provider, Appointment, Specific_Request, Specimen, Status) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Enrolee'], "int"),
                       GetSQLValueString($_POST['Created'], "date"),
                       GetSQLValueString($_POST['Creator'], "int"),
                       GetSQLValueString($_POST['Visit'], "date"),
                       GetSQLValueString($_POST['Procedure'], "int"),
                       GetSQLValueString($_POST['Provider'], "int"),
                       GetSQLValueString($_POST['Appointment'], "date"),
                       GetSQLValueString($_POST['Specific_Request'], "text"),
                       GetSQLValueString($_POST['Specimen'], "int"),
                       GetSQLValueString($_POST['Status'], "int"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());
 
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO `transaction` (Licensee, LId, Created, Creator, Scheme, Principal, Enrolee, Visit, Service, Detail, Quantity, Unit_Price, Total_Price, Liability, upsize_ts, Status, Transaction_code) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Licensee'], "int"),
                       GetSQLValueString($_POST['LId'], "int"),
                       GetSQLValueString($_POST['Created'], "date"),
                       GetSQLValueString($_POST['Creator'], "int"),
                       GetSQLValueString($_POST['Scheme'], "int"),
                       GetSQLValueString($_POST['Principal'], "int"),
                       GetSQLValueString($_POST['Enrolee'], "int"),
                       GetSQLValueString($_POST['Visit'], "date"),
                       GetSQLValueString($_POST['Service'], "int"),
                       GetSQLValueString($_POST['Detail'], "int"),
                       GetSQLValueString($_POST['Quantity'], "double"),
                       GetSQLValueString($_POST['Unit_Price'], "double"),
                       GetSQLValueString($_POST['Total_Price'], "double"),
                       GetSQLValueString($_POST['Liability'], "double"),
                       GetSQLValueString($_POST['upsize_ts'], "date"),
                       GetSQLValueString($_POST['Status2'], "int"),
                       GetSQLValueString($_POST['Transaction_code'], "text"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());
  
   $insertGoTo = "inves2.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
  
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['username'])) {
  $colname_Recordset1 = $_SESSION['username'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = sprintf("SELECT LId FROM `user` WHERE User_Id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_localhost, $localhost);
$query_procedure = "SELECT Id, `Procedure` FROM `procedure`";
$procedure = mysql_query($query_procedure, $localhost) or die(mysql_error());
$row_procedure = mysql_fetch_assoc($procedure);
$totalRows_procedure = mysql_num_rows($procedure);

mysql_select_db($database_localhost, $localhost);
$query_Provider = "SELECT LId, Client FROM client";
$Provider = mysql_query($query_Provider, $localhost) or die(mysql_error());
$row_Provider = mysql_fetch_assoc($Provider);
$totalRows_Provider = mysql_num_rows($Provider);

mysql_select_db($database_localhost, $localhost);
$query_specimen = "SELECT * FROM specimen";
$specimen = mysql_query($query_specimen, $localhost) or die(mysql_error());
$row_specimen = mysql_fetch_assoc($specimen);
$totalRows_specimen = mysql_num_rows($specimen);




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>&nbsp;</p>


<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td width="104" align="right" nowrap="nowrap">Procedure:</td>
      <td width="257">
        <label>
          <select name="Procedure" id="Procedure" style="width:100%">
            <?php
do {  
?>
            <option value="<?php echo $row_procedure['Id']?>"><?php echo $row_procedure['Procedure']?></option>
            <?php
} while ($row_procedure = mysql_fetch_assoc($procedure));
  $rows = mysql_num_rows($procedure);
  if($rows > 0) {
      mysql_data_seek($procedure, 0);
	  $row_procedure = mysql_fetch_assoc($procedure);
  }
?>
          </select>
      </label></td>
      <td width="25"><input type="hidden" name="Enrolee" value="<?php echo $Enrolee; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Provider:</td>
      <td>
        <label>
          <select name="Provider" id="Provider" style="width:100%">
            <?php
do {  
?>
            <option value="<?php echo $row_Provider['LId']?>"><?php echo $row_Provider['Client']?></option>
            <?php
} while ($row_Provider = mysql_fetch_assoc($Provider));
  $rows = mysql_num_rows($Provider);
  if($rows > 0) {
      mysql_data_seek($Provider, 0);
	  $row_Provider = mysql_fetch_assoc($Provider);
  }
?>
          </select>
      </label></td>
      <td><input type="hidden" name="Created" value="<?php echo date('Y-m-d h:m:s'); ?>" size="32" /></td>
    </tr>
    <tr valign="top">
      <td nowrap="nowrap" align="right">Specific Request:</td>
      <td>
        <label>
          <textarea name="Specific_Request" id="Specific_Request" cols="40" rows="5"></textarea>
      </label></td>
      <td><input type="hidden" name="Creator2" value="<?php echo $User; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Specimen:</td>
      <td>
        <label>
          <select name="Specimen" id="Specimen" style="width:100%">
            <?php
do {  
?>
            <option value="<?php echo $row_specimen['Id']?>"><?php echo $row_specimen['Specimen']?></option>
            <?php
} while ($row_specimen = mysql_fetch_assoc($specimen));
  $rows = mysql_num_rows($specimen);
  if($rows > 0) {
      mysql_data_seek($specimen, 0);
	  $row_specimen = mysql_fetch_assoc($specimen);
  }
?>
          </select>
      </label></td>
      <td><input type="hidden" name="Creator" value="<?php echo $User; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><input type="hidden" name="Appointment" value="" size="32" /></td>
      <td><input type="hidden" name="Status" value="1" size="32" /></td>
      <td><input type="hidden" name="Visit" value="<?php echo $VisitID; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><input type="hidden" name="LId" value="" size="32" /></td>
      <td><input type="hidden" name="Licensee" value="<?php echo $_SESSION['License']; ?>" size="32" /></td>
      <td><input type="hidden" name="Created2" value="<?php echo date('Y-m-d h:m:s'); ?>" size="32" /></td>
      <td><input type="hidden" name="Creator3" value="<?php echo $User; ?>" size="32" /></td>
      <td><input type="hidden" name="Scheme" value="<?php echo $Scheme; ?>" size="32" /></td>
      <td><input type="hidden" name="Principal" value="<?php echo $Principal; ?>" size="32" /></td>
      <td><input type="hidden" name="Enrolee2" value="<?php echo $Enrolee; ?>" size="32" /></td>
      <td><input type="hidden" name="Visit2" value="<?php echo $VisitID; ?>" size="32" /></td>
      <td><input type="hidden" name="Service" value="" size="32" /></td>
      <td><input type="hidden" name="Detail" value="3" size="32" /></td>
      <td><input type="hidden" name="Quantity" value="" size="32" /></td>
      <td><input type="hidden" name="Unit_Price" value="" size="32" /></td>
      <td><input type="hidden" name="Total_Price" value="" size="32" /></td>
      <td><input type="hidden" name="Liability" value="" size="32" /></td>
      <td><input type="hidden" name="upsize_ts" value="<?php echo date('Y-m-d h:m:s'); ?>" size="32" /></td>
      <td><input type="hidden" name="Status2" value="7" size="32" /></td>
      <td><input type="hidden" name="Transaction_code" value="<?php echo $Trans; ?>" size="32" /></td>
    </tr>
    
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($procedure);

mysql_free_result($Provider);

mysql_free_result($specimen);
?>
