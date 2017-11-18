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

$colname_recpro = "-1";
if (isset($_GET['pl'])) {
  $colname_recpro = $_GET['pl'];
}
mysql_select_db($database_localhost, $localhost);
$query_recpro = sprintf("SELECT * FROM program WHERE Id = %s", GetSQLValueString($colname_recpro, "int"));
$recpro = mysql_query($query_recpro, $localhost) or die(mysql_error());
$row_recpro = mysql_fetch_assoc($recpro);
$totalRows_recpro = mysql_num_rows($recpro);

$colname_company = "-1";
if (isset($_SESSION['License'])) {
  $colname_company = $_SESSION['License'];
}
$colname2_company = "1";
if (isset($_GET['pl'])) {
  $colname2_company = $_GET['pl'];
}
mysql_select_db($database_localhost, $localhost);
$query_company = " SELECT  client.LId, client.Client     , client.Short     , client_service.Service_FK FROM newmed06.client_service     INNER JOIN newmed06.service          ON (client_service.Service_FK = service.Id)     INNER JOIN newmed06.client          ON (client_service.Client_FK = client.LId) WHERE client_service.Service_FK = $colname2_company AND  Licensee_Hqs = $colname_company ORDER BY client.Short";
$company = mysql_query($query_company, $localhost) or die(mysql_error());
$row_company = mysql_fetch_assoc($company);
$totalRows_company = mysql_num_rows($company);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#FFF; border-collapse:collapse;">
  <tr bgcolor="#b0b0b0" >
    <td class="header">Provider <?php //echo $row_recpro['Program']; ?></td>
  </tr>
  <?php do { ?>
  
  <?php 
  if ($totalRows_company != 0){
  $pro2 = $row_company['LId'];} else { $pro2 = '-1' ;} ?>
      <?php 
	  if ($pro2 == $_GET['co'])
	  {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\" >"; ?>
           
           
                     <?php 
/**********preload checking**************/


$session = $_SESSION['License'];

$pl = $_GET['pl'];

mysql_select_db($database_localhost, $localhost);
$query_schload = "SELECT scheme.LId FROM     newmed06.program     INNER JOIN newmed06.service          ON (program.Service_FK = service.Id)     INNER JOIN newmed06.scheme          ON (scheme.Program_FK = program.Id)     INNER JOIN newmed06.client          ON (scheme.HMO_FK = client.LId) WHERE Licensee = $session AND service.Id = $pl AND scheme.Company_FK = $pro2 ORDER BY scheme.Created LIMIT 1";
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
           
           
           
           
           
      <td ><?php $co =$row_company['LId']; echo "<a href=\"javascript:second('$co','$pl','$sc','$id');\">";  echo $row_company['Short']; ?></a></td>
    </tr>
    <?php } while ($row_company = mysql_fetch_assoc($company)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($recpro);

mysql_free_result($company);
?>
