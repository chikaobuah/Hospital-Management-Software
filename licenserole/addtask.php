<?php
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";
$role=$_GET['rl'];
$lcn=$_GET['lic'];
$task=$_GET['tk'];




$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO role_task (Role,Task,RTlid)VALUES('$role','$task',$lcn)";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  

















?>