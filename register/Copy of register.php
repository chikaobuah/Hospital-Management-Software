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

mysql_select_db($database_localhost, $localhost);
$query_Recenrolee = "SELECT Licensee, LId, Surname, First_Name, Other_Name FROM enrolee where Licensee = $v order by Surname ";
$Recenrolee = mysql_query($query_Recenrolee, $localhost) or die(mysql_error());
$row_Recenrolee = mysql_fetch_assoc($Recenrolee);
$totalRows_Recenrolee = mysql_num_rows($Recenrolee);

mysql_select_db($database_localhost, $localhost);
$query_Recrelationship = "SELECT Id, Relationship FROM relationship";
$Recrelationship = mysql_query($query_Recrelationship, $localhost) or die(mysql_error());
$row_Recrelationship = mysql_fetch_assoc($Recrelationship);
$totalRows_Recrelationship = mysql_num_rows($Recrelationship);
?>

		<link rel="stylesheet" href="../common/layout.css" />



  <?php   
  
$surnamex="";
$firstnamex="";
$regno="";
$othersx="";
$surnamex="";
$firstnamex="";
$othersx="";
$ID="";
$regno=	"";
$dob="";
$mobile="";	
$email="";	
$street="";
$country="";
$state="";
$lga="";
$city=""; 
$postalcode=""; 
$homephone="";
$Marital="";
$Gender="";
$Origin_State="";
$Tribe="";
$Occupation="";
$Religion="";
$Job_Place="";
$Business_Phone="";
$Job_Title="";


?>
            
 
  
  
  



<table width="100%" border="0">
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="90%"><table width="100%" border="0">
  <tr>
    <td valign="top">&nbsp;</td>
    <td><div align="center"><strong>Enrolee Information for<?php   echo " ".$surnamex." ". $firstnamex;?></strong></div></td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td  valign="top">
   <table width="100%" border="0">
  <tr>
    <td><form> <input  align="left"type="text" onkeyup="showHint(this.value)"  style="width:320px" /></form></td>
  </tr>
  <tr>
    <td>
  
<div id="dd" style="border : solid 3px #0099ff; width : 320px; height : 350px;  overflow : auto; font-weight:bold; f"> 
   
    <?php 
	
$numrows="";
$firstnamex="";
$surnamex ="";
$letter="";

$sql="    		
	
    SELECT LId, Full_Name FROM newmed06.enrolee WHERE Licensee = $v   order by Surname ";
//-run the query against the mysql query function
$result=mysql_query($sql); 
//-count results
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);

do{
$Full_Name =$row['Full_Name'];
$ID=$row['LId'];   
//echo "<a href=\"registern.php?a=2&id=$ID\ class=\"linkr\" >" .$Full_Name."</a>\n";
echo "<a class=\"linkr\" href=\"registern.php?a=2&id=$ID\">"  .$Full_Name .  "</a>\n";
	
	   } 

while($row=mysql_fetch_array($result));

?>
 </div></td>
  </tr>
</table>
 
 

    </td>
    <td ><table width="100%"  border="0" align="left">
      <tr>
        <td   align="left" bgcolor="#c6dbfb"><strong>
          <label  >Enrolee ID<br />
          </label>
        </strong></td>
        <td><input id="id"  name="id" 	type="text"  value="<?php echo $regno;?>"   style="width:195px  "   	tabindex="6"  /></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#c6dbfb"><strong>
          <label >Surname</label>
          <br />
        </strong></td>
        <td><input  id="postcode"  name="surname" 	type="text"  value="<?php echo $surnamex;?>"   style="width:195px  "   	tabindex="6"  /></td>
      </tr>
      <tr>
        <td  align="left" bgcolor="#c6dbfb"><strong>
          <label >First Name</label>
        </strong></td>
        <td><input id="postcode"  name="postcode2" 	type="text"  value=" <?php echo $firstnamex;?> "   style="width:195px  "   	tabindex="6"  /></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#c6dbfb"><strong>
          <label >Other Names</label>
          <br />
        </strong></td>
        <td ><input id="postcode"  name="othernames" 	type="text"  value=" <?php echo $othersx;?> "   style="width:195px  "   	tabindex="6"  /></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#c6dbfb"><strong>
          <label >Mobile</label>
          <br />
        </strong></td>
        <td><input id="postcode"  name="mobil" 	type="text"  value="<?php echo $mobile;?> "   style="width:195px  "   	tabindex="6"  /></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#c6dbfb"><strong>
          <label >Email</label>
        </strong></td>
        <td><input id="postcode"  name="email" 	type="text"  value="<?php echo $email?>"   style="width:195px  "   	tabindex="6"  /></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#c6dbfb"><strong>
          <label >Street</label>
        </strong></td>
        <td width="24%"><input id="postcode"  name="street" 	type="text"  value="<?php echo $street ?>"   style="width:195px  "   	tabindex="6"  /></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#c6dbfb"><strong>
          <label >Nationality</label>
        </strong></td>
        <td><label>
          <select name="select" id="select" style="width:200px">
          </select>
        </label></td>
       
      </tr>
      <tr>
        <td align="left" bgcolor="#c6dbfb"><strong>
          <label >State</label>
        </strong></td>
        <td><label>
          <select name="select" id="select" style="width:200px">
          </select>
        </label></td>
      
            </tr>
      <tr>
        <td align="left" bgcolor="#c6dbfb"><strong>
          <label >LGA</label>
        </strong></td>
        <td><label>
          <select name="select" id="select" style="width:200px">
          </select>
        </label></td>
        
        
      </tr>
      <tr>
        <td align="left" bgcolor="#c6dbfb"><strong>
          <label >City/Postal code</label>
        </strong></td>
        <td><input id="postcode"  name="city" 	type="text"  value="<?php echo $city; ?>"   style="width:92px  "   	tabindex="6"  />
          <input id="postcode"  name="postcode2" 	type="text"  value="<?php echo $postalcode;?>"   style="width:92px  "   	tabindex="6"  /></td>
      
        
      </tr>
      <tr>
        <td align="left" bgcolor="#c6dbfb"><strong>
          <label >Home Phone</label>
        </strong></td>
        <td><input id="postcode"  name="homephone" 	type="text"  value="<?php echo $homephone;?>"   style="width:195px  "   	tabindex="6"  /></td>
        
        
      </tr>
      <tr>
        <td align="left" ></td>
        
        <td align="left" ></td>
       
      </tr>
    </table></td>
    <td ><table width="100%"  border="0" align="left">
         
    <tr>
    <td   align="left" bgcolor="#c6dbfb" ><strong> <label>Date of Birth</label>  </strong></td>
    <td ><input id="postcode2"  name="dateofbirth" 	type="text"  value="<?php echo $dob;?>"   style="width:195px  "   	tabindex="6"  /></td>
    </tr>
          <tr>
           
            
         
            <td align="left" bgcolor="#c6dbfb" ><strong>
              <label >Marital Status</label>
            </strong></td>
            <td><input id="postcode2"  name="marital" 	type="text"  value="<?php echo $Marital;?>"   style="width:195px  "   	tabindex="6"  /></td>
            </tr>
          <tr>
            
            
 
            <td  align="left" bgcolor="#c6dbfb"><strong>
              <label >Gender</label>
            </strong></td>
            <td><input id="postcode2"  name="gender" 	type="text"  value="<?php echo $Gender;?>"   style="width:195px  "   	tabindex="6"  /></td>
            </tr>
          <tr>
            
           
        
            <td align="left" bgcolor="#c6dbfb" ><strong>
              <label >Religion</label>
            </strong></td>
            <td><input id="postcode2"  name="religion" 	type="text"  value="<?php $Religion; ?>"   style="width:195px  "   	tabindex="6"  /></td>
            </tr>
          <tr>
           
           
            <td align="left" bgcolor="#c6dbfb"><strong>
              <label >Tribe</label>
            </strong></td>
            <td><input id="postcode2"  name="tribe" 	type="text"  value="<?php $Tribe; ?>"   style="width:195px  "   	tabindex="6"  /></td>
            </tr>
          <tr>
           
            

            <td align="left" bgcolor="#c6dbfb"><strong>
              <label >Occupation</label>
            </strong></td>
            <td><input id="postcode2"  name="postcode" 	type="text"  value="<?php echo $Occupation; ?>"   style="width:195px  "   	tabindex="6"  /></td>
            </tr>
          <tr>
           
            

            <td align="left" bgcolor="#c6dbfb" ><strong>
              <label >Job Place</label>
            </strong></td>
            <td><input id="postcode2"  name="jobplace" 	type="text"  value="<?php echo  $Job_Place;?>"   style="width:195px  "   	tabindex="6"  /></td>
            </tr>
          <tr>
            
           
            
            <td align="left" bgcolor="#c6dbfb"><strong>
              <label >Job Tittle</label>
            </strong></td>
            <td><input id="postcode2"  name="jobtittle" 	type="text"  value=""   style="width:195px  "   	tabindex="6"  /></td>
            </tr>
          <tr>
            
            
           
            <td align="left" bgcolor="#c6dbfb"><strong>
              <label >Job Phone</label>
            </strong></td>
            <td><input id="postcode2"  name="jobphone" 	type="text"  value=""   style="width:195px  "   	tabindex="6"  /></td>
            </tr>
          <tr>
            
            
           
            <td align="left" bgcolor="#c6dbfb"><strong>Language</strong></td>
            <td><input id="postcode2"  name="postcode" 	type="text"  value=""   style="width:195px  "   	tabindex="6"  /></td>
            </tr>
          <tr>
           
            
            
            <td align="left" bgcolor="#c6dbfb"><strong>Picture</strong></td>
            <td><label>
              <input type="file" name="picture" id="picture"  style="width:200px"/>
            </label></td>
            </tr>
           </table>
           </td>
    
  </tr>
  
  </table></td>
    <td width="5%">&nbsp;</td>
  </tr>
</table>








<?php
mysql_free_result($Recenrolee);

mysql_free_result($Recrelationship);
?>
