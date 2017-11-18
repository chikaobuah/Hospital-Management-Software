<?php 
require_once('../Connections/localhost.php');
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
        <script language="javascript" type="text/javascript" src="cvv.js"></script>
        <script type="text/javascript" src="../common/scripts/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="../common/css/style.css" />
   <script type="text/javascript" src="../common/scripts/custom.js"></script>

</head>

<body>

<div id="header" align="right">

<div style=" color:#CF0; font-weight:bold">
<img alt=""    style="width: 51;height: 17;" src="../images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" /> <br />
<?php 	echo "".$_SESSION["userid"]." || <a style=\" color:#CF0\" href='../logout.php'>Log Out</a> ";	?>
</div>
</div>
<div id="links">   <?php   
  

	$lrolename=" Installation ";
  echo  "<ul><li class=\"selected\"><a class=\"section\" href=\"../license/license.php\">$lrolename</a>
        					<ul>
        						<li><a href=\"../license/license.php\">License setup </a></li>
        						<li><a href=\"../licenserole/licenserole.php\">Role Setup</a></li>
								<li><a href=\"../licenseuserrole/licenseuserrole.php\"><b>Access control</a></b></li>
							</ul>
              </li>" ;		
 
echo "</ul>"
?> </div>

<div id="links-sub"> </div>







<div id="content">


<div id="lhLicenseheadquaters">
    
  <table class="sample">
  <tr class="header">
  <td  width="32%" height="20"><strong>License Headquaters</strong>  </td> 
  </tr> 
</table>
<?php 
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");

$sql="    		
	SELECT
    licensee_hqs.Licensee as Id
    , licensee.Licensee
    
FROM
    newmed06.licensee_hqs
    INNER JOIN newmed06.licensee 
        ON (licensee_hqs.Licensee = licensee.Id) WHERE licensee_hqs.Licensee <> 1";

$result=mysql_query($sql); 
//-count results
$numrows=mysql_num_rows($result);
//-create while loop and loop through result set
$row=mysql_fetch_array($result);
echo "<table class=\"sample\" >";


do{
$Licensee =$row['Licensee'];
$IDa=$row['Id'];
	

echo "<tr class=\"tablebody\">"; 


echo "<td bgcolor=\"#e5e5e5\" height=\"20\" align=\"left\" >";
echo "<a class=\"linkr\" onClick=\"getData('user.php?lic=$IDa','license1st.php?lic=$IDa','specialty1.php?lic=$IDa','counter1st.php?lic=$IDa') \">"   . $Licensee ."</a>";
echo "</td>";

 } 

while($row=mysql_fetch_array($result));
echo "</tr>";
echo "</table>";
?>

    </div>
    
    <div id="luruser">
       
  
 
<table  class="sample">
  <tr class="header">
  <td >User ID</td> 
  <td  >User Name </td> 
  <td > </td> 
   
  </tr> 
</table>
     <div  id="user" style=" width :100%; max-height:350px ; overflow-y : auto; overflow-x:hidden";>
     <?php 

$numrows="";
$letter ="";
$dball=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydball=mysql_select_db("newmed06");
$sqlall="  SELECT LId, User_Name  , User_Id FROM   newmed06.user WHERE  Licensee_Hqs = 2 order by LId";
$resultall=mysql_query($sqlall); 

$numrows=mysql_num_rows($resultall);
echo "<table  class=\"sample\">";

$rowall=mysql_fetch_array($resultall);

if(isset($_GET['id'])){
$vr=$_GET['id'];}


do{

$User_Id=$rowall['User_Id'];
$User_Name=$rowall['User_Name'];
$IDp=$rowall['LId'];

if ($IDp == $vr){$color = "#84b8d0";}
else{$color = "#e5e5e5";}
$c=3; 
  
  
  
  
if(isset($rowall))  {
  
//-display the result of the array
echo "<tr class=\"tablebody\">";


echo "<td >";
echo "<a class=\"linkr\" onClick=\"get3('license.php?lic=$IDa&IDp=$IDp','specialty.php?lic=$IDa&IDp=$IDp','counter.php?lic=$IDa&IDp=$IDp')\">";
echo "<img src=\"../images/icons/rightbtn.gif\" width=\"16\" height=\"16\" />";
echo "</a>";
echo "</td>";




echo "<td>"; 
$sqlrt="SELECT STATUS AS myCount FROM  newmed06.user	WHERE LId=$IDp ";
$resultrt=mysql_query($sqlrt); 
$row_rt=mysql_fetch_array($resultrt);
$tcount= $row_rt['myCount']; 

if ($tcount<1)
{
	echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" value=\"0\" onchange=\"deuser('enableuser.php?lid=$IDp')\" />";
}
else

{
	echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" checked=\"checked\" value=\"1\" onchange=\"deuser('disableuser.php?lid=$IDp')\" />";
}

}

echo "</td>";



echo "<form  name=\"myform\" action=\"updateuser.php?id=$IDp&un=$User_Name&ui=$User_Id\" method=\"POST\"/>"; 
echo "<td  >";
echo "<input name=\"userid\" type=\"text\" size=\"20\"  ondblclick=\"document.forms[0].submit();\" style=\"color:#224466; height:100% ;width:100% ; font-weight:bold\" value=\"".  $User_Id  ." \"/>";
echo "</td>";


echo "<td >";
echo "<input  name=\"username\" type=\"text\" size=\"20\"  ondblclick=\"document.forms[0].submit();\" style=\"height:100% ;width:100% ;color:#224466;  font-weight:bold\" value=\"".  $User_Name  ." \"/>";
echo "</td>";
echo "</form>"; 


echo "</tr>";
 } 

while($rowall=mysql_fetch_array($resultall));


echo "</table>";
echo "<form id=\"form2\"  name=\"form2\"   action=\"createuser.php?lcnhq=$v\" method=\"POST\"/>"; 

?>

  




 <table  class="sample">
  <tr class="tablebody">
    <td ></td>
    <td ></td>
    <td  ><input name="userid" type="text"    style="width:100%; height:100%;"/></td>
    <td ><input  name="username" type="text"  style="width:100%; height:100%;"/></td>
    
  </tr>
 
  </table>
    
  </tr>
 
  </table>

 <?php echo "</form>";?>
    
   
    </div>






<div style="top:"> <table width="100%" border="0">
  <tr><?php if(isset($_GET['id'])){$pass=$_GET['id'];}?>
    <td>
    <?php echo "<form id=\"form2\"  name=\"form2\"   action=\"reset.php?id=$pass\" method=\"POST\" />"; ?>
 
      <label>
        <input type="submit" name="button" id="button" value="Reset Password" style="background: url(../images/nav-bg.png) repeat-x;" />
      </label>
    </form></td>
  </tr>
</table>
</div>
</td>
    </div>
    
    <div id="lurlicense">
       
    <div style=" width : auto; height : 366px; overflow : auto;">
    <table class="sample">
  <tr class="header">
  <td  >Licence  </td> 
  </tr> 
</table>
<div id="license"><?php 
	
$numrows="";
$letter ="";



//connect to the database
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 

//-select the database to use
$mydb=mysql_select_db("newmed06");

//-query the database table

$sql="    		
	SELECT
    Licensee
    , Id
    , Licensee_Hqs
FROM
    newmed06.licensee where Licensee_Hqs= 2";

$result=mysql_query($sql); 

$numrows=mysql_num_rows($result);

echo "<table class=\"sample\" >";

$row=mysql_fetch_array($result);



do{
$Licensee =$row['Licensee'];

$lid=$row['Id'];
$lhqid=$row['Licensee_Hqs'];

echo "<tr class=\"tablebody\"><td  >"; 
echo "<a class=\"linkr\" >"   . $Licensee ."</a></li>\n";
	
 } 

while($row=mysql_fetch_array($result));
echo "<td>";
echo "<tr>";
echo "</table>";



?> </div>
   
      </div>
   
  </div>


<div id="lurspeciality">
      <div style=" width : auto; height : 366px; overflow : auto;"> 
  <table class="sample">
  <tr class="header">
  <td  ><strong>Specialty </strong> </td> 
  </tr> 
</table>
<div id="specialty"> <?php 

$dbsp=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydbsp=mysql_select_db("newmed06");
$sqlrsp="	SELECT Id  , Specialty FROM   newmed06.specialty"; 
$resultrsp=mysql_query($sqlrsp); 
$rowrsp=mysql_fetch_array($resultrsp);

echo "<table class=\"sample\">";

do{


$Spid =$rowrsp['Specialty'];
$uspid=$rowrsp['Id'];

$color = "#E3EEFD";
echo "<tr class=\"tablebody\">";
echo "<td >";


$sqlrt="SELECT  COUNT(USER) AS myspec FROM newmed06.user_specialty WHERE User=20000  and Specialty=$uspid and Licensee=2";
$resultrt=mysql_query($sqlrt); 
$row_rt=mysql_fetch_array($resultrt);
$spcount= $row_rt['myspec']; 


if ($spcount<1)
{
		echo "<form action=\"addspecialty.php?id=&lid=&spe=$uspid\" method=\"POST\">";
		echo "<a  class=\"linkr\" >";   
		echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" value=\"0\" onClick=\"submit();\" />";
		echo  $Spid ."</a></li>\n";
		echo "</form>"; 
}
else

{
	echo "<form action=\"removespecialty.php?id=&lid=&spe=$uspid\" method=\"POST\">"; 
	echo "<a  class=\"linkr\" >";   
	echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" checked=\"checked\" value=\"1\" onClick=\"submit();\" />";
	echo  $Spid ."</a></li>\n";
	echo "</form>";
}


 } 

while($rowrsp=mysql_fetch_array($resultrsp));
echo "</tr>";

echo "</table>";

?></div>
  
  </div>
  </div>

<div id="lurservicecounter">
  
   
    <table class="sample">
  <tr class="header">
  <td >Service Counter  </td> 
  </tr> 
</table>
  <div id="counter"><?php 

	
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");
$sqlr=" SELECT Id , Role , Rlid FROM newmed06.role WHERE role.Rlid  = 2";

$resultr=mysql_query($sqlr); 
$numrowsr=mysql_num_rows($resultr);
$rowr=mysql_fetch_array($resultr);



echo "<table class=\"sample\">";

do{
$role =$rowr['Role'];
$rl=$rowr['Id'];
echo "<tr class=\"tablebody\">";
echo "<td>";

$sqlrt="SELECT  COUNT(Role) AS myCount FROM newmed06.user_role	WHERE User=20000  and  Role=$rl ";
$resultrt=mysql_query($sqlrt); 
$row_rt=mysql_fetch_array($resultrt);
$tcount= $row_rt['myCount']; 





if ($tcount<1)
{
		echo "<form action=\"addrole.php?id=&lid=$vp&rol=$rl\" method=\"POST\">";
		echo "<a  class=\"linkr\" >";   
		echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" value=\"0\" onClick=\"submit();\" />";
		echo  $role ."</a></li>\n";
		echo "</form>"; 
}
else

{
	echo "<form action=\"removerole.php?id=&lid=$vp&rol=\" method=\"POST\">"; 
	echo "<a  class=\"linkr\" >";   
	echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" checked=\"checked\" value=\"1\" onClick=\"submit();\" />";
	echo  $role ."</a></li>\n";
	echo "</form>";
}
}



while($rowr=mysql_fetch_array($resultr));
echo "</table>";

?> </div>  
    
   
   
   
    
    
    
    </div>
  </div>

<input type="hidden" name="upsize_ts" value="<?php  echo time(); ?>" />
</div>

</body>

</html>
<?php
mysql_free_result($Recuser);



mysql_free_result($Reclicensehq);


?>
