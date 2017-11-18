<div style="background-color:#ffd659; height:100%">


<?php require_once('../Connections/localhost.php'); ?>
<?php
$ID=$_GET['id'];

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
$query_Recclinic = "SELECT
    service.Service
   
FROM
    newmed06.visit_appointment
    INNER JOIN newmed06.service 
        ON (visit_appointment.Appointment = service.Id)WHERE enrolee =$ID AND Status_FK=1";
$Recclinic = mysql_query($query_Recclinic, $localhost) or die(mysql_error());
$row_Recclinic = mysql_fetch_assoc($Recclinic);
$totalRows_Recclinic = mysql_num_rows($Recclinic);


do{
	
$clinic =$row_Recclinic['Service'];

if (isset($clinic)){ echo $clinic."<br/>";}

 } 

while($row_Recclinic=mysql_fetch_array($Recclinic));








mysql_free_result($Recclinic);
?>
</div>