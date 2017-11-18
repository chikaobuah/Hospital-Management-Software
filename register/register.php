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
$numrows="";
$firstnamex="";
$surnamex ="";
$letter="";

?>
            
 
  
  
  



<table width="100%" border="1">
  <tr>
    <td width="20%" valign="top">&nbsp;</td>
    <td width="80%"><div align="center"><strong>Enrolee Information for<?php   echo " ".$surnamex." ". $firstnamex;?></strong></div></td>
    </tr>
  <tr>
    <td  valign="top">
   <table width="100%" border="0">
  <tr>
    <td height="28" align="left"><form>
      <input type="text"  style="width:320px" onfocus="this.value='';" onkeyup="showHint(this.value)" value="Enter Enrolle name"   align="left" />
    
    </form></td>
  </tr>
  <tr>
    <td  align="left">
  
<div id="dd" style=" width : 320px; height : 350px;  font-weight:bold;  overflow-y : auto; overflow-x:hidden;"> 
  <?php 
	


$sql="    		
	
    SELECT LId, Full_Name FROM newmed06.enrolee WHERE Licensee = $v   order by Surname ";
//-run the query against the mysql query function
$result=mysql_query($sql); 
//-count results
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);



do  
{

	$Full_Name =$row['Full_Name'];
	$ID=$row['LId'];
		
//echo "<a class=\"linkr\" href=\"search.php?id=$ID\">"  .$Full_Name .  "</a>\n";
echo "<a class=\"linkr\" onClick=\"getData('data4.php?p=".$ID."')\">" .$Full_Name . "</a>\n";
}	
while($row=mysql_fetch_array($result));
echo $numrows." "."Records";

?>
</div>
  </tr>
</table>
 
 

         
    </td>
    <td >  <div id="targetDiv">
      <p>The fetched data will go here.</p> 
      </div>
      
      
    </td>
    </tr>
  
  </table>
    









<?php
mysql_free_result($Recenrolee);

mysql_free_result($Recrelationship);
?>
