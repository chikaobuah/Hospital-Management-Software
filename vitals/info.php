<?php require_once('../Connections/localhost.php'); ?>
<?php
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


$maxRows_recvist1 = 10;
$pageNum_recvist1 = 0;
if (isset($_GET['pageNum_recvist1'])) {
  $pageNum_recvist1 = $_GET['pageNum_recvist1'];
}
$startRow_recvist1 = $pageNum_recvist1 * $maxRows_recvist1;

$colname_recvist1 = "-1";
if (isset($_GET['id'])) {
  $colname_recvist1 = $_GET['id'];
}
mysql_select_db($database_localhost, $localhost);
$query_recvist1 = sprintf("SELECT * FROM visit WHERE Created = %s", GetSQLValueString($colname_recvist1, "date"));
$query_limit_recvist1 = sprintf("%s LIMIT %d, %d", $query_recvist1, $startRow_recvist1, $maxRows_recvist1);
$recvist1 = mysql_query($query_limit_recvist1, $localhost) or die(mysql_error());
$row_recvist1 = mysql_fetch_assoc($recvist1);

if (isset($_GET['totalRows_recvist1'])) {
  $totalRows_recvist1 = $_GET['totalRows_recvist1'];
} else {
  $all_recvist1 = mysql_query($query_recvist1);
  $totalRows_recvist1 = mysql_num_rows($all_recvist1);
}
$totalPages_recvist1 = ceil($totalRows_recvist1/$maxRows_recvist1)-1;

$colname_recuser = "-1";
if (isset($_SESSION['username'])) {
  $colname_recuser = $_SESSION['username'];
}
mysql_select_db($database_localhost, $localhost);
$query_recuser = sprintf("SELECT LId FROM `user` WHERE User_Id = %s", GetSQLValueString($colname_recuser, "text"));
$recuser = mysql_query($query_recuser, $localhost) or die(mysql_error());
$row_recuser = mysql_fetch_assoc($recuser);
$totalRows_recuser = mysql_num_rows($recuser);


$colname_recsheme = "-1";
if (isset($_GET['sc'])) {
  $colname_recsheme = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_recsheme = sprintf("SELECT program.Program     , client.Client , client.Short , client.Contact, client.Contact_Mobile_Phone, client.Contact_Business_Phone  , scheme.Scheme FROM newmed06.scheme     INNER JOIN newmed06.client          ON (scheme.Company_FK = client.LId)     INNER JOIN newmed06.program          ON (scheme.Program_FK = program.Id) WHERE scheme.LId = %s", GetSQLValueString($colname_recsheme, "int"));
$recsheme = mysql_query($query_recsheme, $localhost) or die(mysql_error());
$row_recsheme = mysql_fetch_assoc($recsheme);
$totalRows_recsheme = mysql_num_rows($recsheme);

$colname_date = "-1";
if (isset($_GET['id2'])) {
  $colname_date = $_GET['id2'];
}
mysql_select_db($database_localhost, $localhost);
$query_date = sprintf("SELECT DATE_FORMAT(visit.Created, '%%D %%b %%Y') AS formatted_date FROM visit WHERE Created = %s", GetSQLValueString($colname_date, "int"));
$date = mysql_query($query_date, $localhost) or die(mysql_error());
$row_date = mysql_fetch_assoc($date);
$totalRows_date = mysql_num_rows($date);

$colname_age = "-1";
if (isset($_GET['en'])) {
  $colname_age = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_age = sprintf("SELECT CURDATE(),  (YEAR(CURDATE())-YEAR(Born)) - (RIGHT(CURDATE(),5)<RIGHT(Born,5)) AS age FROM newmed06.enrolee WHERE enrolee.LId = %s", GetSQLValueString($colname_age, "int"));
$age = mysql_query($query_age, $localhost) or die(mysql_error());
$row_age = mysql_fetch_assoc($age);
$totalRows_age = mysql_num_rows($age);

$colname_recfull = "-1";
if (isset($_GET['en'])) {
  $colname_recfull = $_GET['en'];
}
$colname2_recfull = "-1";
if (isset($_GET['id2'])) {
  $colname2_recfull = $_GET['id2'];
}
mysql_select_db($database_localhost, $localhost);
$query_recfull = sprintf("SELECT 
						 enrolee.LId,  
						 enrolee.Surname      , 
						 enrolee.First_Name      , 
						 enrolee.Other_Name       , 
						 enrolee.Born               , 
						 visit.Created    , 
						 visit.Principal    ,
						 DATE_FORMAT(visit.Created, '%%D %%b %%Y') AS formatted_date    , 
						 visit.Ticket_No   , 
						 visit.Appointed          , 
						 gender.Gender        , 
						 enrolee.Home_Address        , 
						 enrolee.Home_Phone        , 
						 enrolee.Picture        
						 FROM newmed06.visit        
						 INNER JOIN newmed06.enrolee             
						 ON (visit.Enrolee = enrolee.LId)             
						 INNER JOIN newmed06.gender             
						 ON (enrolee.Gender = gender.Id)         
						 WHERE visit.Enrolee = %s AND visit.Created = '$colname2_recfull' ", GetSQLValueString($colname_recfull, "int"));
$recfull = mysql_query($query_recfull, $localhost) or die(mysql_error());
$row_recfull = mysql_fetch_assoc($recfull);
$totalRows_recfull = mysql_num_rows($recfull);

$maxRows_reclist = 1;
$pageNum_reclist = 1;
if (isset($_GET['pageNum_reclist'])) {
  $pageNum_reclist = $_GET['pageNum_reclist'];
}
$startRow_reclist = $pageNum_reclist * $maxRows_reclist;


mysql_select_db($database_localhost, $localhost);
$query_reclist = "SELECT
     enrolee.Surname
    , enrolee.First_Name
    , enrolee.Other_Name
    , enrolee.Born
    , visit.Created
    , enrolee.Picture
    , enrolee.LId
    , gender.Gender
FROM
    newmed06.enrolee
    INNER JOIN newmed06.visit 
        ON (visit.Enrolee = enrolee.LId)
    INNER JOIN newmed06.gender 
        ON (enrolee.Gender = gender.Id)";
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



  $colname_recre = $row_recfull['Principal']; 

mysql_select_db($database_localhost, $localhost);
$query_recre = sprintf("SELECT Surname, First_Name, Other_Name FROM enrolee WHERE LId = %s ", GetSQLValueString($colname_recre, "int"));
$recre = mysql_query($query_recre, $localhost) or die(mysql_error());
$row_recre = mysql_fetch_assoc($recre);
$totalRows_recre = mysql_num_rows($recre);




?>
<script type="text/javascript">var GB_ROOT_DIR = "http://localhost/advance_php_paging/greybox/";</script>
<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />


<table width="100%" height="100%" border="1px" style="border:thick; border-color:#FAD2AF; border-collapse:collapse;" >
  <tr>
    <td colspan="2" height="25" style="background:#999"><?php echo $row_recfull['Surname']; ?>&nbsp;<?php echo $row_recfull['First_Name']; ?>&nbsp;<?php echo $row_recfull['Other_Name']; ?>&nbsp;
    
    <?php if ($row_age['age'] < 1000)
	{
		if(isset($row_age['age'])){
						  
						  echo "("; echo $row_age['age']; echo ")";
						  } else{ echo " "; }
		
		} else{ echo " "; }
    
    
     ?></td>
    <td width="14%" rowspan="4" style="background-color:#FFF; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;"><div  id="picture" style="border : solid 2px #FFCC33; width : auto; height : 97px; "> <img src=<?php echo $row_recfull['Picture']; ?> width="160" height="97" /></div></td>
    <td width="20%" style="background:#999">Ticket No.</td>
  </tr>
  <tr>
    <td width="12%" height="25" align="left" bgcolor="#FFD659">Principal</td>
    <td width="36%" align="left"  bgcolor="#FFF5D9"><?php echo $row_recre['Surname'];?>&nbsp;<?php echo $row_recre['First_Name'];?></td>
    <td  rowspan="2" height="50px"><font size="+3"><?php echo $row_recfull['Ticket_No']; ?></font></td>
  </tr>
  <tr>
    <td width="12%" height="50%" align="left" valign="top" bgcolor="#FFD659" rowspan="2"><?php echo $row_recsheme['Program'];?></td>
    <td width="36%" align="left" valign="top" rowspan="2" bgcolor="#FFF5D9"><?php echo $row_recsheme['Short'];?>&nbsp;<?php echo $row_recsheme['Contact'];?>&nbsp;<?php echo $row_recsheme['Contact_Mobile_Phone'];?>&nbsp;<?php echo $row_recsheme['Contact_Business_Phone'];?></td>

    <tr>
    <td width="12%" height="25%" align="center" valign="top" bgcolor="#FFC20D"><?php echo $row_recfull['formatted_date']; ?></td>
  </table>
<?php
mysql_free_result($recvist1);

mysql_free_result($date);

mysql_free_result($age);

mysql_free_result($recsheme);

mysql_free_result($recfull);

mysql_free_result($recre);
?>