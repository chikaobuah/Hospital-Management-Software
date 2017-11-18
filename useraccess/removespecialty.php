<?php
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

$idspec=$_GET['id'];
$ddfrspec=$_GET['lid'];
$uspid=$_GET['spe'];








$connection = mysql_connect("$host", "$username", "$password") or die ("Unable to connect to server");
mysql_select_db("$database") or die ("Unable to select database");
mysql_query("DELETE
    
FROM
   user_specialty
        WHERE User=$idspec AND specialty=$uspid AND Licensee=$ddfrspec  ;
");

mysql_close($connection);









$URL="useraccess.php?id=$idspec&lid=$ddfrspec";


header ("Location: $URL");


?> 