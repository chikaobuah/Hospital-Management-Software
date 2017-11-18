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

$colname_Recordset90 = "-1";
if (isset($_SESSION['License'])) {
  $colname_Recordset90 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset90 = sprintf("SELECT * FROM scheme WHERE Licensee = %s", GetSQLValueString($colname_Recordset90, "int"));
$Recordset90 = mysql_query($query_Recordset90, $localhost) or die(mysql_error());
$row_Recordset90 = mysql_fetch_assoc($Recordset90);
$totalRows_Recordset90 = mysql_num_rows($Recordset90);

$colname_schemeslist = "-1";
if (isset($_SESSION['License'])) {
  $colname_schemeslist = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_schemeslist = sprintf("SELECT scheme.Scheme     ,    scheme.Licensee     , scheme.LId     , scheme.Created     , scheme.Creator     , scheme.Scheme     , scheme.Program_FK     , scheme.HMO_FK     , scheme.Retainer_FK   , scheme.Paying     , scheme.Fee,     scheme.Company_FK     , scheme.Stay_frequency,scheme.Frequency_FK     , scheme.Commenced     , scheme.Capitation     , scheme.Bed_Type_FK     , scheme.Stay_duration     , scheme.Status     , scheme.Status_Note, scheme_payment.Amount     , scheme_payment.Enrolee_count     , scheme_payment.Start_date     , scheme_payment.Expiry_date     , scheme_status.Status,  DATE_FORMAT(scheme_payment.Expiry_date,  ' %%d-%%b-%%Y') AS formatted_date FROM newmed06.scheme     INNER JOIN newmed06.scheme_payment          ON (scheme.Fee = scheme_payment.Id)     INNER JOIN newmed06.scheme_status          ON (scheme.Status = scheme_status.Id) WHERE scheme.Licensee = %s ORDER BY scheme_payment.Expiry_date", GetSQLValueString($colname_schemeslist, "int"));
$schemeslist = mysql_query($query_schemeslist, $localhost) or die(mysql_error());
$row_schemeslist = mysql_fetch_assoc($schemeslist);
$totalRows_schemeslist = mysql_num_rows($schemeslist);


$days =date('Y-m-d h:m:s');	
$end_date = strtotime(date("Y-m-d", strtotime($days)) . " +30 day");
$end_date = date("Y-m-d", $end_date);
$end_date;


$date = date('Y-m-d h:m:s');

$colname_Recordset100 = "-1";
if (isset($_SESSION['License'])) {
  $colname_Recordset100 = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset100 = sprintf("SELECT scheme.Licensee     , scheme.LId     , scheme.Created     , scheme.Creator     , scheme.Scheme     , scheme.Program_FK     , scheme.HMO_FK     , scheme.Retainer_FK     , scheme.Frequency_FK     , scheme.Commenced     , scheme.Capitation     , scheme.Bed_Type_FK     , scheme.Stay_duration     , scheme.Status     , scheme.Status_Note     , scheme.Company_FK     , scheme.Stay_frequency     , scheme.Paying     , scheme.Fee, scheme.Scheme     , scheme_payment.Amount     , scheme_payment.Enrolee_count     , scheme_payment.Start_date     , scheme_payment.Expiry_date     , scheme_status.Status,  DATE_FORMAT(scheme_payment.Expiry_date,  ' %%d- %%b- %%Y') AS formatted_date FROM newmed06.scheme     INNER JOIN newmed06.scheme_payment          ON (scheme.Fee = scheme_payment.Id)     INNER JOIN newmed06.scheme_status          ON (scheme.Status = scheme_status.Id) WHERE scheme.Licensee = %s AND scheme_payment.Expiry_date <= '$end_date' AND scheme.Status = 1", GetSQLValueString($colname_Recordset100, "int"));
$Recordset100 = mysql_query($query_Recordset100, $localhost) or die(mysql_error());
$row_Recordset100 = mysql_fetch_assoc($Recordset100);
$totalRows_Recordset100 = mysql_num_rows($Recordset100);

$colname_schemepay = "-1";
if (isset($_GET['sc'])) {
  $colname_schemepay = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_schemepay = sprintf("SELECT Id, Scheme_FK, Amount, Paying, Frequency, Expiry_date, Created, Creator, Enrolee_count, Licensee, Start_date,DATE_FORMAT(scheme_payment.Expiry_date,  ' %%d-%%b-%%Y') AS formatted_date,DATE_FORMAT(scheme_payment. Start_date,  ' %%d-%%b-%%Y') AS formatted_date2 FROM scheme_payment WHERE Scheme_FK = %s ORDER BY Start_date ", GetSQLValueString($colname_schemepay, "int"));
$schemepay = mysql_query($query_schemepay, $localhost) or die(mysql_error());
$row_schemepay = mysql_fetch_assoc($schemepay);
$totalRows_schemepay = mysql_num_rows($schemepay);

mysql_select_db($database_localhost, $localhost);
$query_Count = "SELECT COUNT(*) AS 'count' FROM scheme_payment";
$Count = mysql_query($query_Count, $localhost) or die(mysql_error());
$row_Count = mysql_fetch_assoc($Count);
$totalRows_Count = mysql_num_rows($Count);

$colname_paying = "-1";
if (isset($_GET['sc'])) {
  $colname_paying = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_paying = sprintf("SELECT Capitation FROM scheme_capitation WHERE Scheme = %s AND Effective <= '$date'", GetSQLValueString($colname_paying, "int"));
$paying = mysql_query($query_paying, $localhost) or die(mysql_error());
$row_paying = mysql_fetch_assoc($paying);
$totalRows_paying = mysql_num_rows($paying);

$colname_schemecap = "-1";
if (isset($_GET['sc'])) {
  $colname_schemecap = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_schemecap = sprintf("SELECT Capitation FROM scheme WHERE LId = %s", GetSQLValueString($colname_schemecap, "int"));
$schemecap = mysql_query($query_schemecap, $localhost) or die(mysql_error());
$row_schemecap = mysql_fetch_assoc($schemecap);
$totalRows_schemecap = mysql_num_rows($schemecap);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">var GB_ROOT_DIR = "http://localhost/advance_php_paging/greybox/";</script>
<script type="text/javascript" src="../greybox/AJS.js"></script>
<script type="text/javascript" src="../greybox/AJS_fx.js"></script>
<script type="text/javascript" src="../greybox/gb_scripts.js"></script>
<link href="../greybox/gb_styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../common/datetimepicker_css.js"></script>
<title>Untitled Document</title>
<style>
  .error {
  font-family: Tahoma;
font-size: 8pt;
  color: red;
  margin-left: 0px;
  display:none;
  float:left;
  }
  
</style>
<script>

</script>
</head>

<body>
<form method="post" name="form90" id="form90">
<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;" class="sample" >
  <tr bgcolor="#b0b0b0" >
    <td width="6%">&nbsp;</td>
    <td width="94%" class="header">Start date</td>
  </tr>
  <?php do { ?>
    <?php $pro2 = $row_schemepay['Id']; ?>
   <?php 
	  if ($pro2 == $_GET['id'])
	 {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		    ?>
<?php  if ($totalRows_schemepay > 0) {  
  echo "<tr align=\"left\" bgcolor=\"$color\">";
   echo "<td align=\"right\">";
			$sc = $_GET['sc'];
			$pl = $_GET['pl'];
			$co = $_GET['co'];
			$eff = $row_schemepay['Id']; 
			
			 if ($sc >= 0)

		{
			 echo "<a href=\"javascript:fourth('$co','$pro2','$sc','$eff');\" class=\"home\" title=\"Select\">&nbsp;</a>";
			}
			
			echo "</td>";
echo "<td align=\"right\"><input type=\"text\" disabled=\"disabled\" name=\"date\" id=\"date\" value=\"";
 echo $row_schemepay['formatted_date2']; echo "\" style=\"height:111%;width:100%;\"/>"; echo "</td>";
     
    echo "</tr>"; } ?>
  <?php } while ($row_schemepay = mysql_fetch_assoc($schemepay)); ?>
    <?php 
	  
	  $sch = $_GET['sc'];
	  
	  if ($sch < 0)
		
		{
			$checkthe= "disabled=\"disabled\"" ;
			} else { $checkthe= "" ;}
			
			?>
<tr align="left" bgcolor="#e5e5e5">
      <td align="left">&nbsp;</td>
      <td align="left" valign="top"></a>
        <input type="text" name="Start_date"  id="Start_date" <?php echo $checkthe; ?> readonly="readonly" value="" onclick="validate10();" style="height:100%;width:75%;" />
      <a class="no" href="javascript:NewCssCal('Start_date','yyyymmdd')"><img src="../images/icons/calendar.png" width="20px" height="16" alt="Pick a date" /></a></td>
    </tr>
    <tr valign="baseline">
    <td><input type="hidden" id="Scheme_FK" name="Scheme_FK" value="<?php echo $_GET['sc']; ?>" size="32" />
      <input type="hidden" id="Id" name="Id" value="<?php echo $count = $row_Count['count'] + 1 ; ?>" size="32" />
      <input type="hidden" id="sc" name="sc" value="<?php echo $_GET['sc']; ?>" size="32" /></td>
    <td><div class = "error" id = "Empty3">These fields cannot be blank</div></td>
    </tr>
    <tr valign="baseline">
      <td>&nbsp;</td>
      <td><input type="hidden" id="cap" name="cap" value="<?php echo $row_schemecap['Capitation']; ?>" size="32" />
        <input type="hidden" id="Licensee" name="Licensee" value="<?php echo $_SESSION["License"]; ?>" size="32" />
        <input type="hidden" id="pl" name="pl" value="<?php echo $_GET['pl']; ?>" size="32" />
        <input type="hidden" id="company" name="company" value="<?php echo $_GET['co']; ?>" size="32" />
        <input type="hidden" id="Frequency" name="Frequency" value="" size="32" />
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" size="32"  />
        <input type="hidden" name="Paying" value="<?php echo $row_paying['Capitation']; ?>" size="32"  />
        <input type="hidden" id="Enrolee_count" name="Enrolee_count" value="" size="32" style="width:100%; height:25px; border-top:1px solid #7c7c7c;
																	border-left:1px solid #c3c3c3;
																	border-right:1px solid #c3c3c3;
																	border-bottom:1px solid #ddd;"/>
        <input type="hidden" id="Created" name="Created" value="<?php echo date('Y-m-d h:m:s'); ?>" size="32" />
        <input type="hidden" id="fre" name="fre" value="<?php echo $_GET['fre']; ?>" size="32" />
        <input type="hidden" id="Creator" name="Creator" value="<?php echo $row_recuser['LId']; ?>" size="32" />
        <input type="hidden" name="Amount" id="Amount" <?php echo $checkthe; ?> value="" onchange="validate10();" style="height:115%;width:99%;"/>
      <input type="hidden" id="paying" name="paying" value="<?php echo $paying2; ?>" size="32" /></td>
    </tr>
</table>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset90);

mysql_free_result($schemeslist);

mysql_free_result($Recordset100);

mysql_free_result($schemepay);

mysql_free_result($Count);

mysql_free_result($paying);

mysql_free_result($schemecap);
?>
