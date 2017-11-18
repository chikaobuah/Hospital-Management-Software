<?php require_once('../Connections/localhost.php');
session_start();
?>
<?php
$v=$_SESSION["Licensehq1"];
$vr ="";
$vp ="";
$pass="";

$pagetask="Access Control";
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
        

</head>

<body>


<div id="header" align="right">
	
	 <img alt=""    style="width: 51;height: 17;" src="../images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" />
    <div style=" color:#CF0; font-weight:bold">
	 <?php 
	echo "".$_SESSION["userid"]." || <a style=\" color:#CF0\" href='../logout.php'>Log Out</a> ";	?> 
    </div>
	 
  </div>    <div id="links">
            
               
   <?php   
  

	$lrolename=" Installation ";
  echo  "<ul><li class=\"selected\"><a class=\"section\" href=\"../license/license.php\">$lrolename</a>
        					<ul>
        						<li><a href=\"../license/license.php?id=2\">License setup </a></li>
        						<li><a href=\"../vendoruser/vendoruser.php\"><b>Vendor User Setup</a></li>
								<li><a href=\"../licenserole/licenserole.php?id=2&rol=1\">Role Setup</a></li>
								<li><a href=\"../licenseuserrole/licenseuserrole.php??li=2&id=20002&lid=2\">Access control</a></li>
							</ul>
              </li>" ;		
 
echo "</ul>"
?>

            
 </div>

<div id="links-sub"> </div>







<div id="content">

<table width="100%" border="0">
  <tr>
    <td width="20%">&nbsp;</td>
    <td width="60%"><table width="100%" style=" border-style:solid; border-color:#224466; "   height="100%">
  
 
<td  valign="top" width="48%" style="border-right-style:solid; border-right-color:#224466;"><div style=" width : auto; height : 400px; "> 
 
<table  bgcolor="#b0b0b0"width="100%" border="0">
  <tr>
  <td  width="53%" height="20"><strong>User ID</strong>  </td> 
  <td  bgcolor="#b0b0b0"  height="20" width="47%"><strong>User Name</strong>  </td> 
  <td  bgcolor="#b0b0b0"  height="20" width="27%"> </td> 
   
  </tr> 
</table>
     <div style=" width : auto; max-height:320px ; overflow-y : auto; overflow-x:hidden";>
     <?php 

$numrows="";

$letter ="";

//connect to the database
$dball=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 

//-select the database to use
$mydball=mysql_select_db("newmed06");

//-query the database table

$sqlall="  SELECT LId, User_Name  , User_Id FROM   newmed06.user WHERE  Licensee_Hqs = $v  order by User_Name";

$resultall=mysql_query($sqlall); 
//-count results
$numrows=mysql_num_rows($resultall);
//-create while loop and loop through result set
echo "<table width=\"100%\" border=\"0\" bgcolor=\"#e5e5e5\"  >";

$rowall=mysql_fetch_array($resultall);

if(isset($_GET['id'])){
$vr=$_GET['id'];}


do{

$User_Id=$rowall['User_Id'];
$User_Name=$rowall['User_Name'];
$ID=$rowall['LId'];
if ($ID == $vr){$color = "#224480";}
else{$color = "#224480";}
$c=3; 
  
//-display the result of the array
echo "<tr>";





echo "<form  name=\"myform\" action=\"updateuser.php?id=$ID&un=$User_Name&ui=$User_Id\" method=\"POST\"/>"; 
echo "<td style=\" font-size:15px \"  width=\"30%\" height=\"20\"  bgcolor=\"#e5e5e5\" >";
echo "<input name=\"userid\" type=\"text\" size=\"20\"  ondblclick=\"document.forms[0].submit();\" style=\"color:$color;  font-weight:bold\" value=\"".  $User_Id  ." \"/>";
echo "</td>";


echo "<td style=\" font-size:15px \" height=\"20\"  bgcolor=\"#e5e5e5\"  >";
echo "<input  name=\"username\" type=\"text\" size=\"20\"  ondblclick=\"document.forms[0].submit();\" style=\"color:$color;  font-weight:bold\" value=\"".  $User_Name  ." \"/>";
echo "</td>";
echo "</form>"; 


echo "</tr>";
 } 

while($rowall=mysql_fetch_array($resultall));


echo "</table>";


?>

   </div>




 
 <?php echo "</form>";?>
    
   
    </div>







</td>
    
    <td width="52%" valign="top"  >
      <div style=" width : auto; height : 366px; overflow : auto;">
        <?php echo "<form id=\"form2\"  name=\"form2\"   action=\"createuser.php?lcnhq=$v\" method=\"POST\"/>"; ?>
        <table  bgcolor="#b0b0b0" width="100%" border="0">
  <tr>
    
     <td><strong><label> Create User</label></strong></td>
      
  </tr>
</table>

<table   style="background-color:#e5e5e5" width="100%" border="0">
  <tr>
    <td  width="45%"align="left" bgcolor="#b0b0b0"><strong><label> User ID</label></strong></td>

    <td  width="45%" ><input name="userid" type="text" size="20" /></td>
    
    
    
     
    <td bgcolor="#e5e5e5" width="10%"></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#b0b0b0"><strong><label> User Name</label></strong></td>
    <td><input  name="username" type="text" size="20" /></td>
    
    <td bgcolor="#e5e5e5">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" bgcolor="#b0b0b0"><strong><label> Password</label></strong></td>
    <td><input  name="password" type="text" size="20" /></td>
  
    <td bgcolor="#e5e5e5">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" bgcolor="#b0b0b0"><strong><label> Confirm Password</label></strong></td>
    <td><input  name="confirm" type="text" size="20" /></td>
   
    <td bgcolor="#e5e5e5"><?php echo "<input type=\"submit\" name=\"button2\" style=\"background: url(../images/nav-bg.png) repeat-x;\"id=\"button2\" value=\"Add\" />"; ?></td>
  </tr>
 
  </table>
        </div>
    </td>
    
    
  </tr>

    </table></td>
    <td width="20%">&nbsp;</td>
  </tr>
</table>


</td>
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
