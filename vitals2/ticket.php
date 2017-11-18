<?php require_once('../Connections/localhost.php'); ?>
<?php
$ID=$_GET['id'];
$date = date('Y-M-d');
$sql="SELECT Ticket_No 

FROM newmed06.visit  WHERE Created LIKE '2010-07-13%'  AND visit.Enrolee=$ID";

$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);


$ticket =$row['Ticket_No'];



?>







<div id="ticket"  align="center" style="border : solid 1px #FFCC33; width : 160; height : 100%; ">
<table width="100%" height="100%" border="0">
                   <tr>
                     <td align="center" height="26" style="background:#999"><strong>Ticket No.</strong></td>
                     </tr>
                   <tr>
                     <td height="41"  align="center" valign="top"><font size="6"> <?php echo $ticket ;?></font>  </td>
                     </tr>
                   <tr>
                     <td height="26" bgcolor="#FFC20D"><font size="3"> <?php echo $date; ?></font></td>
                     </tr>
                     </table>
                     </div>