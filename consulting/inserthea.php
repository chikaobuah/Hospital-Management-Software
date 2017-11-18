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
$lc = $_GET['lc']; 
$id2 = $_GET['id2']; 

$session = $_SESSION['License'];

$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

if ($mod == "LoadHealth"){
	
	$today = date('Y-m-d');


  $colname_familylist = $_GET['en'];

mysql_select_db($database_localhost, $localhost);
$query_familylist = "SELECT     relationship.Relationship     , family_disease.Enrolee     , disease.Disease     , family_disease.Disease AS dis_FK     , family_disease.Status     , family_disease.Created FROM     newmed06.family_disease     INNER JOIN newmed06.disease          ON (family_disease.Disease = disease.Id)     INNER JOIN newmed06.relationship          ON (family_disease.Relationship = relationship.Id) WHERE Enrolee = $colname_familylist AND family_disease.Created LIKE '%". $today ."%' ";
$familylist = mysql_query($query_familylist, $localhost) or die(mysql_error());
$row_familylist = mysql_fetch_assoc($familylist);
$totalRows_familylist = mysql_num_rows($familylist);


echo "<table width=\"100%\" border=\"1\" style=\"border:thin; border-color:#ffffff; border-collapse:collapse;\">";
echo   "<tr>";
echo     "<td width=\"4%\">&nbsp;</td>";
echo     "<td width=\"20%\" align=\"left\"><strong>Relationship</strong></td>";
echo     "<td width=\"73%\" align=\"left\"><strong>Disease</strong></td>";
echo     "<td width=\"3%\">&nbsp;</td>";
echo  "</tr>";
if ($totalRows_familylist > 0){
do { 
echo "<tr>";
echo    "<td>";
 if ($row_familylist['Status'] == 1)
	  {
		  
		   echo "<input type=\"checkbox\" name=\"che\" id=\"che\" checked=\"checked\" value=\"1\" onClick=\"UpdateHealth('$row_familylist[dis_FK]');\" />";
	  }
	  else 
	  { 
	  
	 echo "<input type=\"checkbox\" name=\"che\" id=\"che\" value=\"1\" onClick=\"UpdateHealth('$row_familylist[dis_FK]');\" />";
		  }
echo "</td>";
echo "<td align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
echo $row_familylist['Relationship']; 
echo "</td>";
echo "<td align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
echo $row_familylist['Disease']; 
echo "</td>";
echo "<td>&nbsp;</td>";
echo "</tr>";
 } while ($row_familylist = mysql_fetch_assoc($familylist)); }
echo "</table>";
mysql_free_result($familylist);	

}else if ($mod == "LoadString2"){
	
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


echo "<select name=\"diagnosis_FK\"";
echo $disable;
echo "id=\"diagnosis_FK\" style=\"width:100%; height:22px;\">";

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

	} else if ($mod == "AddHealth"){
		
		$today = date('Y-m-d h:i:s');
		$diagnosis_FK = $_GET['diagnosis_FK'];
		$relate = $_GET['relate'];
		$string = $_GET['string'];

$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO family_disease ( 
	           Created
    , `Status`
    , Disease
    , Relationship
    , Enrolee)
VALUES
('$today','1','$diagnosis_FK','$relate','$en')";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
mysql_close($connection);

echo "1";
exit;
  
}else if ($mod == "UpdateHealth"){
	 
  $colname_allergy2 = $_GET['hea'];
  
mysql_select_db($database_localhost, $localhost);
$query_allergy2 = sprintf("SELECT relationship.Relationship     , family_disease.Enrolee     , disease.Disease     , family_disease.Disease AS dis_FK     , family_disease.Status     , family_disease.Created
FROM newmed06.family_disease     INNER JOIN newmed06.disease          ON (family_disease.Disease = disease.Id)     INNER JOIN newmed06.relationship          ON (family_disease.Relationship = relationship.Id)
WHERE Enrolee = $en AND family_disease.Disease = %s", GetSQLValueString($colname_allergy2, "int"));
$allergy2 = mysql_query($query_allergy2, $localhost) or die(mysql_error());
$row_allergy2 = mysql_fetch_assoc($allergy2);
$totalRows_allergy2 = mysql_num_rows($allergy2);

$hea = $_GET['hea'];

if ($row_allergy2['Status'] == 1)
{
	$che = 0;
	
	} else {
		
		$che = 1;
		
		}
		
$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

$connection2 = mysql_connect("$host", "$username", "$password");
if (!$connection2)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection2);

$sql2="UPDATE family_disease SET Status = '$che' WHERE Enrolee = '$en' AND Disease = '$hea'";

if (!mysql_query($sql2,$connection2))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($connection2);

echo "1";
  exit;

}



?>