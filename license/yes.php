<?php 
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";


$lic = $_GET['lic'];
$length = $_GET['length'];
$License_Date = $_GET['Expire'];
$length="+".$length." "."month";




$newdate = strtotime ( $length  , strtotime ( $License_Date ) ) ;
$newdate = date ( 'Y-m-j' , $newdate );
 






$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO license_history (License,Length,License_Date,Expire)
VALUES
('$lic','$length','$License_Date','$newdate')";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  

?>


















<?php require_once('../Connections/localhost.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$lic=$_GET['lic'];



mysql_select_db($database_localhost, $localhost);
$query_Reclh = "SELECT Id
    , Cost
    , License
    , LENGTH
    , License_Date
    , Expire FROM  newmed06.license_history WHERE license=$lic order by License_Date "  ;
$Reclh = mysql_query($query_Reclh, $localhost) or die(mysql_error());
$row_Reclh = mysql_fetch_assoc($Reclh);
$totalRows_Reclh = mysql_num_rows($Reclh);

mysql_select_db($database_localhost, $localhost);
$query_Reclh2 = "SELECT
    Id
    , Cost
    , License
    , LENGTH
    , License_Date
    , Expire
FROM
    newmed06.license_history WHERE license=$lic ORDER BY License_Date DESC LIMIT 1 ";
$Reclh2 = mysql_query($query_Reclh2, $localhost) or die(mysql_error());
$row_Reclh2 = mysql_fetch_assoc($Reclh2);
$totalRows_Reclh2 = mysql_num_rows($Reclh2);


?>

<table  id="test" width="100%" border="1">
  <tr>
    <td  bgcolor="#e5e5e5" valign="top" width="50%">
  
    
    <table  width="100%" border="1">
  <tr>
   
  
   <td width="32%">Subscribed</td>
    <td width="68%">Length</td>
  
  </tr>
  <?php do { ?>
    <tr>
 

      
      <td><?php echo $row_Reclh['License_Date']; ?></td>
      <td><?php echo $row_Reclh['LENGTH']; ?></td>
      
    </tr>
    <?php } while ($row_Reclh = mysql_fetch_assoc($Reclh)); ?>
</table>
    
  </td>
    <td valign="top" width="50%">

<table class="sample">
  <tr class="tablebody">
    <td>Service Point Seq</td>
    
  </tr>
  <tr>
    <td><?php 

$cm=$_GET['lic'];


$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");
$sqlr="  SELECT Id , Role  , Rlid FROM  newmed06.role WHERE role.Rlid  = $cm ";
$resultr=mysql_query($sqlr); 
$rowr=mysql_fetch_array($resultr);

echo "<table class=\"sample\" >";
do{

$role =$rowr['Role'];
$rl=$rowr['Id'];
echo "<tr class=\"tablebody\">"; 

$color = "#e5e5e5"; 

if (isset($rl)){
echo "<td>";	
echo "<a >" . $role ."</a></li>\n";
echo "</td>";


echo "<td >";	
echo "<input  name=\"username\" type=\"text\"  style=\"width:50px; height:100%;\"   />";
echo "</td>";

}
 } 

while($rowr=mysql_fetch_array($resultr));

echo "</tr>";
echo "</table>";




    
?></td>
   
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
      <form id="form1" name="form1" method="post" action="">
      <table width="100%" border="0">
        <tr>
          <td width="32%"><?php echo $row_Reclh2['Expire']; ?></td>
          <td width="68%">
            <label>
          
    <?php    echo  "<input type=\"text\" name=\"length\"  style=\"width:50px\"  id=\"length\"  onchange=\"subc('yes.php')\" />";  ?>
            </label></td>
        </tr>
        
<?php

echo  "<input type=\"hidden\" name=\"lic\" id=\"lic\" value=\"". $lic." \"   />"; 
echo  "<input type=\"hidden\" name=\"Expire\" id=\"Expire\" value=\"". $row_Reclh2['Expire']." \"   />"; 

 
?>
    </table></form></td>
    <td>&nbsp;</td>
  </tr>
  </table>
<?php
mysql_free_result($Reclh);
?>
