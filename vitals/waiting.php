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
                <td align="left" height="255px" valign="top"><div id="app" style="overflow : auto; 
background:#FFFFFF;
overflow-x: hidden;
-ms-overflow-x: hidden;"> 
                
                
                <table width="100%" border="0" bgcolor="">
<?php 
$maxRows_reclist = 1;
$pageNum_reclist = 1;
if (isset($_GET['pageNum_reclist'])) {
  $pageNum_reclist = $_GET['pageNum_reclist'];
}
$startRow_reclist = $pageNum_reclist * $maxRows_reclist;

$colname_reclist2 = date('Y-m-d');
 $session = $_SESSION['License'];

mysql_select_db($database_localhost, $localhost);
$query_reclist = "SELECT
    visit_queue.Enrolee
    , visit_queue.Visit_date
    , visit_queue.Visit
    , visit_queue.Queued
    , visit_queue.Task
    , visit_queue.Next_task
    , visit_queue.Exited
    , visit.Scheme
	, enrolee.LId
	, visit.Created
	, visit.Principal
    , scheme.Capitation
    , gender.Gender
    , enrolee.Surname
    , enrolee.First_Name
    , enrolee.Other_Name
    , enrolee.Born
    , visit.Ticket_No
	, CURDATE(),  (YEAR(CURDATE())-YEAR(Born)) - (RIGHT(CURDATE(),5)<RIGHT(enrolee.Born,5)) AS age 
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
		
WHERE visit.Created LIKE '%". $colname_reclist2 ."%'
AND visit_queue.Next_task IS NULL AND enrolee.Licensee = $session AND visit_queue.Task = 9
GROUP BY enrolee.LId 
ORDER BY visit.Status ASC";
		
$reclist = mysql_query($query_reclist, $localhost) or die(mysql_error());
$row_reclist = mysql_fetch_assoc($reclist);
$totalRows_reclist = mysql_num_rows($reclist);

$chamount = $row_reclist['Capitation'];

mysql_select_db($database_localhost, $localhost);
$query_amount2 = "SELECT * FROM capitation WHERE Amount <= '$chamount' ORDER BY Amount DESC LIMIT 1";
$amount2 = mysql_query($query_amount2, $localhost) or die(mysql_error());
$row_amount2 = mysql_fetch_assoc($amount2);
$totalRows_amount2 = mysql_num_rows($amount2);


$dmount = $row_amount2['Amount'];


$colname_reclist2 = date('Y-m-d');
 $session = $_SESSION['License'];
  
mysql_select_db($database_localhost, $localhost);
$query_reclist2 = "SELECT
    visit_queue.Enrolee
    , visit_queue.Visit_date
    , visit_queue.Visit
    , visit_queue.Queued
    , visit_queue.Task
    , visit_queue.Next_task
    , visit_queue.Exited
    , visit.Scheme
	, visit.Principal
	, enrolee.LId
	, visit.Created
    , scheme.Capitation
    , gender.Gender
    , enrolee.Surname
    , enrolee.First_Name
    , enrolee.Other_Name
    , enrolee.Born
    , visit.Ticket_No
	, CURDATE(),  (YEAR(CURDATE())-YEAR(Born)) - (RIGHT(CURDATE(),5)<RIGHT(enrolee.Born,5)) AS age 
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
		
WHERE visit.Created LIKE '%". $colname_reclist2 ."%'
AND visit_queue.Next_task IS NOT NULL AND enrolee.Licensee = $session AND visit_queue.Task = 9
GROUP BY enrolee.LId 
ORDER BY visit.Status ASC";
$reclist2 = mysql_query($query_reclist2, $localhost) or die(mysql_error());
$row_reclist2 = mysql_fetch_assoc($reclist2);
$totalRows_reclist2 = mysql_num_rows($reclist2);

$chamount2 = $row_reclist2['Capitation'];

mysql_select_db($database_localhost, $localhost);
$query_amount = "SELECT * FROM capitation WHERE Amount <= '$chamount2' ORDER BY Amount DESC LIMIT 1";
$amount = mysql_query($query_amount, $localhost) or die(mysql_error());
$row_amount = mysql_fetch_assoc($amount);
$totalRows_amount = mysql_num_rows($amount);


$dmount2 = $row_amount['Amount'];





do { $VisitID =  $row_reclist['Created'];
		   			$Enrolee = $row_reclist['LId'];
					$Principal = $row_reclist['Principal'];
					$Schemee = $row_reclist['Scheme'];
					$Capitation = $dmount;
					

  $colname_recage = $row_reclist['LId'];

mysql_select_db($database_localhost, $localhost);
$query_recage = sprintf("SELECT CURDATE(),  (YEAR(CURDATE())-YEAR(Born)) - (RIGHT(CURDATE(),5)<RIGHT(Born,5)) AS age FROM newmed06.enrolee where enrolee.LId = %s", GetSQLValueString($colname_recage, "int"));
$recage = mysql_query($query_recage, $localhost) or die(mysql_error());
$row_recage = mysql_fetch_assoc($recage);
$totalRows_recage = mysql_num_rows($recage);


  $colname_scheme = $Schemee;
mysql_select_db($database_localhost, $localhost);
$query_scheme = sprintf("SELECT program.Program , scheme.Program_FK  , client.Client     , scheme.Scheme FROM newmed06.scheme     INNER JOIN newmed06.client          ON (scheme.Company_FK = client.LId)     INNER JOIN newmed06.program          ON (scheme.Program_FK = program.Id) WHERE scheme.LId = %s", GetSQLValueString($colname_scheme, "int"));
$scheme = mysql_query($query_scheme, $localhost) or die(mysql_error());
$row_scheme = mysql_fetch_assoc($scheme);
$totalRows_scheme = mysql_num_rows($scheme);

?>



    
      <?php 
	  if($row_scheme['Program'] !="")
{
	   switch ($row_scheme['Program']) {
	  case "Private":
	   $status = "6";
	break;    
	
	  case "NHIS":
	   $status = "5";
	break;    
	
	  case "Retainer":
	   $status = "5";
	  
	break;    
	
	  case "HMO":
	   $status = "5";
	break;    
	
	   }	
}
else
{
	$status = "5";
}

		   echo "<tr align=\"left\">"; ?>     
    <td width="100%" align="left"><?php if($totalRows_reclist > 0) {
	echo "<a href=\"javascript:selectt('$Principal','$Enrolee', '$Schemee', '$Capitation', '1', '1', '$status', '$VisitID', '$VisitID','diagnosis.php');\">";
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
					$Capitation2 = $dmount2;
					$date = $colname_reclist2;
					

  $colname_recage = $row_reclist2['LId']; 
	  
	  $colname_scheme = $Schemee2;
mysql_select_db($database_localhost, $localhost);
$query_scheme = sprintf("SELECT program.Program , scheme.Program_FK  , client.Client     , scheme.Scheme FROM newmed06.scheme     INNER JOIN newmed06.client          ON (scheme.Company_FK = client.LId)     INNER JOIN newmed06.program          ON (scheme.Program_FK = program.Id) WHERE scheme.LId = %s", GetSQLValueString($colname_scheme, "int"));
$scheme = mysql_query($query_scheme, $localhost) or die(mysql_error());
$row_scheme = mysql_fetch_assoc($scheme);
$totalRows_scheme = mysql_num_rows($scheme);






	  if($row_scheme['Program'] !="")
{
	   switch ($row_scheme['Program']) {
	  case "Private":
	   $status = "6";
	break;    
	
	  case "NHIS":
	   $status = "5";
	break;    
	
	  case "Retainer":
	   $status = "5";
	  
	break;    
	
	  case "HMO":
	   $status = "5";
	break;    
	
	   }	
}
else
{
	$status = "5";
}
	  
	  

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
AND visit_queue.Next_task IS NULL AND enrolee.Licensee = $session AND visit_queue.Task = 9 AND enrolee.LId = $thisid
GROUP BY enrolee.LId 
ORDER BY visit.Status ASC";
$checker = mysql_query($query_checker, $localhost) or die(mysql_error());
$row_checker = mysql_fetch_assoc($checker);
$totalRows_checker = mysql_num_rows($checker);

if ($totalRows_checker == 0 )

{
		   
		   echo "<a href=\"javascript:selectt('$Principal2','$Enrolee2', '$Schemee2', '$Capitation2', '2', '2', '$status', '$VisitID', '$VisitID','diagnosis.php');\">"; echo "<font color=\"#cccccc\">"; echo $row_reclist2['Surname']; echo "&nbsp;";  echo $row_reclist2['First_Name']; echo "&nbsp;";  echo $row_reclist2['Other_Name']; /* echo $row_reclist2['Gender']; echo "&nbsp;" */  echo "("; echo $row_reclist2['age'];  echo ")"; /*echo $row_reclist2['Status'];*/ }} echo "</font></a></td></tr>";
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
mysql_free_result($recage);

mysql_free_result($amount);

mysql_free_result($counts);

mysql_free_result($reclist);

mysql_free_result($reclist2);
?>

