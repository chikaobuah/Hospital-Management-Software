<?php 

$lid = $_GET['lic'];
$IDp = $_GET['IDp'];















	
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");
$sqlr=" SELECT Id , Role , Rlid FROM newmed06.role WHERE role.Rlid  = $lid";
$resultr=mysql_query($sqlr); 
$numrowsr=mysql_num_rows($resultr);
$rowr=mysql_fetch_array($resultr);



echo "<table class=\"sample\" >";

do{
$role =$rowr['Role'];
$rl=$rowr['Id'];

if (isset($rl)){
echo "<tr class=\"tablebody\"><td >";

$sqlrt="SELECT  COUNT(Role) AS myCount FROM newmed06.user_role	WHERE User=$IDp  and  Role=$rl ";
$resultrt=mysql_query($sqlrt); 
$row_rt=mysql_fetch_array($resultrt);
$tcount= $row_rt['myCount']; 





if ($tcount<1)
{
		
		echo "<a  class=\"linkr\" >";   
		echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" value=\"0\" onchange=\"spec('addrole.php?id=$IDp&lid=$lid&rol=$rl')\"  />";
		echo  $role ."</a></li>\n";
	
}
else

{
	echo "<a  class=\"linkr\" >";   
	echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" checked=\"checked\" value=\"1\" onchange=\"spec('removerole.php?id=$IDp&lid=$lid&rol=$rl')\" />";
	echo  $role ."</a></li>\n";
	
}
}
}



while($rowr=mysql_fetch_array($resultr));
echo "</table>"; 

?>