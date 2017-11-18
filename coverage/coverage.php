<?php require_once('../Connections/localhost.php'); ?>
<?php

session_start();
$pagetask="Coverage";
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
  <!--[if lte IE 6]>
  <link href="/static/css/layout.ie6.css" rel="stylesheet" type="text/css" />
  <![endif]-->
     <link rel="stylesheet" href="cov.css" />
        <script type="text/javascript" src="coverageAX.js"></script>
  <script type="text/javascript" src="common/jquery.min.js"></script>
  <script type="text/javascript" src="../common/datetimepicker_css.js"></script>	
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
    </div>
    
    
    <?php
$colname_effective2 = "-1";
if (isset($_SESSION['License'])) {
  $colname_effective2 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_effective2 = sprintf("SELECT Id FROM cover_effective WHERE License = %s ORDER BY Effective LIMIT 1", GetSQLValueString($colname_effective2, "int"));
$effective2 = mysql_query($query_effective2, $localhost) or die(mysql_error());
$row_effective2 = mysql_fetch_assoc($effective2);
$totalRows_effective2 = mysql_num_rows($effective2);

if ($totalRows_effective2 == 0){$some = '-1';} else {
$some = $row_effective2['Id'];}


$colname_capitation22 = "-1";
if (isset($_SESSION['License'])) {
  $colname_capitation22 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_capitation22 = sprintf("SELECT * FROM capitation WHERE Licensee = %s  ORDER BY Amount LIMIT 1", GetSQLValueString($colname_capitation22, "int"));
$capitation22 = mysql_query($query_capitation22, $localhost) or die(mysql_error());
$row_capitation22 = mysql_fetch_assoc($capitation22);
$totalRows_capitation22 = mysql_num_rows($capitation22);

if ($totalRows_capitation22 == 0){$cap = '-1';} else {
$cap = $row_capitation22['Amount'];}

?>
    
<form id="formpro" name="formpro">
<input name="ef" id="ef" value="<?php echo $some ?>" type="hidden" />
<input name="li" id="li" value="<?php echo $cap ?>" type="hidden" />
<input name="sc" id="sc" value="2" type="hidden"  />
</form>

<script>
var ef = document.formpro.ef.value;
var li = document.formpro.li.value;
var sc = document.formpro.sc.value;

listt2e(ef, li, sc, "coverage_effective","effective.php")
listt2e(ef, li, sc, "coverage_capitation","capitation.php")
listt2e(ef, li, sc, "coverage_services","services.php")
listt2e(ef, li, sc, "coverage_procedures","allprocedures.php")

</script>
    	 	
<div id="content">
<div id="coverage_effective"></div>
<div id="coverage_capitation"></div>
<div id="coverage_services"></div>
<div id="coverage_procedures"></div>

</div>   
</body>
    <?php
mysql_free_result($Recordset1);
?>
     