<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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


$colname_reclisschemes = "-1";
if (isset($_SESSION['License'])) {
  $colname_reclisschemes = $_SESSION['License'];
}
$colname2_reclisschemes = "-1";
if (isset($_GET['pl'])) {
  $colname2_reclisschemes = $_GET['pl'];
}
$colname3_reclisschemes = "-1";
if (isset($_GET['co'])) {
  $colname3_reclisschemes = $_GET['co'];
}
mysql_select_db($database_localhost, $localhost);
$query_reclisschemes = sprintf("SELECT     scheme.Scheme     , client.Client     , client.Short     , client.LId AS cli    , scheme.LId     , scheme.Status FROM     newmed06.program     INNER JOIN newmed06.service          ON (program.Service_FK = service.Id)     INNER JOIN newmed06.scheme          ON (scheme.Program_FK = program.Id)     INNER JOIN newmed06.client          ON (scheme.HMO_FK = client.LId) WHERE Licensee = %s AND service.Id = %s AND scheme.Company_FK = %s ORDER BY scheme.Created", GetSQLValueString($colname_reclisschemes, "int"),GetSQLValueString($colname2_reclisschemes, "int"),GetSQLValueString($colname3_reclisschemes, "int"));
$reclisschemes = mysql_query($query_reclisschemes, $localhost) or die(mysql_error());
$row_reclisschemes = mysql_fetch_assoc($reclisschemes);
$totalRows_reclisschemes = mysql_num_rows($reclisschemes);

?>
</head>

<body><form method="post" id="form1">  
<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;" class="sample" >
  <tr bgcolor="#b0b0b0" >
    <td width="2%" >&nbsp;</td>
    <td width="43%" ><font size="+1">Plan</font></td>
    <td width="49%" class="header">Client</td>
    </tr>
  <?php 
  
  if ($totalRows_reclisschemes > 0) {
  
  do { ?>
  
          <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" style="height:100%;width:99%;"/> 
  
  <?php $pro2 = $row_reclisschemes['LId']; ?>
   <?php 
	  if ($pro2 == $_GET['sc'])
	 {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
  
  <?php 
/**********preload checking**************/
$session = $_SESSION['License'];

mysql_select_db($database_localhost, $localhost);
$query_idpay = "SELECT Id FROM scheme_payment WHERE Scheme_FK = $pro2 ORDER BY Start_date LIMIT 1";
$idpay = mysql_query($query_idpay, $localhost) or die(mysql_error());
$row_idpay = mysql_fetch_assoc($idpay);
$totalRows_idpay = mysql_num_rows($idpay);

$id = "-1";
if ($totalRows_idpay>0) {
  $id = $row_idpay['Id'];
}
?>
  
      <td align="left"><?php 
			$scheme = $row_reclisschemes['LId'];
			$pl = $_GET['pl'];
			$co = $_GET['co'];
			
			 if ($co >= 0)
		
		{
			 echo "<a href=\"javascript:second('$co','$pl','$scheme','$id');\" class=\"home\" title=\"Select\">&nbsp;</a>";
			}
			
			?>	
			</td>
      <td align="left">
            <input type="text" name="scheme" disabled="disabled" id="scheme" value="<?php echo $row_reclisschemes['Scheme']; ?>" style=" font-size:10px; height:100%; min-height:18px; width:99%;"/>
     </td>
      <td align="left">
            <select name="client" id="client" disabled="disabled" style="font-size:10px; height:24px; min-height:15px; width:100%;">
            <option value="<?php echo $row_reclisschemes['Cli']; ?>"><?php echo $row_reclisschemes['Client']; ?></option>
            </select>
      </td>
      
      </tr>
    <?php } while ($row_reclisschemes = mysql_fetch_assoc($reclisschemes)); }?>
    
  </tr>
    
</table></form>
</body>
</html>
<?php
mysql_free_result($reclisschemes);

?>
