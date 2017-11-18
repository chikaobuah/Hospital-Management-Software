<?php require_once('../Connections/localhost.php'); ?>
<?php 
session_start();

if (isset($_POST['mod'])){
$mod = $_POST['mod'];}
else{
$mod = $_GET['mod'];}


echo "mod = "; echo $mod = $_GET['mod']; echo " <> ";


echo "scr = "; echo $scr = $_GET['scr'];
echo "pr = "; echo 	$pr = $_GET['pr']; echo " <> ";
echo "en = "; echo 	$en = $_GET['en']; echo " <> ";
echo "sc = "; echo 	$sc = $_GET['sc']; echo " <> ";
echo "id = "; echo  $id = "2010-07-16 00:00:00";  echo " <> ";
echo "st = "; echo  $st = $_GET['st'];  echo " <> ";
echo "cap = "; echo  $cap = $_GET['cap'];  echo " <> ";
echo "lc2 = "; echo  $lc2 = $_GET['lc2'];  echo " <> ";
echo "lc = "; echo  $lc = $_GET['lc']; echo " <> ";
echo "id2 = "; echo  $id2 = "2010-07-16 00:00:00"; echo " <> ";
echo "x = "; echo  $x = $_GET['x'];  echo " <> ";
echo "y = "; echo  $y = $_GET['y'];  echo " <> ";
echo "z = "; echo  $z = $_GET['z']; echo " <> ";
echo "style = "; echo  $style = $_GET['style']; echo " <> ";
echo "usage = "; echo  $usage = $_GET['usage']; echo " <> ";


echo "creator = "; echo 	$creator = 100000; echo " <> ";
echo "created = "; echo 	$created = date('Y-m-d h:i:s'); echo " <> ";
echo "drug_FK = "; echo 	$drug_FK = $_GET['drug_FK']; echo " <> ";
echo "provider = "; echo  $provider = $_GET['provider'];  echo " <> ";
echo "appointment = "; echo  $appointment = 'appointment';  echo " <> ";
echo "request = "; echo  $request = $_GET['request'];  echo " <> ";
echo "session = "; echo  $session = $_SESSION['License'];  echo " <> ";


$host="localhost"; 
$username="root";
$password="";
$database="newmed06";





if ($mod == "AddPre"){
	
mysql_select_db($database_localhost, $localhost);
$query_recsheme = "SELECT  program.Program  ,  scheme.Program_FK , scheme.LId AS scheme_FK ,client.LId, client.Client , client.Short , client.Contact, client.Contact_Mobile_Phone, client.Contact_Business_Phone  , scheme.Scheme FROM newmed06.scheme     INNER JOIN newmed06.client          ON (scheme.Company_FK = client.LId)     INNER JOIN newmed06.program          ON (scheme.Program_FK = program.Id) WHERE scheme.LId = $sc";
$recsheme = mysql_query($query_recsheme, $localhost) or die(mysql_error());
$row_recsheme = mysql_fetch_assoc($recsheme);
$totalRows_recsheme = mysql_num_rows($recsheme);

mysql_select_db($database_localhost, $localhost);
$query_sty = "SELECT * FROM style WHERE Id = $style";
$sty = mysql_query($query_sty, $localhost) or die(mysql_error());
$row_sty = mysql_fetch_assoc($sty);
$totalRows_sty = mysql_num_rows($sty);

$Fx = $row_sty['Fx'];
$Fy = $row_sty['Fy'];
$Fz = $row_sty['Fz'];
$M1 = $row_sty['M1'];
$M2 = $row_sty['M2'];

$total = ($Fx * $x) + (($Fy * $y)*($Fz * $z)*$M1*$M2);

$mainclient = $row_recsheme['LId'];
$mainprogram = $row_recsheme['Program_FK'];
$mainplan = $row_recsheme['scheme_FK'];

mysql_select_db($database_localhost, $localhost);
$query_proch = "SELECT
    service.Task_FK
    , task.Task
    , task.Sequence
    , drug.Drug
    , drug.Id
    , service.Service
FROM
    newmed06.drug
    INNER JOIN newmed06.service 
        ON (drug.Service_direction_FK = service.Id)
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id) WHERE drug.Id = $drug_FK";
$proch = mysql_query($query_proch, $localhost) or die(mysql_error());
$row_proch = mysql_fetch_assoc($proch);
$totalRows_proch = mysql_num_rows($proch);

$put = $row_proch['Task_FK'];

	
	
$colname_check = $_GET['en'];

mysql_select_db($database_localhost, $localhost);
$query_check = "SELECT * FROM visit_queue WHERE Enrolee =  $colname_check ORDER BY Queued DESC LIMIT 1";
$check = mysql_query($query_check, $localhost) or die(mysql_error());
$row_check = mysql_fetch_assoc($check);
$totalRows_check = mysql_num_rows($check);

$next = $row_check['Next_task'];

mysql_select_db($database_localhost, $localhost);
$query_task = "SELECT * FROM task WHERE Id = $next";
$task = mysql_query($query_task, $localhost) or die(mysql_error());
$row_task = mysql_fetch_assoc($task);
$totalRows_task = mysql_num_rows($task);


mysql_select_db($database_localhost, $localhost);
$query_task2 = "SELECT * FROM task WHERE Id = $put";
$task2 = mysql_query($query_task2, $localhost) or die(mysql_error());
$row_task2 = mysql_fetch_assoc($task2);
$totalRows_task2 = mysql_num_rows($task2);



$seqlab = $row_task2['Sequence'];
$seq = $row_task['Sequence'];

if ($seq < $seqlab ){
	
	$enter = $next ;
	
	} else {
		
		$enter = $put  ;
		
		}
		
		



$connection3 = mysql_connect("$host", "$username", "$password");
if (!$connection3)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection3);
$sql3="UPDATE visit_queue SET Next_task = $enter WHERE Enrolee = $en AND Exited IS NULL";
if (!mysql_query($sql3,$connection3))
  {
  die('Error: ' . mysql_error());
  }

/***********************/
echo "update done";

/***********************/



if ($st == 5) {


  
mysql_select_db($database_localhost, $localhost);
$query_effective = "SELECT * FROM cover_effective WHERE  Effective <= '$id' ORDER BY Effective DESC LIMIT 1";
$effective = mysql_query($query_effective, $localhost) or die(mysql_error());
$row_effective = mysql_fetch_assoc($effective);
$totalRows_effective = mysql_num_rows($effective);


$eff = $row_effective['Id'];
  
mysql_select_db($database_localhost, $localhost);
$query_sechemetest = "SELECT * FROM cover_drug WHERE Capitation = $cap AND Effective = $eff AND Drug_FK = $drug_FK";
$sechemetest = mysql_query($query_sechemetest, $localhost) or die(mysql_error());
$row_sechemetest = mysql_fetch_assoc($sechemetest);
$totalRows_sechemetest = mysql_num_rows($sechemetest); 

}

if ($totalRows_sechemetest == 0)
{
	$status = 1;
	
	} else { 
	
			$status = 2;}




/*******************************************************************************************************************************************************************************************************************************tarrif and loading check ****************************************************************/

/*************checking effective*********************/

$today = date('Y-m-d');
$session = $_SESSION['License'];

mysql_select_db($database_localhost, $localhost);
$query_license = "SELECT Id FROM loading_effective WHERE Service_FK = 8 AND License = $session  AND Effective <= $today ORDER BY Effective DESC LIMIT 1";
$license = mysql_query($query_license, $localhost) or die(mysql_error());
$row_license = mysql_fetch_assoc($license);
$totalRows_license = mysql_num_rows($license);

if ($totalRows_license == 0){
$theliceff = 0;
} else {$theliceff = $row_license['Id'];}


mysql_select_db($database_localhost, $localhost);
$query_client = "SELECT Id FROM loading_effective WHERE Service_FK = 9  AND License = $session AND Effective <= $today ORDER BY Effective DESC LIMIT 1";
$client = mysql_query($query_client, $localhost) or die(mysql_error());
$row_client = mysql_fetch_assoc($client);
$totalRows_client = mysql_num_rows($client);

if ($totalRows_client == 0){
$theclieff = 0;
} else {$theclieff = $row_client['Id'];}


mysql_select_db($database_localhost, $localhost);
$query_program = "SELECT Id FROM loading_effective WHERE Service_FK = 10  AND License = $session AND Effective <= $today ORDER BY Effective DESC LIMIT 1";
$program = mysql_query($query_program, $localhost) or die(mysql_error());
$row_program = mysql_fetch_assoc($program);
$totalRows_program = mysql_num_rows($program);


if ($totalRows_program == 0){
$theproeff = 0;
} else {$theproeff = $row_program['Id'];}


mysql_select_db($database_localhost, $localhost);
$query_plan = "SELECT Id FROM loading_effective WHERE Service_FK = 11  AND License = $session AND Effective <= $today ORDER BY Effective DESC LIMIT 1";
$plan = mysql_query($query_plan, $localhost) or die(mysql_error());
$row_plan = mysql_fetch_assoc($plan);
$totalRows_plan = mysql_num_rows($plan);

if ($totalRows_plan == 0){
$theplaeff = 0;
} else {$theplaeff = $row_plan['Id'];}


mysql_select_db($database_localhost, $localhost);
$query_principal = "SELECT Id FROM loading_effective WHERE Service_FK = 12  AND License = $session AND Effective <= $today ORDER BY Effective DESC LIMIT 1";
$principal = mysql_query($query_principal, $localhost) or die(mysql_error());
$row_principal = mysql_fetch_assoc($principal);
$totalRows_principal = mysql_num_rows($principal);

if ($totalRows_principal == 0){
$theprieff = 0;
} else {$theprieff = $row_principal['Id'];}

mysql_select_db($database_localhost, $localhost);
$query_serv = "SELECT Id FROM loading_effective WHERE Service_FK = 13  AND License = $session AND Effective <= $today ORDER BY Effective DESC LIMIT 1";
$serv = mysql_query($query_serv, $localhost) or die(mysql_error());
$row_serv = mysql_fetch_assoc($serv);
$totalRows_serv = mysql_num_rows($serv);

if ($totalRows_serv == 0){
$thesereff = 0;
} else {$thesereff = $row_serv['Id'];}

mysql_select_db($database_localhost, $localhost);
$query_procedureef = "SELECT Id FROM loading_effective WHERE Service_FK = $scr  AND License = $session AND Effective <= $today ORDER BY Effective DESC LIMIT 1";
$procedureef = mysql_query($query_procedureef, $localhost) or die(mysql_error());
$row_procedureef = mysql_fetch_assoc($procedureef);
$totalRows_procedureef = mysql_num_rows($procedureef);

if ($totalRows_procedureef == 0){
$theproefeff = 0;
} else {$theproefeff = $row_procedureef['Id'];}



$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO visit_prescription ( 
     Enrolee
    , Created
    , Creator
    , Visit
    , Drug_FK
    , Provider
    , Appointment
    , Style
    , Gross_Qty
    , `Usage`
    , `Status`
    , `x`
    , `y`
    , z)
VALUES
('$en','$created','$creator','$id','$drug_FK','$provider','$appointment','$style','$total','$usage','1','$x','$y','$z')";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }


/**********************/
echo "prescribtion done";

/***********************/



/*************checking loading*********************/


mysql_select_db($database_localhost, $localhost);
$query_licenseload = "SELECT Loading FROM licensee_loading WHERE License_HQ = $session AND License_FK = $session AND Effective_FK = $theliceff ";
$licenseload = mysql_query($query_licenseload, $localhost) or die(mysql_error());
$row_licenseload = mysql_fetch_assoc($licenseload);
$totalRows_licenseload = mysql_num_rows($licenseload);


if($totalRows_licenseload == 0){
	
	$thelicenseload = 100;
	
	} else {
		
		$thelicenseload = $row_licenseload['loading'];
		
		} 
		
		

mysql_select_db($database_localhost, $localhost);
$query_clientload = "SELECT Loading FROM client_loading WHERE License = $session AND Client_FK = $mainclient AND Effective_FK = $theclieff ";
$clientload = mysql_query($query_clientload, $localhost) or die(mysql_error());
$row_clientload = mysql_fetch_assoc($clientload);
$totalRows_clientload = mysql_num_rows($clientload);

if($totalRows_clientload == 0){
	
	$theclientload = 100;
	
	} else {
		
		$theclientload = $row_clientload['loading'];
		
		}


mysql_select_db($database_localhost, $localhost);
$query_programload = "SELECT Loading FROM program_loading WHERE License = $session AND Program_FK = $mainprogram AND Effective_FK = $theproeff";
$programload = mysql_query($query_programload, $localhost) or die(mysql_error());
$row_programload = mysql_fetch_assoc($programload);
$totalRows_programload = mysql_num_rows($programload);

if($totalRows_programload == 0){
	
	$theprogramload = 100;
	
	} else {
		
		$theprogramload = $row_programload['loading'];
		
		}



mysql_select_db($database_localhost, $localhost);
$query_planload = "SELECT Loading FROM scheme_loading WHERE License = $session AND Scheme_FK = $mainplan AND Effective_FK = $theplaeff";
$planload = mysql_query($query_planload, $localhost) or die(mysql_error());
$row_planload = mysql_fetch_assoc($planload);
$totalRows_planload = mysql_num_rows($planload);

if($totalRows_planload == 0){
	
	$theplanload = 100;
	
	} else {
		
		$theplanload = $row_planload['loading'];
		
		}
		

mysql_select_db($database_localhost, $localhost);
$query_principalload = "SELECT Loading FROM principal_loading WHERE License = $session AND Principal_FK = $pr AND Effective_FK = $theprieff";
$principalload = mysql_query($query_principalload, $localhost) or die(mysql_error());
$row_principalload = mysql_fetch_assoc($principalload);
$totalRows_principalload = mysql_num_rows($principalload);

if($totalRows_principalload == 0){
	
	$theprincipalload = 100;
	
	} else {
		
		$theprincipalload = $row_principalload['loading'];
		
		}
		
		
mysql_select_db($database_localhost, $localhost);
$query_servload = "SELECT Loading FROM service_loading WHERE License = $session AND Service_FK = $scr AND Effective_FK = $thesereff";
$servload = mysql_query($query_servload, $localhost) or die(mysql_error());
$row_servload = mysql_fetch_assoc($servload);
$totalRows_servload = mysql_num_rows($servload);

if($totalRows_servload == 0){
	
	$theservload = 100;
	
	} else {
		
		$theservload = $row_servload['loading'];
		
		}
		


mysql_select_db($database_localhost, $localhost);
$query_procedureefload = "SELECT Loading FROM drug_loading WHERE License = $session AND Drug_FK = $drug_FK AND Effective_FK = $theproefeff";
$procedureefload = mysql_query($query_procedureefload, $localhost) or die(mysql_error());
$row_procedureefload = mysql_fetch_assoc($procedureefload);
$totalRows_procedureefload = mysql_num_rows($procedureefload);

if($totalRows_procedureefload == 0){
	
	$theprocedureefload = 100;
	
	} else {
		
		$theprocedureefload = $row_procedureefload['loading'];
		
		}
		
	


/******************************************************************************************************************************************************************************************************************************* end ******************************************************/



/******************************************************************************************************************************************************************************************************************tarriff ******************************************************/

mysql_select_db($database_localhost, $localhost);
$query_clientlic = "SELECT Id FROM client_effective WHERE License = $session AND Service_FK = $scr AND Effective <= '$id' ORDER BY Effective DESC LIMIT 1";
$clientlic = mysql_query($query_clientlic, $localhost) or die(mysql_error());
$row_clientlic = mysql_fetch_assoc($clientlic);
$totalRows_clientlic = mysql_num_rows($clientlic);
$recdid = $row_clientlic['Id'];
	
	
mysql_select_db($database_localhost, $localhost);
$query_tariffs = "SELECT MAX(unit_price) AS Tariff FROM drug_purchased WHERE stock_Id = $drug_FK";
$tariffs = mysql_query($query_tariffs, $localhost) or die(mysql_error());
$row_tariffs = mysql_fetch_assoc($tariffs);
$totalRows_tariffs = mysql_num_rows($tariffs);

$costprice = $row_tariffs['Tariff'];

/*****************************************************************************************************************************************************************************************************************tarriff end ******************************************************/
 echo "costprice = "; echo $costprice; echo " <> ";
 echo "thelicenseload = "; echo $thelicenseload; echo " <> ";
 echo "theclientload = "; echo $theclientload; echo " <> ";
 echo "theprogramload = "; echo $theprogramload; echo " <> ";
 echo "theplanload = "; echo $theplanload; echo " <> ";
 echo "theprincipalload = "; echo $theprincipalload; echo " <> ";
 echo "theservload = "; echo $theservload; echo " <> ";
 echo "theprocedureefload = "; echo $theprocedureefload; echo " <> ";

$theunitprice = $costprice * ($thelicenseload/100) * ($theclientload/100) * ($theprogramload/100) * ($theplanload/100) * ($theprincipalload/100) * ($theservload/100) * ($theprocedureefload/100);


echo "---->here<-------";

$thetotalprice = $total * $theunitprice;

$connection2 = mysql_connect("$host", "$username", "$password");
if (!$connection2)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection2);
$sql2="INSERT INTO transaction ( 
   Licensee
    , Created
    , Creator
    , Scheme
    , Principal
    , Enrolee
    , Visit
    , Service
    , Detail
    , `Status` 
	, Quantity
	, Unit_price
	, Total_price
	, Capitation
	, Provider)
VALUES
('$session','$created','$creator','$sc','$pr','$en','$id','$scr','$drug_FK','$status','$total','$theunitprice','$thetotalprice','$cap','$provider')";
if (!mysql_query($sql2,$connection2))
  {
  die('Error: ' . mysql_error());
  }


/***********************/
echo "transaction done";

/***********************/
  
  
echo "1";

mysql_close($connection);
mysql_close($connection2);


exit;
  
} ?>