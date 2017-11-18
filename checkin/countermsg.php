<?php
require_once('../Connections/localhost.php'); 




$x=$_GET['x'];
$ID=$_GET['id'];
$fn=$_GET['fn'];
$cdate= date("Y-m-d h:i:s ");




switch ($x)
{
case 1:
$serv=1;
  echo "<input onclick=\" getvisit('insertvisit.php?enr=$ID&x=$x&serv=$serv','uncheckedin.php?id=$ID','checkedin.php?fn=$fn&nd=$ID');\" style=\"background: url(../images/nav-bg.png) repeat-x;\" value=\"Proceed to vitals\"  type=\"button\" />";
  
  break;
case 2:
$serv=39;
echo "<input onclick=\" getvisit('insertvisit.php?enr=$ID&x=$x&serv=$serv','uncheckedin.php?id=$ID','checkedin.php?fn=$fn&nd=$ID');\" style=\"background: url(../images/nav-bg.png) repeat-x;\" value=\"Proceed to vitals\"  type=\"button\" />";

  break;
case 3:
$serv=30;
  echo "<input onclick=\" getvisit('insertvisit.php?enr=$ID&x=$x&serv=$serv','uncheckedin.php?id=$ID','checkedin.php?fn=$fn&nd=$ID');\"  style=\"background: url(../images/nav-bg.png) repeat-x;\" value=\"Proceed to Other-services\"  type=\"button\" />";
  
  break;
case 4:
$serv=40;
 	echo "<input onclick=\" getvisit('insertvisit.php?enr=$ID&x=$x&serv=$serv','uncheckedin.php?id=$ID','checkedin.php?fn=$fn&nd=$ID');\" style=\"background: url(../images/nav-bg.png) repeat-x;\" value=\"Proceed to Payment\"  type=\"button\" />";
  
  break;
  
case 5:
$serv=41;
   echo "<input onclick=\" getvisit('insertvisit.php?enr=$ID&x=$x&serv=$serv','uncheckedin.php?id=$ID','checkedin.php?fn=$fn&nd=$ID');\" style=\"background: url(../images/nav-bg.png) repeat-x;\" value=\"Proceed to Consulting\"  type=\"button\" />";
  break;
  
case 6:
$serv=37;
   echo "<input  onclick=\" getvisit('insertvisit.php?enr=$ID&x=$x&serv=$serv','uncheckedin.php?id=$ID','checkedin.php?fn=$fn&nd=$ID');\" style=\"background: url(../images/nav-bg.png) repeat-x;\"value=\"Proceed to Blood\"  type=\"button\" />";
  
  break;
  
  
case 7:
$serv=7;
 	echo "<input onclick=\" getvisit('insertvisit.php?enr=$ID&x=$x&serv=$serv','uncheckedin.php?id=$ID','checkedin.php?fn=$fn&nd=$ID');\" style=\"background: url(../images/nav-bg.png) repeat-x;\" value=\"Proceed to Pharmacy\"  type=\"button\" />";
  
  break;
  
  
case 8:
$serv=8;
	echo "<input onclick=\" getvisit('insertvisit.php?enr=$ID&x=$x&serv=$serv','uncheckedin.php?id=$ID','checkedin.php?fn=$fn&nd=$ID');\"  style=\"background: url(../images/nav-bg.png) repeat-x;\" value=\"Proceed to Injection\"  type=\"button\" />";
  
  break;
   
   
   
case 9:
$serv=6;
  echo "<input onclick=\" getvisit('insertvisit.php?enr=$ID&x=$x&serv=$serv','uncheckedin.php?id=$ID',''checkedin.php?fn=$fn&nd=$ID');\" style=\"background: url(../images/nav-bg.png) repeat-x;\" value=\"Proceed to Dressing\"  type=\"button\" />";
 
  break;
  
  
    
case 10:
$serv=3;
 echo "<input onclick=\" getvisit('insertvisit.php?enr=$ID&x=$x&serv=$serv','uncheckedin.php?id=$ID','checkedin.php?fn=$fn&nd=$ID');\" style=\"background: url(../images/nav-bg.png) repeat-x;\"  value=\"Proceed to Laboratory\"  type=\"button\" />";
  break;
  
default:
  echo "No Action";
}
?>

