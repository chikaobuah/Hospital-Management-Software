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

$colname_effective = "-1";
if (isset($_SESSION['License'])) {
  $colname_effective = $_SESSION['License'];
}
$colname2_effective = "-1";
if (isset($_GET['sc'])) {
  $colname2_effective = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_effective = sprintf("SELECT Id, Effective,DATE_FORMAT(Effective,  ' %%d-%%b-%%Y') AS formatted_date FROM client_effective WHERE License = %s AND Service_FK = %s ORDER BY Effective", GetSQLValueString($colname_effective, "int"),GetSQLValueString($colname2_effective, "int"));
$effective = mysql_query($query_effective, $localhost) or die(mysql_error());
$row_effective = mysql_fetch_assoc($effective);
$totalRows_effective = mysql_num_rows($effective);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="../common/datetimepicker_css.js"></script>
</head>

<body>
<form method="post" name="form199" id="form199">
<table width="100%" align="left" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;" class="sample">
  <tr bgcolor="#b0b0b0" class="header">
    <td colspan="2">Effective</td>
  </tr>
  
  <?php 
  
  if ($_GET['sc'] > 0)
  {
			$disable = "" ;} 
		 
		 else {$disable = "disabled=\"disabled\"" ;}
		 
			
			
			?>
  <?php do {  $pro2 = $row_effective['Id']; 
  
  if ($totalRows_effective>0) {
  
	  if ($pro2 == $_GET['ef'])
	 {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; 
           
  
     echo "<td>";
	 
	
	$pro2 = $row_effective['Id']; $pro3 = $_GET['pr']; $pro4 = $_GET['sc']; echo "<a href=\"javascript:third('$pro3', '$pro2', '$pro4');\" class=\"home\" title=\"Select\"></a>"; echo "</td>";
      echo "<td><input type=\"text\" disabled=\"disabled\" name=\"date\" id=\"date\" value=\"";
		echo $row_effective['formatted_date']; echo "\" style=\"height:100%;width:100%;\"/></td>
    </tr>";
  } } while ($row_effective = mysql_fetch_assoc($effective)); ?>
    
    <input type="hidden" name="sc" id="sc" value="<?php echo $_GET['sc'] ; ?>"/>
    <input type="hidden" name="session" id="session" value="<?php echo $_SESSION['License'] ; ?>"/>
    <input type="hidden" name="pr" id="pr" value="<?php echo $_GET['pr'] ; ?>"/>
     <input type="hidden" name="ef" id="ef" value="<?php echo $_GET['ef'] ; ?>"/>
    
<tr bgcolor="#e5e5e5" >
      <td align="left" colspan="2" valign="top"><input type="text" name="Start_date2" id="Start_date2" <?php echo $disable; ?> readonly="readonly" 
      <?php echo "onclick=\"validate6('$_GET[sc]','$_GET[pr]','$_GET[ef]','$_SESSION[License]');\"" ;?> value="" style="height:100%;width:75%;"/>
      <a class="no" href="javascript:NewCssCal('Start_date2','yyyymmdd')"><img src="../images/icons/calendar.png" width="16" height="16" alt="Pick a date" /></a></td>
    </tr>
<tr bgcolor="#e5e5e5" >
  <td align="left" colspan="2" valign="top"><div class="error" id="Error13">Dates should be like 2010-12-31</div></td>
</tr>
</table>
</form>
</body>
</html>
<?php
mysql_free_result($effective);
?>
