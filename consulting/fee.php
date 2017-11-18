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

$colname_Recordset1 = "-1";
if (isset($_SESSION['username'])) {
  $colname_Recordset1 = $_SESSION['username'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = sprintf("SELECT LId FROM `user` WHERE User_Id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {
    alert(alerttxt);return false;
    }
  else
    {
    return true;
    }
  }
}

function validate_form(thisform)
{
with (thisform)
  {
  if (validate_required(email,"The transation code must be entered!")==false)
  {email.focus();return false;}
  }
}
</script>
</head>

<body>
<form action="<?php echo $_GET['re']; ?>" onsubmit="return validate_form(this)" method="post">
Transaction code: <input type="text" name="email" size="30">
<input type="submit" value="Submit">
<input type="hidden" name="VisitID" value="<?php echo $_GET['id']; ?>" size="32" />
<input type="hidden" name="Principal" value="<?php echo $_GET['pr']; ?>" size="32" />
<input type="hidden" name="Scheme" value="<?php echo $_GET['sc']; ?>" size="32" />
<input type="hidden" name="procedurecover" value="<?php echo $_GET['prc']; ?>" size="32" />
<input type="hidden" name="servicecover" value="<?php echo  $_GET['src']; ?>" size="32" />
<input type="hidden" name="drugcover" value="<?php echo  $_GET['drc']; ?>" size="32" />
<input type="hidden" name="Redirect" value="<?php echo  $_GET['re']; ?>" size="32" />
<input type="hidden" name="Enrolee" value="<?php echo  $_GET['en']; ?>" size="32" />
<input type="hidden" name="User" value="<?php echo $_GET['ur']; ?>" size="32" />
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
