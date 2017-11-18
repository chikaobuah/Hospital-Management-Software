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
$query_relationship = "SELECT * FROM relationship";
$relationship = mysql_query($query_relationship, $localhost) or die(mysql_error());
$row_relationship = mysql_fetch_assoc($relationship);
$totalRows_relationship = mysql_num_rows($relationship);

mysql_select_db($database_localhost, $localhost);
$query_disease = "SELECT * FROM disease";
$disease = mysql_query($query_disease, $localhost) or die(mysql_error());
$row_disease = mysql_fetch_assoc($disease);
$totalRows_disease = mysql_num_rows($disease);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post" name="form19" id="form19">
 <input type="hidden" name="pr" id="pr" value="<?php echo $_GET['pr']; ?>" style="width:100%"/>
 <input type="hidden" name="en" id="en" value="<?php echo $_GET['en']; ?>" style="width:100%"/>
 <input type="hidden" name="sc" id="sc" value="<?php echo $_GET['sc']; ?>" style="width:100%"/>
 <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" style="width:100%"/>
 <input type="hidden" name="st" id="st" value="<?php echo $_GET['st']; ?>" style="width:100%"/>
 <input type="hidden" name="cap" id="cap" value="<?php echo $_GET['cap']; ?>" style="width:100%"/>
 <input type="hidden" name="lc2" id="lc2" value="<?php echo $_GET['lc2']; ?>" style="width:100%"/>
 <input type="hidden" name="lc" id="lc" value="<?php echo $_GET['lc']; ?>" style="width:100%"/>
 <input type="hidden" name="id2" id="id2" value="<?php echo $_GET['id2']; ?>" style="width:100%"/>
 <div id="AllHealth"></div>
 <table width="100%" border="1" style="border:thin; border-color:#ffffff; border-collapse:collapse;">
 <?php if ($_GET['lc2'] == 2)
	{
		
		$disable = "disabled=\"disabled\"";
		
		}
	else
	{
		
		$disable = "";
		
		} ?>
   <tr>
     <td width="17%"><select name="relate" id="relate" style="width:100%">
     <option value=""></option>
       <?php
do {  
?>
       <option value="<?php echo $row_relationship['Id']?>"><?php echo $row_relationship['Relationship']?></option>
       <?php
} while ($row_relationship = mysql_fetch_assoc($relationship));
  $rows = mysql_num_rows($relationship);
  if($rows > 0) {
      mysql_data_seek($relationship, 0);
	  $row_relationship = mysql_fetch_assoc($relationship);
  }
?>
     </select></td>
     <td width="16%"><input type="text" <?php echo $disable;?> name="string" id="string" value="" style="width:100%;" onchange=" LoadString2();"/></td>
     <td width="64%"> <div id="AllString2"></div></td>
     <td width="3%"><input type="button" onclick="AddHealth();" value="Add" title="Add" style="color: #07c;
        padding: 0px;
        letter-spacing: 0px;
        font-size:8px;
         width:25px;
         height:23px;"/></td>
   </tr>
 </table>


</form>
</body>
</html>
<?php
mysql_free_result($relationship);

mysql_free_result($disease);
?>
