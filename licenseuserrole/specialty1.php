<?php 
	

$lichq = $_GET['lic'];






//get the first user for that license hq
$dball=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydball=mysql_select_db("newmed06");
$sqlall="  SELECT LId, User_Name  , User_Id FROM   newmed06.user WHERE  Licensee_Hqs = $lichq  order by LId limit 1";
$resultall=mysql_query($sqlall); 
$rowall=mysql_fetch_array($resultall);
$User_Id=$rowall['User_Id'];
$User_Name=$rowall['User_Name'];
$IDp=$rowall['LId']; 



//get the first license for that license hq
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");

$sql=" SELECT Licensee  , Id , Licensee_Hqs FROM  newmed06.licensee where Licensee_Hqs= $lichq order by Id limit 1";
$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);

$Licensee =$row['Licensee'];
$lid=$row['Id'];
$lhqid=$row['Licensee_Hqs'];









//get the speciality based on the first user of the d lisence hq and the first license of the license hq
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


$sqlrt="SELECT  COUNT(USER) AS myspec FROM newmed06.user_specialty WHERE User=$IDp  and Specialty=$uspid and Licensee=$lid";
$resultrt=mysql_query($sqlrt); 
$row_rt=mysql_fetch_array($resultrt);
$spcount= $row_rt['myspec']; 


if ($spcount<1)
{
	echo "<a  class=\"linkr\" >";   
		echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" value=\"0\" 
		onchange=\"spec('addspecialty.php?id=$IDp&lid=$lid&spe=$uspid')\" />";
		echo  $Spid ."</a></li>\n";
}
else

{

	echo "<a  class=\"linkr\" >";   
echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" checked=\"checked\" value=\"1\" onchange=\"spec('removespecialty.php?id=$IDp&lid=$lid&spe=$uspid')\"/>";
	echo  $Spid ."</a></li>\n";

}


 } 

while($rowrsp=mysql_fetch_array($resultrsp));
echo "</tr>";

echo "</table>"; 

?>


