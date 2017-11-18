<?php require_once('../Connections/localhost.php');
session_start();
?>
<?php

  $nhisno ="";
  $nhisrd ="";
  $postalcode ="";
  $country ="";
  $state ="";
  $lhq ="";
  $lhqn ="";
  $lga ="";
  $city ="";
  $add ="";
  $lkey ="";
  $lcost ="";
  $contact ="";
  $contactt ="";
  $mphone ="";
  $bphone ="";
  $contacte ="";
  $created ="";
  $creator ="";
$country_fk="";
$username="";
$state_fk="";
$lga_fk="";
$idpk ="";
$lname="";
$Expiration="";
 $short="";


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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}



if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE licensee SET Licensee_Hqs=%s, Created=%s, Creator=%s, Address=%s, Country_FK=%s, State_FK=%s, LGA_FK=%s, City=%s, PostCode=%s, Licensed=%s, License_Cost=%s, License_Key=%s, NHIS_Reg_No=%s, NHIS_Registered=%s, Contact=%s, Contact_Business_Phone=%s, Contact_Mobile_Phone=%s, Contact_Email=%s, Contact_Job_Title=%s ,Expiration=%s ,Short=%s WHERE Id=%s",
                       GetSQLValueString($_POST['lhq'], "int"),
                       GetSQLValueString($_POST['created'], "date"),
                       GetSQLValueString($_POST['creator'], "int"),
                       GetSQLValueString($_POST['add'], "text"),
                       GetSQLValueString($_POST['country'], "int"),
                       GetSQLValueString($_POST['state'], "int"),
                       GetSQLValueString($_POST['lgau'], "int"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['postcod'], "text"),
                       GetSQLValueString($_POST['created'], "date"),
                       GetSQLValueString($_POST['licensecost'], "double"),
                       GetSQLValueString($_POST['licensekey'], "text"),
                       GetSQLValueString($_POST['NHISregno'], "text"),
                       GetSQLValueString($_POST['Nhisregd'], "date"),
                       GetSQLValueString($_POST['contact'], "text"),
                       GetSQLValueString($_POST['bphone'], "text"),
                       GetSQLValueString($_POST['mphone'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['contacttitle'], "text"),
					   GetSQLValueString($_POST['Expiration'], "date"),
					   GetSQLValueString($_POST['short'], "text"),
                       GetSQLValueString($_POST['idpk'], "int"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($updateSQL, $localhost) or die(mysql_error());
}




mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = "SELECT `Access_Level` FROM `access`";
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_localhost, $localhost);
$query_Reccountry = "SELECT Country, Id FROM country";
$Reccountry = mysql_query($query_Reccountry, $localhost) or die(mysql_error());
$row_Reccountry = mysql_fetch_assoc($Reccountry);
$totalRows_Reccountry = mysql_num_rows($Reccountry);

mysql_select_db($database_localhost, $localhost);
$query_Recstate = "SELECT Id, `State` FROM `state`";
$Recstate = mysql_query($query_Recstate, $localhost) or die(mysql_error());
$row_Recstate = mysql_fetch_assoc($Recstate);
$totalRows_Recstate = mysql_num_rows($Recstate);

mysql_select_db($database_localhost, $localhost);
$query_Reclga = "SELECT Id, LGA FROM lga";
$Reclga = mysql_query($query_Reclga, $localhost) or die(mysql_error());
$row_Reclga = mysql_fetch_assoc($Reclga);
$totalRows_Reclga = mysql_num_rows($Reclga);

mysql_select_db($database_localhost, $localhost);
$query_Reclicensehq = "SELECT
    licensee_hqs.Licensee
    , licensee.Licensee
    , licensee.Id
FROM
    newmed06.licensee
    INNER JOIN newmed06.licensee_hqs 
        ON (licensee.Licensee_Hqs = licensee_hqs.Licensee)WHERE licensee_hqs.Licensee=licensee.Id";
$Reclicensehq = mysql_query($query_Reclicensehq, $localhost) or die(mysql_error());
$row_Reclicensehq = mysql_fetch_assoc($Reclicensehq);
$totalRows_Reclicensehq = mysql_num_rows($Reclicensehq);

mysql_select_db($database_localhost, $localhost);
$query_Recuser = "SELECT LId, User_Name FROM `user` WHERE Licensee_Hqs = '".$_SESSION["License"]."'";
$Recuser = mysql_query($query_Recuser, $localhost) or die(mysql_error());
$row_Recuser = mysql_fetch_assoc($Recuser);
$totalRows_Recuser = mysql_num_rows($Recuser);




?>
<?php  $Lis = '".$_SESSION["License"]."';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
<title>Newmed</title>
		<link rel="stylesheet" href="../common/layout.css" />

       
</head>

<body>
<div id="header" align="right">
	
	 <img alt=""    style="width: 51;height: 17;" src="../images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" />
    <div style=" color:#CF0; font-weight:bold">
	 <?php 
	echo "".$_SESSION["userid"]." || <a style=\" color:#CF0\" href='../logout.php'>Log Out</a> ";	?> 
    </div>
	 
</div>
    <div id="links">
  <?php   
  

	$lrolename=" Installation ";
  echo  "<ul><li class=\"selected\"><a class=\"section\" href=\"../license/license.php\">$lrolename</a>
        					<ul>
        						<li><a href=\"../license/license.php\">License setup </a></li>
        						<li><a href=\"../master/master.php\">Master Setup</a></li>
								<li><a href=\"../licenserole/licenserole.php\"><b>Role Setup</b></a></li>
							</ul>
              </li>" ;		
 
echo "</ul>"
?>            
  </div>
<div id="links-sub"></div>
<div  id="content">
  <table width="100%"   style=" border-style:solid; border-color:#224466; "   >
        <tr>
          <td   valign="top" style="border-right-style:solid; border-right-color:#224466; font-weight:bold"width="18%">
          <div  style=" width : auto; overflow : auto;">
            <table  bgcolor="#b0b0b0" width="100%" border="0">
              <tr>
                <td width="32%" height="20">License </td>
              </tr>
            </table>
            <div id="cont" style="width : auto; overflow : auto;"> 
<?php 

if(isset($_GET['id']))
{
$cm=$_GET['id'];
//connect to the  database
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 

//-select the database to use
$mydb=mysql_select_db("newmed06");

//-query the database table

$sql="    		
	SELECT
    licensee.Licensee_Hqs
    , licensee.Created
    , licensee.Creator
    , licensee.Licensee
    , country.Country
    , licensee.Id
    , licensee.Contact_Job_Title
    , licensee.Contact_Email
    , licensee.Contact_Mobile_Phone
    , licensee.Contact_Business_Phone
    , licensee.Contact
    , licensee.NHIS_Registered
    , licensee.NHIS_Reg_No
    , licensee.License_Key
    , licensee.License_Cost
    , licensee.Licensed
    , licensee.PostCode
    , licensee.City
    , licensee.LGA_FK
    , licensee.State_FK
    , licensee.Country_FK
    , lga.LGA
	, licensee.Address
	, user.User_Name
	, state.State
	, Expiration
	, Short


FROM
    newmed06.licensee
    INNER JOIN newmed06.country 
        ON (licensee.Country_FK = country.Id)
    INNER JOIN newmed06.lga 
        ON (licensee.LGA_FK = lga.Id)
    INNER JOIN newmed06.user 
        ON (licensee.Creator = user.LId)
	INNER JOIN newmed06.state 
        ON (licensee.State_FK = state.Id)  WHERE licensee.Id = $cm ";
	
	
	
	
	
//-run the query against the mysql query function
$result=mysql_query($sql); 
//-count results
$numrows=mysql_num_rows($result);
//-create while loop and loop through result set 
while($row=mysql_fetch_array($result))
{
  $idpk =$row['Id'];
  $nhisno =$row['NHIS_Reg_No'];
  $nhisrd =$row['NHIS_Registered'];
  $postalcode =$row['PostCode'];
  $country =$row['Country'];
  $state =$row['State'];
  $lhq =$row['Licensee_Hqs'];
  $lga =$row['LGA'];
  $city =$row['City'];
  $add =$row['Address'];
  $lkey =$row['License_Key'];
  $lcost =$row['License_Cost'];
  $contact =$row['Contact'];
  $contactt =$row['Contact_Job_Title'];
  $mphone =$row['Contact_Mobile_Phone'];
  $bphone =$row['Contact_Business_Phone'];
  $contacte =$row['Contact_Email'];
  $created =$row['Created'];
  $creator =$row['Creator'];
  $country_fk=$row['Country_FK'];
  $lga_fk =$row['LGA_FK'];
  $username=$row['User_Name'];
  $state_fk=$row['State_FK'];
  $lname=$row['Licensee'];
  $Expiration=$row['Expiration'];
  $short= $row['Short'];

  
 }
 
$sqlhq="SELECT
    Licensee
FROM
    newmed06.licensee WHERE  Licensee.Id=$lhq";
	
$resulthq=mysql_query($sqlhq); 
$numrows=mysql_num_rows($resulthq);
while($rowhq=mysql_fetch_array($resulthq))
{
  $lhqn =$rowhq['Licensee'];
 

 }

}

?>
    <?php 
	
$numrows="";
$letter ="";
	 



//connect to the database
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 

//-select the database to use
$mydb=mysql_select_db("newmed06");

//-query the database table


$result=mysql_query($sql); 
//-count results
$numrows=mysql_num_rows($result);
//-create while loop and loop through result set
echo "<table width=\"100%\" border=\"0\" align=\"left\" >";
//echo "<tr><th>Company Name</th>";
$row=mysql_fetch_array($result);



do{
$Licensee =$row['Licensee'];

$ID=$row['Id'];
	
//-display the result of the array
echo "<tr><td  bgcolor=\"#c6dbfb\" height=\"20\" align=\"left\" >"; 
echo "<a href=\"license.php?id=$ID\">"   . $Licensee ."</a></li>\n";
	
 } 

while($row=mysql_fetch_array($result));

echo "</th>";
echo "</table>";



?>
    
    </div>
          </div></td>
          <td  valign="top" style="border-right-style:solid; border-right-color:#224466; font-weight:bold"width="66%">
          <div style=" width : auto; height : 380px; overflow-y : hidden; overflow-x:hidden";>
            <table bgcolor="#b0b0b0" width="100%" border="0">
              <tr>
                <td  width="32%" height="20">Role </td>
              </tr>
            </table>
            <div style=" width : auto; height : 380px; overflow-y : auto; overflow-x:hidden";>
            
            <table width="100%" border="0">
      <tr>
      
        <td  valign="top"width="50%"><form id="form2" name="form2" method="POST" action="<?php echo $editFormAction; ?>">
         
         <div style="border : solid 2px #ffff; width : auto; overflow : auto;"> 
        <table width="100%"  border="0" align="left" height="100%">
              
              
                            
              <tr>
               
                <td  width="18%" align="left" bgcolor="#c6dbfb"><strong>
                  <label  >Licensee Hqs <br />
                    </label>
                  </strong></td>
                <td   style="width:auto" align="left" width="24%"><select name="lhq" id="lhq" style="width:200px">
                onmouseover="bgcolor:#c6dbfb"
                  <option value="<?php echo $lhq ?>"><?php echo $lhqn ;?></option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Reclicensehq['Id']?>"><?php echo $row_Reclicensehq['Licensee']?></option>
                  <?php
} while ($row_Reclicensehq = mysql_fetch_assoc($Reclicensehq));
  $rows = mysql_num_rows($Reclicensehq);
  if($rows > 0) {
      mysql_data_seek($Reclicensehq, 0);
	  $row_Reclicensehq = mysql_fetch_assoc($Reclicensehq);
  }
?>
                </select></td>
                <td   bgcolor="#c6dbfb" width="15%" align="left"><strong>
                  <label >License Key</label>
                </strong></td>
                <td align="left" width="31%"><input id="licensekey"  name="licensekey" 	type="text"  value="<?php   echo $lkey; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
                
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >NHIS Reg No.</label>
                 
                  <br />
                </strong></td>
                <td align="left"><input id="postcode2"  name="NHISregno" 	type="text"  value="<?php   echo $nhisno; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td  width="18%"bgcolor="#c6dbfb" align="left"><strong>License Cost</strong></td>
                <td align="left"><input id="postcode3"  name="licensecost"  type="text"  value="<?php   echo $lcost; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
                
                <td  width="18%"bgcolor="#c6dbfb" align="left"><strong>NHIS Reg date<br />
                </strong></td>
                <td align="left"><input id="postcode2"  name="Nhisregd" 	type="text"  value="<?php   echo $nhisrd; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >License Date</label>
                </strong></td>
                <td align="left"><input id="postcode2"  name="created" 	type="text"  value="<?php   echo $created; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
                
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >Postal code</label>
                  <br />
                </strong></td>
                <td align="left"><input id="postcode2"  name="postcod" 	type="text"  value="<?php   echo $postalcode; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td bgcolor="#c6dbfb" align="left"><strong>Expiration</strong></td>
                <td align="left"><input id="postcode2"  name="Expiration" 	type="text"  value="<?php   echo $Expiration; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
                
                <td bgcolor="#c6dbfb" align="left"><strong> <label >Address</label>
                  
                </strong></td>
                <td align="left"><input id="postcode"  name="add"      type="text"  value="<?php   echo $add; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >Contact</label>
                </strong></td>
                <td align="left"><input id="postcode2"  name="contact" 	type="text"  value="<?php   echo $contact; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
                
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >Country</label>
<br />
                </strong></td>
                <td align="left"><select name="country" id="country"   style="width:200px">
                  <option value="<?php echo $country_fk?>"> <?php   echo $country; ?></option>
                   
					
					
					
					<?php
do {  
?>
                    <option value="<?php echo $row_Reccountry['Id']?>"><?php echo $row_Reccountry['Country']?></option>
                    <?php
} while ($row_Reccountry = mysql_fetch_assoc($Reccountry));
  $rows = mysql_num_rows($Reccountry);
  if($rows > 0) {
      mysql_data_seek($Reccountry, 0);
	  $row_Reccountry = mysql_fetch_assoc($Reccountry);
  }
?>
                  </select></td>
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >Contact Job Title</label>
                </strong></td>
                <td align="left"><input id="postcode2"  name="contacttitle" 	type="text"  value="<?php   echo $contactt; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
                
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >State</label>
                  <br />
                </strong></td>
                <td align="left"><select name="state" id="state" style="width:200px">
                  <option value="<?php echo $state_fk?>"><?php echo $state ;?></option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Recstate['Id']?>"><?php echo $row_Recstate['State']?></option>
                  <?php
} while ($row_Recstate = mysql_fetch_assoc($Recstate));
  $rows = mysql_num_rows($Recstate);
  if($rows > 0) {
      mysql_data_seek($Recstate, 0);
	  $row_Recstate = mysql_fetch_assoc($Recstate);
  }
?>
                </select></td>
                <td bgcolor="#c6dbfb" align="left" ><strong>
                  <label >Mobile Phone</label>
                </strong></td>
                <td align="left"><input id="postcode2"  name="mphone" 	type="text"  value="<?php   echo $mphone; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
               
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >LGA</label>
                </strong></td>
                <td align="left"><select name="lgau" id="lgau" style="width:200px">
                  
                  <option value="<?php echo $lga_fk?>"><?php echo $lga?></option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_Reclga['Id']?>"><?php echo $row_Reclga['LGA']?></option>
                    <?php
} while ($row_Reclga = mysql_fetch_assoc($Reclga));
  $rows = mysql_num_rows($Reclga);
  if($rows > 0) {
      mysql_data_seek($Reclga, 0);
	  $row_Reclga = mysql_fetch_assoc($Reclga);
  }
?>
                  </select></td>
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >Business Phone</label>
                </strong></td>
                <td align="left"><input id="postcode2"  name="bphone" 	type="text"  value="<?php   echo $bphone; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
               
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >City</label>
                </strong></td>
                <td align="left"><input id="postcode2"  name="city" 	type="text"  value="<?php   echo $city; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >Contact Email</label>
                </strong></td>
                <td align="left"><input id="postcode2"  name="email" 	type="text"  value="<?php   echo $contacte; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
               
                <td bgcolor="#c6dbfb" align="left"><strong>
                 Short
                  
                Name</strong></td>
                <td align="left"><input id="postcode2"  name="short" 	type="text"  value="<?php   echo $short; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >Creator</label>
                </strong></td>
                <td align="left"><label><select name="creator" id="creator" style="width:200px">
                  <option value="<?php echo $creator?>"><?php echo $username ;?></option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Recuser['LId']?>"><?php echo $row_Recuser['User_Name']?></option>
                  <?php
} while ($row_Recuser = mysql_fetch_assoc($Recuser));
  $rows = mysql_num_rows($Recuser);
  if($rows > 0) {
      mysql_data_seek($Recuser, 0);
	  $row_Recuser = mysql_fetch_assoc($Recuser);
  }
?>
                </select>
                  
                </label></td>
                </tr>
              <tr>
                
                <td align="left"></td>
                <td align="left"><?php echo "<a href=licensecreation.php title=\"Add new Licensee\" rel=\"gb_page_center[500,470]\" ><font color=\"#009\">Add New Licensee</font>
			 </a>" ?></td>
                <td >               </td>
                <td align="left">
                  <label>
                    <input type="submit" name="update" id="update" value="update" />
                  </label>
                </td>
                </tr>
            </table></div><input type="hidden" name="idpk" value="<?php   echo $idpk; ?>" />
           
            <input type="hidden" name="MM_update" value="form2" />
        </form></td>
        
      </tr>
    </table>
            </div>
          </div></td>
          <td    valign="top"width="16%"><table bgcolor="#b0b0b0" width="100%" border="0">
            <tr>
              <td  width="32%" height="20"><strong>Task</strong></td>
            </tr>
          </table>
            <div style=" width : auto; height : 400px;  overflow-y : auto; overflow-x:hidden";> </div></td>
        </tr>
      </table>
</div>
</body>
</html>