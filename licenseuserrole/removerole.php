<?php
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

$id=$_GET['id'];
$lid=$_GET['lid'];
$rol=$_GET['rol'];








$connection = mysql_connect("$host", "$username", "$password") or die ("Unable to connect to server");
mysql_select_db("$database") or die ("Unable to select database");
mysql_query("DELETE
    
FROM
   user_role
        WHERE user_role.User=$id AND user_role.Role=$rol AND user_role.License=$lid  ;
");

mysql_close($connection);









$URL="licenseuserrole.php?li=2&id=$id&lid=$lid";


header ("Location: $URL");


?> 