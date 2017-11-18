<?php require_once('../Connections/localhost.php'); 






$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");
$sqlr="  SELECT
    Id
    , Licensee
    FROM
    newmed06.licensee WHERE Id <> 1 ORDER BY Id LIMIT 1 ";
$resultr=mysql_query($sqlr); 
$rowr=mysql_fetch_array($resultr);
$Licensee =$rowr['Licensee'];
$li=$rowr['Id'];
echo "<a class=\"linkr\" >"   . $li ."</a></li>\n";
















    
	
	
	


$cm=$li;
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb1=mysql_select_db("newmed06");
$sqlr1="  SELECT Id , Role  , Rlid FROM  newmed06.role WHERE role.Rlid  = $cm ";
$resultr1=mysql_query($sqlr1); 
$rowr1=mysql_fetch_array($resultr1);


do{

$role =$rowr1['Role'];
$rl=$rowr1['Id'];

echo "<a class=\"linkr\" >"   . $role ."</a></li>\n";

 } 

while($rowr1=mysql_fetch_array($resultr1));






echo "<form id=\"form2\"  name=\"form2\"   action=\"addrole.php?lcn=$ID46\" method=\"POST\"/>"; 

echo  "<input type=\"text\" name=\"rolename\" id=\"rolename\" size=\"15\"/>";
echo "</label>"; 
echo "<label>";   
echo "<input type=\"submit\" name=\"button2\" id=\"button2\"  style=\"background: url(../images/nav-bg.png) repeat-x;\" value=\"Submit\" />";
echo "</label>"; 
echo "</form>";


?>





