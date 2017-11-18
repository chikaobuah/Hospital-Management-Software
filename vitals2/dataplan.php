<?php require_once('../Connections/localhost.php'); ?>
<?php
$ID=$_GET['id'];
$sch=$_GET['sch'];
$schno=$_GET['schno'];



$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");

$sql=" SELECT
    enrolee_scheme.enrolee
     ,scheme.Scheme
    , program.Program
    , client.Short
    , client.Contact
    , client.Contact_Mobile_Phone
    , enrolee.Full_Name 
    , scheme.Program_FK 
    

FROM
    newmed06.enrolee_scheme
    LEFT JOIN newmed06.scheme 
        ON (enrolee_scheme.Scheme = scheme.LId)
    LEFT JOIN newmed06.enrolee 
        ON (enrolee_scheme.Principal = enrolee.LId)
    LEFT JOIN newmed06.program 
        ON (scheme.Program_FK = program.Id)
    LEFT JOIN newmed06.client 
        ON (scheme.Company_FK = client.LId) WHERE enrolee =$ID AND enrolee_scheme.Scheme=$schno ";

$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);
do{

$principal =$row['Full_Name'];
$Program =$row['Program'];
$Short =$row['Short'];
$Contact =$row['Contact'];
$Contact_Mobile_Phone =$row['Contact_Mobile_Phone'];

 } 

while($row=mysql_fetch_array($result));

?>

<table width="100%" height="100" border="0">
  <tr>
    <td height="26" style="background:#999"></td>
  </tr>
  <tr>
    <td valign="top">
    		<table width="100%" border="0" height="70">
		         <tr>
                   <td width="36%"height="25" bgcolor="#FFD659">Principal</td>
                   <td width="64%" bgcolor="#FFF5D9"><?php   echo strtolower($principal); ?></td>
                 </tr>
                 <tr>
                   <td  bgcolor="#FFD659"height="25"><?php   echo $Program; ?></td>
                   <td bgcolor="#FFF5D9" ><?php echo $Short ." ". $Contact." ". $Contact_Mobile_Phone; ?></td>
                 </tr>
               </table>
     </td>
  </tr>
</table>


