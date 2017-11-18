<?php require_once('../Connections/localhost.php'); ?>
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


session_start();
$licenhq=$_GET['licenhq'];




$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");
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
    left JOIN newmed06.country 
        ON (licensee.Country_FK = country.Id)
    left JOIN newmed06.lga 
        ON (licensee.LGA_FK = lga.Id)
    left JOIN newmed06.user 
        ON (licensee.Creator = user.LId)
	left JOIN newmed06.state 
        ON (licensee.State_FK = state.Id)  WHERE licensee.Id = $licenhq ";
	
	
	
	
	

$result=mysql_query($sql); 
while($row=mysql_fetch_array($result))
{
  $lhq1 =$row['Licensee_Hqs'];
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
$query_Recuser = "SELECT LId, User_Name FROM `user` WHERE Licensee_Hqs = '".$_SESSION["License"]."'";
$Recuser = mysql_query($query_Recuser, $localhost) or die(mysql_error());
$row_Recuser = mysql_fetch_assoc($Recuser);
$totalRows_Recuser = mysql_num_rows($Recuser);

mysql_select_db($database_localhost, $localhost);
$query_Recbis = "SELECT Id, Business, Program_FK FROM business order by Business";
$Recbis = mysql_query($query_Recbis, $localhost) or die(mysql_error());
$row_Recbis = mysql_fetch_assoc($Recbis);
$totalRows_Recbis = mysql_num_rows($Recbis);

?> 
<form id="form2" name="form2">
<div id="total" style="position:relative;" >


<div  style="position:absolute; width:100%; left:0px;">
<table  width="100%" border="0" style="font-weight:bold;">
              <tr>
                <td  width="32%" height="20">
                </td>
              </tr>
            </table> </div>
<div style="position:relative;"> 
    <div id="contact">
    
   <div id="h1"  style="background: url(../images/nav-bg-hover.png) repeat-x; width:100px; height:100%; float:left; color:#FFF"><label>Hospital</label></div>
   
   <div style="background: url(../images/nav-bg.png) repeat-x; width:100px; height:100%; float:left;">Licensee</div>
    </div>
    
    <?php 
//total number of licenses for each lhq

$sqlall="  SELECT COUNT(Id) AS coun FROM newmed06.licensee WHERE Licensee_Hqs=$licenhq";
$resultall=mysql_query($sqlall); 
$rowall=mysql_fetch_array($resultall);
$lcount=$rowall['coun'];
$num=0;



?>
    <div id="contact1">
                         
    <input   align="middle"style=" float:left; height:12px" name=""  disabled="disabled" type="text"  
    
    
    value="<?php echo "1"."of ".$lcount?>"/>
<?php 
echo $endnum=$lcount-2;
echo "<img style=\"float:left\"; src=\"../images/icons/list_normal.png\" width=\"16\" height=\"16\" onClick=\"getData('branchf.php?licenhq=$licenhq&num=$num&lcount=$lcount')\"/>";
 echo   "<img style=\"float:left\"; src=\"../images/icons/min - Copy.gif\" width=\"16\" height=\"16\" onClick=\"getData('branchf.php?licenhq=$licenhq&num=$endnum&lcount=$lcount')\"/>" ; ?>
<?php        echo "<img style=\"float:left\"; src=\"../images/icons/error.png\"  width=\"16\" height=\"16\" onClick=\"getData('new.php?licenhq=$licenhq&num=$num&lcount=$lcount')\"/>";?></div>
            
      
    <div id="d1">
      <table  class="sample">
        <tr class="header">
          <td>Licensee</td>
        </tr>
        <tr  class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Long Name</label><input type="text" name="ln" id="ln" style="height:100%;"/>
            
          </td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Short Name</label><input type="text" name="sn"   id="sn"  style="height:100%;"  />
           
          </td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >NHIS No.\ Date</label><input type="text" name="nhis" id="nhis"    style="width:19%;  height:100%;"/><input type="text" name="nhisdate" id="nhisdate" style="width:19%;  height:100%;"  />
            
          </td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Business</label><select name="biz" id="biz" style="height:100%; width:157px;">
            <?php
do {  
?>
            <option value="<?php echo $row_Recbis['Id']?>"><?php echo $row_Recbis['Business']?></option>
            <?php
} while ($row_Recbis = mysql_fetch_assoc($Recbis));
  $rows = mysql_num_rows($Recbis);
  if($rows > 0) {
      mysql_data_seek($Recbis, 0);
	  $row_Recbis = mysql_fetch_assoc($Recbis);
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
          <td>Licensing</td>
        </tr>
        
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >License Cost</label><input type="text" name="lcost" id="lcost"  style="height:100%;" />
            
          </td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >License Key</label><input type="text" name="lkey" id="lkey" style="height:100%;" />
            
         </td>
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
          <td><label  style="display:inline-block; width:150px; " >contact</label><input type="text"  name="contact" id="contact" style="height:100%;"/></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Job Title</label><input type="text" name="jobtitle" id="jobtitle"  style="height:100%;" /></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Business Phone</label><input type="text" name="bphone" id="bphone"   style="height:100%;"/></td>
            
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Mobile Phone</label><input type="text"  name="mphone" id="mphone" style="height:100%;" /></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Email</label><input type="text" name="email" id="email" style="height:100%;" /></td>
        </tr>
      </table>
    </div>
    <div id="d4"><table  class="sample">
        <tr class="header">
          <td>Address</td>
        </tr>
        <tr>
          <td><textarea name="addr"  id="addr" cols="45" rows="5" style="height:22px;  width:98%;">  </textarea></td>
        </tr>
        <tr  class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Country</label><select name="country" id="country"  style="width:120px">
            <option value="value"></option>
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
          <option value="value"></option>
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
          <td><label  style="display:inline-block; width:150px; " >LGA</label><select name="lga" id="lga" style="height:100%;"><option value="value"></option>
          
          
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
          <td><label  style="display:inline-block; width:150px; " >City/Postal code</label><input type="text" name="city" id="city" style="height:100%; width:80px;"  /><input type="text" name="postcode" id="postcode"  style="height:100% ;width:80px;" /></td>
        </tr>
      
       
      </table>
    </div>
    <div id="d5"><table  class="sample">
        <tr class="header">
          <td>Hosptial info</td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px;">Webpage</label><input type="text"  id="webpage" name="webpage"  style="height:100%;"/>
          </td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >CAC Reg No.</label><input type="text"   name="CAC_reg_no" id="CAC_reg_no" style="height:100%;" /></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Ownership</label><select name="owner"  id="owner" style="height:100%; width:157px;"> </select></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >NHMIS HF Code</label><input  type="text" name="NHMIS_HF_Code" id="NHMIS_HF_Code" style="height:100%;"   /></td>
        </tr>
    </table></div>
      <div id="d6"><table  class="sample">
        <tr class="header">
          <td>Mission Statement</td>
        </tr>
        <tr>
          <td><label>
            <textarea name="Statement" id="Statement" cols="45" rows="5"  style="height:60px; width:98%;"></textarea>
          </label></td>
        </tr>
      </table><input  name="" type="button" value="Add" style="background:url(../images/nav-bg.png)" onclick="addlicensehq('addlicensehq.php')"/></div>
        
</div>
   
             
             
                
               
</div>


<?php
$date= date("Y-m-d");
$creator=$_SESSION["userlid"];
echo  "<input type=\"hidden\" name=\"lic\" id=\"lic\" value=\"". $licenhq." \"   />"; 

?>

</form>        
    
      </div>  
        
    
        


<?php
mysql_free_result($Recbis);
?>
