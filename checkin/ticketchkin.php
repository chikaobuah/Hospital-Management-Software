
<?php require_once('../Connections/localhost.php'); 

$ID=$_GET['id'];
$cdate= date("Y-m-d");

mysql_select_db($database_localhost, $localhost);
$query_Recvp2 = "SELECT
    
     Ticket_No
    , Created
FROM
    newmed06.visit WHERE Enrolee = $ID and created LIKE '". $cdate."%'";
	

$Recvp2 = mysql_query($query_Recvp2, $localhost) or die(mysql_error());
$row_Recvp2 = mysql_fetch_assoc($Recvp2);
$ticketc2= $row_Recvp2['Ticket_No'];// check if he has appointment




?>





<table width="100%" height="100%" border="0">
                   <tr>
                     <td align="center" height="26" style="background:#999"><strong>Ticket No.</strong></td>
                     </tr>
                   <tr>
                     <td height="41"  align="center" valign="top"><font size="6"> <?php echo $ticketc2 ;?></font>  </td>
                     </tr>
                   <tr>
                     <td height="26" bgcolor="#FFC20D"><font size="3"> <?php echo $cdate; ?></font></td>
                     </tr>
                     </table>
               