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


$colname_recuser = "-1";
if (isset($_SESSION['username'])) {
  $colname_recuser = $_SESSION['username'];
}
mysql_select_db($database_localhost, $localhost);
$query_recuser = sprintf("SELECT LId FROM `user` WHERE User_Id = %s", GetSQLValueString($colname_recuser, "text"));
$recuser = mysql_query($query_recuser, $localhost) or die(mysql_error());
$row_recuser = mysql_fetch_assoc($recuser);
$totalRows_recuser = mysql_num_rows($recuser);

if (isset($_POST['mod'])){
$mod = $_POST['mod'];}
else{
$mod = $_GET['mod'];}

$pr = $_GET['pr'];
$en = $_GET['en'];
$id = $_GET['id'];  
$lc2 = $_GET['lc2']; 



// loadnote 

if ($mod == "LoadNote"){
	
$proc = $_GET['proc'];
  $colname_note = $_GET['en'];

  $colname2_note = $_GET['id'];

mysql_select_db($database_localhost, $localhost);
$query_note = sprintf("SELECT * FROM visit_note WHERE Enrolee = %s AND Visit LIKE %s", GetSQLValueString($colname_note, "int"),GetSQLValueString("%" . $colname2_note . "%", "date"));
$note = mysql_query($query_note, $localhost) or die(mysql_error());
$row_note = mysql_fetch_assoc($note);
$totalRows_note = mysql_num_rows($note);


echo "<textarea name=\"note\" id=\"note\" cols=\"25\" rows=\"20\" style=\"width:98%; height:94%; 	border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd; font-family:'Comic Sans MS', cursive;  background-color:#DAF4FC; font-size:13px\" onChange=\"change (this)\">";

echo $row_note['Note'];

echo "</textarea>";

}else if ($mod == "AddNote"){
	
	$note = $_GET['note'];
$creator = $_GET['creator'];
$created = date('Y-m-d h:m:s'); 
$pnote = $_GET['pnote'];


if ($pnote == 0)
{
	$query = "INSERT INTO visit_note ( 
	       Enrolee
    , Created
    , Creator
    , Visit
    , Note)
VALUES
('$en','$created','$creator','$id','$note')";
	
	}
if ($pnote != 0)
{
	$query = "UPDATE visit_note SET Note = '$note' WHERE Enrolee = $en AND Visit LIKE '%". $id ."%'";
	
	}
	
	
	
	
	
	
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql= $query;
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
mysql_close($connection);
}
echo "1";
  exit;

?> 

