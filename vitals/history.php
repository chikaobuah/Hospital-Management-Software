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


$colname_history = "-1";
if (isset($_GET['en'])) {
  $colname_history = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_history = sprintf("SELECT visit.Created     ,  visit.Principal     ,   visit.Scheme     ,   visit.Enrolee     ,      DATE_FORMAT(visit.Created, '%%D %%b %%Y') AS formatted_date  ,   visit.LMP     ,   visit.Ticket_No     ,   visit.Loading     ,   visit.upsize_ts     ,   visit.Status      ,   visit.Principal     ,   visit.Scheme FROM newmed06.visit WHERE Enrolee = %s ORDER BY Created DESC", GetSQLValueString($colname_history, "int"));
$history = mysql_query($query_history, $localhost) or die(mysql_error());
$row_history = mysql_fetch_assoc($history);
$totalRows_history = mysql_num_rows($history);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" bgcolor="#D0E4FB">
 <tr>
      <td align="center"><strong>History</strong></td>
    </tr>
  <?php do { ?>
 
    <?php $pro7 = $row_history['Created']; ?>
      <?php 
	  if ($pro7 == $_GET['id2'])
	  {
		 $color = "#FFFFFF";
		 
		  }
		  
		  else
		  {
			  $color = "#D0E4FB";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
              
      <td align="left">
      <?php $VisitID2 = $row_history['Created']; ?>
       <?php $Principal = $row_history['Principal']; ?>
       <?php $Scheme = $row_history['Scheme']; ?>
	  <?php $Capitation = $_GET['cap'];
	  
			$Enrolee = $_GET['en'];
			$status = $_GET['st'];
			$VisitID = $_GET['id'];
			$lc2 = $_GET['lc2'];
			$lc = $_GET['lc'];
 
echo "<a href=\"javascript:selectt('$Principal','$Enrolee', '$Scheme', '$Capitation', '$lc2', '$lc', '$status', '$VisitID', '$VisitID2','diagnosis.php');\">";?><font size = -2><?php echo $row_history['formatted_date']; ?></font></a></td>
    </tr>
    <?php } while ($row_history = mysql_fetch_assoc($history)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($history);
?>
