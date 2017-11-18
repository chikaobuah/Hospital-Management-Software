
<?php require_once('../Connections/localhost.php'); ?>
<?php
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

mysql_select_db($database_localhost, $localhost);
$query_Recservice = "SELECT Id, Service FROM service order by service";
$Recservice = mysql_query($query_Recservice, $localhost) or die(mysql_error());
$row_Recservice = mysql_fetch_assoc($Recservice);
$totalRows_Recservice = mysql_num_rows($Recservice);


?>
<div id="one" style="height:100px; background:#F09;"></div>
<div id="two" style="height:100px; background:#F90;">


<label>
  <select name="select" id="select"  style="width:180px">
    <?php
do {  
?>
    <option value="<?php echo $row_Recservice['Id']?>"><?php echo $row_Recservice['Service']?></option>
    <?php
} while ($row_Recservice = mysql_fetch_assoc($Recservice));
  $rows = mysql_num_rows($Recservice);
  if($rows > 0) {
      mysql_data_seek($Recservice, 0);
	  $row_Recservice = mysql_fetch_assoc($Recservice);
  }
?>
  </select>
</label>


</div>