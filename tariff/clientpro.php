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

$colname_clientpro = "-1";
if (isset($_SESSION['License'])) {
  $colname_clientpro = $_SESSION['License'];
}
$colname2_clientpro = "-1";
if (isset($_GET['pr'])) {
  $colname2_clientpro = $_GET['pr'];
}
$colname4_clientpro = "-1";
if (isset($_GET['sc'])) {
  $colname4_clientpro = $_GET['sc'];
}

$colname_procedure = "-1";
if (isset($_GET['sc'])) {
  $colname_procedure = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_procedure = sprintf("SELECT * FROM `procedure` WHERE Service_direction_FK = %s", GetSQLValueString($colname_procedure, "int"));
$procedure = mysql_query($query_procedure, $localhost) or die(mysql_error());
$row_procedure = mysql_fetch_assoc($procedure);
$totalRows_procedure = mysql_num_rows($procedure);

$colname_check = "-1";
if (isset($_GET['ef'])) {
  $colname_check = $_GET['ef'];
}
$colname1_check = "-1";
if (isset($_SESSION['License'])) {
  $colname1_check = $_SESSION['License'];
}

$date = date('Y-m-d');

mysql_select_db($database_localhost, $localhost);
$query_check = sprintf("SELECT Id FROM client_effective WHERE License = %s AND Effective > '$date' AND Id = %s ORDER BY Effective", GetSQLValueString($colname1_check, "int"),GetSQLValueString($colname_check, "int"));
$check = mysql_query($query_check, $localhost) or die(mysql_error());
$row_check = mysql_fetch_assoc($check);
$totalRows_check = mysql_num_rows($check);

if ($totalRows_check > 0){
	
	$disable = ""; } else { $disable = "disabled=\"disabled\""; }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body><form method="post" name="form19" id="form19">
<table width="100%" align="left" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;" class="sample">
  <tr bgcolor="#b0b0b0" class="header">
    <td colspan="3" align="center">Procedure</td>
  </tr>
   <input type="hidden" name="session" id="session" value="<?php echo $_SESSION['License'] ; ?>"/>
    <input type="hidden" name="pr" id="pr" value="<?php echo $_GET['pr'] ; ?>"/>
     <input type="hidden" name="ef" id="ef" value="<?php echo $_GET['ef'] ; ?>"/>
     <input type="hidden" name="sc" id="sc" value="<?php echo $_GET['sc'] ; ?>"/>
  <?php
  function money($amount,$separator=true,$simple=false){
    return
        (true===$separator?
            (false===$simple?
                number_format($amount,2,'.',','):
                str_replace('.00','',money($amount))
            ):
            (false===$simple?
                number_format($amount,2,'.',''):
                str_replace('.00','',money($amount,false))
            )
        );
}
  
  
  
  do { ?>
  
 
     <input type="hidden" name="eff" id="eff" value="<?php echo $row_procedure['Id']; ?>"/>
    <tr bgcolor="#e5e5e5">
 <?php
  

  $colname_Recordset3 = $row_procedure['Id'];
   $colname2_Recordset3 = $_SESSION['License'];
    $colname3_Recordset3 = $_GET['ef'];
	$colname4_Recordset3 = $_GET['pr'];

mysql_select_db($database_localhost, $localhost);
$query_Recordset3 = sprintf("SELECT * FROM client_procedures WHERE Procedure_FK = %s AND License = %s AND Effective_FK = %s AND Client_FK = %s"
							, GetSQLValueString($colname_Recordset3, "int")
							, GetSQLValueString($colname2_Recordset3, "int")
							, GetSQLValueString($colname3_Recordset3, "int")
							, GetSQLValueString($colname4_Recordset3, "int"));

$Recordset3 = mysql_query($query_Recordset3, $localhost) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3); 
 ?>
 <input type="hidden" name="tariff2" id="tariff2" value="<?php echo $row_Recordset3['Tariff']; ?>" style="height:100%;width:100%;"/>
      <input type="hidden" name="procedure" id="procedure" value="<?php echo $row_Recordset3['Id']; ?>"/>
      <td width="14%" align="left" ><input type="text" name="tariff" <?php echo "onchange=\"AddPro('$row_Recordset3[Tariff]','$row_Recordset3[Id]','$row_procedure[Id]',this.value);\" "?> id="tariff" <?php echo $disable;?> 
      value="<?php echo money($row_Recordset3['Tariff']);?>" style="height:100%;width:98%; text-align:right;" onblur="this.value=formatCurrency(this.value);"/></td>
      <td width="86%" align="left" >&nbsp;&nbsp;&nbsp;<?php echo $row_procedure['Short']; ?></td>

    </tr>
    <?php } while ($row_procedure = mysql_fetch_assoc($procedure)); ?>
</table></form>
</body>
</html>
<?php
mysql_free_result($procedure);

mysql_free_result($check);

mysql_free_result($Recordset3);
?>
