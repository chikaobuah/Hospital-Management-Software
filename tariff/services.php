<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();
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

$colname_providers = "-1";
if (isset($_GET['pr'])) {
  $colname_providers = $_GET['pr'];
}
mysql_select_db($database_localhost, $localhost);
$query_providers = sprintf("SELECT client_service.Id     , client_service.Client_FK     , client_service.License     , client_service.Service_FK     , service.Service  , service.Direction FROM newmed06.client_service     INNER JOIN newmed06.service          ON (client_service.Service_FK = service.Id) WHERE client_service.Client_FK = %s AND service.Blocks = 2 ORDER BY service.Service", GetSQLValueString($colname_providers, "int"));
$providers = mysql_query($query_providers, $localhost) or die(mysql_error());
$row_providers = mysql_fetch_assoc($providers);
$totalRows_providers = mysql_num_rows($providers);

$colname_clients = "-1";
if (isset($_SESSION['License'])) {
  $colname_clients = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_clients = sprintf("SELECT * FROM client WHERE Licensee_Hqs = %s AND Business_FK = 62", GetSQLValueString($colname_clients, "int"));
$clients = mysql_query($query_clients, $localhost) or die(mysql_error());
$row_clients = mysql_fetch_assoc($clients);
$totalRows_clients = mysql_num_rows($clients);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post" name="form13" id="form13">
<table width="100%" align="left" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;">
  <tr bgcolor="#b0b0b0" class="header">
    <td colspan="2" align="center"><strong>Services</strong></td>
  </tr>
  <?php do { ?>
    <?php


$colname_effective2 = "-1";
if (isset($_SESSION['License'])) {
  $colname_effective2 = $_SESSION['License'];
}
  $colname2_effective2 = $row_providers['Service_FK'];

mysql_select_db($database_localhost, $localhost);
$query_effective2 = sprintf("SELECT Id FROM client_effective WHERE License = %s AND Service_FK = %s ORDER BY Effective", GetSQLValueString($colname_effective2, "int"),GetSQLValueString($colname2_effective2, "int"));
$effective2 = mysql_query($query_effective2, $localhost) or die(mysql_error());
$row_effective2 = mysql_fetch_assoc($effective2);
$totalRows_effective2 = mysql_num_rows($effective2);


if ($totalRows_effective2 == 0){$eff = '-1';} else {
$eff = $row_effective2['Id'];}

?>

  
   <input type="hidden" name="session" id="session" value="<?php echo $_SESSION['License'] ; ?>"/>
    <input type="hidden" name="pr" id="pr" value="<?php echo $_GET['pr'] ; ?>"/>
     <input type="hidden" name="ef" id="ef" value="<?php echo $_GET['ef'] ; ?>"/>
     
      <input type="hidden" name="provider" id="provider" value="<?php echo $row_providers['Id']; ?>"/>
     <?php $pro2 = $row_providers['Service_FK']; ?>
   <?php 
	  if ($pro2 == $_GET['sc'])
	 {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\" >"; ?>
           
      <td><?php echo "<a href=\"javascript:second('$_GET[pr]', '$eff', '$row_providers[Service_FK]');\">" ?><?php echo $row_providers['Service']; ?></a></td>

    </tr></form>
    <?php } while ($row_providers = mysql_fetch_assoc($providers)); ?>
    <form action="proinsert.php" method="post" name="form12" id="form12">
    <input type="hidden" name="session" id="session" value="<?php echo $_SESSION['License'] ; ?>"/>
    <input type="hidden" name="pr" id="pr" value="<?php echo $_GET['pr'] ; ?>"/>
     <input type="hidden" name="ef" id="ef" value="<?php echo $_GET['ef'] ; ?>"/>
 
</table> </form>
</body>
</html>
<?php
mysql_free_result($providers);

mysql_free_result($clients);
?>
