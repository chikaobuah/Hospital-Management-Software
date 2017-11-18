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

$colname_drug = "-1";
if (isset($_GET['sc'])) {
  $colname_drug = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_drug = sprintf("SELECT * FROM drug WHERE Service_direction_FK = %s", GetSQLValueString($colname_drug, "int"));
$drug = mysql_query($query_drug, $localhost) or die(mysql_error());
$row_drug = mysql_fetch_assoc($drug);
$totalRows_drug = mysql_num_rows($drug);

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
$query_count = sprintf("SELECT COUNT(*) AS 'counta' FROM newmed06.cover_drug     INNER JOIN newmed06.drug         ON (cover_drug.Drug_FK =drug.Id) WHERE cover_drug.status = 1 AND Capitation = %s AND Effective = %s AND drug.Service_direction_FK = %s", GetSQLValueString($colname_count, "int"),GetSQLValueString($colname2_count, "int"),GetSQLValueString($colname3_count, "int"));
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
<link rel="stylesheet" href="../common/layout.css" />
<title>Untitled Document</title>
</head>
 <?php  
	 
	 if ( $totalRows_drug == $row_count['counta']) {
		 $check = "checked=\"checked\"";
		 $value = '0';
		 
		 } else {
			 
			 $check = " ";
			 $value = '1';
			 }
		 
		 ?>
         
<body><form method="post" name="form8" id="form8">
      
<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;">
  <tr bgcolor="#b0b0b0" >
    <td colspan="2" align="center" class="header"><?php // echo $row_count['counta']; ?>&nbsp; Covered</td>
  </tr>
  
  
      
 
  <input type="hidden" name="ef" id="ef" value="<?php echo $_GET['ef']; ?>"/>
  <input type="hidden" name="li" id="li" value="<?php echo $_GET['li']; ?>"/>
  <input type="hidden" name="sc" id="sc" value="<?php echo $_GET['sc']; ?>"/>
  <tr height="5px" class="tablebody">
     <td width="2%" align="right" bgcolor="#e5e5e5" style="padding:3px 1px;"><input type="checkbox" <?php echo $check; ?>  value="<?php echo $value; ?>" name="che" id="che" onclick="checkedAll(form8,this.value);" <?php echo $disable; ?>  /></td>
    <td width="98%" align="left" bgcolor="#e5e5e5" style="padding:3px 1px;"><i>select all</i></td>
 
  </tr>

  <?php do { 
 $colname_cover = $row_drug['Id'];

$colname2_cover = "-1";
if (isset($_GET['ef'])) {
  $colname2_cover = $_GET['ef'];
}

  $colname3_cover = $_GET['li'];
  
mysql_select_db($database_localhost, $localhost);
$query_cover = sprintf("SELECT * FROM cover_drug WHERE Drug_FK = %s AND  Effective = %s AND Capitation = %s ", GetSQLValueString($colname_cover, "int"),GetSQLValueString($colname2_cover, "int"),GetSQLValueString($colname3_cover, "int"));
$cover = mysql_query($query_cover, $localhost) or die(mysql_error());
$row_cover = mysql_fetch_assoc($cover);
$totalRows_cover = mysql_num_rows($cover); ?>

     <tr bgcolor="#e5e5e5"  align="left">
     <td height="15px"><?php if ($row_cover['Status'] == 1)
	  {
		  
		   echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\"";
		   echo $disable;
		   echo "checked=\"checked\" value=\"1\" onClick=\"AddDru('$row_drug[Id]','$row_cover[Id]');\" />";
	  }
	  else 
	  { 
	  
	 echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\"";
		   echo $disable;
		   echo "value=\"1\" onClick=\"AddDru('$row_drug[Id]','$row_cover[Id]');\" />";
		  }
		   ?></td>

      <input name="Id2" type="hidden" value="<?php echo $cov = $row_cover['Id']; ?>" style="width:99%" class="form"/>
      <td><?php echo $row_drug['Drug']; ?></td>
    </tr>
    <?php } while ($row_drug = mysql_fetch_assoc($drug)); ?>
</table></form>
</body>
</html>
<?php
mysql_free_result($drug);

mysql_free_result($count);

mysql_free_result($effective);
?>
