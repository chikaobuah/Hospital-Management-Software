<?php require_once('../Connections/localhost.php'); 
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


if ($mod == "LoadInvestigation") {
	
	
	
	$colname2_lablist = date ('Y-m-d');

$colname_lablist = "-1";
if (isset($_GET['en'])) {
  $colname_lablist = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_lablist = sprintf("SELECT service.Short      , visit_procedure.Enrolee      , visit_procedure.Created      , visit_procedure.Creator      , visit_procedure.Visit      , visit_procedure.Provider,  visit_procedure.procedure AS Pro    , visit_procedure.Appointment      , visit_procedure.Specific_Request      , visit_procedure.Specimen      , visit_procedure.Status      , procedure.Procedure   ,procedure.Short as dshort   , service.Task_FK     , task.Task     , task.Sequence     , procedure.Procedure     , procedure.Id     , service.Service     , task.Id     , visit_procedure.Status FROM     newmed06.procedure     INNER JOIN newmed06.service          ON (procedure.Service_direction_FK = service.Id)     INNER JOIN newmed06.task          ON (service.Task_FK = task.Id)     INNER JOIN newmed06.visit_procedure          ON (visit_procedure.Procedure = procedure.Id)         WHERE Enrolee = %s AND visit_procedure.Status = 1 ", GetSQLValueString($colname_lablist, "int"));
$lablist = mysql_query($query_lablist, $localhost) or die(mysql_error());
$row_lablist = mysql_fetch_assoc($lablist);
$totalRows_lablist = mysql_num_rows($lablist);


  $colname_lablisttwo = $_GET['en'];
  $colname2_lablisttwo = date ('Y-m-d');

mysql_select_db($database_localhost, $localhost);
$query_lablisttwo = sprintf("SELECT service.Short      , visit_procedure.Enrolee      , visit_procedure.Created      , visit_procedure.Creator      , visit_procedure.Visit      , visit_procedure.Provider  ,  visit_procedure.procedure AS Pro    , visit_procedure.Appointment      , visit_procedure.Specific_Request      , visit_procedure.Specimen      , visit_procedure.Status      , procedure.Short as dshort     , service.Task_FK     , task.Task     , task.Sequence     , procedure.Procedure     , procedure.Id     , service.Service     , task.Id     , visit_procedure.Status FROM     newmed06.procedure     INNER JOIN newmed06.service          ON (procedure.Service_direction_FK = service.Id)     INNER JOIN newmed06.task          ON (service.Task_FK = task.Id)     INNER JOIN newmed06.visit_procedure          ON (visit_procedure.Procedure = procedure.Id) WHERE visit_procedure.Status > 1 AND Enrolee = %s AND visit_procedure.Visit LIKE %s ", GetSQLValueString($colname_lablisttwo, "int"),GetSQLValueString("%" . $colname2_lablisttwo . "%", "date"));
$lablisttwo = mysql_query($query_lablisttwo, $localhost) or die(mysql_error());
$row_lablisttwo = mysql_fetch_assoc($lablisttwo);
$totalRows_lablisttwo = mysql_num_rows($lablisttwo);

mysql_select_db($database_localhost, $localhost);
$query_details = "SELECT * FROM visit_result_detail WHERE Groups = 1";
$details = mysql_query($query_details, $localhost) or die(mysql_error());
$row_details = mysql_fetch_assoc($details);
$totalRows_details = mysql_num_rows($details);




echo "<form id=\"form25\" name=\"form25\">";
echo "<input type=\"hidden\" name=\"pr\" id=\"pr\" value=\"";
echo $_GET['pr']; 
echo "\" style=\"width:100%\"/>";
echo "<input type=\"hidden\" name=\"en\" id=\"en\" value=\"";
echo $_GET['en']; 
echo "\" style=\"width:100%\"/>";
echo "<input type=\"hidden\" name=\"sc\" id=\"sc\" value=\"";
echo $_GET['sc']; 
echo "\" style=\"width:100%\"/>";
echo "<input type=\"hidden\" name=\"id\" id=\"id\" value=\"";
echo $_GET['id']; 
echo "\" style=\"width:100%\"/>";
echo "<input type=\"hidden\" name=\"lc2\" id=\"lc2\" value=\"";
echo $_GET['id']; 
echo "\" style=\"width:100%\"/>";
echo "<table width=\"100%\" border=\"1\" style=\"border:thin; border-color:#000; border-collapse:collapse;\">";
echo "<tr>";
echo "<td width=\"2%\">&nbsp;</td>";
echo "<td width=\"78%\"><strong>Laboratory</strong></td>";
echo "<td width=\"20%\">&nbsp;</td>";
echo "</tr>"
 if ($totalRows_lablist > 0) { 
	 do { 
	
echo "<input type=\"hidden\" name=\"procedure_FK\" id=\"procedure_FK\" value=\"";
echo $row_lablist['Pro']; 
echo "\" style=\"width:100%\"/>";
echo "<tr>";
echo "<td align=\"left\">";
if ($_GET['lc2'] != 2)
		
		{
			 echo "<a href=plan.php? class=\"home\" title=\"Select\">&nbsp;</a>";
			} 
echo "</td>";
echo "<td align=\"left\" style=\"background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;\">";
	
echo $row_lablist['Short']; ?> - <?php echo $row_lablist['dshort']; 
echo "</td>";
echo "<td>"; 
	 $colwork = $row_lablist['Status'];
	  
	  mysql_select_db($database_localhost, $localhost);
$query_work = "SELECT * FROM visit_result_detail WHERE Id = $colwork";
$work = mysql_query($query_work, $localhost) or die(mysql_error());
$row_work = mysql_fetch_assoc($work);
$totalRows_work = mysql_num_rows($work);

	if ($_GET['lc2'] == 2)
	{
		
		$disable = "disabled=\"disabled\"";
		
		}
	else
	{
		
		$disable = "";
		
		}

echo "<select name=\"status\" id=\"status\"";
echo $disable;
echo "style=\"width:100%;\" onchange=\"gotourl5();\">";
echo "<option value=\"";
echo $row_work['Id'];
echo "\">";
echo $row_work['Results'];
echo "</option>";
            <?php
do {  
?>
            <option value="<?php echo $row_details['Id']?>"><?php echo $row_details['Results']?></option>
            <?php
} while ($row_details = mysql_fetch_assoc($details));
  $rows = mysql_num_rows($details);
  if($rows > 0) {
      mysql_data_seek($details, 0);
	  $row_details = mysql_fetch_assoc($details);
  }
?>
          </select>
       </td>
    </tr>
    <?php } while ($row_lablist = mysql_fetch_assoc($lablist)); ?>
     <?php } ?>
</table>
<table width="100%" border="1" style="border:thin; border-color:#000; border-collapse:collapse;">
<?php if ($totalRows_lablisttwo > 0) { ?>
  <?php do { ?>
   <input type="hidden" name="procedure_FK" id="procedure_FK" value="<?php echo $row_lablisttwo['Pro']; ?>" style="width:100%"/>
    <tr>
      <td align="left" width="2%"><?php if ($_GET['lc2'] != 2)
		
		{
			 echo "<a href=plan.php? class=\"home\" title=\"Select\">&nbsp;</a>";
			} ?></td>
      <td align="left" width="78%" style="background-color:#DAF4FC; border-top:1px solid #7c7c7c;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-bottom:1px solid #ddd;"><?php echo $row_lablisttwo['Short']; ?> - <?php echo $row_lablisttwo['dshort']; ?></td>
      <td width="20%"><?php 
	  $colwork2 = $row_lablisttwo['Status'];
	  
	  mysql_select_db($database_localhost, $localhost);
$query_work2 = "SELECT * FROM visit_result_detail WHERE Id = $colwork2";
$work2 = mysql_query($query_work2, $localhost) or die(mysql_error());
$row_work2 = mysql_fetch_assoc($work2);
$totalRows_work2 = mysql_num_rows($work2);
	  ?>
        <select name="status2" id="status2" style="width:100%;">
         <option value="<?php echo $row_work2['Id']?>"><?php echo $row_work2['Results']?></option>
          <?php
do {  
?>
          <option value="<?php echo $row_details['Id']?>"><?php echo $row_details['Results']?></option>
          <?php
} while ($row_details = mysql_fetch_assoc($details));
  $rows = mysql_num_rows($details);
  if($rows > 0) {
      mysql_data_seek($details, 0);
	  $row_details = mysql_fetch_assoc($details);
  }
?>
      </select></td>
    </tr>
    <?php } while ($row_lablisttwo = mysql_fetch_assoc($lablisttwo)); ?>
     <?php } ?>
</table>
	
	
	
	
	
	}

?>