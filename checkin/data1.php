<?php require_once('../Connections/localhost.php'); ?>


<?php
$ID=$_GET['id'];



$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");

$sql="SELECT
    enrolee_scheme.Enrolee
    , enrolee_scheme.Principal
	, enrolee_scheme.Scheme as schemeno
    , scheme.Scheme
	, scheme.Program_FK
FROM
    newmed06.enrolee_scheme
    INNER JOIN newmed06.scheme 
        ON (enrolee_scheme.Scheme = scheme.LId)WHERE  enrolee=$ID order by Scheme";

$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result); 

if ($numrows>1)
{$bc="#F2F2F2 " ;} else {$bc="#fff5d9 " ;}


?>



<div style="background:<?php echo $bc ;?>">




<?php


do{
$Scheme =$row['Scheme'];
$schemepg =$row['Program_FK'];
$schemeno =$row['schemeno'];

if (isset($Scheme)){
echo "<a  class=\"linkr\"  onClick=\"getplan('dataplan.php?id=$ID&sch=$schemepg&schno=$schemeno','service.php?id=$ID&sch=$schemepg&schno=$schemeno','billboard.php?id=$ID&sch=$schemepg&schno=$schemeno')\"> ".$Scheme." </a>\n";
}
 } 

while($row=mysql_fetch_array($result));

?>

</div>