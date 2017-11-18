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
$query_providers = sprintf("SELECT client_service.Client_FK     , service.Id     , client.Client     , client_service.License     , client.Short FROM newmed06.client_service     INNER JOIN newmed06.service          ON (client_service.Service_FK = service.Id)     INNER JOIN newmed06.client          ON (client.LId = client_service.Client_FK) WHERE client_service.License = %s AND client_service.Service_FK = 3", GetSQLValueString($colname_providers, "int"));
$providers = mysql_query($query_providers, $localhost) or die(mysql_error());
$row_providers = mysql_fetch_assoc($providers);
$totalRows_providers = mysql_num_rows($providers);

$colname_idtest = "-1";
if (isset($_SESSION['License'])) {
  $colname_idtest = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_idtest = sprintf("SELECT   * FROM     cover_effective WHERE License = %s AND Effective <= CURDATE()ORDER BY Effective DESC LIMIT 1 ", GetSQLValueString($colname_idtest, "int"));
$idtest = mysql_query($query_idtest, $localhost) or die(mysql_error());
$row_idtest = mysql_fetch_assoc($idtest);
$totalRows_idtest = mysql_num_rows($idtest);

$theid = $row_idtest['Id'];
$session = $_SESSION['License'];
$capi = $_GET['cap'];
$service = 5;

mysql_select_db($database_localhost, $localhost);
$query_procedures = "SELECT     cover_procedure.License     , cover_procedure.Loading     , cover_procedure.Effective     , cover_procedure.Tariff     , cover_procedure.Capitation     , cover_procedure.Status_Note     , cover_procedure.Status     , cover_procedure.Procedure_FK     , procedure.Procedure     , cover_effective.Effective AS dat FROM     newmed06.procedure     INNER JOIN newmed06.cover_procedure          ON (procedure.Id = cover_procedure.Procedure_FK)     INNER JOIN newmed06.cover_effective          ON (cover_procedure.Effective = cover_effective.Id) WHERE cover_procedure.Effective = $theid AND cover_procedure.License = $session AND cover_procedure.Capitation = $capi AND procedure.Service_direction_FK = $service";
$procedures = mysql_query($query_procedures, $localhost) or die(mysql_error());
$row_procedures = mysql_fetch_assoc($procedures);
$totalRows_procedures = mysql_num_rows($procedures);

mysql_select_db($database_localhost, $localhost);
$query_service2 = "SELECT service.Service     , service.Id,  procedure.Blocks FROM newmed06.procedure     INNER JOIN newmed06.service          ON (procedure.Service_direction_FK = service.Id) WHERE procedure.Service_direction_FK = $service GROUP BY service.Service";
$service2 = mysql_query($query_service2, $localhost) or die(mysql_error());
$row_service2 = mysql_fetch_assoc($service2);
$totalRows_service2 = mysql_num_rows($service2);
$colname_visitpro = "-1";
if (isset($_GET['en'])) {
  $colname_visitpro = $_GET['en'];
}
$colname2_visitpro = "-1";
if (isset($_GET['id2'])) {
  $colname2_visitpro = $_GET['id2'];
}
mysql_select_db($database_localhost, $localhost);
$query_visitpro = sprintf("SELECT     visit_procedure.Enrolee     , visit_procedure.Created     , visit_procedure.Creator     , visit_procedure.Visit     , visit_procedure.Procedure     , visit_procedure.Provider     , visit_procedure.Appointment     , visit_procedure.Specific_Request     , visit_procedure.Specimen     , visit_procedure.Status     , client.Client     , procedure.Procedure AS pro     , service.Service     , client.Short FROM     newmed06.procedure     INNER JOIN newmed06.service          ON (procedure.Service_direction_FK = service.Id)     INNER JOIN newmed06.visit_procedure          ON (visit_procedure.Procedure = procedure.Id)     INNER JOIN newmed06.client          ON (visit_procedure.Provider = client.LId) WHERE Enrolee = %s AND Visit LIKE %s", GetSQLValueString($colname_visitpro, "int"),GetSQLValueString("%" . $colname2_visitpro . "%", "date"));
$visitpro = mysql_query($query_visitpro, $localhost) or die(mysql_error());
$row_visitpro = mysql_fetch_assoc($visitpro);
$totalRows_visitpro = mysql_num_rows($visitpro);

mysql_select_db($database_localhost, $localhost);
$query_service = "SELECT service.Service     , service.Id,  procedure.Blocks FROM newmed06.procedure     INNER JOIN newmed06.service          ON (procedure.Service_direction_FK = service.Id) WHERE procedure.Blocks = 1 GROUP BY service.Service";
$service = mysql_query($query_service, $localhost) or die(mysql_error());
$row_service = mysql_fetch_assoc($service);
$totalRows_service = mysql_num_rows($service);





$colname_recvispro = "-1";
if (isset($_GET['cap'])) {
  $colname_recvispro = $_GET['cap'];
}
mysql_select_db($database_localhost, $localhost);
$query_recvispro = sprintf("SELECT procedure.Procedure     , procedure.Id FROM newmed06.cover_procedure     INNER JOIN newmed06.procedure          ON (cover_procedure.Procedure_FK = procedure.Id) WHERE Capitation = %s", GetSQLValueString($colname_recvispro, "int"));
$recvispro = mysql_query($query_recvispro, $localhost) or die(mysql_error());
$row_recvispro = mysql_fetch_assoc($recvispro);
$totalRows_recvispro = mysql_num_rows($recvispro); ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="../common/consultingAX.js"></script> 
  
<title>Untitled Document</title>
</head>

<body>
 
  <form  method="post" id="form14" name="form14">
   <input type="hidden" name="pr" id="pr" value="<?php echo $_GET['pr']; ?>" style="width:100%"/>
 <input type="hidden" name="en" id="en" value="<?php echo $_GET['en']; ?>" style="width:100%"/>
 <input type="hidden" name="sc" id="sc" value="<?php echo $_GET['sc']; ?>" style="width:100%"/>
 <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" style="width:100%"/>
 <input type="hidden" name="st" id="st" value="<?php echo $_GET['st']; ?>" style="width:100%"/>
 <input type="hidden" name="cap" id="cap" value="<?php echo $_GET['cap']; ?>" style="width:100%"/>
 <input type="hidden" name="lc2" id="lc2" value="<?php echo $_GET['lc2']; ?>" style="width:100%"/>
 <input type="hidden" name="lc" id="lc" value="<?php echo $_GET['lc']; ?>" style="width:100%"/>
 <input type="hidden" name="id2" id="id2" value="<?php echo $_GET['id2']; ?>" style="width:100%"/>
 
  <div id="AllInvestigation"></div>
  
 </form>

</body>
</html>
<?php
mysql_free_result($providers);

mysql_free_result($idtest);

mysql_free_result($procedures);

mysql_free_result($visitpro);

mysql_free_result($service);

mysql_free_result($service2);
?>
