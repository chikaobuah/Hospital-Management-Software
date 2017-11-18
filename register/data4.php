<?php require_once('../Connections/localhost.php'); ?>
<?php
$p=$_GET["p"];
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
$query_Recenrole = "SELECT
    enrolee.Surname
    , enrolee.First_Name
    , enrolee.Other_Name
    , enrolee.Reg_No
    , enrolee.Born
    , enrolee.Gender
    , enrolee.Nationality
    , enrolee.Origin_State
    , enrolee.Religion
    , enrolee.Home_Address
    , enrolee.Home_City
    , enrolee.Home_PostCode
    , enrolee.Home_Phone
    , enrolee.Mobile_Phone
    , enrolee.Email
    , enrolee.Job_Place
    , enrolee.Job_Title
    , marital.Marital
    , gender.Gender
    , country.Country
    , tribe.Tribe
    , state.State
    , country.Country
    , state.State
    , lga.LGA
	, religion.Religion
FROM
    newmed06.enrolee
     LEFT JOIN newmed06.marital 
        ON (enrolee.Marital = marital.Id)
    LEFT JOIN newmed06.gender 
        ON (enrolee.Gender = gender.Id)
    LEFT JOIN newmed06.country 
        ON (enrolee.Nationality = country.CId) AND (enrolee.Home_Country = country.CId)
    LEFT JOIN newmed06.tribe 
        ON (enrolee.Tribe = tribe.Id)
    LEFT JOIN newmed06.state 
        ON (enrolee.Origin_State = state.Id) AND (enrolee.Home_State = state.Id)
    LEFT JOIN newmed06.lga 
        ON (enrolee.Home_LGA = lga.Id)
    LEFT JOIN newmed06.religion 
        ON (enrolee.Religion = religion.Id) WHERE LId= $p";
		

$Recenrole = mysql_query($query_Recenrole, $localhost) or die(mysql_error());
$row_Recenrole = mysql_fetch_assoc($Recenrole);
$totalRows_Recenrole = mysql_num_rows($Recenrole);

do 
{

	$First_Name =$row_Recenrole['First_Name'];
	$Surname =$row_Recenrole['Surname'];
	$Other_Name =$row_Recenrole['Other_Name'];
	$Reg_No =$row_Recenrole['Reg_No'];
	$Born =$row_Recenrole['Born'];
	$Marital =$row_Recenrole['Marital'];
	$Gender =$row_Recenrole['Gender'];
	$Country =$row_Recenrole['Country'];
	$State =$row_Recenrole['State'];
	$Religion =$row_Recenrole['Religion'];
	$Tribe =$row_Recenrole['Tribe'];
	$Religion =$row_Recenrole['Religion'];
	$Home_Address =$row_Recenrole['Home_Address'];
	$Country =$row_Recenrole['Country'];
	$LGA =$row_Recenrole['LGA'];
	$Home_Phone =$row_Recenrole['Home_Phone'];
	$Mobile_Phone =$row_Recenrole['Mobile_Phone'];
	$Email =$row_Recenrole['Email'];
	$Job_Place =$row_Recenrole['Job_Place'];
	$Job_Title =$row_Recenrole['Job_Title'];
	}
while($row_Recenrole = mysql_fetch_assoc($Recenrole));








?>
<table width="100%" border="1">
  <tr>
    <td width="15%">Surname</td>
    <td width="20%"><?php echo $Surname;?></td>
    <td width="15%">Home Address</td>
    <td width="50%"><?php echo $Home_Address;?></td>
  </tr>
  <tr>
    <td>First name</td>
    <td><?php echo $First_Name;?></td>
    <td>Country</td>
    <td><?php echo $Country;?></td>
  </tr>
  <tr>
    <td>Other name</td>
    <td><?php echo $Other_Name;?></td>
    <td>State</td>
    <td><?php echo $State;?></td>
  </tr>
  <tr>
    <td>Regno/Date</td>
    <td><?php echo $Reg_No;?></td>
    <td>LGA</td>
    <td><?php echo $LGA;?></td>
  </tr>
  <tr>
    <td>Date of Birth</td>
    <td><?php echo $Born?></td>
    <td>City/Postal Code</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Marital Status</td>
    <td><?php echo $Marital ?></td>
    <td>Home Phone</td>
    <td><?php echo $Home_Phone ?></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><?php echo $Gender;?></td>
    <td>Mobile Phone</td>
    <td><?php echo $Mobile_Phone;?></td>
  </tr>
  <tr>
    <td>Nationality</td>
    <td><?php echo $Country?></td>
    <td>Email</td>
    <td><?php echo $Email?></td>
  </tr>
  <tr>
    <td>State of Origin</td>
    <td><?php echo $State ?></td>
    <td>Profession</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Religion</td>
    <td><?php echo $Religion ?></td>
    <td>Job Place</td>
    <td><?php echo $Job_Place ?></td>
  </tr>
  <tr>
    <td>Tribe</td>
    <td><?php echo $Tribe ?></td>
    <td>Job title</td>
    <td><?php echo $Job_Title ?></td>
  </tr>
  <tr>
    <td>Language</td>
    <td>&nbsp;</td>
    <td>Job Phone</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php


mysql_free_result($Recenrole);
?>
