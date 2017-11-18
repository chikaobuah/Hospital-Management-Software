

<?php 

$cm=$_GET['id'];


$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");
$sqlr="  SELECT Id , Role  , Rlid FROM  newmed06.role WHERE role.Rlid  = $cm ";
$resultr=mysql_query($sqlr); 
$rowr=mysql_fetch_array($resultr);

echo "<table id=\"test2\" class=\"sample\">";
do{

$role =$rowr['Role'];
$rl=$rowr['Id'];
echo "<tr class=\"tablebody\">"; 

$color = "#e5e5e5"; 

if (isset($rl)){
echo "<td >";	
echo "<a class=\"linkr\" onClick=\"gettask('tk.php?id=$rl&lic=$cm') \">" . $role ."</a></li>\n";
echo "</td>";
}
 } 

while($rowr=mysql_fetch_array($resultr));

echo "</tr>";
echo "</table>";



echo "<form id=\"form2\"  name=\"form2\"    method=\"POST\"/>"; 

echo  "<input type=\"text\" name=\"rolename\" id=\"rolename\" size=\"25\"  onchange=\"addrole('addrole.php')\" />";
echo  "<input type=\"hidden\" name=\"lic\" id=\"lic\" value=\"". $cm." \"   />";


 
echo "</form>";
    
?>


