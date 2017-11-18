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

$colname_Recordset14 = "-1";
if (isset($_GET['sc'])) {
  $colname_Recordset14 = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset14 = sprintf("SELECT     scheme_capitation.Id     , scheme_capitation.Scheme     , scheme_capitation.Capitation     , scheme_capitation.Effective     , scheme_capitation.Frequency AS fre     , frequency.Frequency , DATE_FORMAT( Effective,  ' %%d-%%b-%%Y') AS formatted_date FROM     newmed06.scheme_capitation     INNER JOIN newmed06.frequency          ON (scheme_capitation.Frequency = frequency.Id)   WHERE Scheme = %s ORDER BY Effective DESC", GetSQLValueString($colname_Recordset14, "int"));
$Recordset14 = mysql_query($query_Recordset14, $localhost) or die(mysql_error());
$row_Recordset14 = mysql_fetch_assoc($Recordset14);
$totalRows_Recordset14 = mysql_num_rows($Recordset14);$colname_Recordset14 = "-1";
if (isset($_GET['sc'])) {
  $colname_Recordset14 = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset14 = sprintf("SELECT scheme_capitation.Id     , scheme_capitation.Scheme     , scheme_capitation.Capitation     , scheme_capitation.Effective     , scheme_capitation.Frequency AS fre     , frequency.Frequency , DATE_FORMAT( Effective,  ' %%d-%%b-%%Y') AS formatted_date FROM newmed06.scheme_capitation     INNER JOIN newmed06.frequency          ON (scheme_capitation.Frequency = frequency.Id) WHERE Scheme = %s ORDER BY Effective DESC", GetSQLValueString($colname_Recordset14, "int"));
$Recordset14 = mysql_query($query_Recordset14, $localhost) or die(mysql_error());
$row_Recordset14 = mysql_fetch_assoc($Recordset14);
$totalRows_Recordset14 = mysql_num_rows($Recordset14);

$colname_Current = "-1";
if (isset($_GET['sc'])) {
  $colname_Current = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_Current = sprintf("SELECT Licensee, LId, Created, Creator, Scheme, Program_FK, HMO_FK, Retainer_FK, Frequency_FK, Commenced, Capitation, Bed_Type_FK, Stay_duration, Status, Status_Note, upsize_ts, Company_FK, Stay_frequency, Paying, Fee, DATE_FORMAT( Commenced,  ' %%D %%b %%Y') AS formatted_date,    frequency.Frequency FROM newmed06.scheme     INNER JOIN newmed06.frequency          ON (scheme.Frequency_FK = frequency.Id) WHERE LId = %s", GetSQLValueString($colname_Current, "int"));
$Current = mysql_query($query_Current, $localhost) or die(mysql_error());
$row_Current = mysql_fetch_assoc($Current);
$totalRows_Current = mysql_num_rows($Current);

mysql_select_db($database_localhost, $localhost);
$query_fre = "SELECT * FROM frequency";
$fre = mysql_query($query_fre, $localhost) or die(mysql_error());
$row_fre = mysql_fetch_assoc($fre);
$totalRows_fre = mysql_num_rows($fre);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../common/datetimepicker_css.js"></script>

<title>Untitled Document</title>
 <?php 
	  
	  $sch = $_GET['sc'];
	  
	  if ($sch >= 0)
		
		{
			$disable = "" ;} 
		 
		 else {$disable = "disabled=\"disabled\"" ;}
			
			?>
</head>

<body> <form method="post" id="form1" name="form1">
<table width="100%" align="left" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;" class="sample">
  <tr bgcolor="#b0b0b0">
    <td>&nbsp;</td>
    <td align="center"><font size="+1">Effective</font></td>
    <td align="center"><font size="+1">Capitation</font></td>
    <td align="center"><font size="+1">Frequency</font></td>
    <td align="center">&nbsp;</td>
  </tr>
  <?php do { if ($totalRows_Recordset14>0){
    echo "<tr bgcolor=\"#e5e5e5\" align=\"left\">";
     echo "<td>&nbsp;</td>";
      echo "<td><input type=\"text\" name=\"textfield\" id=\"textfield\" value=\"";
	  echo $row_Recordset14['formatted_date']; echo "\" style=\"height:100%;width:100%;\" disabled=\"disabled\"/></td>
      <td>";
       echo "<input type=\"text\" name=\"textfield2\" id=\"textfield2\" value=\"";
	   echo $row_Recordset14['Capitation']; echo "\" style=\"height:100%;width:100%;\" disabled=\"disabled\"/>
      </td>
      <td><input type=\"text\" name=\"textfield3\" id=\"textfield3\" value=\"";
	  echo $row_Recordset14['Frequency']; echo "\" style=\"height:100%;width:97%;\" disabled=\"disabled\"/></td>
      <td>&nbsp;</td>
    </tr>";
  } } while ($row_Recordset14 = mysql_fetch_assoc($Recordset14)); ?>
   <tr bgcolor="" align="left">
    <td ><a href="javascript:NewCssCal('Commenced','yyyymmdd')"><img src="../images/icons/calendar.png" width="16" height="16" alt="Pick a date"></a></td>
      <td valign="top"><input type="text" name="Commenced" id="Commenced" readonly="readonly" value="" <?php echo $disable; ?> style="height:100%;width:100%;"/></td>
      <td valign="top"><input type="text" name="capitation" id="capitation" value="" <?php echo $disable; ?> style="height:100%;width:100%;"/></td>
      <td valign="top"><select name="fre" id="fre" style="width:103%; height:22px;" <?php echo $disable; ?> onchange="return validate5();">
       <option value=""></option>
          <?php
do {  
?>
          <option value="<?php echo $row_fre['Id']?>"><?php echo $row_fre['Frequency']?></option>
          <?php
} while ($row_fre = mysql_fetch_assoc($fre));
  $rows = mysql_num_rows($fre);
  if($rows > 0) {
      mysql_data_seek($fre, 0);
	  $row_fre = mysql_fetch_assoc($fre);
  }
?>
      </select></td>
      <td><input type="hidden" name="scheme" id="scheme" value="<?php echo $_GET['sc']; ?>" style="height:100%;width:99%;"/>
      <input type="hidden" name="plan" id="plan" value="<?php echo $_GET['pl']; ?>" style="height:100%;width:99%;"/>
      <input type="hidden" name="company" id="company" value="<?php echo $_GET['co']; ?>" style="height:100%;width:99%;"/>
            <input type="hidden" name="id" id="id" value="<?php echo $_GET['co']; ?>" style="height:100%;width:99%;"/>
     </td>
    </tr>
   <tr bgcolor="#e5e5e5" align="left">
     <td >&nbsp;</td>
     <td valign="top" colspan="3"><div class= "error" id="Error9">These fields cannot be empty</div>
     <div class= "error" id="Error10">Capitation Numerals only</div>
     <div class= "error" id="Error11">These fields cannot be empty</div></td>
     <td valign="top">&nbsp;</td>
   </tr>
</table>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset14);

mysql_free_result($Current);

mysql_free_result($fre);
?>
