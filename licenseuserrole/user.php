<?php 


$lichq = $_GET['lic'];
$cdate= date("Y-m-d h:i:s");



$dball=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydball=mysql_select_db("newmed06");
$sqlall="  SELECT LId, User_Name  , User_Id FROM   newmed06.user WHERE  Licensee_Hqs = $lichq  order by LId";
$resultall=mysql_query($sqlall); 

$numrows=mysql_num_rows($resultall);

echo "<table class=\"sample\" >";

$rowall=mysql_fetch_array($resultall);




do{

$User_Id=$rowall['User_Id'];
$User_Name=$rowall['User_Name'];
$IDp=$rowall['LId'];

$color = "#e5e5e5";
$c=3; 
  
  
  
  
if(isset($rowall))  {
  

echo "<tr class=\"tablebody\">";


echo "<td >";
echo "<a class=\"linkr\" onClick=\"get3('license.php?lic=$lichq&IDp=$IDp&cdate=$cdate','specialty.php?lic=$lichq&IDp=$IDp&cdate=$cdate','counter.php?lic=$lichq&IDp=$IDp&cdate=$cdate') \">";
echo "<img src=\"../images/icons/rightbtn.gif\"/>";
echo "</a>";
echo "</td>";



echo "<td>"; 
$sqlrt="SELECT STATUS AS myCount FROM  newmed06.user	WHERE LId=$IDp ";
$resultrt=mysql_query($sqlrt); 
$row_rt=mysql_fetch_array($resultrt);
$tcount= $row_rt['myCount']; 

if ($tcount<1)
{
	echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" value=\"0\" onchange=\"deuser('enableuser.php?lid=$IDp')\"  />";
		
	
}
else

{
	
echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" checked=\"checked\" value=\"1\" onchange=\"deuser('disableuser.php?lid=$IDp')\"/>";


}



}

echo "</td>";



echo "<td>";
echo "<form  name=\"myform\" action=\"updateuser.php?id=$IDp&un=$User_Name&ui=$User_Id\" method=\"POST\"/>"; 
echo "<td >";
echo "<input name=\"userid\" type=\"text\" ondblclick=\"document.forms[0].submit();\" style=\"color:#224466;  width:100%;  height:100%; font-weight:bold\" value=\"".  $User_Id  ." \"/>";
echo "</td>";


echo "<td >";
echo "<input  name=\"username\" type=\"text\"  ondblclick=\"document.forms[0].submit();\" 
style=\"color:#224466; height:100%;  width:100%; font-weight:bold\" value=\"".  $User_Name  ." \"/>";
echo "</td>";
echo "</form>"; 


echo "</tr>";
 } 

while($rowall=mysql_fetch_array($resultall));


echo "</table>";
echo "<form id=\"form2\"  name=\"form2\"   action=\"createuser.php?lcnhq=\" method=\"POST\"/>"; 

?>



<table  class="sample">
  <tr class="tablebody">
    <td  > </td>
    <td ></td>
    <td  ><input name="userid" type="text"   style=" width:100%; height:100%;"/></td>
    <td ><input  name="username" type="text"  style=" width:100%; height:100%;"/></td>
    
    
     
    
  </tr>
 
  </table>