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


$colname2_lablist = date ('Y-m-d');

$colname_lablist = "-1";
if (isset($_GET['en'])) {
  $colname_lablist = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_lablist = sprintf("SELECT service.Short      ,  visit_prescription.Enrolee      ,   visit_prescription.Created      ,  visit_prescription.Creator      ,  visit_prescription.Visit      ,   visit_prescription.Status      ,   drug.Drug  ,drug.Short  as dshort   ,   service.Task_FK     ,   task.Task     ,   task.Sequence     ,   drug.Id     ,   service.Service     ,   task.Id     ,   visit_prescription.Status FROM newmed06.drug      INNER JOIN newmed06.service           ON (drug.Service_direction_FK = service.Id)      INNER JOIN newmed06.task           ON (service.Task_FK = task.Id)      INNER JOIN newmed06.visit_prescription           ON (visit_prescription.Drug_FK = drug.Id) WHERE Enrolee = %s  AND visit_prescription.Status = 1  AND service.Task_FK = 13", GetSQLValueString($colname_lablist, "int"));
$lablist = mysql_query($query_lablist, $localhost) or die(mysql_error());
$row_lablist = mysql_fetch_assoc($lablist);
$totalRows_lablist = mysql_num_rows($lablist);

$colname_lablisttwo = "-1";
if (isset($_GET['en'])) {
  $colname_lablisttwo = $_GET['en'];
}

  $colname2_lablisttwo = date ('Y-m-d');

$colname_lablisttwo = "-1";
if (isset($_GET['en'])) {
  $colname_lablisttwo = $_GET['en'];
}
$colname2_lablisttwo = "-1";
if (isset($_GET['id'])) {
  $colname2_lablisttwo = $_GET['id'];
}
mysql_select_db($database_localhost, $localhost);
$query_lablisttwo = sprintf("SELECT service.Short      ,  visit_prescription.Enrolee      ,   visit_prescription.Created      ,  visit_prescription.Creator      ,  visit_prescription.Visit      ,   visit_prescription.Status      ,   drug.Drug   ,drug.Short as dshort   ,   service.Task_FK     ,   task.Task     ,   task.Sequence     ,   drug.Id     ,   service.Service     ,   task.Id     ,   visit_prescription.Status FROM newmed06.drug      INNER JOIN newmed06.service           ON (drug.Service_direction_FK = service.Id)      INNER JOIN newmed06.task           ON (service.Task_FK = task.Id)      INNER JOIN newmed06.visit_prescription           ON (visit_prescription.Drug_FK = drug.Id) WHERE visit_prescription.Status > 1 AND Enrolee = %s AND visit_prescription.Visit LIKE %s AND service.Task_FK = 13", GetSQLValueString($colname_lablisttwo, "int"),GetSQLValueString("%" . $colname2_lablisttwo . "%", "date"));
$lablisttwo = mysql_query($query_lablisttwo, $localhost) or die(mysql_error());
$row_lablisttwo = mysql_fetch_assoc($lablisttwo);
$totalRows_lablisttwo = mysql_num_rows($lablisttwo);


$colname2_lablist2 = date ('Y-m-d');

$colname_lablist2 = "-1";
if (isset($_GET['en'])) {
  $colname_lablist2 = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_lablist2 = sprintf("SELECT service.Short      ,  visit_prescription.Enrolee      ,   visit_prescription.Created      ,  visit_prescription.Creator      ,  visit_prescription.Visit      ,   visit_prescription.Status      ,   drug.Drug , drug.Short  as dshort  ,   service.Task_FK     ,   task.Task     ,   task.Sequence     ,   drug.Id     ,   service.Service     ,   task.Id     ,   visit_prescription.Status FROM newmed06.drug      INNER JOIN newmed06.service           ON (drug.Service_direction_FK = service.Id)      INNER JOIN newmed06.task           ON (service.Task_FK = task.Id)      INNER JOIN newmed06.visit_prescription           ON (visit_prescription.Drug_FK = drug.Id) WHERE Enrolee = %s  AND visit_prescription.Status = 1  AND service.Task_FK = 16", GetSQLValueString($colname_lablist2, "int"));
$lablist2 = mysql_query($query_lablist2, $localhost) or die(mysql_error());
$row_lablist2 = mysql_fetch_assoc($lablist2);
$totalRows_lablist2 = mysql_num_rows($lablist2);

$colname_lablisttwo2 = "-1";
if (isset($_GET['en'])) {
  $colname_lablisttwo2 = $_GET['en'];
}

  $colname2_lablisttwo2 = date ('Y-m-d');

$colname_lablisttwo2 = "-1";
if (isset($_GET['en'])) {
  $colname_lablisttwo2 = $_GET['en'];
}
$colname2_lablisttwo2 = "-1";
if (isset($_GET['id'])) {
  $colname2_lablisttwo2 = $_GET['id'];
}
mysql_select_db($database_localhost, $localhost);
$query_lablisttwo2 = sprintf("SELECT service.Short      ,  visit_prescription.Enrolee      ,   visit_prescription.Created      ,  visit_prescription.Creator      ,  visit_prescription.Visit      ,   visit_prescription.Status      ,   drug.Drug   , drug.Short  as dshort  ,   service.Task_FK     ,   task.Task     ,   task.Sequence     ,   drug.Id     ,   service.Service     ,   task.Id     ,   visit_prescription.Status FROM newmed06.drug      INNER JOIN newmed06.service           ON (drug.Service_direction_FK = service.Id)      INNER JOIN newmed06.task           ON (service.Task_FK = task.Id)      INNER JOIN newmed06.visit_prescription           ON (visit_prescription.Drug_FK = drug.Id) WHERE visit_prescription.Status > 1 AND Enrolee = %s AND visit_prescription.Visit LIKE %s AND service.Task_FK = 16", GetSQLValueString($colname_lablisttwo2, "int"),GetSQLValueString("%" . $colname2_lablisttwo . "%", "date"));
$lablisttwo2 = mysql_query($query_lablisttwo2, $localhost) or die(mysql_error());
$row_lablisttwo2 = mysql_fetch_assoc($lablisttwo2);
$totalRows_lablisttwo2 = mysql_num_rows($lablisttwo2);



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="1" style="border:thin; border-color:#000; border-collapse:collapse;">
  <tr>
    <td width="80%"><strong>Drugs</strong></td>
    <td width="20%">&nbsp;</td>
  </tr>
   <?php if ($totalRows_lablist > 0) { ?>
  <?php do { ?>
    <tr>
      <td align="left" style="background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;"><?php echo $row_lablist['Short']; ?> - <?php echo $row_lablist['dshort']; ?></td>
      <td><?php if ($row_lablist['Status'] == 1) {
	  echo "Waiting";
  }else if ($row_lablist['Status'] == 3){ echo "Canceled"; }
  else if ($row_lablist['Status'] == 2){ echo "Done"; }
  else if ($row_lablist['Status'] == 4){ echo "Not paid"; }
  else{ echo "Canceled"; }
	  ?></td>
    </tr>
    <?php } while ($row_lablist = mysql_fetch_assoc($lablist)); ?>
     <?php } ?>
</table>
<table width="100%" border="1" style="border:thin; border-color:#000; border-collapse:collapse;">
<?php if ($totalRows_lablisttwo > 0) { ?>
  <?php do { ?>
    <tr>
      <td align="left" width="80%" style="background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;"><?php echo $row_lablisttwo['Short']; ?> - <?php echo $row_lablisttwo['dshort']; ?></td>
      <td><?php if ($row_lablisttwo['Status'] == 1) {
	  echo "Waiting";
  }else if ($row_lablisttwo['Status'] == 3){ echo "Canceled"; }
  else if ($row_lablisttwo['Status'] == 2){ echo "Done"; }
  else if ($row_lablisttwo['Status'] == 4){ echo "Not paid"; }
  else{ echo "Canceled"; }
	  ?></td>
    </tr>
    <?php } while ($row_lablisttwo = mysql_fetch_assoc($lablisttwo)); ?>
     <?php } ?>
</table>
<table width="100%" border="1" style="border:thin; border-color:#000; border-collapse:collapse;">
   <?php if ($totalRows_lablist2 > 0) { ?>
  <?php do { ?>
    <tr>
      <td width="80%" align="left" style="background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;"><?php echo $row_lablist2['Short']; ?> - <?php echo $row_lablist2['dshort']; ?></td>
      <td width="20%"><?php if ($row_lablist2['Status'] == 1) {
	  echo "Waiting";
  }else if ($row_lablist2['Status'] == 3){ echo "Canceled"; }
  else if ($row_lablist2['Status'] == 2){ echo "Done"; }
  else if ($row_lablist2['Status'] == 4){ echo "Not paid"; }
  else{ echo "Canceled"; }
	  ?></td>
    </tr>
    <?php } while ($row_lablist2 = mysql_fetch_assoc($lablist2)); ?>
     <?php } ?>
</table>
<table width="100%" border="1" style="border:thin; border-color:#000; border-collapse:collapse;">
<?php if ($totalRows_lablisttwo2 > 0) { ?>
  <?php do { ?>
    <tr>
      <td align="left" width="80%" style="background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;"><?php echo $row_lablisttwo2['Short']; ?> - <?php echo $row_lablisttwo2['dshort']; ?></td>
      <td><?php if ($row_lablisttwo2['Status'] == 1) {
	  echo "Waiting";
  }else if ($row_lablisttwo2['Status'] == 3){ echo "Canceled"; }
  else if ($row_lablisttwo2['Status'] == 2){ echo "Done"; }
  else if ($row_lablisttwo2['Status'] == 4){ echo "Not paid"; }
  else{ echo "Canceled"; }
	  ?></td>
    </tr>
    <?php } while ($row_lablisttwo2 = mysql_fetch_assoc($lablisttwo2)); ?>
     <?php } ?>
</table>
</body>
</html>
<?php
mysql_free_result($lablist);

mysql_free_result($lablisttwo);

mysql_free_result($lablist2);

mysql_free_result($lablisttwo2);
?>
