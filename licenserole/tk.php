<?php 
require_once('../Connections/localhost.php'); 

$rl=$_GET['id'];
$lic=$_GET['lic'];




$sqlt="SELECT   Id , Task , Addr FROM  newmed06.task order by Task";

$resultt=mysql_query($sqlt); 
$rowt=mysql_fetch_array($resultt);

echo "<table class=\"sample\">";
do{
	
	

echo "<tr class=\"tablebody\"><td>";
$task =$rowt['Task'];
$tid =$rowt['Id'];






$sqlrt="SELECT COUNT(Task) AS myCount FROM  newmed06.role_task	WHERE Role=$rl AND Task=$tid ";
$resultrt=mysql_query($sqlrt); 
$row_rt=mysql_fetch_array($resultrt);
$tcount= $row_rt['myCount']; 

if ($tcount<1)
{
		echo "<form  method=\"POST\">"; 
		echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" value=\"0\" onchange=\"addtask('addtask.php?lic=$lic&rl=$rl&tk=$tid') \" />";
		echo "<a >"   . $task ."</a></li>\n";
		echo "</form>"; 
}
else

{
	echo "<form  method=\"POST\">"; 
echo "<input type=\"checkbox\" id=\"checkbox\" checked=\"checked\" value=\"1\" onchange=\"addtask('removetask.php?lic=$lic&rl=$rl&tk=$tid')\" />";
	echo "<a>"   . $task ."</a></li>\n";
	echo "</form>";
}

 } 
while($rowt=mysql_fetch_array($resultt));
echo "</table>";

?>