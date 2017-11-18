<?php require_once('../Connections/localhost.php'); ?>
<?php
$ID=$_GET['id'];

$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");

$date = date('Y-m-d');

$sql=" SELECT
    visit.Enrolee
    , visit.Principal
    , enrolee.Full_Name
    , program.Program
    , scheme.Scheme
    , client.Short
    , client.Contact
    , client.Contact_Mobile_Phone
FROM
    newmed06.visit_queue
    INNER JOIN newmed06.visit 
        ON (visit_queue.Enrolee = visit.Enrolee)
    INNER JOIN newmed06.enrolee 
        ON (visit.Principal = enrolee.LId)
    INNER JOIN newmed06.scheme 
        ON (visit.Scheme = scheme.LId)
    INNER JOIN newmed06.program 
        ON (scheme.Program_FK = program.Id)
    INNER JOIN newmed06.client 
        ON (scheme.Company_FK = client.LId)
		
		WHERE Visit_date LIKE '%". $date ."%'  and Task=9 and visit_queue.Exited IS NULL and visit_queue.Enrolee=$ID";

$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);
do{

$principal =$row['Full_Name'];
$Program =$row['Program'];
$Short =$row['Short'];
$Contact =$row['Contact'];
$scheme =$row['Scheme'];
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
                   <td bgcolor="#FFF5D9" ><?php echo "(".$scheme.")"." ".$Short ." ". $Contact." ". $Contact_Mobile_Phone; ?></td>
                 </tr>
               </table>
     </td>
  </tr>
</table>


