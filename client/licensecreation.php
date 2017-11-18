



<?php require_once('../Connections/localhost.php');
session_start();
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
$query_lnum = "select Count(*) as myCount from licensee ";
$lnum= mysql_query($query_lnum, $localhost) or die(mysql_error());
$row_lnum = mysql_fetch_array($lnum);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
		<meta http-equiv="pragma" content="NO-CACHE" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
<title>Newmed</title>
		<link rel="stylesheet" href="../Copy of license/common/layout.css" />
		<link rel="alternate" type="application/rss+xml" title="NarutoFan.com News & Updates" href="http://rss.narutofan.com/rss.xml" />
        
        
        
        
        
<script type="text/javascript">var GB_ROOT_DIR = "http://localhost/NewMed10/newphp/greybox/";</script>
<script type="text/javascript" src="../Copy of license/greybox/AJS.js"></script>
<script type="text/javascript" src="../Copy of license/greybox/AJS_fx.js"></script>
<script type="text/javascript" src="../Copy of license/greybox/gb_scripts.js"></script>
<link href="../Copy of license/greybox/gb_styles.css" rel="stylesheet" type="text/css" />   
        
        
        
        
        
        
        
        
  <!--[if lte IE 6]>
  <link href="/static/css/layout.ie6.css" rel="stylesheet" type="text/css" />
  <![endif]-->
<script type="text/javascript" src="../Copy of license/common/jquery.min.js"></script>
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
<script type="text/javascript">
function noNumbers(e)
{
var keynum;
var keychar;
var numcheck;

if(window.event) // IE
	{
	keynum = e.keyCode;
	}
else if(e.which) // Netscape/Firefox/Opera
	{
	keynum = e.which;
	}
keychar = String.fromCharCode(keynum);
numcheck = /\d/;
return !numcheck.test(keychar);
}
</script>
<div  id="content">
  <table width="100%" border="1" height="400">
    <tr>
      <td width="83%" valign="top" ><table width="100%" border="0">
        <tr>
          <td width="50%"><form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
            <div style="border : solid 2px #ffff; width : auto; height : 435px; overflow : auto;">
              <table width="100%" border="0" align="left" height="100%">
                <tr>
                  <td bgcolor="#b0b0b0"width="15%" align="left"><strong> Licensee Hqs<br />
                  </strong></td>
                  <td align="left" width="10%"><select name="lhq"  style="width:100px"  id="lhq">
                    <option value="<?php  $LHId= $row_lnum['myCount'] + 1; echo $LHId; ?>">Self </option>
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
                  <td  bgcolor="#b0b0b0"width="15%" align="left"><strong>
                    <label >License Key</label>
                  </strong></td>
                  <td align="left" width="10%"><input id="licensekey"  name="licensekey" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                </tr>
                <tr>
                  <td bgcolor="#b0b0b0"align="left"><strong>Company Name<br />
                  </strong></td>
                  <td align="left"><input id="postcode8"  name="licensee" 	type="text"  value=""   style="width:95px  "  onkeydown="return noNumbers(event)" 	tabindex="6" /></td>
                  <td bgcolor="#b0b0b0"align="left"><strong>License Cost</strong></td>
                  <td align="left"><input id="postcode2"  name="licensecost"  	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                </tr>
                <tr>
                  <td bgcolor="#b0b0b0"align="left"><strong>NHIS Reg No . <br /> </strong></td>
                  <td align="left"><input id="postcode7"  name="nhisno" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                  <td bgcolor="#b0b0b0"align="left"><strong>
                    <label >Contact</label>
                  </strong></td>
                  <td align="left"><input id="postcode2"  name="contact" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                </tr>
                <tr>
                  <td bgcolor="#b0b0b0"align="left"><strong>NHIS Reg date<br />
                  </strong></td>
                  <td align="left"><input id="postcode6"  name="nhisdate" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                  <td bgcolor="#b0b0b0" align="left"><strong>
                    <label >Contact Job Title</label>
                  </strong></td>
                  <td align="left"><input id="postcode2"  name="contacttitle" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                </tr>
                <tr>
                  <td bgcolor="#b0b0b0"align="left"><strong>Postal code <br />
                  </strong></td>
                  <td align="left"><input id="postcode5"  name="postcode4" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                  <td bgcolor="#b0b0b0"align="left"><strong>
                    <label >Mobile Phone</label>
                  </strong></td>
                  <td align="left"><input id="postcode2"  name="mphone" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                </tr>
                <tr>
                  <td bgcolor="#b0b0b0"align="left"><strong>Country<br />
                  </strong></td>
                  <td align="left"><select name="country"  style="width:100px"  id="country">
                    <option value="<?php echo "159";?>">Nigeria</option>
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
                  <td bgcolor="#b0b0b0"align="left"><strong>
                    <label >Business Phone</label>
                  </strong></td>
                  <td align="left"><input id="postcode2"  name="bphone" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                </tr>
                <tr>
                  <td bgcolor="#b0b0b0"align="left"><strong>State </strong></td>
                  <td align="left"><select name="state"  style="width:100px"  id="state">
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
                  <td bgcolor="#b0b0b0"align="left" ><strong>
                    <label >Contact Email</label>
                  </strong></td>
                  <td align="left"><input id="postcode2"  name="email" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                </tr>
                <tr>
                  <td bgcolor="#b0b0b0"align="left"><strong>LGA </strong></td>
                  <td align="left"><select name="lga"  style="width:100px"  id="lga">
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
                  <td bgcolor="#b0b0b0"align="left"><strong><label >Short</label> </strong></td>
                  <td align="left"><input id="postcode9"  name="short"  	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                </tr>
                <tr>
                  <td bgcolor="#b0b0b0" align="left"><strong>City </strong></td>
                  <td align="left"><input id="postcode4"  name="city" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                  <td bgcolor="#b0b0b0" align="left"><strong>Address</strong></td>
                  <td align="left"><input id="postcode3"  name="add" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                </tr>
                <tr>
                  <td bgcolor="#b0b0b0" align="left"><strong>CAC Reg No </strong></td>
                  <td align="left"><input id="postcode4"  name="CAC_Reg_No" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                  <td bgcolor="#b0b0b0" align="left"><strong>WebSite</strong></td>
                  <td align="left"><input id="postcode3"  name="Web_Page" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td >&nbsp;</td>
                  <td align="left"><label>
                    <input type="submit" name="button2" id="button2" value="Submit" />
                  </label>
                    <label> </label></td>
                </tr>
              </table>
            </div>
            <input type="hidden" name="MM_insert" value="form1" />
         <input type="hidden" name="creator" value="<?php echo " ".$_SESSION["userid"]." " ?>" />
  		<input type="hidden" name="created" value="<?php  echo date('Y-m-d h:m:s'); ?>" />
   		<input type="hidden" name="upsize_ts" value="<?php echo date('Y-m-d h:m:s'); ?>" />
          <input type="hidden" name="id" value="<?php  $LIdx= $row_lnum['myCount'] + 1; echo $LIdx; ?>" />
          </form></td>
        </tr>
      </table></td>
    </tr>
  </table>
 
  <?php 
  
  
  $lbb=$_POST['lhq'];
  
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
//1. to register a headquater do this and comment 2
if ($LIdx==$lbb) {
$insertSQLhq = sprintf("INSERT INTO licensee_hqs (Licensee, CAC_Reg_No, Web_Page, upsize_ts) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['lhq'], "int"),
                       GetSQLValueString($_POST['CAC_Reg_No'], "text"),
                       GetSQLValueString($_POST['Web_Page'], "text"),
                       GetSQLValueString($_POST['upsize_ts'], "date"));

  mysql_select_db($database_localhost, $localhost);
  $Result1hq = mysql_query($insertSQLhq, $localhost) or die(mysql_error());
}
	
//2.	to register a license or branch for a headquaters do only 2

$insertSQL = sprintf("INSERT INTO licensee (Licensee_Hqs,Id, Created, Creator, Licensee, Short, Address, Country_FK, State_FK, LGA_FK, City, PostCode, Licensed, License_Cost, License_Key, NHIS_Reg_No, NHIS_Registered, Contact, Contact_Business_Phone, Contact_Mobile_Phone, Contact_Email, Contact_Job_Title) VALUES (%s, %s, %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['lhq'], "int"),
					   GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['created'], "date"),
                       GetSQLValueString($_POST['creator'], "int"),
                       GetSQLValueString($_POST['licensee'], "text"),
                       GetSQLValueString($_POST['short'], "text"),
                       GetSQLValueString($_POST['add'], "text"),
                       GetSQLValueString($_POST['country'], "int"),
                       GetSQLValueString($_POST['state'], "int"),
                       GetSQLValueString($_POST['lga'], "int"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['postcode4'], "text"),
					   GetSQLValueString($_POST['created'], "date"),
                       GetSQLValueString($_POST['licensecost'], "double"),
                       GetSQLValueString($_POST['licensekey'], "text"),
                       GetSQLValueString($_POST['nhisno'], "text"),
                       GetSQLValueString($_POST['nhisdate'], "date"),
                       GetSQLValueString($_POST['contact'], "text"),
                       GetSQLValueString($_POST['bphone'], "text"),
                       GetSQLValueString($_POST['mphone'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['contacttitle'], "text"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

}
  
  
  ?>
  
 
   
</div>
</body>

</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Reccountry);

mysql_free_result($Recstate);

mysql_free_result($Reclga);

mysql_free_result($Reclicensehq);
?>
