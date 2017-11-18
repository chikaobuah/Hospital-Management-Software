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

$slshowlistcontainer22e = $_GET['slshowlistcontainer22e'];
$colname_orders = "-1";
if (isset($_GET['rc'])) {
  $colname_orders = $_GET['rc'];
}
mysql_select_db($database_localhost, $localhost);
$query_orders = sprintf(" SELECT drug.Drug   , drug.Short  , drug_purchased.unit_price     , drug_purchased.quantity     , drug_purchased.expiry_date     , drug_purchased.Id ,drug_purchased.supplier     , drug_purchased.Creator     , drug_purchased.Created     , drug_purchased.upsize_tm     , drug_purchased.License     , drug_purchased.Summary     , drug_purchased.total     , drug_purchased.Purchase_FK FROM newmed06.drug_purchased     INNER JOIN newmed06.drug          ON (drug_purchased.stock_Id = drug.Id) WHERE Purchase_FK = %s AND drug_purchased.Id = $slshowlistcontainer22e ORDER BY drug_purchased.Created", GetSQLValueString($colname_orders, "int"));
$orders = mysql_query($query_orders, $localhost) or die(mysql_error());
$row_orders = mysql_fetch_assoc($orders);
$totalRows_orders = mysql_num_rows($orders);


mysql_select_db($database_localhost, $localhost);
$query_drug = "SELECT * FROM drug";
$drug = mysql_query($query_drug, $localhost) or die(mysql_error());
$row_drug = mysql_fetch_assoc($drug);
$totalRows_drug = mysql_num_rows($drug);

$number = $row_orders['unit_price'];
?>


 <select name="select4" id="select4" style="width:100%; height:22px;" <?php echo "onchange=\"UpdateOrd('$row_orders[Id]','$_GET[pr]','$_GET[rc]',this.value,'$number','$row_orders[quantity]')\"" ?>
        <option value="<?php echo $row_orders['Id']?>"><?php  echo $row_orders['Short']; ?></option>      
<?php
do {  
?>
        <option value="<?php echo $row_drug['Id']?>"><?php echo $row_drug['Short']?></option>
        <?php
} while ($row_drug = mysql_fetch_assoc($drug));
  $rows = mysql_num_rows($drug);
  if($rows > 0) {
      mysql_data_seek($drug, 0);
	  $row_drug = mysql_fetch_assoc($drug);
  }
  
?>
</select> 