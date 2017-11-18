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
$sc = $_GET['sc'];
$id = $_GET['id']; 
$st = $_GET['st']; 
$cap = $_GET['cap']; 
$lc2 = $_GET['lc2']; 
$lc = $_GET['lc']; 
$id2 = $_GET['id2']; 
$diagnosis_FK = $_GET['diagnosis_FK'];
$che = $_GET['che'];
$creator = $row_recuser['LId'];
$created = date('Y-m-d h:i:s'); 
$status = 1;


$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

if ($mod == "AddDiagnosis") {
	
$diagnosis_FK = $_GET['diagnosis_FK'];

$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO visit_diagnosis ( 
	           Enrolee
    , Creator
    , Visit
    , Created
    , Diagnosis_FK
    , Status)
VALUES
('$en','$creator','$id','$created','$diagnosis_FK','$status')";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
mysql_close($connection);

echo "1";
exit;
  
} else if ($mod == "UpdateDiagnosis") {
	
$diag = $_GET['diag'];

	$colname_visitdia = "-1";
if (isset($_GET['en'])) {
  $colname_visitdia = $_GET['en'];
}
$colname2_visitdia = "-1";
if (isset($_GET['id2'])) {
  $colname2_visitdia = $_GET['id2'];
}
mysql_select_db($database_localhost, $localhost);
$query_visitdia = sprintf("SELECT     visit_diagnosis.Enrolee     , visit_diagnosis.Creator     , visit_diagnosis.Visit     , visit_diagnosis.Created     , visit_diagnosis.Diagnosis_FK     , visit_diagnosis.Status     , disease.Disease FROM     newmed06.visit_diagnosis     INNER JOIN newmed06.disease          ON (visit_diagnosis.Diagnosis_FK = disease.Id) WHERE visit_diagnosis.Diagnosis_FK = $diag AND Enrolee = %s AND Visit LIKE %s", GetSQLValueString($colname_visitdia, "int"),GetSQLValueString("%" . $colname2_visitdia . "%", "date"));
$visitdia = mysql_query($query_visitdia, $localhost) or die(mysql_error());
$row_visitdia = mysql_fetch_assoc($visitdia);
$totalRows_visitdia = mysql_num_rows($visitdia);

$diag = $_GET['diag'];

if ($row_visitdia['Status'] == 1)
{
	$che = 0;
	
	} else {
		
		$che = 1;
		
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
$sql="UPDATE visit_diagnosis SET `Status` = '$che' WHERE Enrolee = '$en' AND Diagnosis_FK = '$diag' AND Visit LIKE '%". $id ."%' ";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($connection);

echo "1";
exit;

}else if ($mod == "LoadDiagnosis") {
	
	if ($_GET['lc2'] == 2)
	{
		
		$disable = "disabled=\"disabled\"";
		
		}
	else
	{
		
		$disable = "";
		
		}
		
		
$colname_visitdia = "-1";
if (isset($_GET['en'])) {
  $colname_visitdia = $_GET['en'];
}
$colname2_visitdia = "-1";
if (isset($_GET['id2'])) {
  $colname2_visitdia = $_GET['id2'];
}
mysql_select_db($database_localhost, $localhost);
$query_visitdia = sprintf("SELECT     visit_diagnosis.Enrolee     , visit_diagnosis.Creator     , visit_diagnosis.Visit     , visit_diagnosis.Created     , visit_diagnosis.Diagnosis_FK     , visit_diagnosis.Status     , disease.Disease FROM     newmed06.visit_diagnosis     INNER JOIN newmed06.disease          ON (visit_diagnosis.Diagnosis_FK = disease.Id) WHERE Enrolee = %s AND Visit LIKE %s", GetSQLValueString($colname_visitdia, "int"),GetSQLValueString("%" . $colname2_visitdia . "%", "date"));
$visitdia = mysql_query($query_visitdia, $localhost) or die(mysql_error());
$row_visitdia = mysql_fetch_assoc($visitdia);
$totalRows_visitdia = mysql_num_rows($visitdia);

if ( $totalRows_visitdia >= 1){
 
echo "<table width=\"100%\" border = \"1\"; style=\"border:thin; border-color:#ffffff; border-collapse:collapse;\">";
echo "<tr>";
echo "<td align=\"left\" colspan=\"3\">";
echo "<strong>Your have diagnosed this enrolee of:</strong>";
echo "<td></td>";
echo "</tr>";
 do {
echo "<input type=\"hidden\" name=\"dia\" id=\"dia\" value=\"";
echo $row_visitdia['Diagnosis_FK']; 
echo  "\" style=\"width:90%\"/>";

echo	"<tr>";
echo "<td width=\"5%\" align=\"Right\" >";
if ($row_visitdia['Status'] == 1)
	  {
		  
		   echo "<input type=\"checkbox\"";
		   echo $disable;
		   echo "checked=\"checked\" value=\"1\" onClick=\"UpdateDiagnosis('$row_visitdia[Diagnosis_FK]');\" />";

	  }
	  else 
	  { 
	  
	 echo "<input type=\"checkbox\"";
	 echo $disable;
	 echo "value=\"1\" onClick=\"UpdateDiagnosis('$row_visitdia[Diagnosis_FK]');\" />";

		  }
echo "</td>";
echo    "<td colspan=\"2\" width=\"90%\" align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
echo $row_visitdia['Disease']; 
echo "</td>";
echo "<td></td>";
echo "</tr>";
 } while ($row_visitdia = mysql_fetch_assoc($visitdia));
echo "</table>";
}

exit;


} else if ($mod == "LoadString"){
	
	if ($_GET['lc2'] == 2)
	{
		
		$disable = "disabled=\"disabled\"";
		
		}
	else
	{
		
		$disable = "";
		
		}
		
	
$string = $_GET['string'];

mysql_select_db($database_localhost, $localhost);
$query_diagnosis = "SELECT * FROM disease WHERE Disease LIKE '". $string ."%'";
$diagnosis = mysql_query($query_diagnosis, $localhost) or die(mysql_error());
$row_diagnosis = mysql_fetch_assoc($diagnosis);
$totalRows_diagnosis = mysql_num_rows($diagnosis);


echo "<td align=\"left\" width=\"80%\">";  


echo "<select name=\"diagnosis_FK\"";
echo $disable;
echo "id=\"diagnosis_FK\" style=\"width:100%; font-size:11px; height:20px;\">";

echo "<option value=\"";
echo "\">";
echo "</option>";

do {  

echo "<option value=\"";
echo $row_diagnosis['Id'];
echo "\">";
echo $row_diagnosis['Disease'];
echo "</option>";

} while ($row_diagnosis = mysql_fetch_assoc($diagnosis));
  $rows = mysql_num_rows($diagnosis);
  if($rows > 0) {
      mysql_data_seek($diagnosis, 0);
	  $row_diagnosis = mysql_fetch_assoc($diagnosis);
  }
echo "</select>";
echo "</td>";		 

	}
?> 

