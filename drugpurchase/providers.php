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
if (isset($_SESSION['License'])) {
  $colname_providers = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_providers = sprintf("SELECT client.Client     , client.Short     , client.Business_FK     , service.Direction     , client_service.License     , client.LId     , client_service.Id 
FROM newmed06.client_service     
INNER JOIN newmed06.client          ON (client_service.Client_FK = client.LId)     
INNER JOIN newmed06.service          ON (client_service.Service_FK = service.Id) 
	 WHERE client.License = %s AND service.Direction = 32 GROUP BY client.LId ORDER BY client.Short", GetSQLValueString($colname_providers, "int"));
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
<table width="100%" bgcolor="#e5e5e5"  style="border:thin; border-color:#000; border-collapse:collapse;">
  <tr bgcolor="#b0b0b0" >
    <td colspan="2" align="center" class="header">Stock Suppliers</td>
  </tr>
  <?php do { ?>
     <?php $pro2 = $row_providers['LId']; ?>
   <?php 
   $colname_receipts2 = "-1";
if (isset($_SESSION['License'])) {
  $colname_receipts2 = $_SESSION['License'];
}

mysql_select_db($database_localhost, $localhost);
$query_receipts2 = sprintf("SELECT LId FROM purchase WHERE Licensee_Hqs = %s AND Client_FK = $pro2 ORDER BY Created LIMIT 1", GetSQLValueString($colname_receipts2, "int"));
$receipts2 = mysql_query($query_receipts2, $localhost) or die(mysql_error());
$row_receipts2 = mysql_fetch_assoc($receipts2);
$totalRows_receipts2 = mysql_num_rows($receipts2);

$rc = "-1";
if ($totalRows_receipts2>0) {
  $rc = $row_receipts2['LId'];
}

	  if ($pro2 == $_GET['pr'])
	   {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\" class=\"tablebody\">"; ?>
           
      <td><?php echo "<a href=\"javascript:first('$pro2','$rc');\">";?><?php echo $row_providers['Short']; ?></a></td>

    </tr>
    <?php } while ($row_providers = mysql_fetch_assoc($providers)); ?>
    <form action="proinsert.php" method="post" name="form12" id="form12">
    <input type="hidden" name="session" id="session" value="<?php echo $_SESSION['License'] ; ?>"/>
    <input type="hidden" name="pr" id="pr" value="<?php echo $_GET['pr'] ; ?>"/>
     <input type="hidden" name="rc" id="rc" value="<?php echo $_GET['rc'] ; ?>"/>
  </form>
</table>
</body>
</html>
<?php
mysql_free_result($providers);

mysql_free_result($clients);
?>
