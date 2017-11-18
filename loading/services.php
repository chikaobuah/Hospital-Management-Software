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

mysql_select_db($database_localhost, $localhost);
$query_services = "SELECT * FROM service WHERE Direction = 1 ORDER BY Service";
$services = mysql_query($query_services, $localhost) or die(mysql_error());
$row_services = mysql_fetch_assoc($services);
$totalRows_services = mysql_num_rows($services);

$colname_eff = "-1";
if (isset($_GET['ef'])) {
  $colname_eff = $_GET['ef'];
}
mysql_select_db($database_localhost, $localhost);
$query_eff = sprintf("SELECT * FROM loading_effective WHERE Id = %s", GetSQLValueString($colname_eff, "int"));
$eff = mysql_query($query_eff, $localhost) or die(mysql_error());
$row_eff = mysql_fetch_assoc($eff);
$totalRows_eff = mysql_num_rows($eff);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;">
  <tr bgcolor="#b0b0b0" >
    <td class="header">Service</td>
  </tr>
  <?php do { ?>
     <?php $pro2 = $row_services['Id']; ?>
   <?php 
   
   $colname2_effective6 = $pro2;
$colname_effective6 = "-1";
if (isset($_SESSION['License'])) {
  $colname_effective6 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_effective6 = sprintf("SELECT Id FROM loading_effective WHERE License = %s AND Service_FK = %s ORDER BY Effective", GetSQLValueString($colname_effective6, "int"),GetSQLValueString($colname2_effective6, "int"));
$effective6 = mysql_query($query_effective6, $localhost) or die(mysql_error());
$row_effective6 = mysql_fetch_assoc($effective6);
$totalRows_effective6 = mysql_num_rows($effective6);

if ($totalRows_effective6 == 0){$cap = '-1';} else {
$cap = $row_effective6['Id'];}
   
   
	  if ($pro2 == $_GET['sc'])
	 {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\" class=\"tablebody\">"; ?>
           
           <td align="left">
           <?php if ($row_services['Blocks'] == 2)
		   {
			   echo "<a href=\"javascript:secondp('$_GET[ls]', '$row_services[Id]', '$cap');\">" ;
			   
			   } else {  echo "<a href=\"javascript:secondd('$_GET[ls]', '$row_services[Id]', '$cap');\">" ;}
		   
		   
		   ?>
           
      <?php echo $row_services['Service']; ?></a></td>
    </tr>
    <?php } while ($row_services = mysql_fetch_assoc($services)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($services);
?>
