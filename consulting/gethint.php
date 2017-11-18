<?php require_once('../Connections/localhost.php'); 
session_start();
$q=$_GET["q"];

echo "<table width=\"100%\" border=\"0\" bgcolor=\"\">";

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
AND visit_queue.Next_task IS NULL AND enrolee.Licensee = $session AND visit_queue.Task = 10
AND enrolee.Surname LIKE '%" . $q . "%'
GROUP BY enrolee.LId 
ORDER BY visit_queue.Queued DESC";
		
$reclist = mysql_query($query_reclist, $localhost) or die(mysql_error());
$row_reclist = mysql_fetch_assoc($reclist);
$totalRows_reclist = mysql_num_rows($reclist);

if (isset($_GET['totalRows_reclist'])) {
  $totalRows_reclist = $_GET['totalRows_reclist'];
} else {
  $all_reclist = mysql_query($query_reclist);
  $totalRows_reclist = mysql_num_rows($all_reclist);
}
$totalPages_reclist = ceil($totalRows_reclist/$maxRows_reclist)-1;


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
AND visit_queue.Next_task IS NOT NULL AND enrolee.Licensee = $session AND visit_queue.Task = 10
AND enrolee.Surname LIKE '%" . $q . "%'
GROUP BY enrolee.LId 
ORDER BY visit_queue.Queued DESC";
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
$query_recage = "SELECT CURDATE(),  (YEAR(CURDATE())-YEAR(Born)) - (RIGHT(CURDATE(),5)<RIGHT(Born,5)) AS age FROM newmed06.enrolee where enrolee.LId = $colname_recage";
$recage = mysql_query($query_recage, $localhost) or die(mysql_error());
$row_recage = mysql_fetch_assoc($recage);
$totalRows_recage = mysql_num_rows($recage);


  $colname_scheme = $Schemee;
mysql_select_db($database_localhost, $localhost);
$query_scheme = "SELECT program.Program , scheme.Program_FK  , client.Client     , scheme.Scheme FROM newmed06.scheme     INNER JOIN newmed06.client          ON (scheme.Company_FK = client.LId)     INNER JOIN newmed06.program          ON (scheme.Program_FK = program.Id) WHERE scheme.LId = $colname_scheme";
$scheme = mysql_query($query_scheme, $localhost) or die(mysql_error());
$row_scheme = mysql_fetch_assoc($scheme);
$totalRows_scheme = mysql_num_rows($scheme);

?>



                  <?php $pro2 = $Enrolee; ?>
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

	 
			  $color = "";
			  
			  
			  

		   echo "<tr align=\"left\" bgcolor=\"$color\">";     
  echo "<td width=\"100%\" align=\"left\">"; if($totalRows_reclist > 0) {
	echo "<a href=\"javascript:selectt('$Principal','$Enrolee', '$Schemee', '$Capitation', '1', '1', '$status', '$VisitID', '$VisitID','diagnosis.php');\">";
	   echo $row_reclist['Surname']; echo "&nbsp;"; echo $row_reclist['First_Name']; echo "&nbsp;";  echo $row_reclist['Other_Name']; 
       /*echo $row_reclist['Gender'];  echo "&nbsp;" */  echo "(";  echo $row_reclist['age'];  echo ")";} echo "</a></td></tr>";
} while ($row_reclist = mysql_fetch_assoc($reclist)); 
echo "</table >";
                
                
                echo "<table width=\"100%\" border=\"0\" bgcolor=\"\">"; 
 do {$VisitID =  $row_reclist2['Created'];
		   			$Enrolee2 = $row_reclist2['LId'];
					$Principal2 = $row_reclist2['Principal'];
					$Schemee2 = $row_reclist2['Scheme'];
					$Capitation2 = $dmount2;
					$date = $colname_reclist2;
					
					$colname_recage = "-1";
if (isset($row_reclist2['LId'])) {
  $colname_recage = $row_reclist2['LId']; } 
  
                   $pro2 = $Enrolee; 
				   
	  $colname_scheme = $Schemee2;
mysql_select_db($database_localhost, $localhost);
$query_scheme = "SELECT program.Program , scheme.Program_FK  , client.Client     , scheme.Scheme FROM newmed06.scheme     INNER JOIN newmed06.client          ON (scheme.Company_FK = client.LId)     INNER JOIN newmed06.program          ON (scheme.Program_FK = program.Id) WHERE scheme.LId = $colname_scheme";
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
	  
	  
	  
	 
			  $color = "";
			  
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
AND visit_queue.Next_task IS NULL AND enrolee.Licensee = $session AND visit_queue.Task = 10 AND enrolee.LId = $thisid
GROUP BY enrolee.LId 
ORDER BY visit.Status ASC";
$checker = mysql_query($query_checker, $localhost) or die(mysql_error());
$row_checker = mysql_fetch_assoc($checker);
$totalRows_checker = mysql_num_rows($checker);

if ($totalRows_checker == 0 )

{

		   echo "<tr align=\"left\" bgcolor=\"$color\">"; 
echo "<td width=\"100%\" align=\"left\">";
if($totalRows_reclist2 > 0) { echo "<a href=\"javascript:selectt('$Principal2','$Enrolee2', '$Schemee2', '$Capitation2', '2', '2', '$status', '$VisitID', '$VisitID','diagnosis.php');\">"; echo "<font color=\"#cccccc\">"; echo $row_reclist2['Surname']; echo "&nbsp;";  echo $row_reclist2['First_Name']; echo "&nbsp;";  echo $row_reclist2['Other_Name']; /* echo $row_reclist2['Gender']; echo "&nbsp;" */  echo "("; echo $row_reclist2['age'];  echo ")"; /*echo $row_reclist2['Status'];*/ } } echo "</font></a></td></tr>";
 } while ($row_reclist2 = mysql_fetch_assoc($reclist2)); 
 
echo "</table>";

?>

