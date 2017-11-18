<?php require_once('../Connections/localhost.php'); ?>
<?php

session_start();
$pagetask="Drug Purchased";

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
$query_Recordset1 = "SELECT `Access_Level` FROM `access`";
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
		<meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
		<meta http-equiv="pragma" content="NO-CACHE" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
		<title>Newmed</title>
		<link rel="stylesheet" href="../common/layout.css" />
                <link rel="stylesheet" href="dru.css" />
        <script type="text/javascript" src="drugpurchaseAX.js"></script>
                <script type="text/javascript" src="../common/datetimepicker_css.js"></script>
  <!--[if lte IE 6]>
  <link href="/static/css/layout.ie6.css" rel="stylesheet" type="text/css" />
  <![endif]-->
  <script type="text/javascript"> 

function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 

document.onkeypress = stopRKey; 

</script>
	</head>
    <body>
     <div id="header" align="right">

<div style=" color:#CF0; font-weight:bold">
<img alt=""    style="width: 51;height: 17;" src="../images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" /> <br />
<?php 	echo "".$_SESSION["userid"]." || <a style=\" color:#CF0\" href='../logout.php'>Log Out</a> ";	?>
</div>
</div>
<div id="links"><?php  include('../auth.php')?></div>

<div id="links-sub"> </div>
 
 <?php 
/**********preload checking**************/


$colname_providers = "-1";
if (isset($_SESSION['License'])) {
  $colname_providers = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_providers = sprintf("SELECT client.LId FROM newmed06.client_service     
						   INNER JOIN newmed06.client          ON (client_service.Client_FK = client.LId) 
						   INNER JOIN newmed06.service          ON (client_service.Service_FK = service.Id) 
						   WHERE client.License = %s AND service.Direction = 32 GROUP BY client.LId ORDER BY client.Short LIMIT 1", GetSQLValueString($colname_providers, "int"));
$providers = mysql_query($query_providers, $localhost) or die(mysql_error());
$row_providers = mysql_fetch_assoc($providers);
$totalRows_providers = mysql_num_rows($providers);

$pr = "-1";
if ($totalRows_providers > 0) {
  $pr = $row_providers['LId'];
}

$colname_receipts = "-1";
if (isset($_SESSION['License'])) {
  $colname_receipts = $_SESSION['License'];
}

mysql_select_db($database_localhost, $localhost);
$query_receipts = sprintf("SELECT LId FROM purchase WHERE Licensee_Hqs = %s AND Client_FK = $pr ORDER BY Created LIMIT 1", GetSQLValueString($colname_receipts, "int"));
$receipts = mysql_query($query_receipts, $localhost) or die(mysql_error());
$row_receipts = mysql_fetch_assoc($receipts);
$totalRows_receipts = mysql_num_rows($receipts);


$rc = "-1";
if ($totalRows_receipts>0) {
  $rc = $row_receipts['LId'];
}

?>           
</div>


<form id="formpro" name="formpro">
<input name="pr" id="pr" value="<?php echo $pr ?>" type="hidden" />
<input name="rc" id="rc" value="<?php echo $rc ?>" type="hidden"  />
</form>
<script>
var pr = document.formpro.pr.value;
var rc = document.formpro.rc.value;

listt2e(pr, rc,"drug_providers","providers.php")
listt2e(pr, rc,"drug_receipts","receipts.php")
listt2e(pr, rc,"drug_orders","orders.php")
</script>
    
    	 	<div id="links-sub"></div>
           <div id="content">
          <div id="drug_providers"></div>
          <div id="drug_receipts"></div>
          <div id="drug_orders"></div>
          
           </div>   
</body>
    <?php
mysql_free_result($Recordset1);
?>
     