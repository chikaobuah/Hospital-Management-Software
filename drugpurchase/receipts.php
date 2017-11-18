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

$colname_receipts = "-1";
if (isset($_SESSION['License'])) {
  $colname_receipts = $_SESSION['License'];
}
$colname2_receipts = "-1";
if (isset($_GET['pr'])) {
  $colname2_receipts = $_GET['pr'];
}
mysql_select_db($database_localhost, $localhost);
$query_receipts = sprintf("SELECT Licensee_Hqs     , LId     , Created     , Creator     , Order_No     , Supplier     , Receipt_No     , Receipted     , Total_Cost     , upsize_ts     , Client_FK , DATE_FORMAT(Created,'%%d-%%b-%%Y') AS formatted_date FROM purchase WHERE Licensee_Hqs = %s AND Client_FK = %s ORDER BY Created", GetSQLValueString($colname_receipts, "int"),GetSQLValueString($colname2_receipts, "int"));
$receipts = mysql_query($query_receipts, $localhost) or die(mysql_error());
$row_receipts = mysql_fetch_assoc($receipts);
$totalRows_receipts = mysql_num_rows($receipts);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../common/datetimepicker_css.js"></script>
<title>Untitled Document</title>

</head>

<body><form  method="post" onSubmit="validate();" id="form45" name="form45">
<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;" class="sample">
  <tr bgcolor="#b0b0b0" >
    <td>&nbsp;</td>
    <td align="center"><font size="+1">Order No</font></td>
    <td align="center"><font size="+1">Receipt No</font></td>
    <td align="center"><font size="+1">Date</font></td>
  </tr>
  
  
  <?php do { ?>
          
          
    <?php $pro2 = $row_receipts['LId']; ?>
   <?php 
	  if ($pro2 == $_GET['rc'])
	  {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  
			
			  }		 
			  
			  if ($totalRows_receipts  > 0) {
			  
			  echo "<tr align=\"left\" bgcolor=\"$color\" >"; 
           
     echo "<td>";
	 $pro3 = $_GET['pr']; 
	echo "<a href=\"javascript:second('$pro3','$pro2');\" class=\"home\" title=\"Select\"></a>";
	 echo "</td>";
     echo "<td align=\"left\">";
	 echo "<input type=\"text\" style=\"width:100%; height:100%;\"  disabled=\"disabled\"  name=\"pr3\" id=\"pr3\"  value=\"";
     echo $row_receipts['Order_No']; 
     echo "\"/></td>";
     echo "<td align=\"left\">";
	 echo "<input type=\"text\" style=\"width:100%; height:100%;\"  disabled=\"disabled\" name=\"pr4\" id=\"pr4\"  value=\"";
     echo $row_receipts['Receipt_No']; 
     echo "\"/></td>";
     echo "<td align=\"left\">";
	 echo "<input type=\"text\" style=\"width:96%; height:100%;\" disabled=\"disabled\" name=\"pr5\" id=\"pr5\"  value=\"";
	 echo $row_receipts['formatted_date']; 
	 echo "\"/></td>
    </tr>";
     /*insert.php*/} } while ($row_receipts = mysql_fetch_assoc($receipts)) ; ?>
    <input type="hidden" name="pr" id="pr"   value="<?php echo $_GET['pr']; ?>"/>
    <input type="hidden" name="rc" id="rc"  value="<?php echo $_GET['rc']; ?>"/>
     <tr bgcolor="#e5e5e5" >
    <td valign="top">&nbsp;</td>
    <td valign="top"><input type="text" name="ono2" id="ono2" style="width:100%;height:100%;" /></td>
    <td valign="top"><input type="text" name="rno" id="rno" style="width:100%; height:100%;" /></td>
    <td align="left" valign="top"><input type="text" name="created2" readonly="readonly" onclick="return validate();" id="created2" style="width:75%; height:100%;"/><a class="no" href="javascript:NewCssCal('created2','yyyymmdd')"><img src="../images/icons/calendar.png" width="16" height="16" alt="Pick a date"></a></td>
  </tr>
     <tr bgcolor="#e5e5e5" >
       <td valign="top">&nbsp;</td>
       <td valign="top" colspan="3"><div class= "error" id="Error">These fields cannot be empty</div>
       <div class= "error" id="Error2">These fields cannot be empty</div>
       <div class= "error" id="nodateError">Dates should be like 2010-12-31</div>
       </td>

     </tr>
</table>
</form>
</body>
</html>
<?php
mysql_free_result($receipts);
?>
