<?php require_once('../Connections/localhost.php'); ?>
<?php
 $clhq=$_GET['clhq'];



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
	, client.License
    , client_hqs.CAC_Reg_No
    , client_hqs.Ownership_FK
    , client_hqs.Web_Page
    , client_hqs.NHMIS_HF_CODE
    , client_hqs.Statement
FROM
    newmed06.client_hqs
    LEFT JOIN newmed06.client 
        ON (client_hqs.Client = client.LId)
    LEFT JOIN newmed06.country 
        ON (client.Country_FK = country.CId)
    LEFT JOIN newmed06.state 
        ON (client.State_FK = state.Id)
    LEFT JOIN newmed06.lga 
        ON (client.LGA_FK = lga.Id)  WHERE client_hqs.Client=$clhq";
	
	
	
	
	

$result=mysql_query($sql); 
while($row=mysql_fetch_array($result))
{
 
  $nhisno =$row['NHIS_Reg_No'];
  $nhisrd =$row['NHIS_Registered'];
  $postalcode =$row['Postcode'];
  $country =$row['Country'];
  $state =$row['State'];
  $lhq =$row['License'];
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
  $webpage= $row['Web_Page'];
  $CAC_reg_no= $row['CAC_Reg_No'];
  $Statement= $row['Statement'];
  $NHMIS_HF_Code= $row['NHMIS_HF_CODE'];

  
 }
 


?> 
<style type="text/css">
<!--
div#outer {
       
       
       border: solid 1px #959595;
	   height:23px;
	   width: 440px;
    }
 
 div#apDiv1 {
		background-color: #b0b0b0;
		
        float: left;
        width: 220px;
        height:23px;
		
}
 div#apDiv2 {

	float: left;

	width:220px;
	height:23px;
	background-color:#e5e5e5;
	
}
-->
</style>




   
             
             
          
    
        <div style="position:relative;"> 
    <div id="contact">
   <div id="h1"  style="background: url(../images/nav-bg-hover.png) repeat-x; width:100px; height:100%; float:left; color:#FFF"><label>Hospital</label></div>
   <div style="background: url(../images/nav-bg.png) repeat-x; width:100px; height:100%; float:left;"><?php echo "<a class=\"links\" onClick=\"getData('branch.php?clhq=$clhq')\">"   . "Licensee" ."</a></li>\n"; ?></div>
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
echo "<img style=\"float:left\"; src=\"../images/icons/error.png\"  width=\"16\" height=\"16\" onClick=\"getData('new.php')\"/>";?>
      
            
            
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
          <td><label  style="display:inline-block; width:150px; " >Business</label><select name="select" id="select" style="height:100%; width:157px;"> </select>
            
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
          <td></td>
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
          <td>Hosptial info</td>
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
          <td><label  style="display:inline-block; width:150px; " >Ownership</label><select name="select" id="select" style="height:100%; width:157px;"> </select></td>
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
            <input type="hidden" name="idpk" value="<?php   echo $idpk; ?>" />
           
            <input type="hidden" name="MM_update" value="form2" />
        </form>
             
             
             
             
      
   
   
   
   
             
           
   
  