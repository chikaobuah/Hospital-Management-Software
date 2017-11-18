<?php require_once('../Connections/localhost.php'); ?>
<?php

$ID=$_GET['id'];
$Visit=$_GET['vi'];
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

$query_Recvital = "SELECT Id, Vital, Measure, Short FROM vital";
$Recvital = mysql_query($query_Recvital, $localhost) or die(mysql_error());
$row_Recvital = mysql_fetch_assoc($Recvital);
$totalRows_Recvital = mysql_num_rows($Recvital);
?>



<div  id="vitals">    put vitals here for me joh   </div>
 
 
    <br/>
    
 <form action="insertvits.php" method="post" name="form1" id="form1">
  <input type="hidden" name="creator" id="creator" value="" size="32" />
 
 

 <input type="hidden" name="en" id="en" value="<?php echo $_GET['id']; ?>" style="width:100%"/>
 <input type="hidden" name="vi" id="vi" value="<?php echo $_GET['vi']; ?>" style="width:100%"/>

 
 
 
 
 
 
    <table width="100%" border="1" align="left" style="border:thin; border-color:#FFF; border-collapse:collapse;">
        <tr>
          <td width="393"><select name="vitals_fk" id="vitals_fk" style="width:100%">
           
            <?php
do {  
?>
            <option value="<?php echo $row_Recvital['Id']?>"><?php echo  $row_Recvital['Short']." ". $row_Recvital['Measure'] ?></option>
            <?php
} while ($row_Recvital = mysql_fetch_assoc($Recvital));
  $rows = mysql_num_rows($Recvital);
  if($rows > 0) {
      mysql_data_seek($Recvital, 0);
	  $row_Recvital = mysql_fetch_assoc($Recvital);
  }
?>
          </select></td>
          <td width="499" align="left">
<?php  



echo "<input type=\"text\"  ondblclick=\"getDatav('insertvitals.php')\" name=\"reading\" id=\"reading\" style=\"width:50%;\"/>";

?></td>
         
        </tr>
        </table>
       
        
        
</form>
    
    
<?php
mysql_free_result($Recvital);
?>
