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

$colname_procedures = "-1";
if (isset($_GET['sc'])) {
  $colname_procedures = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_procedures = sprintf("SELECT * FROM `procedure` WHERE Service_direction_FK = %s", GetSQLValueString($colname_procedures, "int"));
$procedures = mysql_query($query_procedures, $localhost) or die(mysql_error());
$row_procedures = mysql_fetch_assoc($procedures);
$totalRows_procedures = mysql_num_rows($procedures);

$colname_count = "-1";
if (isset($_GET['li'])) {
  $colname_count = $_GET['li'];
}
$colname3_count = "-1";
if (isset($_GET['sc'])) {
  $colname3_count = $_GET['sc'];
}
$colname2_count = "-1";
if (isset($_GET['ef'])) {
  $colname2_count = $_GET['ef'];
}
mysql_select_db($database_localhost, $localhost);
$query_count = sprintf("SELECT COUNT(*) AS 'counta' FROM newmed06.cover_procedure     INNER JOIN newmed06.procedure          ON (cover_procedure.Procedure_FK = procedure.Id) WHERE cover_procedure.status = 1 AND Capitation = %s AND Effective = %s AND procedure.Service_direction_FK = %s", GetSQLValueString($colname_count, "int"),GetSQLValueString($colname2_count, "int"),GetSQLValueString($colname3_count, "int"));
$count = mysql_query($query_count, $localhost) or die(mysql_error());
$row_count = mysql_fetch_assoc($count);
$totalRows_count = mysql_num_rows($count);



$now = date ('Y-m-d');

$colname_effective = "-1";
if (isset($_GET['ef'])) {
  $colname_effective = $_GET['ef'];
}
$colname1_effective = "-1";
if (isset($_SESSION['License'])) {
  $colname1_effective = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_effective = sprintf("SELECT Id FROM cover_effective WHERE License = %s AND Effective > '$now' AND Id = %s ORDER BY Effective ", GetSQLValueString($colname1_effective, "int"),GetSQLValueString($colname_effective, "int"));
$effective = mysql_query($query_effective, $localhost) or die(mysql_error());
$row_effective = mysql_fetch_assoc($effective);
$totalRows_effective = mysql_num_rows($effective);

if ($totalRows_effective == 0)
{
	$disable = "disabled=\"disabled\"";
	
	} else {
		
		$disable = "";
		}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript" src="coverageAX.js"></script>
<body><form  method="post" id="form13" name="form13">
<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;">
  <tr bgcolor="#b0b0b0" >

    <td colspan="2" align="center" class="header"><?php // echo $row_count['counta']; ?>&nbsp; Covered</td>
  </tr>
   <!-- <form action="update2.php" method="post" id="form6"> -->
   <?php  
	 
	 if ( $totalRows_procedures == $row_count['counta']) {
		 $check = "checked=\"checked\"";
		 $value = '0';
		 
		 } else {
			 
			 $check = " ";
			 $value = '1';
			 }
		 
		 ?>
   
  <input type="hidden" name="ef" id="ef" value="<?php echo $_GET['ef']; ?>"/>
  <input type="hidden" name="li" id="li" value="<?php echo $_GET['li']; ?>"/>
  <input type="hidden" name="sc" id="sc" value="<?php echo $_GET['sc']; ?>"/>
  <tr height="5px" class="tablebody">
     <td width="2%" align="right" bgcolor="#e5e5e5" style="padding:3px 1px;"><input type="checkbox" name="che" id="checkbox2" <?php echo $check; ?>  value="<?php echo $value; ?>" onclick="checkedAll2(form13,this.value);"  <?php echo $disable; ?> /></td>
    <td width="98%" align="left" bgcolor="#e5e5e5" style="padding:3px 1px;"><i>select all</i></td>
 
  </tr>
  <?php do { ?>
  <?php
$colname_cover = $row_procedures['Id'];

$colname2_cover = "-1";
if (isset($_GET['ef'])) {
  $colname2_cover = $_GET['ef'];
}

  $colname3_cover = $_GET['li'];
  
mysql_select_db($database_localhost, $localhost);
$query_cover = sprintf("SELECT * FROM cover_procedure WHERE Procedure_FK = %s AND  Effective = %s AND Capitation = %s", GetSQLValueString($colname_cover, "int"),GetSQLValueString($colname2_cover, "int"),GetSQLValueString($colname3_cover, "int"));
$cover = mysql_query($query_cover, $localhost) or die(mysql_error());
$row_cover = mysql_fetch_assoc($cover);
$totalRows_cover = mysql_num_rows($cover);
      ?>
    <tr align="left" bgcolor="#e5e5e5" height="20px">
      <td><?php if ($row_cover['Status'] == 1)
	  {
		  
		   echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\"";
		   echo $disable;
		   echo "checked=\"checked\" value=\"1\" onClick=\"AddPro('$row_procedures[Id]','$row_cover[Id]');\" />";
	  }
	  else 
	  { 
	  
	echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\"";
		   echo $disable;
		   echo "value=\"1\" onClick=\"AddPro('$row_procedures[Id]','$row_cover[Id]');\" />";
		  }
		   ?></td>
       
      
      <td><?php echo $row_procedures['Procedure']; ?></td>
    </tr>
    <?php } while ($row_procedures = mysql_fetch_assoc($procedures)); ?>
</table></form>
</body>
</html>
<?php
mysql_free_result($procedures);

mysql_free_result($count);
?>
