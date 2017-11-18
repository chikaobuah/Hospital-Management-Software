<?php require_once('../Connections/localhost.php'); 

$date= date("Y-m-d");
$ID=$_GET['id'];


mysql_select_db($database_localhost, $localhost);
$query_Recvp2 = "
SELECT
    visit_queue.Enrolee
    , visit_queue.Visit
    , visit_queue.Task
    , visit_queue.Next_task
    , visit_queue.Exited
    , visit_queue.Queued
    , task.Task
     ,visit_queue.Exited
FROM
    newmed06.visit_queue
    INNER JOIN newmed06.task 
        ON (visit_queue.Task = task.Id)WHERE visit_queue.Enrolee=$ID AND visit_queue.Exited IS NULL and Visit LIKE '%" . $date . "%'   ORDER BY Queued DESC LIMIT 1";

$Recvp2 = mysql_query($query_Recvp2, $localhost) or die(mysql_error());
$row_Recvp2 = mysql_fetch_assoc($Recvp2);
$totalRows_Recvp2 = mysql_num_rows($Recvp2);
$ticketc2= $row_Recvp2['Task'];



echo "<input style=\"background: url(../images/nav-bg.png) repeat-x;\" value=\"On queue at".$ticketc2." "."\"  type=\"button\" />";
  

//echo $ticketc2;

?>