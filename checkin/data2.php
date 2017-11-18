<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>



<?php 

$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");

$sql="SELECT
    enrolee_scheme.Enrolee
    , enrolee_scheme.Principal
    , scheme.Scheme
FROM
    newmed06.enrolee_scheme
    INNER JOIN newmed06.scheme 
        ON (enrolee_scheme.Scheme = scheme.LId)WHERE  enrolee=101594";

$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);
do{
$Scheme =$row['Scheme'];
echo  $Scheme."<br/>" ;

 } 

while($row=mysql_fetch_array($result));

?>