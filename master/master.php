<?php require_once('../Connections/localhost.php');
session_start();
?>
<?php

$un ="";
$uid ="";
$uei="";
$cl="";
$dl="";
$st="";


$lname="";
$lhq="";
$lhqn="";

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
$query_Recuser = "SELECT * FROM `user`";
$Recuser = mysql_query($query_Recuser, $localhost) or die(mysql_error());
$row_Recuser = mysql_fetch_assoc($Recuser);
$totalRows_Recuser = mysql_num_rows($Recuser);




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






?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
		<meta http-equiv="pragma" content="NO-CACHE" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
<title>Newmed</title>
		<link rel="stylesheet" href="../common/layout.css" />
		<link rel="alternate" type="application/rss+xml" title="NarutoFan.com News & Updates" href="http://rss.narutofan.com/rss.xml" />
        
        
        
        
        
<script type="text/javascript">var GB_ROOT_DIR = "http://localhost/NewMed/greybox/";</script>
<script type="text/javascript" src="../greybox/AJS.js"></script>
<script type="text/javascript" src="../greybox/AJS_fx.js"></script>
<script type="text/javascript" src="../greybox/gb_scripts.js"></script>
<link href="../greybox/gb_styles.css" rel="stylesheet" type="text/css" />   
        
        
        
        
        
        
        
        
  <!--[if lte IE 6]>
  <link href="/static/css/layout.ie6.css" rel="stylesheet" type="text/css" />
  <![endif]-->
<script type="text/javascript" src="common/jquery.min.js"></script>
<script type="text/javascript">
      jQuery(function() {
        jQuery('.tabs .tab').click(function() {
          jQuery(this).siblings().removeClass('selected');
          jQuery(this).addClass('selected');  
        });
        jQuery('#links .section').hover(function() {
          
          jQuery(this).parent().addClass('hover');
        });
      });
    </script>		
</head>

<body>

<div id="header" align="right">

  <img alt="" class="gsfx_img_png" style="width: 51;height: 17;" src="images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" /></div>
    <div id="links">
            
             <!-- <li class="selected"><a class="section" href="http://www.narutofan.com/">Main </a></li> -->   
   <?php   
  

	$gill=" Installation ";
  echo  "<ul><li class=\"selected\">
                <a class=\"section\" href=\"Untitled2.php\">$gill</a>
        					<ul>
        								<li><a href=\"../license/license.php\">License setup </a></li>
        						<li><a href=\"../master/master.php\"><b>Master Setup</b></a></li>
								<li><a href=\"../licenserole/licenserole.php\">Role Setup</a></li>
							</ul>
              </li>" ;		
 
echo "</ul>"
?>

            </ul>  
 </div>
  <div id="links-sub"> </div>







<div  id="content">

<table width="100%" border="1" height="400">
  <tr>
 
<td width="21%"  valign="top"><table width="100%"  border="0" style="margin-top:0px">
  <tr>
    <th scope="col">Registered licenses</th>
  </tr>
</table>


<table width="100%"  border="0">
  <tr>
    
    <td width="90%" valign="top"><div  style="border : solid 3px #0099ff; width : auto; height : 380px; overflow : auto;"> 

        
    <?php 
	
$numrows="";

$letter ="";
	 



//connect to the database
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 

//-select the database to use
$mydb=mysql_select_db("newmed06");

//-query the database table

$sql="    		
	SELECT
    Id
    , Created
    , Creator
    , Licensee
    , Short
    , Address
    , Country_FK
    , State_FK
    , LGA_FK
    , City
    , PostCode
    , License_Cost
    , License_Key
    , NHIS_Reg_No
    , NHIS_Registered
    , Contact
    , Contact_Business_Phone
    , Contact_Mobile_Phone
    , Contact_Email
    , Contact_Job_Title
	  , Licensee_Hqs
FROM
    newmed06.licensee ";
//-run the query against the mysql query function
$result=mysql_query($sql); 
//-count results
$numrows=mysql_num_rows($result);
//-create while loop and loop through result set
echo "<table width=\"100%\" border=\"0\" align=\"left\" >";
//echo "<tr><th>Company Name</th>";
$row=mysql_fetch_array($result);



do{
$Licensee =$row['Licensee'];
$LastName=$row['Licensee'];
$ID=$row['Id'];
	
//-display the result of the array
echo "<tr><td  height=\"20\" bgcolor=\"#c6dbfb\" align=\"left\" >"; 
echo "<a href=\"master.php?by=$letter&id=$ID\">"   . $Licensee ."</a></li>\n";
	
 } 

while($row=mysql_fetch_array($result));

echo "</th>";
echo "</table>";



?>
    
    </div></td>
  </tr>
</table>



<table width="100%" border="0">
  <tr>
    <th >
  
    
    </th>
  </tr>
</table>
</td>
    <td width="79%" valign="top" >
    
    <table width="100%" border="0">
      <tr>
        
		
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
    , licensee.Licensee
    
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
  $lhq =$row['Licensee_Hqs'];
  $lname=$row['Licensee'];
 }
 
 
$sqlhq="    		
	SELECT
    Licensee
FROM
    newmed06.licensee WHERE  Licensee.Id=$lhq";
	
$resulthq=mysql_query($sqlhq); 
$numrows=mysql_num_rows($resulthq);
while($rowhq=mysql_fetch_array($resulthq))
{
  $lhqn =$rowhq['Licensee'];
 

 }
 
 
 $cm=10000*$cm;
 $sqlmu="    		
	SELECT
    user_master.User
    , user.User_Id
    , user.User_Name
    , user.User_Enrolee_Id
    , user.Credit_Limit
    , user.User_Password
    , user.User_Name
    , user.User_Password
    , user.Discount_Limit
    , user.Status
    , user.Status_Note
    , user.Creator
    , user.Created
FROM
    newmed06.user_master
    INNER JOIN newmed06.user 
        ON (user_master.User = user.LId)WHERE user_master.User= $cm";
	
$resultmu=mysql_query($sqlmu); 
$numrowmu=mysql_num_rows($resultmu);
while($rowmu=mysql_fetch_array($resultmu))
{
  $uid =$rowmu['User_Id'];
  $un =$rowmu['User_Name'];
   $uei =$rowmu['User_Enrolee_Id'];
   $cl =$rowmu['Credit_Limit'];
   $dl =$rowmu['Discount_Limit'];
   $st =$rowmu['Status'];
  
 
 }
 
 
 

}

?>
        <td  valign="top"width="50%"><form id="form2" name="form2" method="POST" action="<?php echo $editFormAction; ?>">
         <table width="100%" border="0">
  <tr>
    <td height="29"><div align="center"><strong>Master User Details for<?php  echo " ". $lname; ?></strong></div></td>
  </tr>
</table>
         <div style="border : solid 2px #ffff; width : auto; height : 435px; overflow : auto;"> 
        <table width="100%"  border="0" align="left" height="100%">
              
              
              
              
              
              
              
              
            
              
              
              
              
              
              
              
              <tr>
                <td width="26%" align="left" >&nbsp;</td>
                <td width="21%" align="left" bgcolor="#c6dbfb"><strong>
                  <label  >Licensee Hqs<br />
                    </label>
                  </strong></td>
                <td align="left" width="4%">&nbsp;</td>
                <td align="left" width="35%"><select name="lhq" id="lhq" style="width:200px">
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
                <td align="left" width="20%">&nbsp;</td>
                </tr>
              <tr>
                <td  align="left">&nbsp;</td>
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >User ID.</label>
                 
                  <br />
                </strong></td>
                <td align="left">&nbsp;</td>
                <td align="left"><input id="postcode2"  name="NHISregno" 	type="text"  value="<?php   echo $uid; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td  align="left">&nbsp;</td>
                <td  width="21%"bgcolor="#c6dbfb" align="left"><strong>User Name<br />
                </strong></td>
                <td align="left">&nbsp;</td>
                <td align="left"><input id="postcode2"  name="Nhisregd" 	type="text"  value="<?php   echo $un; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left">&nbsp;</td>
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >Enrolee ID</label>
<br />
                </strong></td>
                <td align="left">&nbsp;</td>
                <td align="left"><input id="postcode2"  name="postcod" 	type="text"  value="<?php   echo $uei; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td  align="left">&nbsp;</td>
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >Credit Limit</label>
                  <br />
                </strong></td>
                <td align="left">&nbsp;</td>
                <td align="left"><input id="postcode2"  name="NHISregno" 	type="text"  value="<?php   echo $cl; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left">&nbsp;</td>
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >Discount Limit (%)</label>
                </strong></td>
                <td align="left">&nbsp;</td>
                <td align="left"><input id="postcode2"  name="discountlimit" 	type="text"  value="<?php   echo $dl; ?>"   style="width:195px  "   	tabindex="6" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td  align="left">&nbsp;</td>
                <td bgcolor="#c6dbfb" align="left"><strong>
                  <label >Status</label>
                </strong></td>
                <td align="left">&nbsp;</td>
                <td align="left"><label>
                  <select name="select" id="select" style="width:200px">
                    <option value="<?php   echo $st; ?>">Enabled</option>
                    <option value="<?php   echo $st; ?>">Disabled</option>
                  </select> 
                </label></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left">&nbsp;</td>
                <td  align="left"></td>
                <td align="left">&nbsp;</td>
                <td align="left"></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left">&nbsp;</td>
                <td align="left"><?php echo "<a href=addmaster.php title=\"Add New Master User\" rel=\"gb_page_center[500,470]\" ><font color=\"#009\">Add New Master User</font>
			 </a>" ?></td>
                <td align="left"></td>
                <td align="left"><label>
                  <input type="submit" name="update" id="update" value="update" />
                  </label></td>
                <td align="left"><label>
                  <input type="submit" name="button" id="button" value="reset password" />
                </label></td>
              </tr>
              </table></div><input type="hidden" name="idpk" value="<?php   echo $idpk; ?>" />
            <input type="hidden" name="MM_update" value="form2" />
        </form></td>
        
      </tr>
    </table>
  
    
    
    
    
    </td>
    </tr>
  </table></td>
    </tr>
</table>




 <input type="hidden" name="upsize_ts" value="<?php  echo time(); ?>" />





</div>

</body>

</html>
<?php
mysql_free_result($Recuser);



mysql_free_result($Reclicensehq);


?>
