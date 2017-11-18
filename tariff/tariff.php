<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();
$pagetask="Tarrif";
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
        
        
<link rel="stylesheet" href="taf.css" />
  <script type="text/javascript" src="tariffAX.js"></script>
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
       <?php
$colname_providers2 = "-1";
if (isset($_SESSION['License'])) {
  $colname_providers2 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_providers2 = sprintf("SELECT client.LId FROM newmed06.client_service     INNER JOIN newmed06.client          ON (client_service.Client_FK = client.LId)     INNER JOIN newmed06.service          ON (client_service.Service_FK = service.Id) WHERE client_service.License = %s AND service.Direction = 1 GROUP BY client.LId ORDER BY client.Short LIMIT 1", GetSQLValueString($colname_providers2, "int"));
$providers2 = mysql_query($query_providers2, $localhost) or die(mysql_error());
$row_providers2 = mysql_fetch_assoc($providers2);
$totalRows_providers2 = mysql_num_rows($providers2);



if ($totalRows_providers2 == 0){$some = '-1';} else {
$some = $row_providers2['LId'];}


$colname_providers3 = $some;

mysql_select_db($database_localhost, $localhost);
$query_providers3 = sprintf("SELECT  client_service.Service_FK FROM newmed06.client_service     INNER JOIN newmed06.service          ON (client_service.Service_FK = service.Id) WHERE client_service.Client_FK = %s AND service.Blocks = 2 ORDER BY service.Service", GetSQLValueString($colname_providers3, "int"));
$providers3 = mysql_query($query_providers3, $localhost) or die(mysql_error());
$row_providers3 = mysql_fetch_assoc($providers3);
$totalRows_providers3 = mysql_num_rows($providers3);



if ($totalRows_providers3 == 0){$cap = '-1';} else {
$cap = $row_providers3['Service_FK'];}


$colname_effective2 = "-1";
if (isset($_SESSION['License'])) {
  $colname_effective2 = $_SESSION['License'];
}
  $colname2_effective2 = $cap;

mysql_select_db($database_localhost, $localhost);
$query_effective2 = sprintf("SELECT Id FROM client_effective WHERE License = %s AND Service_FK = %s ORDER BY Effective", GetSQLValueString($colname_effective2, "int"),GetSQLValueString($colname2_effective2, "int"));
$effective2 = mysql_query($query_effective2, $localhost) or die(mysql_error());
$row_effective2 = mysql_fetch_assoc($effective2);
$totalRows_effective2 = mysql_num_rows($effective2);


if ($totalRows_effective2 == 0){$eff = '-1';} else {
$eff = $row_effective2['Id'];}

?>
    
<form id="formpro" name="formpro">
<input name="ef" id="ef" value="<?php echo $eff ?>" type="hidden" />
<input name="pr" id="pr" value="<?php echo $some ?>" type="hidden" />
<input name="sc" id="sc" value="<?php echo $cap ?>" type="hidden"  />
</form>
    
    <script>
var ef = document.formpro.ef.value;
var pr = document.formpro.pr.value;
var sc = document.formpro.sc.value;

listt2e(pr, ef, sc, "tariff_providers","providers.php")
listt2e(pr, ef, sc, "tariff_services","services.php")
listt2e(pr, ef, sc, "tariff_effective","effective.php")
listt2e(pr, ef, sc, "tariff_clientpro","clientpro.php")

</script>
    
    

           <div id="content">
           
                    <table width="100%" height="500px" border="0">
                      <tr>
                        <td width="15%" height="500px"><div id="tariff_providers"></div></td>
                        <td width="15%" height="500px"><div id="tariff_services"></div></td>
                        <td  width="15%" height="500px"><div id="tariff_effective"></div></td>
                        <td width="45%" height="500px"><div id="tariff_clientpro"></div></td>
                      </tr>
                    </table>
           </div>   
</body>
    <?php
mysql_free_result($Recordset1);
?>
     