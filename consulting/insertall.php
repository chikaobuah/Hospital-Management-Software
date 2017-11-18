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
$che = $_GET['che'];
$drug_FK = $_GET['drug_FK'];

$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

if ($mod == "AddAllergy"){
	
	$status = 1;
	$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql="INSERT INTO enrolee_allergy ( 
    Drug
    , Enrolee
    , `Status`
    )
VALUES
('$drug_FK','$en','$status')";
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($connection);
echo "1";
  exit;
  
} else if ($mod == "UpdateAllergy"){
	 
  $colname_allergy2 = $_GET['alg'];
  
mysql_select_db($database_localhost, $localhost);
$query_allergy2 = sprintf("SELECT drug.Drug , enrolee_allergy.Status, enrolee_allergy.id FROM newmed06.enrolee_allergy     INNER JOIN newmed06.enrolee          ON (enrolee_allergy.Enrolee = enrolee.LId)     INNER JOIN newmed06.drug          ON (enrolee_allergy.Drug = drug.Id) WHERE enrolee_allergy.id = %s", GetSQLValueString($colname_allergy2, "int"));
$allergy2 = mysql_query($query_allergy2, $localhost) or die(mysql_error());
$row_allergy2 = mysql_fetch_assoc($allergy2);
$totalRows_allergy2 = mysql_num_rows($allergy2);

$alg = $_GET['alg'];

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

$sql2="UPDATE enrolee_allergy SET Status = '$che' WHERE id = '$alg'";

if (!mysql_query($sql2,$connection2))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($connection2);

echo "1";
  exit;

}else if ($mod == "LoadAllergy"){
	
	
	if ($_GET['lc2'] == 2)
	{
		
		$disable = "disabled=\"disabled\"";
		
		}
	else
	{
		
		$disable = "";
		
		}
	
	
	
	$colname_allergy = "-1";
if (isset($_GET['en'])) {
  $colname_allergy = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_allergy = sprintf("SELECT drug.Drug , enrolee_allergy.Status, enrolee_allergy.id FROM newmed06.enrolee_allergy     INNER JOIN newmed06.enrolee          ON (enrolee_allergy.Enrolee = enrolee.LId)     INNER JOIN newmed06.drug          ON (enrolee_allergy.Drug = drug.Id) WHERE enrolee.LId = %s AND  enrolee_allergy.Status = 1", GetSQLValueString($colname_allergy, "int"));
$allergy = mysql_query($query_allergy, $localhost) or die(mysql_error());
$row_allergy = mysql_fetch_assoc($allergy);
$totalRows_allergy = mysql_num_rows($allergy);

$sel = $_GET['sel'];

mysql_select_db($database_localhost, $localhost);
$query_services3 = "SELECT         service.Id 	, service.Service ,service.Short FROM     newmed06.drug     INNER JOIN newmed06.service          ON (drug.Service_direction_FK = service.Id) WHERE service.Id = $sel GROUP BY service.Service";
$services3 = mysql_query($query_services3, $localhost) or die(mysql_error());
$row_services3 = mysql_fetch_assoc($services3);
$totalRows_services3 = mysql_num_rows($services3);

mysql_select_db($database_localhost, $localhost);
$query_services2 = "SELECT         service.Id 	, service.Service ,service.Short FROM     newmed06.drug     INNER JOIN newmed06.service          ON (drug.Service_direction_FK = service.Id) GROUP BY service.Service";
$services2 = mysql_query($query_services2, $localhost) or die(mysql_error());
$row_services2 = mysql_fetch_assoc($services2);
$totalRows_services2 = mysql_num_rows($services2);

$sel = $_GET['sel'];

mysql_select_db($database_localhost, $localhost);
$query_recdrug = "SELECT
    drug.Drug
    , drug.Id AS drug_FK
    , drug.Blocks
    , drug.Current_quantity
    , drug.Reorder_quantity
    , service.Id
    , service.Short
FROM
    newmed06.drug
    INNER JOIN newmed06.service 
        ON (drug.Service_direction_FK = service.Id) WHERE service.Id = $sel";
$recdrug = mysql_query($query_recdrug, $localhost) or die(mysql_error());
$row_recdrug = mysql_fetch_assoc($recdrug);
$totalRows_recdrug = mysql_num_rows($recdrug);


echo "<table width=\"100%\" border=\"1\" style=\"border:thin; border-color:#FFF; border-collapse:collapse;\">";
  
echo "<tr>";
echo "<td width=\"10%\" colspan =\"2\" align=\"left\"><strong>Drugs:</strong></td>";
echo "<td width=\"90%\">&nbsp;</td>";
echo "</tr>";
if ($totalRows_allergy > 0)
  {
 do { 
echo "<tr>";
echo "<td width=\"5%\" align=\"right\" >";
if ($row_allergy['Status'] == 1){
echo "<input name=\"checkbox\"";
echo $disable;
echo "checked=\"checked\" type=\"checkbox\" value=\"1\" onclick=\"UpdateAllergy('$row_allergy[id]');\"/>";
		  }else { echo "<input name=\"checkbox\"";
		  echo $disable;
		  echo "type=\"checkbox\" value=\"1\" onclick=\"UpdateAllergy('$row_allergy[id]');\"/>";
			  }
echo "</td>";
echo "<td width=\"90%\" align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
echo $row_allergy['Drug']; 
echo "</td>";
echo "</tr>";

} while ($row_allergy = mysql_fetch_assoc($allergy)); }
echo "</table>";

echo "<table width=\"100%\" style=\"border:thin; border-color:#FFF; border-collapse:collapse;\">";
echo "<input type=\"hidden\" name=\"allergy_FK\" id=\"allergy_Fk\" value=\"";
echo $row_allergy['id']; 
echo "\" size=\"32\" />";
echo "<tr>";
echo "<td align=\"left\" width=\"20%\" ><select name=\"select\"";
echo $disable;
echo "id=\"select\" style=\"width:100%;\" onchange=\"gotourl2(this)\">";

echo "<option value=\"";
echo $row_services3['Id'];
echo "\">";
echo $row_services3['Short'];
echo "</option>";

do {  
echo "<option value=\"";
echo $row_services2['Id'];
echo "\">";
echo $row_services2['Short'];
echo "</option>";

} while ($row_services2 = mysql_fetch_assoc($services2));
  $rows = mysql_num_rows($services2);
  if($rows > 0) {
      mysql_data_seek($services2, 0);
	  $row_services2 = mysql_fetch_assoc($services2);
  }

echo "</select>";
echo "</td>";
echo "<td align=\"left\" width=\"70%\" >";
echo "<select name=\"Drug\"";
echo $disable;
echo "style=\"width:100%;\">";

do {  

echo "<option value=\"";
echo $row_recdrug['drug_FK'];
echo "\">";
echo $row_recdrug['Drug'];
echo "</option>";

} while ($row_recdrug = mysql_fetch_assoc($recdrug));
  $rows = mysql_num_rows($recdrug);
  if($rows > 0) {
      mysql_data_seek($recdrug, 0);
	  $row_recdrug = mysql_fetch_assoc($recdrug);
  }

echo "</select></td>";
echo "<td align = \"left\"  width=\"10%\"><input type=\"button\"";
echo $disable;
echo "onclick=\"AddAllergy();\" value=\"Add\" title=\"Add\" style=\"color: #07c;
        padding: 0px;
        letter-spacing: 0px;
        font-size:8px;
         width:50px;
         height:23px;\"/></td>";
echo "</tr>";
echo "<tr>";
echo "<td nowrap=\"nowrap\" align=\"right\">&nbsp;</td>";
echo "<td></td>";
echo "</tr>";
echo "</table>";
		
	
	
	}
?> 

