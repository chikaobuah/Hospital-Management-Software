<?php
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";
$role=$_GET['rl'];
$lcn=$_GET['lic'];
$task=$_GET['tk'];




$connection = mysql_connect("$host", "$username", "$password") or die ("Unable to connect to server");
mysql_select_db("$database") or die ("Unable to select database");
mysql_query("DELETE
    
FROM
   role_task
        WHERE role_task.Role=$role AND role_task.Task=$task AND role_task.RTlid=$lcn  ;
");

mysql_close($connection);





?> 