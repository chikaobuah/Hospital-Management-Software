<?php require_once('../Connections/localhost.php'); ?>
<?php
$ID=$_GET['id'];
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");

$sql="SELECT
    Picture
FROM
    newmed06.enrolee WHERE LId =$ID";
$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);
$picture=$row['Picture'];
	
	
	
echo "<img src=\"  $picture    \" width=\"160\" height=\"97\" />";

?>

