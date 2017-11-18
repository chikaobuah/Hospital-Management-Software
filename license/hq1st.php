<?php require_once('../Connections/localhost.php'); ?>
<?php
$ID=$_GET['lic'];


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
    INNER JOIN newmed06.country 
        ON (licensee.Country_FK = country.Id)
    INNER JOIN newmed06.lga 
        ON (licensee.LGA_FK = lga.Id)
    INNER JOIN newmed06.user 
        ON (licensee.Creator = user.LId)
	INNER JOIN newmed06.state 
        ON (licensee.State_FK = state.Id)  WHERE licensee.Id = $ID ";
	
	
	
	
	

$result=mysql_query($sql); 
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



    
  
   <table bgcolor="#e5e5e5" width="1auto" border="0">
              <tr>
                <td  width="32%" height="20">
                <div  id="outer" style="position:relative;">
                
                <div id="apDiv1">Hospital</div>
                
                <div id="apDiv2">Licensee</div>
                </div></td>
              </tr>
            </table>

             
          
         <div style="border : solid 2px #ffff; width : auto;   padding: 5px; background-color:#e5e5e5"> 
        <table width="100%"  bgcolor="#e5e5e5" border="0" align="left" height="100%">
              
              
                            
              <tr>
           
                <td   align="left" bgcolor="#C7C7C7"><strong>
                  <label  >Licensee Hqs <br />
                    </label>
                  </strong></td>
                <td   style="width:auto" ><input id="licensekey"  name="licensekey"  disabled="disabled"	type="text"  value="<?php   echo $lhqn; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td   bgcolor="#C7C7C7" align="left"><strong>
                  <label >License Key</label>
                </strong></td>
                <td  ><input id="licensekey"  name="licensekey" 	type="text"  value="<?php   echo $lkey; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
                
                <td bgcolor="#C7C7C7" align="left"><strong>
                  <label >NHIS Reg No.</label>
                 
                  <br />
                </strong></td>
                <td ><input id="postcode2"  name="NHISregno" 	type="text"  value="<?php   echo $nhisno; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td  bgcolor="#C7C7C7" align="left"><strong>License Cost</strong></td>
                <td ><input id="postcode3"  name="licensecost"  type="text"  value="<?php   echo $lcost; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
               
                <td  bgcolor="#C7C7C7" align="left"><strong>NHIS Reg date<br />
                </strong></td>
                <td ><input id="postcode2"  name="Nhisregd" 	type="text"  value="<?php   echo $nhisrd; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td bgcolor="#C7C7C7" align="left"><strong>
                  <label >License Date</label>
                </strong></td>
                <td ><input id="postcode2"  name="created" 	type="text"  value="<?php   echo $created; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
               
                <td bgcolor="#C7C7C7" align="left"><strong>
                  <label >Postal code</label>
                  <br />
                </strong></td>
                <td ><input id="postcode2"  name="postcod" 	type="text"  value="<?php   echo $postalcode; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td bgcolor="#C7C7C7" align="left"><strong>Expiration</strong></td>
                <td ><input id="postcode2"  name="Expiration" 	type="text"  value="<?php   echo $Expiration; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
               

                <td bgcolor="#C7C7C7" align="left"><strong> <label >Address</label>
                  
                </strong></td>
                <td><textarea  style="width:195px; height:50px" name="textarea" id="textarea"   cols="45" rows="5"><?php   echo $add; ?>
                    </textarea></td>
                <td bgcolor="#C7C7C7" align="left"><strong>
                  <label >Contact</label>
                </strong></td>
                <td><input id="postcode2"  name="contact" 	type="text"  value="<?php   echo $contact; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
                
                <td bgcolor="#C7C7C7" align="left"><strong>
                  <label >Country</label>
<br />
                </strong></td>
                <td ><select name="country" id="country"   style="width:200px">
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
                <td bgcolor="#C7C7C7" align="left"><strong>
                  <label >Contact Job Title</label>
                </strong></td>
                <td ><input id="postcode2"  name="contacttitle" 	type="text"  value="<?php   echo $contactt; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
              
                <td bgcolor="#C7C7C7" align="left"><strong>
                  <label >State</label>
                  <br />
                </strong></td>
                <td ><select name="state" id="state" style="width:200px">
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
                <td bgcolor="#C7C7C7" align="left" ><strong>
                  <label >Mobile Phone</label>
                </strong></td>
                <td ><input id="postcode2"  name="mphone" 	type="text"  value="<?php   echo $mphone; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
                
                <td bgcolor="#C7C7C7" align="left"><strong>
                  <label >LGA</label>
                </strong></td>
                <td ><select name="lgau" id="lgau" style="width:200px">
                  
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
                <td bgcolor="#C7C7C7" align="left"><strong>
                  <label >Business Phone</label>
                </strong></td>
                <td ><input id="postcode2"  name="bphone" 	type="text"  value="<?php   echo $bphone; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
               
                <td bgcolor="#C7C7C7" align="left"><strong>
                  <label >City</label>
                </strong></td>
                <td ><input id="postcode2"  name="city" 	type="text"  value="<?php   echo $city; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td bgcolor="#C7C7C7" align="left"><strong>
                  <label >Contact Email</label>
                </strong></td>
                <td ><input id="postcode2"  name="email" 	type="text"  value="<?php   echo $contacte; ?>"   style="width:195px  "   	tabindex="6" /></td>
                </tr>
              <tr>
             
                <td bgcolor="#C7C7C7" align="left"><strong>
                 Short
                  
                Name</strong></td>
                <td ><input id="postcode2"  name="short" 	type="text"  value="<?php   echo $short; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td bgcolor="#C7C7C7" align="left"><strong>
                  <label >Creator</label>
                </strong></td>
                <td><label><select name="creator" id="creator" style="width:200px">
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
                <td ></td>
                <td >               </td>
                <td align="right">
                  <label>
                    <input type="submit" name="update" id="update" value="update"  style="background: url(../images/nav-bg.png) repeat-x;"/>
                  </label>
                </td>
                </tr>
            </table></div>
            <input type="hidden" name="idpk" value="<?php   echo $idpk; ?>" />
           
            <input type="hidden" name="MM_update" value="form2" />
        </form>
             
             
             
           
   
  