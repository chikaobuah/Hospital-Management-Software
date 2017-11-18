<?php require_once('../Connections/localhost.php'); ?>
<?php
$ID=$_GET['id'];
$sch=$_GET['sch'];
$schno=$_GET['schno'];








mysql_select_db($database_localhost, $localhost);
$query_Recvp2 = "SELECT
      drug.Service_direction_FK
     , service.Task_FK
    , task.Task
    , visit_prescription.Status
     , drug.Service_direction_FK
    , visit.Scheme
	 , COUNT(service.Task_FK) AS nom
FROM
    newmed06.visit_prescription  INNER JOIN newmed06.drug ON (visit_prescription.Drug_FK = drug.Id)
    INNER JOIN newmed06.visit  ON (visit_prescription.Visit = visit.Created)
    INNER JOIN newmed06.service  ON (drug.Service_direction_FK = service.Id)
    INNER JOIN newmed06.task  ON (service.Task_FK = task.Id) 
	WHERE drug.Service_direction_FK=37 AND visit_prescription.enrolee =$ID AND visit_prescription.Status=1";
	
$Recvp2 = mysql_query($query_Recvp2, $localhost) or die(mysql_error());
$row_Recvp2 = mysql_fetch_assoc($Recvp2);
$totalRows_Recvp2 = mysql_num_rows($Recvp2);
$blood= $row_Recvp2['nom']; 
$blooda= $row_Recvp2['Task']; 






mysql_select_db($database_localhost, $localhost);
$query_Recvp3 = "SELECT
      drug.Service_direction_FK
     , service.Task_FK
    , task.Task
    , visit_prescription.Status
     , drug.Service_direction_FK
    , visit.Scheme
	     , COUNT(service.Task_FK) AS nom
FROM
    newmed06.visit_prescription  INNER JOIN newmed06.drug ON (visit_prescription.Drug_FK = drug.Id)
    INNER JOIN newmed06.visit  ON (visit_prescription.Visit = visit.Created)
    INNER JOIN newmed06.service  ON (drug.Service_direction_FK = service.Id)
    INNER JOIN newmed06.task  ON (service.Task_FK = task.Id) WHERE drug.Service_direction_FK=7 AND visit_prescription.enrolee =$ID AND visit_prescription.Status=1 ";
	
$Recvp3 = mysql_query($query_Recvp3, $localhost) or die(mysql_error());
$row_Recvp3 = mysql_fetch_assoc($Recvp3);
$totalRows_Recvp3 = mysql_num_rows($Recvp3);
$druga= $row_Recvp3['nom']; 
$drugb= $row_Recvp3['Task']; 









mysql_select_db($database_localhost, $localhost);
$query_Recvp4 = "SELECT
      drug.Service_direction_FK
     , service.Task_FK
    , task.Task
    , visit_prescription.Status
     , drug.Service_direction_FK
    , visit.Scheme
	     , COUNT(service.Task_FK) AS nom
FROM
    newmed06.visit_prescription  INNER JOIN newmed06.drug ON (visit_prescription.Drug_FK = drug.Id)
    INNER JOIN newmed06.visit  ON (visit_prescription.Visit = visit.Created)
    INNER JOIN newmed06.service  ON (drug.Service_direction_FK = service.Id)
    INNER JOIN newmed06.task  ON (service.Task_FK = task.Id) WHERE drug.Service_direction_FK=8 AND visit_prescription.enrolee =$ID AND visit_prescription.Status=1 ";
	
$Recvp4 = mysql_query($query_Recvp4, $localhost) or die(mysql_error());
$row_Recvp4 = mysql_fetch_assoc($Recvp4);
$totalRows_Recvp4 = mysql_num_rows($Recvp4);
$injectiona= $row_Recvp4['nom']; 
$injectionb= $row_Recvp4['Task']; 










mysql_select_db($database_localhost, $localhost);
$query_Recvp5 = "SELECT
    visit_procedure.Enrolee
    , visit_procedure.Procedure
    , visit_procedure.Status
    , visit.Scheme
    , task.Task
    , procedure.Procedure
    , procedure.Service_direction_FK
	 , COUNT(service.Task_FK) AS nomd
FROM
    newmed06.visit_procedure
    INNER JOIN newmed06.visit 
        ON (visit_procedure.Visit = visit.Created)
    INNER JOIN newmed06.procedure 
        ON (visit_procedure.Procedure = procedure.Id)
    INNER JOIN newmed06.service 
        ON (procedure.Service_direction_FK = service.Id)
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id) WHERE visit_procedure.Enrolee=$ID AND visit_procedure.Status=1  AND  procedure.Service_direction_FK=6";
	
$Recvp5 = mysql_query($query_Recvp5, $localhost) or die(mysql_error());
$row_Recvp5 = mysql_fetch_assoc($Recvp5);
$totalRows_Recvp5 = mysql_num_rows($Recvp5);
$dressinga= $row_Recvp5['nomd']; 
$dressingb= $row_Recvp5['Task']; 












mysql_select_db($database_localhost, $localhost);
$query_Recvp5 = "SELECT
    visit_procedure.Enrolee
    , visit_procedure.Procedure
    , visit_procedure.Status
    , visit.Scheme
    , task.Task
    , procedure.Procedure
    , procedure.Service_direction_FK
	 , COUNT(service.Task_FK) AS noml
FROM
    newmed06.visit_procedure
    INNER JOIN newmed06.visit 
        ON (visit_procedure.Visit = visit.Created)
    INNER JOIN newmed06.procedure 
        ON (visit_procedure.Procedure = procedure.Id)
    INNER JOIN newmed06.service 
        ON (procedure.Service_direction_FK = service.Id)
    INNER JOIN newmed06.task 
        ON (service.Task_FK = task.Id) WHERE visit_procedure.Enrolee=$ID AND visit_procedure.Status=1 AND  procedure.Service_direction_FK=3";
	
$Recvp5 = mysql_query($query_Recvp5, $localhost) or die(mysql_error());
$row_Recvp5 = mysql_fetch_assoc($Recvp5);
$totalRows_Recvp5 = mysql_num_rows($Recvp5);
$laba= $row_Recvp5['noml']; 
$labb= $row_Recvp5['Task']; 












if ($sch==4)
{
echo   "<table width=\"100%\" height=\"161\" border=\"0\">";
echo   "<tr><td height=\"22\"  bgcolor=\"#999999\"><strong>Service</strong></td></tr>";

echo   "<tr><td><a class=\"linkr\" onClick=\"getcounter('countermsg.php?x=1&id=$ID')\"> Consulting</a></td></tr>"; 


echo   "<tr><td><a class=\"linkr\" onClick=\"getcounter('countermsg.php?x=2&id=$ID')\">Vitals</a></td></tr>"; 


echo   "<tr><td><a class=\"linkr\" onClick=\"getcounter('countermsg.php?x=3&id=$ID')\">Other Services</a></td></tr>"; 


echo   "<tr><td><a class=\"linkr\"  onClick=\"getcounter('countermsg.php?x=4&id=$ID')\">Payment</a></td></tr>";


echo   "<tr><td><a class=\"linkr\"  onClick=\"getcounter('countermsg.php?x=5&id=$ID')\">Emergency</a></td></tr>";

if ($blood>0)
{echo   "<tr><td><a class=\"linkr\"  onClick=\"getcounter('countermsg.php?x=6&id=$ID')\">$blooda</a></td></tr>"; }


if ($druga>0)
{echo   "<tr><td><a class=\"linkr\" onClick=\"getcounter('countermsg.php?x=7&id=$ID')\">$drugb</a></td></tr>"; }



if ($injectiona>0)
{echo   "<tr><td><a class=\"linkr\" onClick=\"getcounter('countermsg.php?x=8&id=$ID')\">$injectionb</a></td></tr>"; }



if ($dressinga>0)
{echo   "<tr><td><a class=\"linkr\" onClick=\"getcounter('countermsg.php?x=9&id=$ID')\">$dressingb</a></td></tr>"; }



if ($laba>0)
{echo   "<tr><td><a class=\"linkr\"  onClick=\"getcounter('countermsg.php?x=10&id=$ID')\">$labb</a></td></tr>"; }



echo   "</table>";

}


else
{ 

echo   "<table width=\"100%\" height=\"131\" border=\"0\">";
echo   "<tr><td height=\"22\" bgcolor=\"#999999\"><strong>Service</strong></td></tr>";
echo   "<tr><td><a class=\"linkr\" onClick=\"getcounter('countermsg.php?x=1&id=$ID')\"> Consulting</a></td></tr>"; 
echo   "<tr><td><a class=\"linkr\" onClick=\"getcounter('countermsg.php?x=2&id=$ID')\">Vitals</a></td></tr>"; 
echo   "<tr><td><a class=\"linkr\"  onClick=\"getcounter('countermsg.php?x=5&id=$ID')\">Emergency</a></td></tr>";


if ($blood>0)
{echo   "<tr><td><a class=\"linkr\"  onClick=\"getcounter('countermsg.php?x=6&id=$ID')\">$blooda</a></td></tr>"; }

if ($druga>0)
{echo   "<tr><td><a class=\"linkr\" onClick=\"getcounter('countermsg.php?x=7&id=$ID')\">$drugb</a></td></tr>"; }

if ($injectiona>0)
{echo   "<tr><td><a class=\"linkr\" onClick=\"getcounter('countermsg.php?x=8&id=$ID')\">$injectionb</a></td></tr>"; }



if ($dressinga>0)
{echo   "<tr><td><a class=\"linkr\" onClick=\"getcounter('countermsg.php?x=9&id=$ID')\">$dressingb</a></td></tr>"; }



if ($laba>0)
{echo   "<tr><td><a class=\"linkr\"  onClick=\"getcounter('countermsg.php?x=10&id=$ID')\">$labb</a></td></tr>"; }

echo   "</table>";


}




?>
