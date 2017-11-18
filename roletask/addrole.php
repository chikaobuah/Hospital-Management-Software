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


do{

$role =$rowr['Role'];
$rl=$rowr['Id'];
	

$color = "#e5e5e5"; 
if (isset($rl)){	
echo "<a class=\"linkr\" onClick=\"gettask('tk.php?id=$rl') \">" . $role ."</a></li>\n";
}
 } 

while($rowr=mysql_fetch_array($resultr));





echo "<form id=\"form2\"  name=\"form2\"    method=\"POST\"/>"; 

echo  "<input type=\"text\" name=\"rolename\" id=\"rolename\" size=\"25\"  />";
echo  "<input type=\"hidden\" name=\"lic\" id=\"lic\" value=\"". $lic." \"   />";

echo "</label>"; 
echo "<label>";   
echo "<input type=\"button\" name=\"button2\" id=\"button2\" onClick=\"addrole('addrole.php')\" style=\"background: url(../images/nav-bg.png) repeat-x;\" value=\"Add\" />";

echo "</label>"; 
echo "</form>";
    







?>