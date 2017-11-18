
<?php require_once('../Connections/localhost.php');
session_start();
$pagetask="Client";
$v=$_SESSION["License"];

?>
<?php

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



mysql_select_db($database_localhost, $localhost);
$query_Reccountry = "SELECT Country, Id FROM country order by country";
$Reccountry = mysql_query($query_Reccountry, $localhost) or die(mysql_error());
$row_Reccountry = mysql_fetch_assoc($Reccountry);
$totalRows_Reccountry = mysql_num_rows($Reccountry);

mysql_select_db($database_localhost, $localhost);
$query_Recstate = "SELECT Id, `State` FROM `state` order by state";
$Recstate = mysql_query($query_Recstate, $localhost) or die(mysql_error());
$row_Recstate = mysql_fetch_assoc($Recstate);
$totalRows_Recstate = mysql_num_rows($Recstate);

mysql_select_db($database_localhost, $localhost);
$query_Reclga = "SELECT Id, LGA FROM lga order by LGA";
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
$query_Recowner = "SELECT Id, Ownership FROM ownership";
$Recowner = mysql_query($query_Recowner, $localhost) or die(mysql_error());
$row_Recowner = mysql_fetch_assoc($Recowner);
$totalRows_Recowner = mysql_num_rows($Recowner);

mysql_select_db($database_localhost, $localhost);
$query_Recbusiness = "SELECT Id, Business, Program_FK FROM business";
$Recbusiness = mysql_query($query_Recbusiness, $localhost) or die(mysql_error());
$row_Recbusiness = mysql_fetch_assoc($Recbusiness);
$totalRows_Recbusiness = mysql_num_rows($Recbusiness);
?>
<?php  $Lis = '".$_SESSION["License"]."';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
<title>Newmed</title>
		<link rel="stylesheet" href="../common/layout.css" />

<link rel="stylesheet" type="text/css" href="../common/css/style.css" />
<script type="text/javascript" src="../common/scripts/jquery.min.js"></script>
<script type="text/javascript" src="../common/scripts/custom.js"></script>
<script language="javascript" type="text/javascript" src="cvv.js"></script>
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
  include('../auth.php');
?>


            
 </div>
  <div id="links-sub"></div>






<div  id="content">
  
  
<div id="Licensehq"  style="overflow:hidden;">
   
   <table  class="sample">
        <tr class="header">
          <td width="20%" height="20px">Headquaters </td>
        </tr>
    </table>
        <div  align="left"id="cont" style=" width : auto; overflow : auto; background-color:#e5e5e5; height:430px" >
          <?php 
	
$numrows="";
$letter ="";

//connect to the database
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");
$sql="    		
SELECT
    client.Client as clientn
    , client_hqs.Client as cthq
    , client.License 
FROM
    newmed06.client_hqs
    INNER JOIN newmed06.client 
        ON (client_hqs.Client = client.LId) WHERE client.License=$v  ORDER BY client.Client";

$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);

echo "<table id=\"test\" class=\"sample\">";

do{
$Licensee =$row['clientn'];

$ID=$row['cthq'];
	
//-display the result of the array
echo "<tr class=\"tablebody\">"; 
echo "<td >";
echo "<a class=\"linkr\"  onClick=\"getData('hq.php?clhq=$ID','subscrb.php?lic=$ID')\">"   . $Licensee ."</a></li>\n";

echo "</td>";	
 } 

while($row=mysql_fetch_array($result));

echo "</tr>";
echo "</table>";



  


$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");
$sql="    		
	SELECT
    client.License
    
    , client.LId
    , client.Created
    , client.Creator
    , client.Client
    , client.Short
    , client.Business_FK
    , client.Address
    , client.Country_FK
    , client.State_FK
    , client.LGA_FK
    , client.City
    , client.Postcode
    , client.NHIS_Reg_No
    , client.NHIS_Registered
    , client.Contact
    , client.Contact_Business_Phone
    , client.Contact_Mobile_Phone
    , client.Contact_Email
    , client.Contact_Job_Title
    , country.Country
    , state.State
    , lga.LGA
    , client_hqs.Client AS chqclient
	, business.Business
	,CAC_reg_no
	,Statement
	,NHMIS_HF_Code
	,Web_Page
FROM
    newmed06.client_hqs
    LEFT JOIN newmed06.client 
        ON (client_hqs.Client = client.LId)
    LEFT JOIN newmed06.country 
        ON (client.Country_FK = country.CId)
    LEFT JOIN newmed06.state 
        ON (client.State_FK = state.Id)
	LEFT JOIN newmed06.business 
        ON (client.Business_FK = business.Id)
    LEFT JOIN newmed06.lga 
        ON (client.LGA_FK = lga.Id) WHERE client.License=$v ORDER BY CLIENT LIMIT 1  ";
	
	

$result=mysql_query($sql); 
while($row=mysql_fetch_array($result))
{

 
  $nhisno =$row['NHIS_Reg_No'];
  $nhisrd =$row['NHIS_Registered'];
  $postalcode =$row['Postcode'];
  $country =$row['Country'];
  $state =$row['State'];
  
  $lga =$row['LGA'];
  $city =$row['City'];
  $add =$row['Address'];
  $contact =$row['Contact'];
  $contactt =$row['Contact_Job_Title'];
  $mphone =$row['Contact_Mobile_Phone'];
  $bphone =$row['Contact_Business_Phone'];
  $contacte =$row['Contact_Email'];
  $created =$row['Created'];
  $creator =$row['Creator'];
  $country_fk=$row['Country_FK'];
  $country=$row['Country'];
  $lga_fk =$row['LGA_FK'];
  $state_fk=$row['State_FK'];
  $state=$row['State'];
  $lname=$row['Client'];
  $short= $row['Short'];
  $Business= $row['Business'];
  $Business_FK= $row['Business_FK'];
  $webpage= $row['Web_Page'];
  $CAC_reg_no= $row['CAC_reg_no'];
  $Statement= $row['Statement'];
  $NHMIS_HF_Code= $row['NHMIS_HF_Code'];
  
  
  

  
 }
 

      ?> 
        </div>
        
    </div>
    
    <div id="Licensehqlicensee">
     <div style="position:relative;"> 
    <div id="contact">
   <div id="h1"  style="background: url(../images/nav-bg-hover.png) repeat-x; width:100px; height:100%; float:left; color:#FFF"><label>Headquaters</label></div>
   <div style="background: url(../images/nav-bg.png) repeat-x; width:100px; height:100%; float:left;"><?php echo "<a class=\"links\" onClick=\"getData('branch.php?clhq=$clhq')\">"   . "Client" ."</a></li>\n"; ?></div>
    </div>
    <div id="contact1">
    
    <?php 


echo "<img style=\"float:left\"; src=\"../images/icons/max - Copy.gif\" width=\"16\" height=\"16\" />";
echo "<img style=\"float:left\"; src=\"../images/icons/leftbtn.gif\" width=\"16\" height=\"16\" />" ; 
?>
    
    
 <input align="middle"style=" float:left; height:12px" disabled="disabled" type="text" />
<?php 


echo "<img style=\"float:left\"; src=\"../images/icons/list_normal.png\" width=\"16\" height=\"16\" />";
echo "<img style=\"float:left\"; src=\"../images/icons/min - Copy.gif\" width=\"16\" height=\"16\" />" ; 
echo "<img style=\"float:left\"; src=\"../images/icons/error.png\"  width=\"16\" height=\"16\" onClick=\"getData('new.php?licenhq=$idpk')\"/>";?>
 
    </div>
    <div id="d1">
      <table  class="sample">
        <tr class="header">
          <td>Licensee</td>
        </tr>
        <tr  class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Long Name</label><input type="text" name="textfield" id="textfield" value="<?php   echo $lname; ?>" style="height:100%;"/>
            
          </td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Short Name</label><input type="text" name="textfield2"  value="<?php   echo $short; ?>" id="textfield2"  style="height:100%;"  />
           
          </td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >NHIS No.\ Date</label><input type="text" name="textfield3" id="textfield3"  value="<?php   echo $nhisno; ?>"  style="width:19%;  height:100%;"/><input type="text" value="<?php   echo $nhisrd; ?>"name="textfield3" id="textfield3" style="width:19%;  height:100%;"  />
            
          </td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Business</label><select name="select" id="select" style="height:100%; width:157px;">
            <option value="<?php echo $row['Business_FK']?>"><?php echo $row['Business']?></option>
            <?php
do {  
?>
            <option value="<?php echo $row_Recbusiness['Id']?>"><?php echo $row_Recbusiness['Business']?></option>
            <?php
} while ($row_Recbusiness = mysql_fetch_assoc($Recbusiness));
  $rows = mysql_num_rows($Recbusiness);
  if($rows > 0) {
      mysql_data_seek($Recbusiness, 0);
	  $row_Recbusiness = mysql_fetch_assoc($Recbusiness);
  }
?>
          </select>
            
          </td>
        </tr>
      </table>
    </div>
    <div id="d2">
    <table  class="sample">
        <tr class="header">
          <td>Picture</td>
        </tr>
        <tr class="tablebody">
          <td> </td>
        </tr>
        <tr class="tablebody">
          <td></td>
        </tr>
        <tr class="tablebody">
          <td></td>
        </tr>
        <tr>
       
        </tr>
      </table>
    </div>
    <div id="d3"><table  class="sample">
        <tr class="header">
          <td>Primary contact</td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >contact</label><input type="text" value="<?php   echo $contact; ?>" name="textfield" id="textfield" style="height:100%;"/></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Job Title</label><input type="text" name="textfield2" id="textfield2" value="<?php   echo $contactt; ?>" style="height:100%;" /></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Business Phone</label><input type="text" name="textfield2" id="textfield2" value="<?php   echo $bphone; ?>"  style="height:100%;"/></td>
            
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Mobile Phone</label><input type="text" value="<?php   echo $mphone; ?>"  name="textfield2" id="textfield2" style="height:100%;" /></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Email</label><input type="text" name="textfield2" id="textfield2" style="height:100%;" value="<?php   echo $contacte; ?>"/></td>
        </tr>
      </table>
    </div>
    <div id="d4"><table  class="sample">
        <tr class="header">
          <td>Address</td>
        </tr>
        <tr>
          <td><textarea name="addr"  id="addr" cols="45" rows="5" style="height:22px;  width:98%;"><?php echo $add; ?>  </textarea></td>
        </tr>
        <tr  class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Country</label><select name="country" id="country"  style="width:120px">
            <option value="<?php echo $country_fk;?>"> <?php echo $country;?></option>
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
            
          </select>
              
              
              
          
          </td>
        </tr>
        
       
         <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >State</label><select name="state" id="state" style="height:100%; width:120px;">
          <option value="<?php echo $state_fk; ?>"><?php echo $state; ?></option>
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
                
              </select>  
              </td>
              </tr>
              <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >LGA</label><select name="lga" id="lga" style="height:100%;">
          <option value="<?php echo $lga_fk; ?>"><?php echo $lga; ?></option>
          
          
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
        </tr>
       <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >City/Postal code</label><input type="text" name="city" id="city" style="height:100%; width:80px;"  value="<?php   echo $city; ?>" /><input type="text" name="post" id="post" value="<?php   echo $postalcode; ?>"   style="height:100% ;width:80px;" /></td>
        </tr>
      
       
      </table>
    </div>
    <div id="d5"><table  class="sample">
        <tr class="header">
          <td>Headquaters</td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Webpage</label><input type="text" name="textfield4" 
          value="<?php   echo $webpage; ?>"id="textfield4"  style="height:100%;"/>
          </td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >CAC Reg No.</label><input type="text" name="textfield2" id="textfield2" style="height:100%;" value="<?php   echo $CAC_reg_no; ?>"/></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Ownership</label><select name="select" id="select" style="height:100%; width:157px;">
            <option value="value">label</option>
            <?php
do {  
?>
            <option value="<?php echo $row_Recowner['Id']?>"><?php echo $row_Recowner['Ownership']?></option>
            <?php
} while ($row_Recowner = mysql_fetch_assoc($Recowner));
  $rows = mysql_num_rows($Recowner);
  if($rows > 0) {
      mysql_data_seek($Recowner, 0);
	  $row_Recowner = mysql_fetch_assoc($Recowner);
  }
?>
          </select></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >NHMIS HF Code</label><input type="text" name="textfield2" id="textfield2" style="height:100%;"  value="<?php   echo $NHMIS_HF_Code; ?>" /></td>
        </tr>
    </table></div>
      <div id="d6"><table  class="sample">
        <tr class="header">
          <td>Mission Statement</td>
        </tr>
        <tr>
          <td><label>
            <textarea name="textarea" id="textarea" cols="45" rows="5" style="height:60px; width:98%;"><?php echo $Statement; ?></textarea>
          </label></td>
        </tr>
      </table></div>
        
</div>
    </div>
    
    <div id="licensesubscrib">
      
      <table   class="sample">
        <tr class="header">
          <td width="20%" height="20px">Service </td>
        </tr>
      </table>
        <div align="left" id="subscrb" style=" width : auto; overflow : auto; background-color:#e5e5e5">
          
         
<?php

$lic=2;


mysql_select_db($database_localhost, $localhost);
$query_Reclh = "SELECT * FROM license_history  WHERE license=$lic order by Id "  ;
$Reclh = mysql_query($query_Reclh, $localhost) or die(mysql_error());
$row_Reclh = mysql_fetch_assoc($Reclh);
$totalRows_Reclh = mysql_num_rows($Reclh);

mysql_select_db($database_localhost, $localhost);
$query_Reclh2 = "SELECT
    Id
    , Cost
    , License
    , LENGTH
    , License_Date
    , Expire
FROM
    newmed06.license_history WHERE license=2 ORDER BY License_Date DESC LIMIT 1 ";
$Reclh2 = mysql_query($query_Reclh2, $localhost) or die(mysql_error());
$row_Reclh2 = mysql_fetch_assoc($Reclh2);
$totalRows_Reclh2 = mysql_num_rows($Reclh2);


?>

<table   width="100%" border="1">
  <tr>
    <td  bgcolor="#e5e5e5" valign="top" width="50%">
  
    
    <table  width="100%" border="1">
  <tr>
   
  
   <td width="32%">License_Date</td>
    <td width="68%">Length</td>
  
  </tr>
  <?php do { ?>
    <tr>
      
      
      
      <td><?php echo $row_Reclh['License_Date']; ?></td>
      <td><?php echo $row_Reclh['Length']; ?></td>
      
    </tr>
    <?php } while ($row_Reclh = mysql_fetch_assoc($Reclh)); ?>
    </table>
    
  </td>
    <td valign="top" width="50%">

<table  class="sample">
  <tr  class="tablebody">
    <td>Service Point</td>
 
  </tr>
  <tr>
    <td><?php 



$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");
$sqlr="  SELECT Id , Role  , Rlid FROM  newmed06.role WHERE role.Rlid  = $lic ";
$resultr=mysql_query($sqlr); 
$rowr=mysql_fetch_array($resultr);

echo "<table width=\"100%\" border=\"0\" bgcolor=\"#e5e5e5\" align=\"left\" >";
do{

$role =$rowr['Role'];
$rl=$rowr['Id'];
echo "<tr>"; 

$color = "#e5e5e5"; 

if (isset($rl)){
echo "<td bgcolor=\"$color\" height=\"20\" align=\"left\" >";	
echo "<a >" . $role ."</a></li>\n";
echo "</td>";

echo "<td bgcolor=\"$color\" height=\"20\" align=\"left\" >";	
echo "<input  name=\"username\" type=\"text\"  style=\"width:50px\"   />";
echo "</td>";




}

 } 

while($rowr=mysql_fetch_array($resultr));

echo "</tr>";
echo "</table>";




    
?></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
      <form id="form1" name="form1" method="post" action="">
      <table width="100%" border="0">
        <tr>
          <td width="32%"><?php echo $row_Reclh2['Expire']; ?></td>
          <td >
            <label>
    <?php    echo  "<input type=\"text\" name=\"length\"  style=\"width:50px\"  id=\"length\"  onchange=\"subc('yes.php?lic=$lic')\" />";  ?>
            </label></td>
        </tr>
    </table></form></td>
    <td>&nbsp;</td>
  </tr>
  </table>


        </div></td>
    </div>
  
  
  
  
  <input type="hidden" name="upsize_ts" value="<?php  echo time(); ?>" />





</div>

</body>

</html>
<?php


mysql_free_result($Reccountry);

mysql_free_result($Recstate);

mysql_free_result($Reclga);

mysql_free_result($Reclicensehq);
?>
