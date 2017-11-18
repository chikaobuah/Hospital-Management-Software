<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();
$v=$_SESSION["License"];
$pagetask="Laboratory";

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
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../common/layout.css" />
<title>Newmed</title>
</head>

    		
	</head>
    <body>
     <div id="header" align="right"> 
	 <img alt=""    style="width: 51;height: 17;" src="../images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" />
    <div style=" color:#CF0; font-weight:bold">
	 <?php 
	echo "".$_SESSION["userid"]." || <a style=\" color:#CF0\" href='../logout.php'>Log Out</a> ";	?> 
    </div>
  
  </div>
    <div id="links">
            
  <?php   
  include('../auth.php');
?>
    </div>
    	 	<div id="links-sub"></div>
 	<div id="content">
<script language="javascript" type="text/javascript" src="laboratoryAX.js"></script> 
<script>
loadpage();
</script>

<script>
LoadNote('1','1','1','1','1','1','1','1','1','1','1');
</script>
       
<table width="100%" height="500" border="0">
  <tr>
    <td  rowspan="5" colspan="3" valign="top" height="400px"><div id="waiting"></div></td>
    <td height="100px" colspan="3" valign="top"><div id="info"></div></td>
  </tr>
  <tr>
    <td height="200px" width="170" rowspan="3" valign="top"><div id="list"></div></td>
    <td rowspan="3" colspan="2" valign="top" height="200px"><div id="showlist"></div></td>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
    <td height="150px" valign="top" colspan="2" ><div id="note"></div></td>
    <td  height="150px" valign="top" >&nbsp;</td>
  </tr>
  <tr>
    <td width="118" height="30px" valign="top" ><div id="add2"></div></td>
    <td width="142" height="30px"></td>
    <td width="23" height="30px"></td>
    <td height="30px"></td>
    <td height="30px" width="518"></td>
    <td  height="30px" width="172"><div id="button"></div></td>

  </tr>
</table>
  	 
 	</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

?>
