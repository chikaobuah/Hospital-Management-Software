<?php
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";
$enr=$_GET['id'];
$prn=$_GET['prn'];





$connection = mysql_connect("$host", "$username", "$password") or die ("Unable to connect to server");
mysql_select_db("$database") or die ("Unable to select database");
mysql_query("DELETE
    
FROM
   enrolee_principal
        WHERE enrolee_principal.Enrolee=$enr AND enrolee_principal.Principal=$prn ;
");

mysql_close($connection);







//$URL="registern.php?a=3&id=$enr";
//header ("Location: $URL");
?> 