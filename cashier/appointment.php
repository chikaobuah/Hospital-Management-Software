<?php require_once('../Connections/localhost.php'); ?>


<?php 

$ID=$_GET['id'];

$sql=" SELECT
    
    service.Service
    , visit_appointment.Appointment_Date
     , service.Short
	  ,visit_appointment.Specific
FROM
    newmed06.visit_appointment
    INNER JOIN newmed06.service 
        ON (visit_appointment.Appointment = service.Id)WHERE enrolee=$ID AND status_fk=1 ";
$result=mysql_query($sql); 
$row=mysql_fetch_array($result);

?>
<table border="1">
  <tr>
    <td>Appointment</td>
    <td>Appointed</td>
    <td>Specific</td>
     
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row['Short']."-".$row['Service'];; ?></td>
      <td><?php echo $row['Appointment_Date']; ?></td>
      <td><?php echo $row['Specific']; ?></td>
      
    </tr>
    <?php } while ($row=mysql_fetch_array($result)); ?>
</table>
