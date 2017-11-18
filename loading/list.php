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


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;">
  <tr bgcolor="#b0b0b0" >
    <td align="center" class="header">To Load ...</td>
  </tr>
  <?php 
  
$colname2_effective2 = 8;
$colname_effective2 = "-1";
if (isset($_SESSION['License'])) {
  $colname_effective2 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_effective2 = sprintf("SELECT Id FROM loading_effective WHERE License = %s AND Service_FK = %s ORDER BY Effective", GetSQLValueString($colname_effective2, "int"),GetSQLValueString($colname2_effective2, "int"));
$effective2 = mysql_query($query_effective2, $localhost) or die(mysql_error());
$row_effective2 = mysql_fetch_assoc($effective2);
$totalRows_effective2 = mysql_num_rows($effective2);

if ($totalRows_effective2 == 0){$cap = '-1';} else {
$cap = $row_effective2['Id'];}
  
  $pro2 = 1;
	  if ($pro2 == $_GET['ls'])
	 {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\" class=\"tablebody\">"; ?>
    <td align="left"><?php echo "<a href=\"javascript:first('1', '8', '$cap');\">" ; ?>Licensee</a></td>
  </tr>
  <?php 
  $colname2_effective3 = 9;
$colname_effective3 = "-1";
if (isset($_SESSION['License'])) {
  $colname_effective3 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_effective3 = sprintf("SELECT Id FROM loading_effective WHERE License = %s AND Service_FK = %s ORDER BY Effective", GetSQLValueString($colname_effective3, "int"),GetSQLValueString($colname2_effective3, "int"));
$effective3 = mysql_query($query_effective3, $localhost) or die(mysql_error());
$row_effective3 = mysql_fetch_assoc($effective3);
$totalRows_effective3 = mysql_num_rows($effective3);

if ($totalRows_effective3 == 0){$cap = '-1';} else {
$cap = $row_effective3['Id'];}
 $pro2 = 2;
	  if ($pro2 == $_GET['ls'])
	  {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
    <td align="left"><?php echo "<a href=\"javascript:firstc('2', '9', '$cap');\">" ; ?>Client</a></td>
  </tr>
   <?php 
   $colname2_effective4 = 10;
$colname_effective4 = "-1";
if (isset($_SESSION['License'])) {
  $colname_effective4 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_effective4 = sprintf("SELECT Id FROM loading_effective WHERE License = %s AND Service_FK = %s ORDER BY Effective", GetSQLValueString($colname_effective4, "int"),GetSQLValueString($colname2_effective4, "int"));
$effective4 = mysql_query($query_effective4, $localhost) or die(mysql_error());
$row_effective4 = mysql_fetch_assoc($effective4);
$totalRows_effective4 = mysql_num_rows($effective4);

if ($totalRows_effective4 == 0){$cap = '-1';} else {
$cap = $row_effective4['Id'];}
 $pro2 = 3;
	  if ($pro2 == $_GET['ls'])
	  {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5"; 
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
    <td align="left"><?php echo "<a href=\"javascript:firstpg('3', '10', '$cap');\">" ; ?>Program</a></td>
  </tr>
   <?php 
   $colname2_effective5 = 11;
$colname_effective5 = "-1";
if (isset($_SESSION['License'])) {
  $colname_effective5 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_effective5 = sprintf("SELECT Id FROM loading_effective WHERE License = %s AND Service_FK = %s ORDER BY Effective", GetSQLValueString($colname_effective5, "int"),GetSQLValueString($colname2_effective5, "int"));
$effective5 = mysql_query($query_effective5, $localhost) or die(mysql_error());
$row_effective5 = mysql_fetch_assoc($effective5);
$totalRows_effective5 = mysql_num_rows($effective5);

if ($totalRows_effective5 == 0){$cap = '-1';} else {
$cap = $row_effective5['Id'];}
 $pro2 = 4;
	  if ($pro2 == $_GET['ls'])
	  {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
    <td align="left"><?php echo "<a href=\"javascript:firstpl('4', '11', '$cap');\">" ; ?>Plan</a></td>
  </tr>
   <?php 
   $colname2_effective2 = 12;
$colname_effective2 = "-1";
if (isset($_SESSION['License'])) {
  $colname_effective2 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_effective2 = sprintf("SELECT Id FROM loading_effective WHERE License = %s AND Service_FK = %s ORDER BY Effective", GetSQLValueString($colname_effective2, "int"),GetSQLValueString($colname2_effective2, "int"));
$effective2 = mysql_query($query_effective2, $localhost) or die(mysql_error());
$row_effective2 = mysql_fetch_assoc($effective2);
$totalRows_effective2 = mysql_num_rows($effective2);

if ($totalRows_effective2 == 0){$cap = '-1';} else {
$cap = $row_effective2['Id'];}
  $pro2 = 5;
	  if ($pro2 == $_GET['ls'])
	 {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
    <td align="left"><?php echo "<a href=\"javascript:firstpr('5', '12', '$cap');\">" ; ?>Principal</a></td>
  </tr>
   <?php 
   $colname2_effective2 = 13;
$colname_effective2 = "-1";
if (isset($_SESSION['License'])) {
  $colname_effective2 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_effective2 = sprintf("SELECT Id FROM loading_effective WHERE License = %s AND Service_FK = %s ORDER BY Effective", GetSQLValueString($colname_effective2, "int"),GetSQLValueString($colname2_effective2, "int"));
$effective2 = mysql_query($query_effective2, $localhost) or die(mysql_error());
$row_effective2 = mysql_fetch_assoc($effective2);
$totalRows_effective2 = mysql_num_rows($effective2);

if ($totalRows_effective2 == 0){$cap = '-1';} else {
$cap = $row_effective2['Id'];}
 $pro2 = 6;
	  if ($pro2 == $_GET['ls'])
	  {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
           
    <td align="left"><?php echo "<a href=\"javascript:firsts('6', '13', '$cap');\">" ; ?>Service</a></td>
  </tr>
  <?php 
mysql_select_db($database_localhost, $localhost);
$query_services2 = "SELECT * FROM service WHERE Direction = 1 ORDER BY Service LIMIT 1";
$services2 = mysql_query($query_services2, $localhost) or die(mysql_error());
$row_services2 = mysql_fetch_assoc($services2);
$totalRows_services2 = mysql_num_rows($services2);
  
  if ($totalRows_services2 == 0){ $sccc = '-1';}
  else {$sccc = $row_services2['Id'];}


$colname2_effective9 = $row_services2['Id'];
$colname_effective9 = "-1";
if (isset($_SESSION['License'])) {
  $colname_effective9 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_effective9 = sprintf("SELECT Id FROM loading_effective WHERE License = %s AND Service_FK = %s ORDER BY Effective", GetSQLValueString($colname_effective9, "int"),GetSQLValueString($colname2_effective9, "int"));
$effective9 = mysql_query($query_effective9, $localhost) or die(mysql_error());
$row_effective9 = mysql_fetch_assoc($effective9);
$totalRows_effective9 = mysql_num_rows($effective9);

if ($totalRows_effective9 == 0){$cap = '-1';} else {
$cap = $row_effective9['Id'];}
  $pro2 = 9;
	  if ($pro2 == $_GET['ls'])
	  {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
    <td align="left"><?php echo "<a href=\"javascript:firstpro('9', '$sccc', '$cap');\">" ; ?>Procedures</a></td>
  </tr>
</table>
</body>
</html>