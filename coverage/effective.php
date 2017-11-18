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
mysql_select_db($database_localhost, $localhost);
$query_effective = sprintf("SELECT Id, Effective,DATE_FORMAT(Effective,  ' %%d-%%b-%%Y') AS formatted_date FROM cover_effective WHERE License = %s ORDER BY Effective", GetSQLValueString($colname_effective, "int"));
$effective = mysql_query($query_effective, $localhost) or die(mysql_error());
$row_effective = mysql_fetch_assoc($effective);
$totalRows_effective = mysql_num_rows($effective);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
  <form  method="post" name="form9" id="form9">
<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;" class="sample">
  <tr bgcolor="#b0b0b0" >
    <td colspan="2" class="header">Effective</td>
  </tr>
  <?php do { ?>
    <?php $pro2 = $row_effective['Id']; ?>
   <?php 
	  if ($pro2 == $_GET['ef'])
	   {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
       
  
      <td><?php $pro2 = $row_effective['Id']; $sc = $_GET['sc']; $li = $_GET['li']; echo "<a href=\"javascript:first('$pro2', '$li', '$sc');\" class=\"home\" title=\"Select\"></a>" ?></td>
      <td><input type="text" disabled="disabled" name="date" id="date" value="<?php echo $row_effective['formatted_date']; ?>" style="height:100%;width:99%;"/></td>
    </tr>
    <?php } while ($row_effective = mysql_fetch_assoc($effective)); ?>
   
    
    <input type="hidden" name="session" id="session" value="<?php echo $_SESSION['License'] ; ?>"/>
    <input type="hidden" name="ef" id="ef" value="<?php echo $_GET['ef'] ; ?>"/>
        <input type="hidden" name="li" id="li" value="<?php echo $_GET['li'] ; ?>"/>
        <input type="hidden" name="sc" id="sc" value="<?php echo $_GET['sc'] ; ?>"/>
    
<tr bgcolor="#e5e5e5" >
      <td align="left" colspan="2"><input type="text" readonly="readonly" onClick="return validate();" name="Start_date19" id="Start_date19"  style="height:15px;width:75%;"/>
      <a class="no" href="javascript:NewCssCal('Start_date19','yyyymmdd')"><img src="../images/icons/calendar.png" width="16" height="16" alt="Pick a date" /></a><br><div class= "error" id="nodateError">Dates should be like 2010-12-31</div></td>
    </tr>
</table></form>
</body>
</html>
<?php
mysql_free_result($effective);
?>
