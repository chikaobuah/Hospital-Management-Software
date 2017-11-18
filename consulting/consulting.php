<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();
$pagetask="Consulting";
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
<title>Untitled Document</title>
</head>
<script language="javascript" type="text/javascript" src="../common/consultingAX.js"></script>



     		
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
    	 	  <div id="content2">
    	 	    <div id="content3">
    	 	      <div id="content4">
    	 	        <?php      
	 
	 
	 
	 
	 
	 
	 $colname_transaction = "-1";
if (isset($_GET['en'])) {
  $colname_transaction = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_transaction = sprintf("SELECT COUNT(LId) as count FROM newmed06.transaction WHERE Enrolee = %s AND `Status`= 1", GetSQLValueString($colname_transaction, "int"));
$transaction = mysql_query($query_transaction, $localhost) or die(mysql_error());
$row_transaction = mysql_fetch_assoc($transaction);
$totalRows_transaction = mysql_num_rows($transaction);

$colname_visit_pre = "-1";
if (isset($_GET['en'])) {
  $colname_visit_pre = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_visit_pre = sprintf("SELECT COUNT(Visit) as count FROM newmed06.visit_prescription WHERE Enrolee = %s AND `Status`= 1", GetSQLValueString($colname_visit_pre, "int"));
$visit_pre = mysql_query($query_visit_pre, $localhost) or die(mysql_error());
$row_visit_pre = mysql_fetch_assoc($visit_pre);
$totalRows_visit_pre = mysql_num_rows($visit_pre);

$colname_visit_pro = "-1";
if (isset($_GET['en'])) {
  $colname_visit_pro = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_visit_pro = sprintf("SELECT COUNT(Visit) as count FROM newmed06.visit_procedure WHERE Enrolee = %s AND `Status`= 1", GetSQLValueString($colname_visit_pro, "int"));
$visit_pro = mysql_query($query_visit_pro, $localhost) or die(mysql_error());
$row_visit_pro = mysql_fetch_assoc($visit_pro);
$totalRows_visit_pro = mysql_num_rows($visit_pro);

$colname_status = "-1";
if (isset($_GET['en'])) {
  $colname_status = $_GET['en'];
}
$colname2_status = "-1";
if (isset($_GET['id2'])) {
  $colname2_status = $_GET['id2'];
}
mysql_select_db($database_localhost, $localhost);
$query_status = sprintf("SELECT     visit_status.Status AS sta     , visit.Enrolee     , visit.Created     , visit.Creator     , visit.Service     , visit.LMP     , visit.Ticket_No     , visit.Appointed     , visit.Loading     , visit.upsize_ts     , visit.Status     , visit.Principal      , visit.Scheme FROM     newmed06.visit     INNER JOIN newmed06.visit_status          ON (visit.Status = visit_status.Id) WHERE Enrolee = %s AND Created LIKE %s", GetSQLValueString($colname_status, "int"),GetSQLValueString("%" . $colname2_status . "%", "date"));
$status = mysql_query($query_status, $localhost) or die(mysql_error());
$row_status = mysql_fetch_assoc($status);
$totalRows_status = mysql_num_rows($status);
 ?>
 
 <script>
loadpage();
</script>

<script>
LoadNote('1','1','1','1','1','1','1','1','1','1','1');
</script>
    	 	        
                  <table width="100%" height="500" border="1" style="border:thin; border-color:#FFF; border-collapse:collapse;">
  <tr>
    <td height="300px" rowspan="4" colspan="3" valign="top" ><div id="waiting"></div></td>
    <td height="100px" colspan="3" valign="top" ><div id="info"></div></td>
    <td width="176" rowspan="2" height="30%" valign="top" ><div id="vitals"></div></td>
    <td width="134" rowspan="2" height="30%" valign="top"  ><div id="service"></div></td>
  </tr>
  <tr>
    <td height="40%px" width="107" rowspan="3" valign="top" ><div id="list"></div></td>
    <td height="40%px" rowspan="3" colspan="2" valign="top" ><div id="showlist"></div></td>
  </tr>
  <tr>
    <td colspan="2" height="50px" valign="top" ><div id="add2"></div></td>
  </tr>
  <tr>
    <td colspan="2" height="250px" rowspan="2" valign="top" ><div id="note"></div></td>
  </tr>
  <tr>
    <td width="98" height="150px" valign="top" ><div id="history"></div></td>
    <td width="116"  height="150px" valign="top" ><div id="list2"></div></td>
    <td colspan="4" height="150px" valign="top" ><div id="showlist2"></div></td>
 
  </tr>
  <tr>
    <td height="30px" valign="top" ><div id="add2"></div></td>
    <td height="30px"></td>
    <td width="68" height="30px"></td>
    <td height="30px"></td>
    <td height="30px" width="284"></td>
    <td  height="30px" width="135"></td>
    <td colspan="2" height="30px" valign="top" ><div id="button"></div></td>
  </tr>
</table>
  	 	        </div>
  	 	      </div>
    	 	  </div>
 	</div>
</body>
</html>