<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../common/layout.css" />
<title>Untitled Document</title>
</head>
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


if (isset($_GET['id'])) {
  $colname2_transaction = $_GET['id'];
}
$colname_transaction = "-1";
if (isset($_GET['en'])) {
  $colname_transaction = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_transaction = sprintf("SELECT COUNT(LId) as count FROM newmed06.transaction WHERE Enrolee = %s AND Visit = %s", GetSQLValueString($colname_transaction, "int"),GetSQLValueString($colname2_transaction, "date"));
$transaction = mysql_query($query_transaction, $localhost) or die(mysql_error());
$row_transaction = mysql_fetch_assoc($transaction);
$totalRows_transaction = mysql_num_rows($transaction);

$colname_visit_pro = "-1";
if (isset($_GET['en'])) {
  $colname_visit_pro = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_visit_pro = sprintf("SELECT COUNT(Visit) as count FROM
    newmed06.procedure
    INNER JOIN newmed06.service 
        ON (procedure.Service_direction_FK = service.Id)
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id)
    INNER JOIN newmed06.visit_procedure 
        ON (visit_procedure.Procedure = procedure.Id) WHERE Enrolee = %s AND `Status`= 4 AND service.Task_FK = 20", GetSQLValueString($colname_visit_pro, "int"));
$visit_pro = mysql_query($query_visit_pro, $localhost) or die(mysql_error());
$row_visit_pro = mysql_fetch_assoc($visit_pro);
$totalRows_visit_pro = mysql_num_rows($visit_pro);


$colname_visit_pro2 = "-1";
if (isset($_GET['en'])) {
  $colname_visit_pro2 = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_visit_pro2 = sprintf("SELECT COUNT(Visit) as count FROM
    newmed06.procedure
    INNER JOIN newmed06.service 
        ON (procedure.Service_direction_FK = service.Id)
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id)
    INNER JOIN newmed06.visit_procedure 
        ON (visit_procedure.Procedure = procedure.Id) WHERE Enrolee = %s AND `Status`= 1 AND service.Task_FK = 25", GetSQLValueString($colname_visit_pro2, "int"));
$visit_pro2 = mysql_query($query_visit_pro2, $localhost) or die(mysql_error());
$row_visit_pro2 = mysql_fetch_assoc($visit_pro2);
$totalRows_visit_pro2 = mysql_num_rows($visit_pro2);

$colname_status = "-1";
if (isset($_GET['en'])) {
  $colname_status = $_GET['en'];
}
$colname2_status = "-1";
if (isset($_GET['id2'])) {
  $colname2_status = $_GET['id2'];
}
mysql_select_db($database_localhost, $localhost);
$query_status = sprintf("SELECT     visit_status.Status AS sta     , visit.Enrolee     , visit.Created     , visit.Creator     , visit.Service     , visit.LMP     , visit.Ticket_No     , visit.Appointed     , visit.Loading     , visit.upsize_ts     , visit.Status     , visit.Principal  , visit.Scheme FROM     newmed06.visit     INNER JOIN newmed06.visit_status          ON (visit.Status = visit_status.Id) WHERE Enrolee = %s AND Created LIKE %s", GetSQLValueString($colname_status, "int"),GetSQLValueString("%" . $colname2_status . "%", "date"));
$status = mysql_query($query_status, $localhost) or die(mysql_error());
$row_status = mysql_fetch_assoc($status);
$totalRows_status = mysql_num_rows($status);

$colname_allergy = "-1";
if (isset($_GET['en'])) {
  $colname_allergy = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_allergy = sprintf("SELECT COUNT(id) as count FROM newmed06.enrolee_allergy WHERE Enrolee = %s AND `Status`= 1", GetSQLValueString($colname_allergy, "int"));
$allergy = mysql_query($query_allergy, $localhost) or die(mysql_error());
$row_allergy = mysql_fetch_assoc($allergy);
$totalRows_allergy = mysql_num_rows($allergy);

$colname_family = "-1";
if (isset($_GET['en'])) {
  $colname_family = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_family = sprintf("SELECT COUNT(Enrolee) as count FROM newmed06.family_disease WHERE Enrolee = %s AND `Status`= 1", GetSQLValueString($colname_family, "int"));
$family = mysql_query($query_family, $localhost) or die(mysql_error());
$row_family = mysql_fetch_assoc($family);
$totalRows_family = mysql_num_rows($family);

$colname_blood = "-1";
if (isset($_GET['en'])) {
  $colname_blood = $_GET['en'];
}

  $colname_blood2 = $_GET['id'];
  
mysql_select_db($database_localhost, $localhost);
$query_blood = sprintf("SELECT COUNT(Visit) as count FROM
    newmed06.drug
    INNER JOIN newmed06.service 
        ON (drug.Service_direction_FK = service.Id)
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id)
    INNER JOIN newmed06.visit_prescription 
        ON (visit_prescription.Drug_FK = drug.Id) WHERE Enrolee = %s AND service.Task_FK = 24 AND `Status`= 1 AND visit_prescription.Visit = '$colname_blood2' ", GetSQLValueString($colname_blood, "int"));
$blood = mysql_query($query_blood, $localhost) or die(mysql_error());
$row_blood = mysql_fetch_assoc($blood);
$totalRows_blood = mysql_num_rows($blood);

$colname_drug = "-1";
if (isset($_GET['en'])) {
  $colname_drug = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_drug = sprintf("SELECT COUNT(Visit) as count FROM
    newmed06.drug
    INNER JOIN newmed06.service 
        ON (drug.Service_direction_FK = service.Id)
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id)
    INNER JOIN newmed06.visit_prescription  
        ON (visit_prescription.Drug_FK = drug.Id) WHERE Enrolee = %s AND service.Blocks = 16 AND `Status`= 1", GetSQLValueString($colname_drug, "int"));
$drug = mysql_query($query_drug, $localhost) or die(mysql_error());
$row_drug = mysql_fetch_assoc($drug);
$totalRows_drug = mysql_num_rows($drug);

$colname_injection = "-1";
if (isset($_GET['en'])) {
  $colname_injection = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_injection = sprintf("SELECT COUNT(Visit) as count FROM
    newmed06.drug
    INNER JOIN newmed06.service 
        ON (drug.Service_direction_FK = service.Id)
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id)
    INNER JOIN newmed06.visit_prescription  
        ON (visit_prescription.Drug_FK = drug.Id) WHERE Enrolee = %s AND `Status`= 1 AND service.Task_FK = 16 AND `Status`= 1", GetSQLValueString($colname_injection, "int"));
$injection = mysql_query($query_injection, $localhost) or die(mysql_error());
$row_injection = mysql_fetch_assoc($injection);
$totalRows_injection = mysql_num_rows($injection);
?>

<?php
$Principal = $_GET['pr'];
$Enrolee = $_GET['en'];
$Scheme = $_GET['sc'];
$lc2 = $_GET['lc2'];
$VisitID = $_GET['id'];?>
<script language="javascript" type="text/javascript" src="../common/consultingAX.js"></script>
<body>

<table width="100%" border="0">
  <tr>
    <td height="27" bgcolor="#999999" align="center"><strong>Bill board</strong></td>
  </tr>

<?php  $count5 = $row_allergy['count'];

 if($count5 > 0)
{
	
	echo "<tr>

		  <td align=\"left\"> <a href=\"javascript:listt2('$Principal','$Enrolee', '$lc2', '$VisitID','showlist','viewallergy.php');\"> Allergy</a></td><tr> "; }?>

<?php  $count = $row_transaction['count'];

 if($count > 0)
{
	
	echo "<tr>

		  <td align=\"left\">
   <a class=\"normal\" href=\"javascript:listt2('$Principal','$Enrolee', '$lc2', '$VisitID','showlist','bills.php');\">Bill</a></td></tr>";
	
	}?>
    
	  <?php	echo "  <td align=\"left\">
 <a class=\"normal\" href=\"javascript:listt2('$Principal','$Enrolee', '$lc2', '$VisitID','showlist','alert.php');\">Birthdays</a></td><tr>";?>
  
  
  <?php  $count7 = $row_blood['count'];

 if($count7 > 0)
{
	
	echo "<tr>

		  <td align=\"left\">
   <a class=\"normal\" href=\"javascript:listt2('$Principal','$Enrolee', '$lc2', '$VisitID','showlist','blood.php');\">Blood</a></td></tr>";
	
	}?>
    
      <?php  $count8 = $row_drug['count'];

 if($count8 > 0)
{
	
	echo "<tr>

		  <td align=\"left\">
   <a class=\"normal\" href=\"javascript:listt2('$Principal','$Enrolee', '$lc2', '$VisitID','showlist','dispenary.php');\">Precription</a></td></tr>";
	
	}?>
   <?php 
			  
  $count4 = $row_family['count'];
  
  if($count4 > 0)
{
	
		
	echo "<tr align=\"left\" >
    <td align=\"left\"><a class=\"normal\" href=\"javascript:listt2('$Principal','$Enrolee', '$lc2', '$VisitID','showlist','viewhealth.php');\">Family Health</a></td>
	</tr>";
	}?>
        <?php /* $count9 = $row_drug['count'];

 if($count9 > 0)
{
	
	echo "<tr>

		  <td align=\"left\">
   <a class=\"normal\" href=\"javascript:listt2('$Principal','$Enrolee', '$Scheme', '$Capitation', '$lc', '$lc2', '$status', '$VisitID', '$VisitID2','showlist','injection.php');\">Injection</a></td></tr>";
	
	}*/?>
    
  <?php /*
  $count3 = $row_visit_pro['count'];
  
  if($count3 > 0)
{
		
	echo "<tr align=\"left\" >
    <td align=\"left\"><a class=\"normal\" href=\"javascript:listt2('$Principal','$Enrolee', '$Scheme', '$Capitation', '$lc', '$lc2', '$status', '$VisitID', '$VisitID2','showlist','Prolist.php');\">Laboratory</a></td>
  </tr>";
	
	}*/?>
     <?php 
  $count4 = $row_visit_pro2['count'];
  
  if($count4 > 0)
{
	echo "<tr align=\"left\" >
    <td align=\"left\"><a class=\"normal\" href=\"javascript:listt2('$Principal','$Enrolee', '$lc2', '$VisitID','showlist','lablist.php');\">Procedures</td></a>
  </tr>";
	
	}?>
</table>
</body>
</html>
<?php
mysql_free_result($transaction);

mysql_free_result($allergy);

mysql_free_result($family);
?>
