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

$colname_note = "-1";
if (isset($_GET['en'])) {
  $colname_note = $_GET['en'];
}
$colname2_note = "-1";
if (isset($_GET['id2'])) {
  $colname2_note = $_GET['id2'];
}
mysql_select_db($database_localhost, $localhost);
$query_note = sprintf("SELECT * FROM visit_note WHERE Enrolee = %s AND Visit LIKE %s", GetSQLValueString($colname_note, "int"),GetSQLValueString("%" . $colname2_note . "%", "date"));
$note = mysql_query($query_note, $localhost) or die(mysql_error());
$row_note = mysql_fetch_assoc($note);
$totalRows_note = mysql_num_rows($note);



$colname_recuser = "-1";
if (isset($_SESSION['username'])) {
  $colname_recuser = $_SESSION['username'];
}
mysql_select_db($database_localhost, $localhost);
$query_recuser = sprintf("SELECT LId FROM `user` WHERE User_Id = %s", GetSQLValueString($colname_recuser, "text"));
$recuser = mysql_query($query_recuser, $localhost) or die(mysql_error());
$row_recuser = mysql_fetch_assoc($recuser);
$totalRows_recuser = mysql_num_rows($recuser);

$colname_count = "-1";
if (isset($_GET['en'])) {
  $colname_count = $_GET['en'];
}
$colname2_count = "-1";
if (isset($_GET['id2'])) {
  $colname2_count = $_GET['id2'];
}
mysql_select_db($database_localhost, $localhost);
$query_count = sprintf("SELECT COUNT(note) as count FROM visit_note WHERE Enrolee = %s AND Visit LIKE %s", GetSQLValueString($colname_count, "int"),GetSQLValueString("%" . $colname2_count . "%", "date"));
$count = mysql_query($query_count, $localhost) or die(mysql_error());
$row_count = mysql_fetch_assoc($count);
$totalRows_count = mysql_num_rows($count);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../common/layout.css" />
<script language="javascript" type="text/javascript" src="../common/consultingAX.js"></script>
<title>Untitled Document</title>
</head>

<body>
<form id="myform" name="myform" method="post">
  <input type="hidden" name="pr" id="pr" value="<?php echo $_GET['pr']; ?>" style="width:100%"/>
 <input type="hidden" name="en" id="en" value="<?php echo $_GET['en']; ?>" style="width:100%"/>
 <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" style="width:100%"/>
 <input type="hidden" name="lc2" id="lc2" value="<?php echo $_GET['lc2']; ?>" style="width:100%"/>
  <input type="hidden" name="creator" id="creator" value="<?php echo $row_recuser['LId']; ?>" size="32" />
   <input type="hidden" name="pnote" id="pnote" value="<?php echo $row_count['count']; ?>" size="32" />


<div id="AllNote"></div>
<!-- <textarea name="note" id="note" cols="25" rows="20" style="width:98%; height:94%; 	border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd; background-image:url(../images/icons/input.png); font-family:'Comic Sans MS', cursive; font-size:14.8px" onChange="change (this)"><?php // echo $row_note['Note'];?></textarea>-->

</form>

</body>
</html>
<?php
mysql_free_result($note);

mysql_free_result($count);
?>
