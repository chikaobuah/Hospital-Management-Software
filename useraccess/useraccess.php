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
		
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
<title>Newmed</title>
		<link rel="stylesheet" href="../common/layout.css" />
		<link rel="alternate" type="application/rss+xml" title="NarutoFan.com News & Updates" href="http://rss.narutofan.com/rss.xml" />
        

</head>

<body>

<div id="header" align="right">

<div style=" color:#CF0; font-weight:bold">
<img alt=""    style="width: 51;height: 17;" src="../images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" /> <br />
<?php 	echo "".$_SESSION["userid"]." || <a style=\" color:#CF0\" href='../logout.php'>Log Out</a> ";	?>
</div>
</div>
<div id="links"><?php  include('../auth.php')?></div>

<div id="links-sub"> </div>







<div id="content">

<table width="100%" style=" border-style:solid; border-color:#224466; "   height="100%">
  
 
<td  valign="top" width="26%" style="border-right-style:solid; border-right-color:#224466;"><div style=" width : auto; height : 400px; "> 
 
<table class="sample">
  <tr  class="header">
  <td > </td> 
  <td  width="53%" >User ID </td> 
  <td  bgcolor="#b0b0b0"  width="47%">User Name  </td> 
  <td  bgcolor="#b0b0b0"  width="27%"> </td> 
   
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
echo "<table class=\"sample\" >";

$rowall=mysql_fetch_array($resultall);

if(isset($_GET['id'])){
$vr=$_GET['id'];}


do{

$User_Id=$rowall['User_Id'];
$User_Name=$rowall['User_Name'];
$ID=$rowall['LId'];
if ($ID == $vr){$color = "#84b8d0";}
else{$color = "#e5e5e5";}
$c=3; 
  
//-display the result of the array
echo "<tr class=\"tablebody\">";


echo "<td >";
echo "<a class=\"linkr\" href=\"useraccess.php?id=$ID\">";
echo "<img src=\"../images/icons/rightbtn.gif\" width=\"16\" height=\"16\" />";
echo "</a>";
echo "</td>";


echo "<td  >"; 
$sqlrt="SELECT STATUS AS myCount FROM  newmed06.user	WHERE LId=$ID ";
$resultrt=mysql_query($sqlrt); 
$row_rt=mysql_fetch_array($resultrt);
$tcount= $row_rt['myCount']; 

if ($tcount<1)
{
		echo "<form action=\"enableuser.php?lid=$ID\" method=\"POST\">"; 
		echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" value=\"0\" onClick=\"submit();\" />";
		echo "</form>"; 
}
else

{
	echo "<form action=\"disableuser.php?lid=$ID\" method=\"POST\">"; 
	echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" checked=\"checked\" value=\"1\" onClick=\"submit();\" />";
	echo "</form>";
}
echo "</td>";





echo "<form  name=\"myform\" action=\"updateuser.php?id=$ID&un=$User_Name&ui=$User_Id\" method=\"POST\"/>"; 
echo "<td >";
echo "<input name=\"userid\" type=\"text\"   ondblclick=\"document.forms[0].submit();\" 
style=\"color:$color;  height:100%; width:100% \" value=\"".  $User_Id  ." \"/>";
echo "</td>";


echo "<td >";
echo "<input  name=\"username\" type=\"text\"  ondblclick=\"document.forms[0].submit();\" 
style=\"color:$color; height:100% ;width:100% \"  value=\"".  $User_Name  ." \"/>";
echo "</td>";
echo "</form>"; 

 } 

while($rowall=mysql_fetch_array($resultall));

echo "</tr>";
echo "</table>";
echo "<form id=\"form2\"  name=\"form2\"   action=\"createuser.php?lcnhq=$v\" method=\"POST\"/>"; 

?>

   </div>




 <table  class="sample">
  <tr class="tablebody">
    <td ></td>
    <td ></td>
    <td  ><input name="userid" type="text"    style="width:100%; height:100%;"/></td>
    <td ><input  name="username" type="text"  style="width:100%; height:100%;"/></td>
    
  </tr>
 
  </table>
 <?php echo "</form>";?>
    
   
    </div>






<div style="top:"> <table width="100%" border="0">
  <tr><?php if(isset($_GET['id'])){$pass=$_GET['id'];}?>
    <td>
    <?php echo "<form id=\"form2\"  name=\"form2\"   action=\"reset.php?id=$pass\" method=\"POST\"/>"; ?>
 
      <label>
        <input type="submit" name="button" id="button" value="Reset Password" />
      </label>
    </form></td>
  </tr>
</table>
</div>
</td>
    
    <td width="18%" valign="top" style="border-right-style:solid; border-right-color:#224466; " >
    <div style=" width : auto; height : 366px; overflow : auto;">
    <table  class="sample">
  <tr class="header">
  <td   >Licence</td> 
  </tr> 
</table>
   <?php 
if(isset($_GET['id']))
	
{	
$numrows="";
$letter ="";
if(isset($_GET['lid'])){
$vp=$_GET['lid'];}	 
$getid=$_GET['id'];


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
    newmed06.licensee where Licensee_Hqs= $v ";
//-run the query against the mysql query function
$result=mysql_query($sql); 
//-count results
$numrows=mysql_num_rows($result);

//-create while loop and loop through result set
echo "<table  class=\"sample\" >";
//echo "<tr><th>Company Name</th>";
$row=mysql_fetch_array($result);



do{
$Licensee =$row['Licensee'];

$lid=$row['Id'];
$lhqid=$row['Licensee_Hqs'];




if ($lid == $vp)
  {
$color = "#84b8d0";

  }
  
  else
  {
  $color = "#e5e5e5";
  }



	
//-display the result of the array
echo "<tr class=\"tablebody\" >";
echo "<td>"; 
echo "<a class=\"linkr\" href=\"useraccess.php?id=$getid&lid=$lid\">"   . $Licensee ."</a></li>\n";
	
 } 

while($row=mysql_fetch_array($result));

echo "</th>";
echo "</table>";

}

?>
        </div>
      </td>
    
    
  <td width="18%" valign="top" style="border-right-style:solid; border-right-color:#224466;">
  <div style=" width : auto; height : 366px; overflow : auto;"> 
  <table  class="sample">
  <tr class="header">
  <td   >Specialty </td> 
  </tr> 
</table>
    <?php 
	if(isset($_GET['lid']))
	
{
	
	$idspec=$_GET['id'];
	$ddfrspec=$_GET['lid'];
$dbsp=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydbsp=mysql_select_db("newmed06");
$sqlrsp="	SELECT Id  , Specialty FROM   newmed06.specialty"; 
$resultrsp=mysql_query($sqlrsp); 
$rowrsp=mysql_fetch_array($resultrsp);

echo "<table class=\"sample\" >";

do{


$Spid =$rowrsp['Specialty'];
$uspid=$rowrsp['Id'];




$color = "#E3EEFD";
echo "<tr class=\"tablebody\">";
echo "<td height=\"20\"  align=\"left\" >";



$sqlrt="SELECT  COUNT(USER) AS myspec FROM newmed06.user_specialty WHERE User=$idspec  and Specialty=$uspid and Licensee=$ddfrspec";
$resultrt=mysql_query($sqlrt); 
$row_rt=mysql_fetch_array($resultrt);
$spcount= $row_rt['myspec']; 


if ($spcount<1)
{
		echo "<form action=\"addspecialty.php?id=$idspec&lid=$ddfrspec&spe=$uspid\" method=\"POST\">";
		echo "<a  class=\"linkr\" >";   
		echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" value=\"0\" onClick=\"submit();\" />";
		echo  $Spid ."</a></li>\n";
		echo "</form>"; 
}
else

{
	echo "<form action=\"removespecialty.php?id=$idspec&lid=$ddfrspec&spe=$uspid\" method=\"POST\">"; 
	echo "<a  class=\"linkr\" >";   
	echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" checked=\"checked\" value=\"1\" onClick=\"submit();\" />";
	echo  $Spid ."</a></li>\n";
	echo "</form>";
}


 } 

while($rowrsp=mysql_fetch_array($resultrsp));
echo "</tr>";

echo "</table>";
}
?>
  </div>
</td>
    <td width="23%" valign="top" ><div style=" width : auto; height : 366px; overflow : auto;">
   
    <table  class="sample">
  <tr  class="header">
  <td >Service Counter </td> 
  </tr> 
</table>
    
    <?php 
	if(isset($_GET['lid']))
	
{
	$idr=$_GET['id'];
	
	$ddfr=$_GET['lid'];
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");
$sqlr="    		
	SELECT Id , Role , Rlid FROM newmed06.role WHERE role.Rlid  = $vp";

$resultr=mysql_query($sqlr); 
$numrowsr=mysql_num_rows($resultr);
$rowr=mysql_fetch_array($resultr);

echo "<table class=\"sample\">";

do{

$role =$rowr['Role'];
$rl=$rowr['Id'];

if(isset($rl)){


echo "<tr class=\"tablebody\"><td height=\"20\"  align=\"left\" >";



$sqlrt="SELECT  COUNT(Role) AS myCount FROM newmed06.user_role	WHERE User=$idr   and  Role=$rl and License=$ddfr";
$resultrt=mysql_query($sqlrt); 
$row_rt=mysql_fetch_array($resultrt);
$tcount= $row_rt['myCount']; 






if ($tcount<1)
{
		echo "<form action=\"addrole.php?id=$getid&lid=$vp&rol=$rl\" method=\"POST\">";
		echo "<a  class=\"linkr\" >";   
		echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" value=\"0\" onClick=\"submit();\" />";
		echo  $role ."</a></li>\n";
		echo "</form>"; 
}
else

{
	echo "<form action=\"removerole.php?id=$getid&lid=$vp&rol=$rl\" method=\"POST\">"; 
	echo "<a  class=\"linkr\" >";   
	echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" checked=\"checked\" value=\"1\" onClick=\"submit();\" />";
	echo  $role ."</a></li>\n";
	echo "</form>";
}
}

 } 

while($rowr=mysql_fetch_array($resultr));
echo "</table>";
}
?>
   
   
   
    
    
    
     </div></td>
    
    
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
