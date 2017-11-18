<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();
$v=$_SESSION["License"];
//some record sets

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



//some record sets

$clhq=$_GET['clhq'];
$num=$_GET['num'];
$lcount=$_GET['lcount'];
$num=$num-1;

$shownum=$num+1;


mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = "SELECT 
client.License
    , client.Client_Headquaters
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
    , client_hqs.CAC_Reg_No
    , client_hqs.Ownership_FK
    , client_hqs.Web_Page
    , client_hqs.Logo
    , client_hqs.NHMIS_HF_CODE
    , client_hqs.Statement
    , country.Country
    , state.State
    , lga.LGA
FROM
    newmed06.client
    LEFT JOIN newmed06.client_hqs 
        ON (client.Client_Headquaters = client_hqs.Client)
    LEFT JOIN newmed06.country 
        ON (client.Country_FK = country.CId)
    LEFT JOIN newmed06.state 
        ON (client.State_FK = state.Id)
    LEFT JOIN newmed06.lga 
        ON (client.LGA_FK = lga.Id)  WHERE client.License=$v AND client.Client_Headquaters=$clhq"; 


$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


 $y=0;
  
  do {
   $postalcode[$y] =$row_Recordset1['Postcode'];
  $nhisno[$y] =$row_Recordset1['NHIS_Reg_No'];
  $nhisrd[$y] =$row_Recordset1['NHIS_Registered'];
  $country[$y] =$row_Recordset1['Country'];
  $state[$y] =$row_Recordset1['State'];
  $lga[$y] =$row_Recordset1['LGA'];
  $city[$y] =$row_Recordset1['City'];
  $add[$y] =$row_Recordset1['Address'];
  $contact[$y] =$row_Recordset1['Contact'];
  $contactt[$y] =$row_Recordset1['Contact_Job_Title'];
  $mphone[$y] =$row_Recordset1['Contact_Mobile_Phone'];
  $bphone[$y] =$row_Recordset1['Contact_Business_Phone'];
  $contacte[$y] =$row_Recordset1['Contact_Email'];
  $created[$y] =$row_Recordset1['Created'];
  $creator[$y] =$row_Recordset1['Creator'];
  $country_fk[$y]=$row_Recordset1['Country_FK'];
  $lga_fk[$y] =$row_Recordset1['LGA_FK'];
  $state_fk[$y]=$row_Recordset1['State_FK'];
  $lname[$y]=$row_Recordset1['Client'];
  $short[$y]= $row_Recordset1['Short'];
  $webpage[$y]= $row_Recordset1['Web_Page'];
  $CAC_reg_no[$y]= $row_Recordset1['CAC_Reg_No'];
  $Statement[$y]= $row_Recordset1['Statement'];
  $NHMIS_HF_Code[$y]= $row_Recordset1['NHMIS_HF_CODE'];$y++;
 } 	 
	 while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); 

//echo $rolidarr[$num];
//echo $rolidarb[0];
//echo $short[0];

?> 

<div id="total">


<div  style="position:absolute; width:100%; left:0px;">
<table >
              <tr>
                <td  width="32%" height="20">
                </td>
              </tr>
            </table> </div>
<div style="position:relative;"> 
    <div id="contact">
   <div id="h1"  style="background: url(../images/nav-bg.png) repeat-x; width:100px; height:100%; float:left; color:#FFF"><?php echo "<a class=\"links\" onClick=\"getData('hq.php?clhq=$clhq')\">"   . "Hospital" ."</a></li>\n"; ?></div>
   <div style="background: url(../images/nav-bg-hover.png) repeat-x; width:100px; height:100%; float:left; color:#FFF;">Licensee</div>
    </div>
    

    <div id="contact1">
            
              
                <?php 
		
		 if ($num!=0){
			echo "<img style=\"float:left\"; 
src=\"../images/icons/max - Copy.gif\" 
width=\"16\" height=\"16\"  onClick=\"getData('branch.php?clhq=$clhq')\"/>"; 
   
echo "<img style=\"float:left\"; 
src=\"../images/icons/leftbtn.gif\" 
width=\"16\" height=\"16\" 
onClick=\"getData('branchb.php?clhq=$clhq&num=$num&lcount=$lcount')\"/>"; 
     } ?>
    <input   align="middle"style=" float:left; height:12px" name=""  disabled="disabled" type="text"  
    
    
    value="<?php echo $shownum."of ".$lcount?>"/>
 
         <?php 
		
		 if ($lcount>$num+1){
echo "<img style=\"float:left\"; 
src=\"../images/icons/list_normal.png\" 
width=\"16\" height=\"16\" 
onClick=\"getData('branchf.php?clhq=$clhq&num=$num&lcount=$lcount')\"/>"; }?>       <img style="float:left"; src="../images/icons/min - Copy.gif" width="16" height="16" />
                <?php        echo "<img style=\"float:left\"; src=\"../images/icons/error.png\"  width=\"16\" height=\"16\" onClick=\"getData('new1.php?clhq=$clhq&webpage=$webpage&CAC_reg_no=$CAC_reg_no&Statement=$Statement&NHMIS_HF_Code=$NHMIS_HF_Code  ')\"/>";?>
                
                
                
           


</div>
            
      
    <div id="d1">
      <table  class="sample">
        <tr class="header">
          <td>Licensee</td>
        </tr>
        <tr  class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Long Name</label><input type="text" name="textfield" id="textfield" value="<?php   echo $lname[$num]; ?>" style="height:100%;"/>
            
          </td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Short Name</label><input type="text" name="textfield2"  value="<?php   echo $short[$num]; ?>" id="textfield2"  style="height:100%;"  />
           
          </td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >NHIS No.\ Date</label><input type="text" name="textfield3" id="textfield3"  value="<?php   echo $nhisno[$num]; ?>"  style="width:19%;  height:100%;"/><input type="text" value=""name="textfield3" id="textfield3" style="width:19%;  height:100%;"  />
            
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
          <td> </td>
        </tr>
        <tr class="tablebody">
          <td></td>
        </tr>
        <tr class="tablebody">
          <td>          
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
          <td><label  style="display:inline-block; width:150px; " >contact</label><input type="text" value="<?php   echo $contact[$num]; ?>" name="textfield" id="textfield" style="height:100%;"/></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Job Title</label><input type="text" name="textfield2" id="textfield2" value="<?php   echo $contactt[$num]; ?>" style="height:100%;" /></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Business Phone</label><input type="text" name="textfield2" id="textfield2" value="<?php   echo $bphone[$num]; ?>"  style="height:100%;"/></td>
            
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Mobile Phone</label><input type="text" value="<?php   echo $mphone[$num]; ?>"  name="textfield2" id="textfield2" style="height:100%;" /></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Email</label><input type="text" name="textfield2" id="textfield2" style="height:100%;" value="<?php   echo $contacte[$num]; ?>"/></td>
        </tr>
      </table>
    </div>
    <div id="d4"><table  class="sample">
        <tr class="header">
          <td>Address</td>
        </tr>
        <tr>
          <td><textarea name="textarea" id="textarea" cols="45" rows="5" style="height:62px; width:98%;"><?php   echo $add[$num]; ?></textarea></td>
        </tr>
        <tr  class="tablebody">
          <td><label  style="display:inline-block; width:70px; " >Country</label><select name="select2" id="select2" style="height:100%;">
            <option value="1">Nigeria</option>
          </select>
              
              <label  style="display:inline-block; width:70px; " >State</label><select name="select2" id="select2" style="height:100%;">
                <option value="2">Lagos</option>
              </select>
              LGA<select name="select2" id="select2" style="height:100%;">
                <option>IKg</option>
              </select>
          
          </td>
        </tr>
        <tr>
          <td></td>
        </tr>
        <tr>
          <td></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >City/Postal code</label><input type="text" name="textfield2" id="textfield2" style="height:100%; width:50px;" value="<?php   echo $city[$num]; ?>" /><input type="text" name="textfield2" id="textfield2"  value="<?php   echo $postalcode[$num]; ?>" style="height:100% ;width:50px;" /></td>
        </tr>
      </table>
    </div>
    <div id="d5"><table  class="sample">
        <tr class="header">
          <td>Hosptial info</td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Webpage</label><input  disabled="disabled"type="text" name="textfield4" 
          value="<?php   echo $webpage[$num]; ?>"id="textfield4"  style="height:100%;"/>
          </td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >CAC Reg No.</label><input  disabled="disabled"type="text" name="textfield2" id="textfield2" style="height:100%;" value="<?php   echo $CAC_reg_no[$num]; ?>"/></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >Ownership</label><select  disabled="disabled"name="select" id="select" style="height:100%; width:157px;"> </select></td>
        </tr>
        <tr class="tablebody">
          <td><label  style="display:inline-block; width:150px; " >NHMIS HF Code</label><input  disabled="disabled"type="text" name="textfield2" id="textfield2" style="height:100%;"  value="<?php   echo $NHMIS_HF_Code[$num]; ?>" /></td>
        </tr>
    </table></div>
      <div id="d6"><table  class="sample">
        <tr class="header">
          <td>Mission Statement</td>
        </tr>
        <tr>
          <td><label>
            <textarea name="textarea" id="textarea" cols="45" rows="5"  disabled="disabled"style="height:60px; width:98%;"><?php echo $Statement[$num]; ?></textarea>
          </label></td>
        </tr>
      </table></div>
        
</div>
   
             
             
                
               
</div>

          
    
      </div>  
        
    

