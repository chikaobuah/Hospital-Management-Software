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

$colname_scheme = "-1";
if (isset($_GET['sc'])) {
  $colname_scheme = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_scheme = sprintf("SELECT program.Program , scheme.Program_FK  , client.Client     , scheme.Scheme FROM newmed06.scheme     INNER JOIN newmed06.client          ON (scheme.Company_FK = client.LId)     INNER JOIN newmed06.program          ON (scheme.Program_FK = program.Id) WHERE scheme.LId = %s", GetSQLValueString($colname_scheme, "int"));
$scheme = mysql_query($query_scheme, $localhost) or die(mysql_error());
$row_scheme = mysql_fetch_assoc($scheme);
$totalRows_scheme = mysql_num_rows($scheme);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<?php
echo $Capitation = $_GET['cap'];
echo $Principal = $_GET['pr'];
echo $Enrolee = $_GET['en'];
echo $Scheme = $_GET['sc'];
echo $VisitID = $_GET['id'];
echo $lc = $_GET['lc'];
echo $lc2 = $_GET['lc2'];


if($row_scheme['Program'] !="")
{
	   switch ($row_scheme['Program']) {
	  case "Private":
	   $status = "6";
	  header("location: consulting.php?pr=$Principal&en=$Enrolee&sc=$Scheme&id=$VisitID&st=$status&cap=$Capitation&lc2=-1&lc=$lc&id2=$VisitID");
	  
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
 ?>


</body>
</html>
<?php
mysql_free_result($scheme);
?>
