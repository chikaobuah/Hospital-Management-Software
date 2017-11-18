<?php 
	

$lichq = $_GET['lic'];
$IDp = $_GET['IDp'];//userlid
$cdate= date("Y-m-d h:i:s");


$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");

$sql="    		
	SELECT
    Licensee
    , Id
    , Licensee_Hqs
FROM
    newmed06.licensee where Licensee_Hqs= $lichq order by Id";

$result=mysql_query($sql); 

$numrows=mysql_num_rows($result);

echo "<table class=\"sample\">";

$row=mysql_fetch_array($result);



do{
$Licensee =$row['Licensee'];

$lid=$row['Id'];
$lhqid=$row['Licensee_Hqs'];

echo "<tr class=\"tablebody\"><td>"; 
echo "<a class=\"linkr\" onClick=\"get4('specialty3.php?lic=$lid&IDp=$IDp&cdate=$cdate','counter3.php?lic=$lid&IDp=$IDp&cdate=$cdate') \" >"   . $Licensee ."</a></li>\n";
	
 } 

while($row=mysql_fetch_array($result));

echo "</th>";
echo "</table>";



?>