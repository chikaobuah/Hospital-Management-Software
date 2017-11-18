<?php 
	

$lid = $_GET['lic'];
$IDp = $_GET['IDp'];

















//get the speciality based on IDp user of the d lisence hq and the first license of the license hq
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


