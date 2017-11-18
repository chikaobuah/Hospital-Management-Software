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
$query_services = "SELECT * FROM service WHERE Direction = 1 ORDER BY Service";
$services = mysql_query($query_services, $localhost) or die(mysql_error());
$row_services = mysql_fetch_assoc($services);
$totalRows_services = mysql_num_rows($services);
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
	  if ($pro2 == $_GET['sc'])
	  {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
           
      <td align="left"><?php $ef = $_GET['ef']; $li = $_GET['li']; $sc= $row_services['Id']; 
	  
	  
	  if ($row_services['Blocks'] == 2) {
	  
	  echo "<a href=\"javascript:thirdb('$ef', '$li', '$sc');\">";} else {echo "<a href=\"javascript:thirda('$ef', '$li', '$sc');\">";
		  
		  
		  } ?>
           <?php echo $row_services['Service']; ?></a></td>
    </tr>
    <?php } while ($row_services = mysql_fetch_assoc($services)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($services);
?>
