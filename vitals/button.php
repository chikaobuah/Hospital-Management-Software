<script language="javascript" type="text/javascript" src="../common/consultingAX.js"></script>
<?php require_once('../Connections/localhost.php'); 
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


$en = $_GET['en'];
$id = $_GET['id'];

mysql_select_db($database_localhost, $localhost);
$query_myt = "SELECT * FROM visit_queue WHERE Enrolee = $en AND Visit = '$id' ORDER BY Id DESC LIMIT 1";
$myt = mysql_query($query_myt, $localhost) or die(mysql_error());
$row_myt = mysql_fetch_assoc($myt);
$totalRows_myt = mysql_num_rows($myt);

$theth = $row_myt['Id'];



 $colname_transaction = "-1";
if (isset($_GET['en'])) {
  $colname_transaction = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_transaction = sprintf("SELECT COUNT(LId) as count FROM newmed06.transaction WHERE Enrolee = %s AND `Status`= 1", GetSQLValueString($colname_transaction, "int"));
$transaction = mysql_query($query_transaction, $localhost) or die(mysql_error());
$row_transaction = mysql_fetch_assoc($transaction);
$colname2_transaction = "-1";
if (isset($_GET['id'])) {
  $colname2_transaction = $_GET['id'];
}
$colname_transaction = "-1";
if (isset($_GET['en'])) {
  $colname_transaction = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_transaction = sprintf("SELECT COUNT(LId) as count FROM newmed06.transaction WHERE Enrolee = %s AND `Status`= 1 AND Visit = %s", GetSQLValueString($colname_transaction, "int"),GetSQLValueString($colname2_transaction, "date"));
$transaction = mysql_query($query_transaction, $localhost) or die(mysql_error());
$row_transaction = mysql_fetch_assoc($transaction);
$totalRows_transaction = mysql_num_rows($transaction);$colname2_transaction = "-1";
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
        ON (visit_procedure.Procedure = procedure.Id) WHERE Enrolee = %s AND `Status`= 1 AND service.Task_FK = 20", GetSQLValueString($colname_visit_pro, "int"));
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
mysql_select_db($database_localhost, $localhost);
$query_blood = sprintf("SELECT COUNT(Visit) as count FROM
    newmed06.drug
    INNER JOIN newmed06.service 
        ON (drug.Service_direction_FK = service.Id)
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id)
    INNER JOIN newmed06.visit_prescription 
        ON (visit_prescription.Drug_FK = drug.Id) WHERE Enrolee = %s AND `Status`= 1 AND service.Task_FK = 24 AND `Status`= 1", GetSQLValueString($colname_blood, "int"));
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
        ON (visit_prescription.Drug_FK = drug.Id) WHERE Enrolee = %s AND `Status`= 1 AND service.Task_FK = 13 AND `Status`= 1", GetSQLValueString($colname_drug, "int"));
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





$colname_check = "-1";
if (isset($_GET['en'])) {
  $colname_check = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_check = sprintf(" SELECT * FROM visit_queue WHERE Enrolee = %s AND Task = 10 ORDER BY Queued DESC LIMIT 1", GetSQLValueString($colname_check, "int"));
$check = mysql_query($query_check, $localhost) or die(mysql_error());
$row_check = mysql_fetch_assoc($check);
$totalRows_check = mysql_num_rows($check);

$next = $row_check['Next_task'];


 
$thefinaltask = 12;
$thefinalseq = 10000;

$count = $row_transaction['count'];

 if($count > 0)
{
	
mysql_select_db($database_localhost, $localhost);
$query_task2 = "SELECT
    task.Id as Task
    , task.Sequence
    , service.Id
FROM
    newmed06.service
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id) WHERE service.Id = 40 ";
$task2 = mysql_query($query_task2, $localhost) or die(mysql_error());
$row_task2 = mysql_fetch_assoc($task2);
$totalRows_task2 = mysql_num_rows($task2);

if ($row_task2['Sequence'] < $thefinalseq )
{

$thefinalseq = $row_task2['Sequence'];
$thefinaltask = $row_task2['Task'];
	
	}
    
}
  
 $count7 = $row_blood['count'];

 if($count7 > 0)
{
	
	mysql_select_db($database_localhost, $localhost);
$query_task3 = "SELECT
    task.Id as Task
    , task.Sequence
    , service.Id
FROM
    newmed06.service
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id) WHERE service.Id = 37 ";
$task3 = mysql_query($query_task3, $localhost) or die(mysql_error());
$row_task3 = mysql_fetch_assoc($task3);
$totalRows_task3 = mysql_num_rows($task3);

if ($row_task3['Sequence'] < $thefinalseq )
{

$thefinalseq = $row_task3['Sequence'];
$thefinaltask = $row_task3['Task'];
	
	}
	
	}
    
 $count8 = $row_drug['count'];

 if($count8 > 0)
{
	
	mysql_select_db($database_localhost, $localhost);
$query_task4 = "SELECT
    task.Id as Task
    , task.Sequence
    , service.Id
FROM
    newmed06.service
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id) WHERE service.Id = 7 ";
$task4 = mysql_query($query_task4, $localhost) or die(mysql_error());
$row_task4 = mysql_fetch_assoc($task4);
$totalRows_task4 = mysql_num_rows($task4);

if ($row_task4['Sequence'] < $thefinalseq )
{
$thefinalseq = $row_task4['Sequence'];
$thefinaltask = $row_task4['Task'];
	
	}
	
	}

			  

$count9 = $row_injection['count'];

 if($count9 > 0)
{
	
	mysql_select_db($database_localhost, $localhost);
$query_task5 = "SELECT
    task.Id as Task
    , task.Sequence
    , service.Id
FROM
    newmed06.service
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id) WHERE service.Id = 8 ";
$task5 = mysql_query($query_task5, $localhost) or die(mysql_error());
$row_task5 = mysql_fetch_assoc($task5);
$totalRows_task5 = mysql_num_rows($task5);

if ($row_task5['Sequence'] < $thefinalseq )
{
$thefinalseq = $row_task5['Sequence'];
$thefinaltask = $row_task5['Task'];
	
	}
	
	}
    
	
  $count3 = $row_visit_pro['count'];
  
  if($count3 > 0)
{
		
	mysql_select_db($database_localhost, $localhost);
$query_task6 = "SELECT
    task.Id as Task
    , task.Sequence
    , service.Id
FROM
    newmed06.service
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id) WHERE service.Id = 3 ";
$task6 = mysql_query($query_task6, $localhost) or die(mysql_error());
$row_task6 = mysql_fetch_assoc($task6);
$totalRows_task6 = mysql_num_rows($task6);

if ($row_task6['Sequence'] < $thefinalseq )
{
$thefinalseq = $row_task6['Sequence'];
$thefinaltask = $row_task6['Task'];
	
	}
	
	}
  
  $count4 = $row_visit_pro2['count'];
  
  if($count4 > 0)
{
	mysql_select_db($database_localhost, $localhost);
$query_task7 = "SELECT
    task.Id as Task
    , task.Sequence
    , service.Id
FROM
    newmed06.service
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id) WHERE service.Id = 9 ";
$task7 = mysql_query($query_task7, $localhost) or die(mysql_error());
$row_task7 = mysql_fetch_assoc($task7);
$totalRows_task7 = mysql_num_rows($task7);

if ($row_task7['Sequence'] < $thefinalseq )
{
$thefinalseq = $row_task7['Sequence'];
$thefinaltask = $row_task7['Task'];
	
	}
	
	}
 
 
 
 
 
 
 
 
 
	
	if ($_GET['lc2']==2)
	{
		
		$disable = "disabled=\"disabled\"";
		
		}
	else
	{
		
		$disable = "";
		
		}
	
	
	
	$id = $_GET['id'];
	$en = $_GET['en'];
	
	mysql_select_db($database_localhost, $localhost);
$query_vch = "SELECT * FROM visit WHERE Created = '$id' AND Enrolee = $en ";
$vch = mysql_query($query_vch, $localhost) or die(mysql_error());
$row_vch = mysql_fetch_assoc($vch);
$totalRows_vch = mysql_num_rows($vch);

if ($row_vch['Service'] == 39)
{
	$thefinaltask = 12;
	
	}	else {
		
		$thefinaltask = 10;
		
		}
	
	?>
    
    <form method="post" name="button" id="button">
 <input type="hidden" name="pr" id="pr" value="<?php echo $_GET['pr']; ?>" style="width:100%"/>
 <input type="hidden" name="en" id="en" value="<?php echo $_GET['en']; ?>" style="width:100%"/>
 <input type="hidden" name="sc" id="sc" value="<?php echo $_GET['sc']; ?>" style="width:100%"/>
 <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" style="width:100%"/>
 <input type="hidden" name="st" id="st" value="<?php echo $_GET['st']; ?>" style="width:100%"/>
 <input type="hidden" name="cap" id="cap" value="<?php echo $_GET['cap']; ?>" style="width:100%"/>
 <input type="hidden" name="lc2" id="lc2" value="<?php echo $_GET['lc2']; ?>" style="width:100%"/>
 <input type="hidden" name="lc" id="lc" value="<?php echo $_GET['lc']; ?>" style="width:100%"/>
 <input type="hidden" name="id2" id="id2" value="<?php echo $_GET['id2']; ?>" style="width:100%"/>
 <input type="hidden" name="theid" id="theid" value="<?php echo $thefinaltask; ?>" style="width:100%"/>
 <input type="hidden" name="thetask" id="thetask" value="<?php echo $theth; ?>" style="width:100%"/>

    <input   onclick="Button();" <?php echo $disable;?>  type="button" style="width:100%;" value="<?php 
	
	style="background: url(../images/nav-bg.png) repeat-x;" 
	mysql_select_db($database_localhost, $localhost);
$query_task = "SELECT * FROM task WHERE Id = $thefinaltask";
$task = mysql_query($query_task, $localhost) or die(mysql_error());
$row_task = mysql_fetch_assoc($task);
$totalRows_task = mysql_num_rows($task);
	
	
	
	
if ($_GET['lc2']==2){
	$msg = "On Queue at - ";
	} else {
		
		$msg = "Proceed to - ";
		}


		echo $msg; echo " "; echo $row_task['Task'];

	
	?>" />
    
    </form>
    <?php
?>
