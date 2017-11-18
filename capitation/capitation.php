<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();
$pagetask="Captitation";

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
        <link rel="stylesheet" href="cap.css" />
        <script type="text/javascript" src="capitationAX.js"></script>
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
$session = $_SESSION['License'];

mysql_select_db($database_localhost, $localhost);
$query_proload = "SELECT  client.LId, client.Client     , client.Short     , client_service.Service_FK FROM newmed06.client_service     INNER JOIN newmed06.service          ON (client_service.Service_FK = service.Id)     INNER JOIN newmed06.client          ON (client_service.Client_FK = client.LId) WHERE client_service.Service_FK = 26 AND  Licensee_Hqs = $session ORDER BY client.Short";
$proload = mysql_query($query_proload, $localhost) or die(mysql_error());
$row_proload = mysql_fetch_assoc($proload);
$totalRows_proload = mysql_num_rows($proload);

$co = "-1";
if ($totalRows_proload>0) {
  $co = $row_proload['LId'];
}

mysql_select_db($database_localhost, $localhost);
$query_schload = "SELECT scheme.LId FROM newmed06.scheme     INNER JOIN newmed06.client           ON (scheme.HMO_FK = client.LId)         INNER JOIN newmed06.program           ON (scheme.Program_FK = program.Id)      INNER JOIN newmed06.status           ON (scheme.Status = status.Id) WHERE Licensee = $session  AND scheme.Company_FK = $co AND scheme.Program_FK = 3  ORDER BY scheme.Created LIMIT 1";
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
</div>


<form id="formpro" name="formpro">
<input name="co" id="co" value="<?php echo $co ?>" type="hidden" />
<input name="sc" id="sc" value="<?php echo $sc ?>" type="hidden" />
<input name="id" id="id" value="<?php echo $id ?>" type="hidden"  />
</form>
<script>
var co = document.formpro.co.value;
var pl = 26;
var sc = document.formpro.sc.value;
var id = document.formpro.id.value;

listt2e(co, pl, sc, id,"capitation_program","program.php")
listt2e(co, pl, sc, id,"capitation_company","companylist.php")
listt2e(co, pl, sc, id,"capitation_schemes","schemes.php")
listt2e(co, pl, sc, id,"capitation_schpay","schpay.php")
listt2e(co, pl, sc, id,"capitation_enrolee","enroleelist.php")
</script>
    	 
    <div id="content">
    
<div id="capitation_program"></div>
<div id="capitation_company"></div>
<div id="capitation_schemes"></div>
<div id="capitation_schpay"></div>
<div id="capitation_enrolee"></div>


    </div>
</body>
<?php
mysql_free_result($Recordset1);

mysql_free_result($proload);

mysql_free_result($schload);

mysql_free_result($idpay);
?>
