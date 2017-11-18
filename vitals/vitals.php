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



$maxRows_recvitals = 1000;
$pageNum_recvitals = 0;
if (isset($_GET['pageNum_recvitals'])) {
  $pageNum_recvitals = $_GET['pageNum_recvitals'];
}
$startRow_recvitals = $pageNum_recvitals * $maxRows_recvitals;

$colname_recvitals = "-1";
if (isset($_GET['id2'])) {
  $colname_recvitals = $_GET['id2'];
}
$colname2_recvitals = "-1";
if (isset($_GET['en'])) {
  $colname2_recvitals = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_recvitals = sprintf("SELECT vital.Vital     , vital.Measure  , vital.Short   , visit_vital.Reading FROM newmed06.visit_vital     INNER JOIN newmed06.visit          ON (visit_vital.Enrolee = visit.Enrolee)     INNER JOIN newmed06.vital          ON (visit_vital.Vital_FK = vital.Id) WHERE visit_vital.Visit LIKE %s AND visit_vital.Enrolee =  %s GROUP BY visit_vital.Created", GetSQLValueString("%" . $colname_recvitals . "%", "date"),GetSQLValueString($colname2_recvitals, "int"));
$query_limit_recvitals = sprintf("%s LIMIT %d, %d", $query_recvitals, $startRow_recvitals, $maxRows_recvitals);
$recvitals = mysql_query($query_limit_recvitals, $localhost) or die(mysql_error());
$row_recvitals = mysql_fetch_assoc($recvitals);

if (isset($_GET['totalRows_recvitals'])) {
  $totalRows_recvitals = $_GET['totalRows_recvitals'];
} else {
  $all_recvitals = mysql_query($query_recvitals);
  $totalRows_recvitals = mysql_num_rows($all_recvitals);
}
$totalPages_recvitals = ceil($totalRows_recvitals/$maxRows_recvitals)-1;



mysql_select_db($database_localhost, $localhost);
$query_recvitalslist = "SELECT * FROM vital";
$recvitalslist = mysql_query($query_recvitalslist, $localhost) or die(mysql_error());
$row_recvitalslist = mysql_fetch_assoc($recvitalslist);
$totalRows_recvitalslist = mysql_num_rows($recvitalslist);


$colname_recuser = "-1";
if (isset($_SESSION['username'])) {
  $colname_recuser = $_SESSION['username'];
}
mysql_select_db($database_localhost, $localhost);
$query_recuser = sprintf("SELECT LId FROM `user` WHERE User_Id = %s", GetSQLValueString($colname_recuser, "text"));
$recuser = mysql_query($query_recuser, $localhost) or die(mysql_error());
$row_recuser = mysql_fetch_assoc($recuser);
$totalRows_recuser = mysql_num_rows($recuser);
?>
<script language="javascript" type="text/javascript" src="../common/consultingAX.js"></script>
<style type="text/css">
table.collapse {border-collapse: collapse;}
</style>
 <form action="insertvit.php" method="post" name="form1" id="form1">
 <input type="hidden" name="pr" id="pr" value="<?php echo $_GET['pr']; ?>" style="width:100%"/>
 <input type="hidden" name="en" id="en" value="<?php echo $_GET['en']; ?>" style="width:100%"/>
 <input type="hidden" name="sc" id="sc" value="<?php echo $_GET['sc']; ?>" style="width:100%"/>
 <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" style="width:100%"/>
 <input type="hidden" name="st" id="st" value="<?php echo $_GET['st']; ?>" style="width:100%"/>
 <input type="hidden" name="cap" id="cap" value="<?php echo $_GET['cap']; ?>" style="width:100%"/>
 <input type="hidden" name="lc2" id="lc2" value="<?php echo $_GET['lc2']; ?>" style="width:100%"/>
 <input type="hidden" name="lc" id="lc" value="<?php echo $_GET['lc']; ?>" style="width:100%"/>
  <input type="hidden" name="id2" id="id2" value="<?php echo $_GET['id2']; ?>" style="width:100%"/>
  
<table align="left" width="100%" style="border:thin; border-color:#FFF; border-collapse:collapse;" >
    <tr>
      <td width="31%" align="left"><strong>Vitals</strong></td>
      <td width="33%" align="left">&nbsp;</td>
      <td width="36%">&nbsp;</td>
    </tr>
    </table>
    <div id="AllVital"></div>
    <table align="left" width="100%" style="border:thin; border-color:#FFF; border-collapse:collapse;">
        <tr>
        <?php 
	if ($_GET['lc2'] == 2)
	{
		
		$disable = "disabled=\"disabled\"";
		
		}
	else
	{
		
		$disable = "";
		
		} ?>
        
          <td width="470"><select <?php echo $disable;?>  name="vitals_fk" id="vitals_fk" style="width:100%; font-size:11px; height:20px;">
          <option value=" "> </option>
            <?php
do {  
?>
            <option value="<?php echo $row_recvitalslist['Id']?>"><?php echo $row_recvitalslist['Short']?><?php echo "    "?><?php echo $row_recvitalslist['Measure']?></option>
            <?php
} while ($row_recvitalslist = mysql_fetch_assoc($recvitalslist));
  $rows = mysql_num_rows($recvitalslist);
  if($rows > 0) {
      mysql_data_seek($recvitalslist, 0);
	  $row_recvitalslist = mysql_fetch_assoc($recvitalslist);
  }
?>
          </select></td>
          <td width="207" align="left"><input <?php echo $disable;?> type="text" name="reading" id="reading" style="width:100%;"/></td>
          <td width="28" align="left"><input type="button" <?php echo $disable; ?> onclick="AddVital();" value="Add" title="Add" style="color: #07c;
        padding: 0px;
        letter-spacing: 0px;
        font-size:8px;
         width:25px;
         height:23px;"/></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="hidden" name="created" id="created" value="<?php echo date('Y-m-d h:m:s'); ?>" size="32" /></td>
          <td><input type="hidden" name="creator" id="creator" value="<?php echo $row_recuser['LId']; ?>" size="32" /></td>
        </tr>
  </table>
</form> 
<script>
LoadVital();
</script>
 <?php
mysql_free_result($recvitals);
?>
