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

mysql_select_db($database_localhost, $localhost);
$query_week = "SELECT * FROM week_every";
$week = mysql_query($query_week, $localhost) or die(mysql_error());
$row_week = mysql_fetch_assoc($week);
$totalRows_week = mysql_num_rows($week);

mysql_select_db($database_localhost, $localhost);
$query_days = "SELECT * FROM week_days";
$days = mysql_query($query_days, $localhost) or die(mysql_error());
$row_days = mysql_fetch_assoc($days);
$totalRows_days = mysql_num_rows($days);

$colname_servicedays = "-1";
if (isset($_SESSION['License'])) {
  $colname_servicedays = $_SESSION['License'];
}
$colname2_servicedays = "-1";
if (isset($_GET['sc'])) {
  $colname2_servicedays = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_servicedays = sprintf("SELECT service_appointment.Id ,service_start.Id as sid,  service_appointment.Status  , service_start.Starts     , service_appointment.Service_FK     , service_appointment.Week_day_FK     , service_appointment.Week_every_FK     , service_appointment.License     , week_every.Every     , week_days.Week_Days     , week_days.Short FROM newmed06.week_every     INNER JOIN newmed06.service_appointment          ON (week_every.Id = service_appointment.Week_every_FK)   INNER JOIN newmed06.service_start          ON (service_appointment.Start_time = service_start.Id)    INNER JOIN newmed06.week_days          ON (week_days.Id = service_appointment.Week_day_FK) WHERE License = %s AND service_appointment.Service_FK = %s", GetSQLValueString($colname_servicedays, "int"),GetSQLValueString($colname2_servicedays, "int"));
$servicedays = mysql_query($query_servicedays, $localhost) or die(mysql_error());
$row_servicedays = mysql_fetch_assoc($servicedays);
$totalRows_servicedays = mysql_num_rows($servicedays);

mysql_select_db($database_localhost, $localhost);
$query_Start = "SELECT * FROM service_start";
$Start = mysql_query($query_Start, $localhost) or die(mysql_error());
$row_Start = mysql_fetch_assoc($Start);
$totalRows_Start = mysql_num_rows($Start);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
  .error {
  font-family: Tahoma;
font-size: 8pt;
  color: red;
  margin-left: 0px;
  display:none;
  float:left;
  }
  
</style>

</head>

<body><form method="post" id="form299" name="form299">
      <input name="session" id="session" type="hidden" value="<?php echo $_SESSION['License']; ?>"/>
  	  <input name="sc" id="sc" type="hidden" value="<?php echo $_GET['sc']; ?>"/>
  
  <table width="100%" align="left" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;" class="sample">
  <tr bgcolor="#b0b0b0">
    <td>&nbsp;</td>
    <td ><font size="+1">Week</font></td>
    <td ><font size="+1">Weekdays</font></td>
    <td ><font size="+1">Commencing</font></td>
  </tr>
  <?php if ($totalRows_servicedays>0){ do { 
   echo "<input name=\"Id\" type=\"hidden\" value=\"";
   echo $row_servicedays['Id']; echo "/>";
  
    echo "<tr bgcolor=\"#e5e5e5\">
      <td>";
	  if ($row_servicedays['Status'] == 1)
	  {
   echo  "<input type=\"checkbox\" name=\"checkbox\" id=\"checkbox\" checked=\"checked\" onClick=\"Delete('$row_servicedays[Id]','$row_servicedays[Week_every_FK]','$row_servicedays[Week_day_FK]','$row_servicedays[sid]','$_GET[sc]','$_SESSION[License]','1');\" />";
	  }
	  else
	  {
		  echo  "<input type=\"checkbox\" name=\"checkbox\" id=\"checkbox\" onClick=\"Delete('$row_servicedays[Id]','$row_servicedays[Week_every_FK]','$row_servicedays[Week_day_FK]','$row_servicedays[sid]','$_GET[sc]','$_SESSION[License]','1');\" />";
		  }
		  
		  
   echo "</td>
      <td valign=\"top\"><select name=\"every\" id=\"every\" style=\"width:100%; height:120%;\"  onchange=\"Delete('$row_servicedays[Id]',this.value,'$row_servicedays[Week_day_FK]','$row_servicedays[sid]','$_GET[sc]','$_SESSION[License]','2');\">";
      echo "<option value=\"";
	  echo $row_servicedays['Week_every_FK']; echo "\">";
	  echo $row_servicedays['Every']; echo "</option>";
	  do {  
?>
      <option value="<?php echo $row_week['Id']?>"><?php echo $row_week['Every']?></option>
      <?php
} while ($row_week = mysql_fetch_assoc($week));
  $rows = mysql_num_rows($week);
  if($rows > 0) {
      mysql_data_seek($week, 0);
	  $row_week = mysql_fetch_assoc($week);
  }

      echo "</select></td>
      <td valign=\"top\" ><select name=\"days\" id=\"days\" style=\"width:100%; height:120%;\" onchange=\"Delete('$row_servicedays[Id]','$row_servicedays[Week_every_FK]',this.value,'$row_servicedays[sid]','$_GET[sc]','$_SESSION[License]','2');\">";
       echo "<option value=\"";
	   echo $row_servicedays['Week_day_FK']; echo "\">";
	   echo $row_servicedays['Week_Days']; echo "</option>";
	   do {  
?>
      <option value="<?php echo $row_days['Id']?>"><?php echo $row_days['Week_Days']?></option>
      <?php
} while ($row_days = mysql_fetch_assoc($days));
  $rows = mysql_num_rows($days);
  if($rows > 0) {
      mysql_data_seek($days, 0);
	  $row_days = mysql_fetch_assoc($days);
  }
     echo "</select></td>
      <td valign=\"top\"><select name=\"startss\" id=\"startss\" style=\"width:100%; height:120%;\" onchange=\"Delete('$row_servicedays[Id]','$row_servicedays[Week_every_FK]','$row_servicedays[Week_day_FK]',this.value,'$_GET[sc]','$_SESSION[License]','2');\">";
       echo "<option value=\"";
	   echo $row_servicedays['sid']; echo "\">";
	   echo $row_servicedays['Starts']; echo "</option>";
	   do {  
?>
        <option value="<?php echo $row_Start['Id']?>"><?php echo $row_Start['Starts']?></option>
        <?php
} while ($row_Start = mysql_fetch_assoc($Start));
  $rows = mysql_num_rows($Start);
  if($rows > 0) {
      mysql_data_seek($Start, 0);
	  $row_Start = mysql_fetch_assoc($Start);
  }
     echo "</select></td>";
    echo "</tr>";
  } while ($row_servicedays = mysql_fetch_assoc($servicedays)); }?>
  
      <tr bgcolor="#e5e5e5">
    <td>&nbsp;</td>
    <td valign="top"><select name="select2" id="select2" style="width:100%; height:120%;">
      <option value="<?php echo $row_servicedays['Week_every_FK']; ?>"><?php echo $row_servicedays['Week_every']; ?></option>
      <?php
do {  
?>
      <option value="<?php echo $row_week['Id']?>"><?php echo $row_week['Every']?></option>
      <?php
} while ($row_week = mysql_fetch_assoc($week));
  $rows = mysql_num_rows($week);
  if($rows > 0) {
      mysql_data_seek($week, 0);
	  $row_week = mysql_fetch_assoc($week);
  }
?>
    </select></td>
    <td valign="top"><select name="select3" id="select3" style="width:100%; height:120%;">
      <option value="<?php echo $row_servicedays['Week_days_FK']; ?>"><?php echo $row_servicedays['Week_Days']; ?></option>
      <?php
do {  
?>
      <option value="<?php echo $row_days['Id']?>"><?php echo $row_days['Week_Days']?></option>
      <?php
} while ($row_days = mysql_fetch_assoc($days));
  $rows = mysql_num_rows($days);
  if($rows > 0) {
      mysql_data_seek($days, 0);
	  $row_days = mysql_fetch_assoc($days);
  }
?>
    </select></td>
    <td valign="top">
      <select name="select6" id="select6" onchange="validate9();" style="width:100%; height:120%;">
       <option value=""></option>
        <?php
do {  
?>
        <option value="<?php echo $row_Start['Id']?>"><?php echo $row_Start['Starts']?></option>
        <?php
} while ($row_Start = mysql_fetch_assoc($Start));
  $rows = mysql_num_rows($Start);
  if($rows > 0) {
      mysql_data_seek($Start, 0);
	  $row_Start = mysql_fetch_assoc($Start);
  }
?>
      </select></td>
  </tr>
      <tr bgcolor="#e5e5e5">
      <td></td>
        <td colspan="3"><div class = "error" id = "Empty3">These fields cannot be empty</div>
        <div class = "error" id = "Empty">These fields cannot be empty</div>
        <div class = "error" id = "Empty2">These fields cannot be empty</div></td>
      </tr>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($week);

mysql_free_result($days);

mysql_free_result($servicedays);

mysql_free_result($Start);
?>
