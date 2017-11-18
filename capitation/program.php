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
$query_pro = "SELECT * FROM program ORDER BY Program";
$pro = mysql_query($query_pro, $localhost) or die(mysql_error());
$row_pro = mysql_fetch_assoc($pro);
$totalRows_pro = mysql_num_rows($pro);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#FFF; border-collapse:collapse;">
  <tr bgcolor="#b0b0b0" class="header">
    <td align="center">Program</td>
  </tr>
  
  
  <?php do { ?>
    <tr class="tablebody">
      <?php $pro2 = $row_pro['Service_FK']; ?>
      <?php 
	  if ($pro2 == $_GET['pl'])
	 {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<td align=\"left\" bgcolor=\"$color\">"; ?>
           
           <?php 
/**********preload checking**************/
$session = $_SESSION['License'];

mysql_select_db($database_localhost, $localhost);
$query_proload = "SELECT  client.LId FROM newmed06.client_service     INNER JOIN newmed06.service          ON (client_service.Service_FK = service.Id)     INNER JOIN newmed06.client          ON (client_service.Client_FK = client.LId) WHERE client_service.Service_FK = $pro2 AND  Licensee_Hqs = $session ORDER BY client.Short LIMIT 1";
$proload = mysql_query($query_proload, $localhost) or die(mysql_error());
$row_proload = mysql_fetch_assoc($proload);
$totalRows_proload = mysql_num_rows($proload);


$co = "-1";
if ($totalRows_proload>0) {
  $co = $row_proload['LId'];
}


mysql_select_db($database_localhost, $localhost);
$query_schload = "SELECT scheme.LId FROM     newmed06.program     INNER JOIN newmed06.service          ON (program.Service_FK = service.Id)     INNER JOIN newmed06.scheme          ON (scheme.Program_FK = program.Id)     INNER JOIN newmed06.client          ON (scheme.HMO_FK = client.LId) WHERE Licensee = $session AND service.Id = $pro2 AND scheme.Company_FK = $co ORDER BY scheme.Created LIMIT 1";
$schload = mysql_query($query_schload, $localhost) or die(mysql_error());
$row_schload = mysql_fetch_assoc($schload);
$totalRows_schload = mysql_num_rows($schload);

$sc = "-1";
if ($totalRows_schload>0) {
  $sc = $row_schload['LId'];
}

mysql_select_db($database_localhost, $localhost);
$query_idpay = "SELECT Id FROM scheme_payment WHERE Scheme_FK = $sc ORDER BY Start_date LIMIT 1";
$idpay = mysql_query($query_idpay, $localhost) or die(mysql_error());
$row_idpay = mysql_fetch_assoc($idpay);
$totalRows_idpay = mysql_num_rows($idpay);

$id = "-1";
if ($totalRows_idpay>0) {
  $id = $row_idpay['Id'];
}
?>
           
          <?php echo "<a href=\"javascript:first('$co','$pro2','$sc','$id');\">";
            echo $row_pro['Program']; ?></a></td>
    </tr>
    <?php } while ($row_pro = mysql_fetch_assoc($pro)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($pro);
?>
