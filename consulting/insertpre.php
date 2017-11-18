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


$colname_recuser = "-1";
if (isset($_SESSION['username'])) {


  $colname_recuser = $_SESSION['username'];
}
mysql_select_db($database_localhost, $localhost);
$query_recuser = sprintf("SELECT LId FROM `user` WHERE User_Id = %s", GetSQLValueString($colname_recuser, "text"));
$recuser = mysql_query($query_recuser, $localhost) or die(mysql_error());
$row_recuser = mysql_fetch_assoc($recuser);
$totalRows_recuser = mysql_num_rows($recuser);

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
$creator = $row_recuser['LId'];
$created = date('Y-m-d h:i:s'); 
$status = 1;


$appointment = 'appointment';
$session = $_SESSION['License'];


$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

if ($mod == "AddPre") {

mysql_select_db($database_localhost, $localhost);
$query_recsheme = "SELECT  program.Program  ,  scheme.Program_FK , scheme.LId AS scheme_FK ,client.LId, client.Client , client.Short , client.Contact, client.Contact_Mobile_Phone, client.Contact_Business_Phone  , scheme.Scheme FROM newmed06.scheme     INNER JOIN newmed06.client          ON (scheme.Company_FK = client.LId)     INNER JOIN newmed06.program          ON (scheme.Program_FK = program.Id) WHERE scheme.LId = $sc";
$recsheme = mysql_query($query_recsheme, $localhost) or die(mysql_error());
$row_recsheme = mysql_fetch_assoc($recsheme);
$totalRows_recsheme = mysql_num_rows($recsheme);

$x = $_GET['x'];
$y = $_GET['y'];
$z = $_GET['z'];
$style = $_GET['style']; 
$usage = $_GET['usage']; 
$drug_FK = $_GET['drug_FK']; 
$scr = $_GET['scr']; 


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
	$status = 1; $status2 = 4;
	
	} else { 
	
			$status = 2; $status2 = 1;}




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
('$en','$created','$creator','$id','$drug_FK','$provider','$appointment','$style','$total','$usage','$status2','$x','$y','$z')";
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


$theunitprice = $costprice * ($thelicenseload/100) * ($theclientload/100) * ($theprogramload/100) * ($theplanload/100) * ($theprincipalload/100) * ($theservload/100) * ($theprocedureefload/100);



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


  
  
echo "1";

mysql_close($connection);
mysql_close($connection2);


exit;

}else if ($mod == "LoadDrugs") {
	
	if ($_GET['lc2'] == 2)
	{
		
		$disable = "disabled=\"disabled\"";
		
		}
	else
	{
		
		$disable = "";
		
		}
		
		
$ser = $_GET['string'];

mysql_select_db($database_localhost, $localhost);
$query_drugs = "SELECT     
drug.Drug, drug.Id,drug.Short

FROM     newmed06.drug     
WHERE drug.Service_direction_FK = $ser ";
$drugs = mysql_query($query_drugs, $localhost) or die(mysql_error());
$row_drugs = mysql_fetch_assoc($drugs);
$totalRows_drugs = mysql_num_rows($drugs);


echo "<select name=\"drug_FK\" id=\"drug_FK\"";
echo $disable; 
echo "style=\"width:100%\">";

echo "<option value=\"";
echo "\">";
echo "</option>";
do {  
echo "<option value=\"";
echo $row_drugs['Id']; 
echo "\">";
echo $row_drugs['Short'];
echo "</option>";
} while ($row_drugs = mysql_fetch_assoc($drugs));
  $rows = mysql_num_rows($drugs);
  if($rows > 0) {
      mysql_data_seek($drugs, 0);
	  $row_drugs = mysql_fetch_assoc($drugs);
  }
echo "</select>";  
   
exit;


} else if ($mod == "LoadX") {
	
	
		
		
$ser = $_GET['checkx'];

mysql_select_db($database_localhost, $localhost);
$query_checkx = "SELECT
*
FROM
    style
WHERE Id = $ser ";
$checkx = mysql_query($query_checkx, $localhost) or die(mysql_error());
$row_checkx = mysql_fetch_assoc($checkx);
$totalRows_checkx = mysql_num_rows($checkx);



if ($_GET['lc2'] == 2)
	{
		
		$disable = "disabled=\"disabled\"";
		
		}
	else
	{
		if ($row_checkx['X'] == '-1' ){
			
			$disable = "disabled=\"disabled\"";
			}else {$disable = "";}
		
		}
		
if ($row_checkx['X'] == '-1' ){	
			$value = 0;
			}else {$value = $row_checkx['X'];}
		

echo "<input type=\"text\"";
echo $disable; 
echo "name=\"x\" value=\"";
echo $value;
echo "\"";
echo "id=\"x\" style=\"width:20px\" />";
   
exit;


}else if ($mod == "LoadY") {
	
	
		
		
$ser = $_GET['checky'];

mysql_select_db($database_localhost, $localhost);
$query_checky = "SELECT
*
FROM
    style
WHERE Id = $ser ";
$checky = mysql_query($query_checky, $localhost) or die(mysql_error());
$row_checky = mysql_fetch_assoc($checky);
$totalRows_checky = mysql_num_rows($checky);



if ($_GET['lc2'] == 2)
	{
		
		$disable = "disabled=\"disabled\"";
		
		}
	else
	{
		if ($row_checky['Y'] == '-1' ){
			
			$disable = "disabled=\"disabled\"";
			}else {$disable = "";}
		
		}
		
if ($row_checky['Y'] == '-1' ){
			
			$value = 0;
			}else {$value = $row_checky['Y'];}
		

echo "<input type=\"text\"";
echo $disable; 
echo "name=\"y\" value=\"";
echo $value;
echo "\"";
echo "id=\"y\" style=\"width:20px\" />";
   
exit;


}else if ($mod == "LoadZ") {
	
	
		
		
$ser = $_GET['checkz'];

mysql_select_db($database_localhost, $localhost);
$query_checkz = "SELECT
*
FROM
    style
WHERE Id = $ser ";
$checkz = mysql_query($query_checkz, $localhost) or die(mysql_error());
$row_checkz = mysql_fetch_assoc($checkz);
$totalRows_checkz = mysql_num_rows($checkz);



if ($_GET['lc2'] == 2)
	{
		
		$disable = "disabled=\"disabled\"";
		
		}
	else
	{
		if ($row_checkz['Z'] == '-1' ){
			
			$disable = "disabled=\"disabled\"";
			}else {$disable = "";}
		
		}
		
if ($row_checkz['Z'] == '-1' ){
			
			$value = 0;
			}else {$value = $row_checkz['Z'];}
		

echo "<input type=\"text\"";
echo $disable; 
echo "name=\"z\" value=\"";
echo $value;
echo "\"";
echo "id=\"z\" style=\"width:20px\" />";
   
exit;


}else if ($mod == "LoadPre"){
	
	if ($_GET['lc2'] == 2)
	{
		
		$disable = "disabled=\"disabled\"";
		
		}
	else
	{
		
		$disable = "";
		
		}
		
	
$colname_visitpre = "-1";
if (isset($_GET['en'])) {
  $colname_visitpre = $_GET['en'];
}
$colname2_visitpre = "-1";
if (isset($_GET['id2'])) {
  $colname2_visitpre = $_GET['id2'];
}
mysql_select_db($database_localhost, $localhost);
$query_visitpre = sprintf("SELECT     visit_prescription.Enrolee     , visit_prescription.Created     , visit_prescription.Creator     , visit_prescription.Visit     , drug.Id     , drug.Drug   , drug.Short as dshort  , visit_prescription.Provider     , visit_prescription.Appointment   , visit_prescription.Style , visit_prescription.Gross_Qty   ,style.Style AS styl  , visit_prescription.Usage    , visit_prescription.Status     , visit_prescription.x     , visit_prescription.y  ,   usage.Usage AS usa   , visit_prescription.z     , service.Service FROM     newmed06.visit_prescription     INNER JOIN newmed06.drug          ON (visit_prescription.Drug_FK = drug.Id)     INNER JOIN newmed06.service          ON (drug.Service_direction_FK = service.Id)  INNER JOIN newmed06.style 
        ON (visit_prescription.Style = style.Id)     INNER JOIN newmed06.usage 
        ON (visit_prescription.Usage = usage.Id) WHERE Enrolee = %s AND Visit = '$colname2_visitpre'", GetSQLValueString($colname_visitpre, "int"));
$visitpre = mysql_query($query_visitpre, $localhost) or die(mysql_error());
$row_visitpre = mysql_fetch_assoc($visitpre);
$totalRows_visitpre = mysql_num_rows($visitpre);

echo "<table width=\"100%\" border=\"1\" style=\"border:thin; border-color:#ffffff; border-collapse:collapse;\">";
echo "<tr>";
echo "<td width=\"4%\">&nbsp;</td>";
echo "<td width=\"13%\"><strong>Service</strong></td>";
echo "<td width=\"37%\"><strong>Prescription</strong></td>";
echo "<td width=\"22%\"><strong>Style</strong></td>";
echo "<td width=\"4%\"><strong>X</strong></td>";
echo "<td width=\"4%\"><strong>Y</strong></td>";
echo "<td width=\"4%\"><strong>Z</strong></td>";
echo "<td width=\"5%\"><strong>Usage</strong></td>";
echo "<td width=\"4%\">&nbsp;</td>";
echo "</tr>";

if ($totalRows_visitpre > 0){

do { 
echo "<tr>";
echo "<td>"; 
 
if ($_GET['lc2'] != 2)
		
		{
			 echo "<a href=plan.php? class=\"home\" title=\"Select\">&nbsp;</a>";
			}
			
echo "</td>";
echo "<td align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";

echo $row_visitpre['Service'];
echo "</td>";
echo "<td align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
	
echo $row_visitpre['dshort'];
echo "</td>";
echo "<td align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
	
echo $row_visitpre['styl']; 
echo "</td>";

echo "<td align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
	
echo $row_visitpre['x'];
echo "</td>";
echo "<td align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
	
echo $row_visitpre['y'];
echo "</td>";
echo "<td align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
	
echo $row_visitpre['z'];
echo "</td>";
echo "<td align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
	
echo $row_visitpre['usa'];
echo "</td>";
echo "<td align=\"left\" >";

if ($row_visitpre['Status'] == 1)
	  {
		  
		   echo "<input type=\"checkbox\" name=\"che\" id=\"che\" checked=\"checked\" value=\"1\" onClick=\"submit();\" />";
	  }
	  else 
	  { 
	  
	 echo "<input type=\"checkbox\" name=\"che\" id=\"che\" value=\"1\" onClick=\"submit();\" />";
		  }

echo "</td>";
echo "</tr>";
 } while ($row_visitpre = mysql_fetch_assoc($visitpre)); }
echo "</table>";

	} 
?> 



 