<?php require_once('../Connections/localhost.php'); ?>

<?php

$q=$_GET["q"];
$date = date('Y-m-d');

$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");

$sql="SELECT LId, Full_Name FROM enrolee WHERE Full_Name LIKE '%" . $q . "%' order by Surname";

$result=mysql_query($sql);
$numrows=mysql_num_rows($result);
while($row=mysql_fetch_array($result)){

	$Full_Name =$row['Full_Name'];
	$ID=$row['LId'];
		
echo "<a class=\"linkr\" onClick=\"getData('data4.php?p=".$ID."')\">" .$Full_Name . "</a>\n";
}	

echo $numrows." "."Records";

?>

