<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();
$pagetask="Clinic";
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
  <link rel="stylesheet" href="app.css" />
        <script type="text/javascript" src="appointmentAX.js"></script>
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

mysql_select_db($database_localhost, $localhost);
$query_services2 = "SELECT * FROM service WHERE Direction = 1 AND Blocks = 2 ORDER BY Service LIMIT 1";
$services2 = mysql_query($query_services2, $localhost) or die(mysql_error());
$row_services2 = mysql_fetch_assoc($services2);
$totalRows_services2 = mysql_num_rows($services2);

$sc = "-1";
if ($totalRows_services2>0) {
  $sc = $row_services2['Id'];
}

?>           
</div>


<form id="formpro" name="formpro">
<input name="sc" id="sc" value="<?php echo $sc ?>" type="hidden"  />
</form>
<script>
var sc = document.formpro.sc.value;

listt2e(sc,"appointment_services","services.php")
listt2e(sc,"appointment_weekly","weekly.php")
</script>
    	 	
           <div id="content">
           <table width="600px" height="440px" border="0" align="center">
  <tr>
    <td width="250px" height="440px"><div id="appointment_services"></div></td>

    <td width="350px" height="440px"><div id="appointment_weekly"></div></td>

  </tr>
</table>

           </div>   
</body>
    <?php
mysql_free_result($Recordset1);
?>
     