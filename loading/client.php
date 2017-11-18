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

$colname_client = "-1";
if (isset($_SESSION['License'])) {
  $colname_client = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_client = sprintf("SELECT * FROM client WHERE Licensee_Hqs = %s", GetSQLValueString($colname_client, "int"));
$client = mysql_query($query_client, $localhost) or die(mysql_error());
$row_client = mysql_fetch_assoc($client);
$totalRows_client = mysql_num_rows($client);



$colname_eff = "-1";
if (isset($_GET['ef'])) {
  $colname_eff = $_GET['ef'];
}
mysql_select_db($database_localhost, $localhost);
$query_eff = sprintf("SELECT * FROM loading_effective WHERE Id = %s", GetSQLValueString($colname_eff, "int"));
$eff = mysql_query($query_eff, $localhost) or die(mysql_error());
$row_eff = mysql_fetch_assoc($eff);
$totalRows_eff = mysql_num_rows($eff);


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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body><form id="form201" name="form201" method="post" action="clientinsert.php">

<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;" class="sample">
  <tr bgcolor="#b0b0b0" >

  <td  align="center"><strong>%</strong></td>
   <td align="center" class="header">Client</td>

  </tr>
    <input name="session" type="hidden" value="<?php echo $_SESSION['License']; ?>"/>
  <input name="effective" type="hidden" value="<?php echo $_GET['ef']; ?>"/>
  <input name="list" type="hidden" value="<?php echo $_GET['ls']; ?>"/>
    <input name="sc" type="hidden" value="<?php echo $_GET['sc']; ?>"/>
  <?php do { ?>
  <input name="Client" type="hidden" value="<?php echo $row_client['Client']; ?>"/>
  <input name="Id" type="hidden" value="<?php echo $row_client['LId']; ?>"/>

    <tr bgcolor="#e5e5e5">
       <?php 
	  
	  $sch = $_GET['ef'];
	  
	  if ($sch >= 0)
		
		{
			$eff = $row_eff['Effective'];
			$day = date('Y-m-d h:i:s');
			
			$today = strtotime($day);
			$effective = strtotime($eff);
			
			if ($effective > $today )
			{
			$disable = "" ;} 
		 
		 else {$disable = "disabled=\"disabled\"" ;}
		 
			} else {$disable = "disabled=\"disabled\"" ;}
			
			?>
            
      <?php
	  
	  
	  
	  
$colname_loading = $row_client['LId'];

$colname2_loading = "-1";
if (isset($_GET['ef'])) {
  $colname2_loading = $_GET['ef'];
}
mysql_select_db($database_localhost, $localhost);
$query_loading = sprintf("SELECT * FROM client_loading WHERE Client_FK = %s AND %s = Effective_FK", GetSQLValueString($colname_loading, "int"),GetSQLValueString($colname2_loading, "int"));
$loading = mysql_query($query_loading, $localhost) or die(mysql_error());
$row_loading = mysql_fetch_assoc($loading);
$totalRows_loading = mysql_num_rows($loading);
      ?>
      <td width="14%" align="left" height="20"><input name="Loading" <?php echo "onchange=\"addload(this.value,'$_GET[ls]','$_GET[ef]','$_GET[sc]','$_SESSION[License]','$row_loading[Id]','$row_client[Client]','$row_client[LId]','clientinsert.php','client.php');\"" ;?>id="Loading" <?php echo $disable; ?> type="text" value="<?php echo money($load = $row_loading['Loading']);?>" style="width:100%; height:100%; text-align:right;"  onblur="this.value=formatCurrency(this.value);"/></td>
      <input name="Load" type="hidden" value="<?php echo $load; ?>" style="width:100%"/>

      <td width="86%" align="left">&nbsp;&nbsp;&nbsp;<?php echo $row_client['Client']; ?>
        <input name="Id2" type="hidden" value="<?php echo $row_loading['Id']; ?>"/></td>
    </tr>
    <?php } while ($row_client = mysql_fetch_assoc($client)); ?>
</table></form>
</body>
</html>
<?php
mysql_free_result($client);

mysql_free_result($loading);

?>
