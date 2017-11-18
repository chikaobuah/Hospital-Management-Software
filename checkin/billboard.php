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
$query_Recvp2 = "SELECT COUNT(visit_appointment.Appointment) AS Appointment 
FROM newmed06.visit_appointment WHERE Enrolee = $ID AND `Status_FK`= 1";
$Recvp2 = mysql_query($query_Recvp2, $localhost) or die(mysql_error());
$row_Recvp2 = mysql_fetch_assoc($Recvp2);
$totalRows_Recvp2 = mysql_num_rows($Recvp2);
$ticketc2= $row_Recvp2['Appointment']; 





mysql_select_db($database_localhost, $localhost);
$query_Recvp3 = "SELECT COUNT(LId) as tra FROM newmed06.transaction WHERE Enrolee = $ID AND `Status`= 1";
$Recvp3 = mysql_query($query_Recvp3, $localhost) or die(mysql_error());
$row_Recvp3 = mysql_fetch_assoc($Recvp3);
$totalRows_Recvp3 = mysql_num_rows($Recvp3);
$ticketc3= $row_Recvp3['tra']; 






mysql_select_db($database_localhost, $localhost);
$query_Recvp = "SELECT COUNT(visit_procedure.Procedure) AS vb  FROM  newmed06.visit_procedure WHERE Enrolee = $ID AND `Status`= 1 ";
$Recvp = mysql_query($query_Recvp, $localhost) or die(mysql_error());
$row_Recvp = mysql_fetch_assoc($Recvp);
$ticketc= $row_Recvp['vb']; 




mysql_select_db($database_localhost, $localhost);
$query_Recvp1 = "SELECT  COUNT(visit_prescription.Drug_FK) AS drug FROM  newmed06.visit_prescription WHERE Enrolee = $ID AND `Status`= 1 ";
$Recvp1 = mysql_query($query_Recvp1, $localhost) or die(mysql_error());
$row_Recvp1 = mysql_fetch_assoc($Recvp1);
$ticketc1= $row_Recvp1['drug']; 






mysql_free_result($Recvp);
?>




<table width="100%"  cellpadding="5" height="100%" >
<?php 

if ($ticketc2>0)
{echo "<tr><td><a class=\"linkr\" onClick=\"getbill2('appointment.php?id=$ID')\"> Appointment</a></td></tr>"; }



if ($ticketc3>0) 
{echo "<tr><td><a class=\"linkr\" onClick=\"getbill2('bills.php?en=$ID')\"> Bill</a></td></tr>"; }



echo "<tr><td>". "Birthday"."</td></tr>"; 



if ($ticketc>0)
{echo "<tr><td><a class=\"linkr\" onClick=\"getbill2('procedure.php?id=$ID')\"> Procedure</a></td></tr>"; }
  
  
  
if ($ticketc1>0)
{echo "<tr><td><a class=\"linkr\" onClick=\"getbill2('prescription.php?id=$ID')\"> Prescription</a></td></tr>"; }




?>
</table>