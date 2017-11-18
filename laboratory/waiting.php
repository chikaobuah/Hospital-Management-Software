<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();
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

$colname_counts = "-1";
if (isset($_SESSION['License'])) {
  $colname_counts = $_SESSION['License'];
}


$colname2_counts = date('Y-m-d');

mysql_select_db($database_localhost, $localhost);
$query_counts = sprintf("SELECT COUNT(Visit.Enrolee) AS counts FROM     newmed06.visit_queue 	INNER JOIN newmed06.visit 
        ON (visit_queue.Visit = visit.Created) INNER JOIN newmed06.enrolee 
        ON (visit_queue.Enrolee = enrolee.LId) WHERE visit_queue.Visit_date LIKE %s AND visit_queue.Next_task IS NULL AND enrolee.Licensee = %s AND visit_queue.Task = 10", GetSQLValueString($colname2_counts . "%", "date"),GetSQLValueString($colname_counts, "int"));
$counts = mysql_query($query_counts, $localhost) or die(mysql_error());
$row_counts = mysql_fetch_assoc($counts);
$totalRows_counts = mysql_num_rows($counts);
?>

<script language="javascript" type="text/javascript" src="../common/consultingAX.js"></script>


            



<table width="100%" border="0">
<tr>
<td align="left"><input type="text"  style="width:100%;" onkeyup="showHint(this.value)" value="Enter Enrollee name"   align="left" /></td>
              </tr>
              <tr>
                <td align="left" height="500px" valign="top"><div id="app" style="overflow : auto; 
background:#FFFFFF;
overflow-x: hidden;
-ms-overflow-x: hidden;"> 
                
                
                <table width="100%" border="0" bgcolor="">
<?php 

mysql_select_db($database_localhost, $localhost);
$query_reclist = "SELECT
    service.Task_FK
    , procedure.Procedure
    , procedure.Specimen
    , visit_procedure.Specific_Request
    , visit_procedure.Status
    , enrolee.LId
    , enrolee.First_Name
    , enrolee.Surname
    , enrolee.Other_Name
    , enrolee.Born
    , visit.Principal
    , visit.Scheme
	, visit.Created
	, CURDATE(),  (YEAR(CURDATE())-YEAR(Born)) - (RIGHT(CURDATE(),5)<RIGHT(enrolee.Born,5)) AS age
FROM
    newmed06.visit_procedure
    INNER JOIN newmed06.enrolee 
        ON (visit_procedure.Enrolee = enrolee.LId)
    INNER JOIN newmed06.procedure 
        ON (visit_procedure.Procedure = procedure.Id)
    INNER JOIN newmed06.visit 
        ON (visit_procedure.Visit = visit.Created)
    INNER JOIN newmed06.service 
        ON (procedure.Service_direction_FK = service.Id) WHERE visit_procedure.Status = 1 AND Task_FK = 20 GROUP BY LId";	
$reclist = mysql_query($query_reclist, $localhost) or die(mysql_error());
$row_reclist = mysql_fetch_assoc($reclist);
$totalRows_reclist = mysql_num_rows($reclist);

  
mysql_select_db($database_localhost, $localhost);
$query_reclist2 = "SELECT
    service.Task_FK
    , procedure.Procedure
    , procedure.Specimen
    , visit_procedure.Specific_Request
    , visit_procedure.Status
    , enrolee.LId
    , enrolee.First_Name
    , enrolee.Surname
    , enrolee.Other_Name
    , enrolee.Born
    , visit.Principal
    , visit.Scheme
	, visit.Created
	, CURDATE(),  (YEAR(CURDATE())-YEAR(Born)) - (RIGHT(CURDATE(),5)<RIGHT(enrolee.Born,5)) AS age
FROM
    newmed06.visit_procedure
    INNER JOIN newmed06.enrolee 
        ON (visit_procedure.Enrolee = enrolee.LId)
    INNER JOIN newmed06.procedure 
        ON (visit_procedure.Procedure = procedure.Id)
    INNER JOIN newmed06.visit 
        ON (visit_procedure.Visit = visit.Created)
    INNER JOIN newmed06.service 
        ON (procedure.Service_direction_FK = service.Id) WHERE visit_procedure.Status != 1 AND Task_FK = 20 GROUP BY LId";
$reclist2 = mysql_query($query_reclist2, $localhost) or die(mysql_error());
$row_reclist2 = mysql_fetch_assoc($reclist2);
$totalRows_reclist2 = mysql_num_rows($reclist2);




do { $VisitID =  $row_reclist['Created'];
		   			$Enrolee = $row_reclist['LId'];
					$Principal = $row_reclist['Principal'];
					$Schemee = $row_reclist['Scheme'];
					

  $colname_scheme = $Schemee;
mysql_select_db($database_localhost, $localhost);
$query_scheme = sprintf("SELECT 
						program.Program , 
						scheme.Program_FK  , 
						client.Client     , 
						scheme.Scheme 
						FROM newmed06.scheme     
						INNER JOIN newmed06.client          
						ON (scheme.Company_FK = client.LId)     
						INNER JOIN newmed06.program          
						ON (scheme.Program_FK = program.Id) WHERE scheme.LId = %s", GetSQLValueString($colname_scheme, "int"));
$scheme = mysql_query($query_scheme, $localhost) or die(mysql_error());
$row_scheme = mysql_fetch_assoc($scheme);
$totalRows_scheme = mysql_num_rows($scheme);

?>

		  <tr align="left">    
    <td width="100%" align="left"><?php if($totalRows_reclist > 0) {
	echo "<a href=\"javascript:selectt('$Principal','$Enrolee', '$Schemee', '1', '$VisitID','diagnosis.php');\">";
	   echo $row_reclist['Surname']; echo "&nbsp;"; echo $row_reclist['First_Name']; echo "&nbsp;";  echo $row_reclist['Other_Name']; 
       /*echo $row_reclist['Gender'];  echo "&nbsp;" */  echo "(";  echo $row_reclist['age'];  echo ")";} ?></a></td>
          </tr>
<?php } while ($row_reclist = mysql_fetch_assoc($reclist)); ?>
          
             </table >
                
                
                
                <table width="100%" border="0" bgcolor="">  
                <?php do {$VisitID =  $row_reclist2['Created'];
		   			$Enrolee2 = $row_reclist2['LId'];
					$Principal2 = $row_reclist2['Principal'];
					$Schemee2 = $row_reclist2['Scheme'];
					

  $colname_recage = $row_reclist2['Scheme']; 
	  
	  $colname_scheme = $Schemee2;
mysql_select_db($database_localhost, $localhost);
$query_scheme = sprintf("
						SELECT program.Program , 
						scheme.Program_FK  , 
						client.Client     , 
						scheme.Scheme 
						FROM newmed06.scheme     
						INNER JOIN newmed06.client          
						ON (scheme.Company_FK = client.LId)     
						INNER JOIN newmed06.program          
						ON (scheme.Program_FK = program.Id) WHERE scheme.LId = %s", GetSQLValueString($colname_scheme, "int"));
$scheme = mysql_query($query_scheme, $localhost) or die(mysql_error());
$row_scheme = mysql_fetch_assoc($scheme);
$totalRows_scheme = mysql_num_rows($scheme);


		   echo "<tr align=\"left\">"; ?>
    <td width="100%" align="left">
	   <?php if($totalRows_reclist2 > 0) {
		   
$colname_checker = date('Y-m-d');
$session = $_SESSION['License'];
if ($row_reclist2['LId'] > 0 ){ 
$thisid = $row_reclist2['LId'];} else {$thisid = 0;}

mysql_select_db($database_localhost, $localhost);
$query_checker = "SELECT
	enrolee.LId
FROM
    newmed06.visit_queue
    INNER JOIN newmed06.visit 
        ON (visit_queue.Visit = visit.Created)
    INNER JOIN newmed06.enrolee 
        ON (visit_queue.Enrolee = enrolee.LId)
    INNER JOIN newmed06.scheme 
        ON (visit.Scheme = scheme.LId)
    INNER JOIN newmed06.gender 
        ON (enrolee.Gender = gender.Id) 
		
WHERE visit.Created LIKE '%". $colname_checker ."%'
AND visit_queue.Next_task IS NULL AND enrolee.Licensee = $session AND visit_queue.Task = 20 AND enrolee.LId = $thisid
GROUP BY enrolee.LId 
ORDER BY visit.Status ASC";
$checker = mysql_query($query_checker, $localhost) or die(mysql_error());
$row_checker = mysql_fetch_assoc($checker);
$totalRows_checker = mysql_num_rows($checker);
if ($totalRows_checker == 0 )

{
		   
		   echo "<a href=\"javascript:selectt('$Principal2','$Enrolee2', '$Schemee2', '2','$VisitID','diagnosis.php');\">"; echo "<font color=\"#cccccc\">"; echo $row_reclist2['Surname']; echo "&nbsp;";  echo $row_reclist2['First_Name']; echo "&nbsp;";  echo $row_reclist2['Other_Name']; /* echo $row_reclist2['Gender']; echo "&nbsp;" */  echo "("; echo $row_reclist2['age'];  echo ")"; /*echo $row_reclist2['Status'];*/ }} echo "</font></a></td></tr>";
 } while ($row_reclist2 = mysql_fetch_assoc($reclist2)); ?>
</table></div></td>
              </tr>
              <tr>
                <td align="left"><table width="100%" border="0">
              <tr>
                <td align="left"  bgcolor="#cccccc"><strong>Queue length = <?php echo $totalRows_reclist;?></strong></td>
              </tr>
</table></td>
              </tr>
</table>


<?php

mysql_free_result($reclist);

mysql_free_result($reclist2);
?>

