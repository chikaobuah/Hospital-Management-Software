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


$colname_capitation2 = "-1";
if (isset($_SESSION['License'])) {
  $colname_capitation2 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_capitation2 = sprintf("SELECT * FROM capitation WHERE Licensee = %s  ORDER BY Amount", GetSQLValueString($colname_capitation2, "int"));
$capitation2 = mysql_query($query_capitation2, $localhost) or die(mysql_error());
$row_capitation2 = mysql_fetch_assoc($capitation2);
$totalRows_capitation2 = mysql_num_rows($capitation2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body><form method="post" name="form11" id="form11">
<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;" class="sample">
  <tr bgcolor="#b0b0b0" >

    <td colspan="2" align="center" class="header">Limit</td>
  </tr>
  <?php do { ?>
  <?php $pro2 = $row_capitation2['Amount']; ?>
  <?php 
	  if ($pro2 == $_GET['li'])
	  {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
    <td><?php $ef = $_GET['ef']; $sc = $_GET['sc']; $li = $_GET['li'];echo "<a href=\"javascript:second('$ef', '$pro2', '$sc');\" class=\"home\" title=\"Select\"></a>" ?></td>
    <td><input type="text" disabled="disabled" name="date" id="date" value="<?php echo $row_capitation2['Amount']; ?>" style="height:100%;width:99%;"/></td>
  </tr>
 <?php } while ($row_capitation2 = mysql_fetch_assoc($capitation2)); ?>
 
  
    <input type="hidden" name="session" id="session" value="<?php echo $_SESSION['License'] ; ?>"/>
    <input type="hidden" name="ef" id="ef" value="<?php echo $_GET['ef'] ; ?>"/>
     <input type="hidden" name="li" id="li" value="<?php echo $_GET['li'] ; ?>"/>
      <input type="hidden" name="sc" id="sc" value="<?php echo $_GET['sc'] ; ?>"/>
    <tr bgcolor="#e5e5e5" >
      <td align="left" colspan="2"><input type="text" name="Start_date2" onChange="isNumeric(document.getElementById('Start_date2'));" id="Start_date2" value="" style="height:15px;width:99%;"/><br><div class= "error" id="nonumberError">Capitation Numerals only</div></td>
    </tr>
</table> </form>
</body>
</html>
<?php
mysql_free_result($capitation2);
?>
