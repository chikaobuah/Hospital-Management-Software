<?php
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

//$lcn=$_GET['lic'];
$rolename = $_GET['en'];
$lic = $_GET['lic'];




$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO role (Role,Rlid)VALUES('$rolename',$lic)";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  










$sqlr="  SELECT Id , Role  , Rlid FROM  newmed06.role WHERE role.Rlid  = $lic ";
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
echo "<a class=\"linkr\" onClick=\"gettask('tk.php?id=$rl&lic=$lic') \">" . $role ."</a></li>\n";
echo "</td>";
}
 } 

while($rowr=mysql_fetch_array($resultr));



echo "</tr>";
echo "</table>";





echo "<form id=\"form2\"  name=\"form2\"    method=\"POST\"/>"; 

echo  "<input type=\"text\" name=\"rolename\" id=\"rolename\" size=\"25\"  onchange=\"addrole('addrole.php')\" />";
echo  "<input type=\"hidden\" name=\"lic\" id=\"lic\" value=\"". $lic ." \"   />";


 
echo "</form>";
    







?>