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
$query_recdrug = "SELECT Id, Drug, Blocks FROM drug";
$recdrug = mysql_query($query_recdrug, $localhost) or die(mysql_error());
$row_recdrug = mysql_fetch_assoc($recdrug);
$totalRows_recdrug = mysql_num_rows($recdrug);

$colname_recuser = "-1";
if (isset($_SESSION['username'])) {
  $colname_recuser = $_SESSION['username'];
}
mysql_select_db($database_localhost, $localhost);
$query_recuser = sprintf("SELECT LId, User_Id FROM `user` WHERE User_Id = %s", GetSQLValueString($colname_recuser, "text"));
$recuser = mysql_query($query_recuser, $localhost) or die(mysql_error());
$row_recuser = mysql_fetch_assoc($recuser);
$totalRows_recuser = mysql_num_rows($recuser);

$colname_allergy = "-1";
if (isset($_GET['en'])) {
  $colname_allergy = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_allergy = sprintf("SELECT drug.Drug , enrolee_allergy.Status, enrolee_allergy.id FROM newmed06.enrolee_allergy     INNER JOIN newmed06.enrolee          ON (enrolee_allergy.Enrolee = enrolee.LId)     INNER JOIN newmed06.drug          ON (enrolee_allergy.Drug = drug.Id) WHERE enrolee.LId = %s", GetSQLValueString($colname_allergy, "int"));
$allergy = mysql_query($query_allergy, $localhost) or die(mysql_error());
$row_allergy = mysql_fetch_assoc($allergy);
$totalRows_allergy = mysql_num_rows($allergy);

mysql_select_db($database_localhost, $localhost);
$query_services2 = "SELECT         service.Id 	, service.Service FROM     newmed06.drug     INNER JOIN newmed06.service          ON (drug.Service_direction_FK = service.Id) GROUP BY service.Service";
$services2 = mysql_query($query_services2, $localhost) or die(mysql_error());
$row_services2 = mysql_fetch_assoc($services2);
$totalRows_services2 = mysql_num_rows($services2);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/menu.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<script language="javascript" type="text/javascript" src="../common/consultingAX.js"></script>
</head>

<body>
<form method="post" name="form15" id="form15">
 <input type="hidden" name="pr" id="pr" value="<?php echo $_GET['pr']; ?>" style="width:100%"/>
 <input type="hidden" name="en" id="en" value="<?php echo $_GET['en']; ?>" style="width:100%"/>
 <input type="hidden" name="sc" id="sc" value="<?php echo $_GET['sc']; ?>" style="width:100%"/>
 <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" style="width:100%"/>
 <input type="hidden" name="st" id="st" value="<?php echo $_GET['st']; ?>" style="width:100%"/>
 <input type="hidden" name="cap" id="cap" value="<?php echo $_GET['cap']; ?>" style="width:100%"/>
 <input type="hidden" name="lc2" id="lc2" value="<?php echo $_GET['lc2']; ?>" style="width:100%"/>
 <input type="hidden" name="lc" id="lc" value="<?php echo $_GET['lc']; ?>" style="width:100%"/>
 <input type="hidden" name="id2" id="id2" value="<?php echo $_GET['id2']; ?>" style="width:100%"/>
      
<div id="AllAllergy"></div>
</form>
</body>
</html>
<?php
mysql_free_result($recdrug);

mysql_free_result($recuser);

mysql_free_result($allergy);

mysql_free_result($services2);
?>
