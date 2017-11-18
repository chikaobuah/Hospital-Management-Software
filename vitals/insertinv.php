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

if (isset($_POST['mod'])){
$mod = $_POST['mod'];}
else{
$mod = $_GET['mod'];}

$pr = $_GET['pr'];
$en = $_GET['en'];
$sc = $_GET['sc'];
$id = $_GET['id']; 
$st = $_GET['st']; 
$cap = $_GET['cap']; 
$lc2 = $_GET['lc2']; 
$lc = $_GET['lc']; 
$id2 = $_GET['id2']; 




/*
$mod = "AddInvestigation";
$pr = 100000;
$en = 100006;
$sc = 23;
$id = "2010-07-16 00:00:00"; 
$st = 5; 
$cap = 500; 
$lc2 = 1; 
$lc = 1; 
$id2 = "2010-07-16 00:00:00";


$creator = 100023;
$created = date('Y-m-d h:m:s'); 
$procedure_FK = 234;
$provider = 100000;
$appointment = "";
$request = "";*/





mysql_select_db($database_localhost, $localhost);
$query_recsheme = "SELECT  program.Program  ,  scheme.Program_FK , scheme.LId AS scheme_FK ,client.LId, client.Client , client.Short , client.Contact, client.Contact_Mobile_Phone, client.Contact_Business_Phone  , scheme.Scheme FROM newmed06.scheme     INNER JOIN newmed06.client          ON (scheme.Company_FK = client.LId)     INNER JOIN newmed06.program          ON (scheme.Program_FK = program.Id) WHERE scheme.LId = $sc";
$recsheme = mysql_query($query_recsheme, $localhost) or die(mysql_error());
$row_recsheme = mysql_fetch_assoc($recsheme);
$totalRows_recsheme = mysql_num_rows($recsheme);

$mainclient = $row_recsheme['LId'];
$mainprogram = $row_recsheme['Program_FK'];
$mainplan = $row_recsheme['scheme_FK'];

$colname_recuser = "-1";
if (isset($_SESSION['username'])) {


  $colname_recuser = $_SESSION['username'];
}
mysql_select_db($database_localhost, $localhost);
$query_recuser = sprintf("SELECT LId FROM `user` WHERE User_Id = %s", GetSQLValueString($colname_recuser, "text"));
$recuser = mysql_query($query_recuser, $localhost) or die(mysql_error());
$row_recuser = mysql_fetch_assoc($recuser);
$totalRows_recuser = mysql_num_rows($recuser);

$creator = $row_recuser['LId'];
$created = date('Y-m-d h:m:s'); 
$procedure_FK = $_GET['procedure_FK'];
$provider = $_GET['provider'];
$appointment = $_GET['appointment'];
$request = $_GET['request'];
$session = $_SESSION['License'];

$host="localhost"; 
$username="root";
$password="";
$database="newmed06";


if ($mod == "AddInvestigation"){
	
	$scr = $_GET['scr'];
	

if ($st == 5) {


  
mysql_select_db($database_localhost, $localhost);
$query_effective = "SELECT * FROM cover_effective WHERE  Effective <= '$id' ORDER BY Effective DESC LIMIT 1";
$effective = mysql_query($query_effective, $localhost) or die(mysql_error());
$row_effective = mysql_fetch_assoc($effective);
$totalRows_effective = mysql_num_rows($effective);


$eff = $row_effective['Id'];
  
mysql_select_db($database_localhost, $localhost);
$query_sechemetest = "SELECT * FROM cover_procedure WHERE Capitation = $cap AND Effective = $eff AND Procedure_FK = $procedure_FK";
$sechemetest = mysql_query($query_sechemetest, $localhost) or die(mysql_error());
$row_sechemetest = mysql_fetch_assoc($sechemetest);
$totalRows_sechemetest = mysql_num_rows($sechemetest); 

}

if ($totalRows_sechemetest == 0)
{
	$status = 1; $status2 = 4;
	
	} else { 
	
			$status = 2; $status2 = 1;}



/*******************************************************************************************************************************************************************************************************************************tarrif and loading check ****************************************************************/

/*************checking effective*********************/


mysql_select_db($database_localhost, $localhost);
$query_license = "SELECT Id FROM loading_effective WHERE Service_FK = 8 AND License = $session  AND Effective <= '$id' ORDER BY Effective DESC LIMIT 1";
$license = mysql_query($query_license, $localhost) or die(mysql_error());
$row_license = mysql_fetch_assoc($license);
$totalRows_license = mysql_num_rows($license);

if ($totalRows_license == 0){
$theliceff = 0;
} else {$theliceff = $row_license['Id'];}


mysql_select_db($database_localhost, $localhost);
$query_client = "SELECT Id FROM loading_effective WHERE Service_FK = 9  AND License = $session AND Effective <= '$id' ORDER BY Effective DESC LIMIT 1";
$client = mysql_query($query_client, $localhost) or die(mysql_error());
$row_client = mysql_fetch_assoc($client);
$totalRows_client = mysql_num_rows($client);

if ($totalRows_client == 0){
$theclieff = 0;
} else {$theclieff = $row_client['Id'];}


mysql_select_db($database_localhost, $localhost);
$query_program = "SELECT Id FROM loading_effective WHERE Service_FK = 10  AND License = $session AND Effective <= '$id' ORDER BY Effective DESC LIMIT 1";
$program = mysql_query($query_program, $localhost) or die(mysql_error());
$row_program = mysql_fetch_assoc($program);
$totalRows_program = mysql_num_rows($program);


if ($totalRows_program == 0){
$theproeff = 0;
} else {$theproeff = $row_program['Id'];}


mysql_select_db($database_localhost, $localhost);
$query_plan = "SELECT Id FROM loading_effective WHERE Service_FK = 11  AND License = $session AND Effective <= '$id' ORDER BY Effective DESC LIMIT 1";
$plan = mysql_query($query_plan, $localhost) or die(mysql_error());
$row_plan = mysql_fetch_assoc($plan);
$totalRows_plan = mysql_num_rows($plan);

if ($totalRows_plan == 0){
$theplaeff = 0;
} else {$theplaeff = $row_plan['Id'];}


mysql_select_db($database_localhost, $localhost);
$query_principal = "SELECT Id FROM loading_effective WHERE Service_FK = 12  AND License = $session AND Effective <= '$id' ORDER BY Effective DESC LIMIT 1";
$principal = mysql_query($query_principal, $localhost) or die(mysql_error());
$row_principal = mysql_fetch_assoc($principal);
$totalRows_principal = mysql_num_rows($principal);

if ($totalRows_principal == 0){
$theprieff = 0;
} else {$theprieff = $row_principal['Id'];}

mysql_select_db($database_localhost, $localhost);
$query_serv = "SELECT Id FROM loading_effective WHERE Service_FK = 13  AND License = $session AND Effective <= '$id' ORDER BY Effective DESC LIMIT 1";
$serv = mysql_query($query_serv, $localhost) or die(mysql_error());
$row_serv = mysql_fetch_assoc($serv);
$totalRows_serv = mysql_num_rows($serv);

if ($totalRows_serv == 0){
$thesereff = 0;
} else {$thesereff = $row_serv['Id'];}

mysql_select_db($database_localhost, $localhost);
$query_procedureef = "SELECT Id FROM loading_effective WHERE Service_FK = $scr  AND License = $session AND Effective <= '$id' ORDER BY Effective DESC LIMIT 1";
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
$sql="INSERT INTO visit_procedure ( 
    Enrolee
    , Created
    , Creator
    , Visit
    , `Procedure`
    , Provider
    , Appointment
    , Specific_Request
    , `Status`)
VALUES
('$en','$created','$creator','$id','$procedure_FK','$provider','$appointment','$request','$status2')";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }





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
$query_procedureefload = "SELECT Loading FROM procedure_loading WHERE License = $session AND Procedure_FK = $procedure_FK AND Effective_FK = $theproefeff";
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
$query_tariffs = "SELECT Tariff FROM client_procedures WHERE License = $session AND Procedure_FK = $procedure_FK AND Client_FK = $mainclient  AND Effective_FK = $recdid ";
$tariffs = mysql_query($query_tariffs, $localhost) or die(mysql_error());
$row_tariffs = mysql_fetch_assoc($tariffs);
$totalRows_tariffs = mysql_num_rows($tariffs);

$costprice = $row_tariffs['Tariff'];

/*****************************************************************************************************************************************************************************************************************tarriff end ******************************************************/


$theunitprice = $costprice * ($thelicenseload/100) * ($theclientload/100) * ($theprogramload/100) * ($theplanload/100) * ($theprincipalload/100) * ($theservload/100) * ($theprocedureefload/100);



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
('$session','$created','$creator','$sc','$pr','$en','$id','$scr','$procedure_FK','$status','1','$theunitprice','$theunitprice','$cap','$provider')";
if (!mysql_query($sql2,$connection2))
  {
  die('Error: ' . mysql_error());
  }  
  
echo "1";

mysql_close($connection);
mysql_close($connection2);


exit;
  
} else if ($mod == "LoadInvestigation"){

$ser = $_GET['service'];

$colname_providers = "-1";
if (isset($_SESSION['License'])) {
  $colname_providers = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_providers = sprintf("SELECT client_service.Client_FK     , service.Id     , client.Client     , client_service.License     , client.Short FROM newmed06.client_service     INNER JOIN newmed06.service          ON (client_service.Service_FK = service.Id)     INNER JOIN newmed06.client          ON (client.LId = client_service.Client_FK) WHERE client_service.License = %s AND client_service.Service_FK = $ser", GetSQLValueString($colname_providers, "int"));
$providers = mysql_query($query_providers, $localhost) or die(mysql_error());
$row_providers = mysql_fetch_assoc($providers);
$totalRows_providers = mysql_num_rows($providers);

$colname_idtest = "-1";
if (isset($_SESSION['License'])) {
  $colname_idtest = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_idtest = sprintf("SELECT * FROM cover_effective WHERE License = %s AND Effective <= CURDATE()ORDER BY Effective DESC LIMIT 1 ", GetSQLValueString($colname_idtest, "int"));
$idtest = mysql_query($query_idtest, $localhost) or die(mysql_error());
$row_idtest = mysql_fetch_assoc($idtest);
$totalRows_idtest = mysql_num_rows($idtest);

$theid = $row_idtest['Id'];
$session = $_SESSION['License'];
$capi = $_GET['cap'];
$ser = $_GET['service'];

mysql_select_db($database_localhost, $localhost);
$query_procedures = "SELECT     
procedure.Procedure,procedure.Id,procedure.Short

FROM     newmed06.procedure     
WHERE procedure.Service_direction_FK = $ser ";
$procedures = mysql_query($query_procedures, $localhost) or die(mysql_error());
$row_procedures = mysql_fetch_assoc($procedures);
$totalRows_procedures = mysql_num_rows($procedures);

mysql_select_db($database_localhost, $localhost);
$query_service2 = "SELECT service.Service     , service.Id,  service.Short, procedure.Blocks FROM newmed06.procedure     INNER JOIN newmed06.service          ON (procedure.Service_direction_FK = service.Id) WHERE procedure.Service_direction_FK = $ser GROUP BY service.Service";
$service2 = mysql_query($query_service2, $localhost) or die(mysql_error());
$row_service2 = mysql_fetch_assoc($service2);
$totalRows_service2 = mysql_num_rows($service2);

$colname_visitpro = "-1";
if (isset($_GET['en'])) {
  $colname_visitpro = $_GET['en'];
}
$colname2_visitpro = "-1";
if (isset($_GET['id2'])) {
  $colname2_visitpro = $_GET['id2'];
}
mysql_select_db($database_localhost, $localhost);
$query_visitpro = sprintf("SELECT     visit_procedure.Enrolee     , visit_procedure.Created     , visit_procedure.Creator     , visit_procedure.Visit     , visit_procedure.Procedure     , visit_procedure.Provider     , visit_procedure.Appointment     , visit_procedure.Specific_Request     , visit_procedure.Specimen     , visit_procedure.Status     , client.Client     , procedure.Procedure AS pro  ,procedure.Short AS proshort   , service.Service     , client.Short FROM     newmed06.procedure     INNER JOIN newmed06.service          ON (procedure.Service_direction_FK = service.Id)     INNER JOIN newmed06.visit_procedure          ON (visit_procedure.Procedure = procedure.Id)     INNER JOIN newmed06.client          ON (visit_procedure.Provider = client.LId) WHERE Enrolee = %s AND Visit LIKE %s", GetSQLValueString($colname_visitpro, "int"),GetSQLValueString("%" . $colname2_visitpro . "%", "date"));
$visitpro = mysql_query($query_visitpro, $localhost) or die(mysql_error());
$row_visitpro = mysql_fetch_assoc($visitpro);
$totalRows_visitpro = mysql_num_rows($visitpro);

mysql_select_db($database_localhost, $localhost);
$query_service = "SELECT service.Service     , service.Id,  service.Short, procedure.Blocks FROM newmed06.procedure     INNER JOIN newmed06.service          ON (procedure.Service_direction_FK = service.Id) WHERE procedure.Blocks = 1 GROUP BY service.Service";
$service = mysql_query($query_service, $localhost) or die(mysql_error());
$row_service = mysql_fetch_assoc($service);
$totalRows_service = mysql_num_rows($service);

$colname_recvispro = "-1";
if (isset($_GET['cap'])) {
  $colname_recvispro = $_GET['cap'];
}
mysql_select_db($database_localhost, $localhost);
$query_recvispro = sprintf("SELECT procedure.Procedure     , procedure.Id FROM newmed06.cover_procedure     INNER JOIN newmed06.procedure          ON (cover_procedure.Procedure_FK = procedure.Id) WHERE Capitation = %s", GetSQLValueString($colname_recvispro, "int"));
$recvispro = mysql_query($query_recvispro, $localhost) or die(mysql_error());
$row_recvispro = mysql_fetch_assoc($recvispro);
$totalRows_recvispro = mysql_num_rows($recvispro); 


if ($_GET['lc2'] == 2)
	{
		
		$disable = "disabled=\"disabled\"";
		
		}
	else
	{
		
		$disable = "";
		
		} 
		

echo "<table align=\"left\" width=\"100%\" border=\"1\" style=\"border:thin; border-color:#FFF; border-collapse:collapse;\" >";

echo  "<tr valign=\"baseline\">";
echo  "<td align=\"left\"></td>";
echo  "<td align=\"left\"><strong>Service</strong></td>";
echo  "<td align=\"left\"><strong>Procedure</strong></td>";
echo  "<td align=\"left\"><strong>Provider</strong></td>";
echo  "<td align=\"left\"><strong>Request</strong></td>";
echo  "<td>&nbsp;</td>";
echo  "</tr>";

if ($totalRows_visitpro > 0) {
 do { 
echo   "<tr valign=\"baseline\">";
echo    "<td align=\"left\">";
if ($row_visitpro['Status'] > 0)
	  {
		  
		   echo "<input type=\"checkbox\"";
		  echo $disable;
		  echo "name=\"che\" id=\"che\" checked=\"checked\" value=\"1\" onClick=\"UpdateInvestigation('$row_visitpro[Procedure]');\" />";
	  }
	  else 
	  { 
	  
	 echo "<input type=\"checkbox\" ";
	 echo $disable;
	 echo "name=\"che\" id=\"che\" value=\"1\" onClick=\"UpdateInvestigation('$row_visitpro[Procedure]');\" />";
		  }
		  
echo "</td>";
echo   "<td align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">" ;
echo $row_visitpro['Service']; 
echo "</td>";
echo 	"<td align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
echo $row_visitpro['proshort'];
echo "</td>";
echo    "<td align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
echo $row_visitpro['Short']; 
echo "</td>";
echo    "<td align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
echo $row_visitpro['Specific_Request']; 
echo "</td>";
echo "</tr>";
 
} while ($row_visitpro = mysql_fetch_assoc($visitpro));

}

  
echo  "<tr valign=\"top\">";
echo    "<td align=\"left\">";
		  
echo "</td>";
echo   "<td width=\"125px\" align=\"left\"><select name=\"select\"";
echo $disable;
echo "id=\"select\" style=\"width:100%;\" onchange=\"gotourl(this)\">";
    
echo  "<option value=\"";
echo $row_service2['Id'];
echo "\">"; 
echo $row_service2['Short'];
echo "</option>";
do {  
echo   "<option value=\"";
echo $row_service['Id'];
echo "\">";
echo $row_service['Short'];
echo "</option>";

} while ($row_service = mysql_fetch_assoc($service));
  $rows = mysql_num_rows($service);
  if($rows > 0) {
      mysql_data_seek($service, 0);
	  $row_service = mysql_fetch_assoc($service);
  }
echo  "</select></td>";
echo   "<td width=\"484px\" align=\"left\"><select name=\"procedure_FK\" ";
echo $disable;
echo "id=\"procedure_FK\" style=\"width:100%;\">";

echo  "<option value=\"";
echo "\">";
echo "</option>";

do {  
echo  "<option value=\"";
echo $row_procedures['Id'];
echo "\">";
echo $row_procedures['Short'];
echo "</option>";

} while ($row_procedures = mysql_fetch_assoc($procedures));
  $rows = mysql_num_rows($procedures);
  if($rows > 0) {
      mysql_data_seek($procedures, 0);
	  $row_procedures = mysql_fetch_assoc($procedures);
  }

echo   "</select></td>";
echo   "<td width=\"149\"><select name=\"provider\"";
echo $disable;
echo "style=\"width:100%;\">";

echo  "<option value=\"";
echo "\">";
echo "</option>";

do {  
echo   "<option value=\"";
echo $row_providers['Client_FK'];
echo "\">";
echo $row_providers['Short'];
echo "</option>";

} while ($row_providers = mysql_fetch_assoc($providers));
  $rows = mysql_num_rows($providers);
  if($rows > 0) {
      mysql_data_seek($providers, 0);
	  $row_providers = mysql_fetch_assoc($providers);
  }

echo  "</select></td>";
echo  "<td width=\"184\">";
echo   "<input type=\"text\" name=\"request\" ";
echo $disable;
echo "id=\"request\" style=\"width:100%\"/>";
echo "</td>";
echo "<td width=\"37\"><input type=\"button\" ";
echo $disable;
echo "onclick=\"AddInvestigation();\" value=\"Add\" title=\"Add\" style=\"color: #07c;
        padding: 0px;
        letter-spacing: 0px;
        font-size:8px;
         width:100%;
         height:23px;\"/></td>";
echo "</table>";


} else if ($mod == "UpdateInvestigation"){
	
	$inv = $_GET['inv'];
	
	$colname_visitpro = "-1";
if (isset($_GET['en'])) {
  $colname_visitpro = $_GET['en'];
}
$colname2_visitpro = "-1";
if (isset($_GET['id2'])) {
  $colname2_visitpro = $_GET['id2'];
}
mysql_select_db($database_localhost, $localhost);
$query_visitpro = sprintf("SELECT     visit_procedure.Enrolee     , visit_procedure.Created     , visit_procedure.Creator     , visit_procedure.Visit     , visit_procedure.Procedure     , visit_procedure.Provider     , visit_procedure.Appointment     , visit_procedure.Specific_Request     , visit_procedure.Specimen     , visit_procedure.Status     , client.Client     , procedure.Procedure AS pro     , service.Service     , client.Short FROM     newmed06.procedure     INNER JOIN newmed06.service          ON (procedure.Service_direction_FK = service.Id)     INNER JOIN newmed06.visit_procedure          ON (visit_procedure.Procedure = procedure.Id)     INNER JOIN newmed06.client          ON (visit_procedure.Provider = client.LId) WHERE visit_procedure.Procedure = $inv AND Enrolee = %s AND Visit LIKE %s", GetSQLValueString($colname_visitpro, "int"),GetSQLValueString("%" . $colname2_visitpro . "%", "date"));
$visitpro = mysql_query($query_visitpro, $localhost) or die(mysql_error());
$row_visitpro = mysql_fetch_assoc($visitpro);
$totalRows_visitpro = mysql_num_rows($visitpro);



	


if ($row_visitpro['Status'] == 1)
{
	$che = 0;
	
	} else {
		
		$che = 1;
		
		}

$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="UPDATE visit_procedure SET Status = '$che' WHERE Enrolee = '$en' AND `Procedure` = '$inv' AND Visit LIKE '%". $id ."%'";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($connection);

echo "1";
  exit;

	
	}


?> 

<?php
mysql_free_result($recuser);

mysql_free_result($providers);

mysql_free_result($service2);

mysql_free_result($recsheme);

?>
