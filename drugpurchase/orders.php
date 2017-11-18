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

$colname_orders = "-1";
if (isset($_GET['rc'])) {
  $colname_orders = $_GET['rc'];
}
mysql_select_db($database_localhost, $localhost);
$query_orders = sprintf(" SELECT drug.Drug   , drug.Short  , drug_purchased.unit_price     , drug_purchased.quantity     , drug_purchased.expiry_date     , drug_purchased.Id ,drug_purchased.supplier     , drug_purchased.Creator     , drug_purchased.Created     , drug_purchased.upsize_tm     , drug_purchased.License     , drug_purchased.Summary     , drug_purchased.total     , drug_purchased.Purchase_FK FROM newmed06.drug_purchased     INNER JOIN newmed06.drug          ON (drug_purchased.stock_Id = drug.Id) WHERE Purchase_FK = %s ORDER BY drug_purchased.Created", GetSQLValueString($colname_orders, "int"));
$orders = mysql_query($query_orders, $localhost) or die(mysql_error());
$row_orders = mysql_fetch_assoc($orders);
$totalRows_orders = mysql_num_rows($orders);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>

 <?php $totalcost2 = 0;?><form id="form100" name="form100" method="post">
<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse; margin:0; padding:0;" class="sample">
  <tr bgcolor="#b0b0b0" >
    <td width="46%" align="center"><font size="+1">Stock</font></td>
    <td width="10%" align="center"><font size="+1">Unit price</font></td>
    <td width="8%" align="center"><font size="+1">Quantity</font></td>
    <td width="36%" align="center"><font size="+1">Cost</font></td>
  </tr>
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
  
  if ( $totalRows_orders > 0) { do { 


$number = $row_orders['unit_price'];

    echo "<tr bgcolor=\"#e5e5e5\">";
      echo "<td align=\"left\">";
	  echo "<div id = '$row_orders[Id]'>";
	   echo "<select name=\"select4\" id=\"select4\" style=\"width:100%; height:22px;\"    onclick=\"listt22e('$row_orders[Id]','text2.php','$_GET[rc]','$_GET[pr]');\">";
       echo "<option value=\"";
	   echo $row_orders['Id'];
       echo "\">";
	   echo $row_orders['Short'];
	   echo "</option>";
       echo "</select>";
       echo "</div>";

	  echo "</td><td align=\"right\">";
	   echo "<input type=\"text\" style=\"width:100px; height:100%; text-align:right;\" onchange=\"UpdateOrd('$row_orders[Id]','$_GET[pr]','$_GET[rc]','$row_orders[Id]',this.value,'$row_orders[quantity]')\" name=\"Amount\" id=\"Amount\"  value=\"";
	  echo money($number);
	  echo "\"/></td><td align=\"right\">";
	   echo "<input type=\"text\" style=\"width:80px; height:100%; text-align:right;\" onchange=\"UpdateOrd('$row_orders[Id]','$_GET[pr]','$_GET[rc]','$row_orders[Id]','$number',this.value)\"  name=\"quantity4\" id=\"quantity4\"  value=\"";
	  echo $row_orders['quantity'];
	  echo "\"/></td><td align=\"right\">";
	echo "<strong>";   $totalcost = $row_orders['quantity'] * $row_orders['unit_price']; 
	
	echo money($totalcost);
	
	echo "</strong>";
	  echo "</td></tr>";
     $totalcost2 = $totalcost2 + $totalcost;
    } while ($row_orders = mysql_fetch_assoc($orders)); } ?>
    
    <input type="hidden"  name="pr" id="pr" value="<?php echo $_GET['pr']; ?>" style="width:70px;" />
    <input type="hidden" name="rc" id="rc" value="<?php echo $_GET['rc']; ?>" style="width:70px;" />
  <tr bgcolor="#e5e5e5">
    <td align="left" valign="top"><div id="data">
      <select name="select2" id="select2" style="width:100%; height:22px;" onclick="listt22e('data','text.php','$_GET[rc]');">
        <option value=""></option>
       
      </select>    </div></td>
    <td align="left" valign="top"><input type="text" name="unit2" id="unit2" style="width:100px;height:100%;" value=""/></td>
    <td align="left" valign="top"><input type="text" name="quantity" id="quantity" style="width:80px; height:100%;" value="" onchange="return validate3();"/></td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><div class= "error" id="Error4">These fields cannot be empty</div>
    <div class= "error" id="Error5">These fields cannot be empty</div><div class= "error" id="Error6">These fields cannot be empty</div></td>
  </tr>
  <tr>
    <td colspan="4" align="right"><strong>Total  = <?php echo money($totalcost2);?></strong></td>
  </tr>
</table>
 </form>
</body>
</html>
<?php
mysql_free_result($orders);

?>
