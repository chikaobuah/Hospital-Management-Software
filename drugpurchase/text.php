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


mysql_select_db($database_localhost, $localhost);
$query_drug = "SELECT * FROM drug";
$drug = mysql_query($query_drug, $localhost) or die(mysql_error());
$row_drug = mysql_fetch_assoc($drug);
$totalRows_drug = mysql_num_rows($drug);
?>
 <select name="select2" id="select2" style="width:100%; height:22px;">
        <option value=""></option>         
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