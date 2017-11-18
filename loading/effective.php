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

$colname2_effective = "-1";
if (isset($_GET['sc'])) {
  $colname2_effective = $_GET['sc'];
}
$colname_effective = "-1";
if (isset($_SESSION['License'])) {
  $colname_effective = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_effective = sprintf("SELECT Id, Effective,DATE_FORMAT(Effective,  ' %%d-%%b-%%Y') AS formatted_date FROM loading_effective WHERE License = %s AND Service_FK = %s ORDER BY Effective", GetSQLValueString($colname_effective, "int"),GetSQLValueString($colname2_effective, "int"));
$effective = mysql_query($query_effective, $localhost) or die(mysql_error());
$row_effective = mysql_fetch_assoc($effective);
$totalRows_effective = mysql_num_rows($effective);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="../common/datetimepicker_css.js"></script>
</head>

<body>
<form action="effinsert2.php" method="post" name="form19" id="form19">
<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;" class="sample">
  <tr bgcolor="#b0b0b0" >

    <td colspan="2" class="header">Effective</td>
  </tr>
  <?php 
  
  if ($_GET['sc'] > 0){
			$disable = "" ;} else {$disable = "disabled=\"disabled\"" ;}
		 
  
  do { ?>
    <?php $pro2 = $row_effective['Id']; ?>
    <?php 
	if($totalRows_effective>0) {
	  if ($pro2 == $_GET['ef'])
	 {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; 
    
    
   echo "<td>";  $pro2 = $row_effective['Id']; $pro3 = $_GET['ls']; $pro9 = $_GET['sc'];

	  
	if ($_GET['ls'] == 1)
	{$file = "license.php";}
	
	if ($_GET['ls'] == 2)
	{$file = "client.php";}
	
	if ($_GET['ls'] == 3)
	{$file = "program.php";}
	
	if ($_GET['ls'] == 4)
	{$file = "plan.php";}
	
	if ($_GET['ls'] == 5)
	{$file = "principal.php";}
	
	if ($_GET['ls'] == 6)
	{$file = "service.php";}
	
	if ($_GET['ls'] == 7)
	{$file = "drugs.php";}
	
	if ($_GET['ls'] == 8)
	{$file = "procedures.php";}
	
	if ($_GET['ls'] == 9)
	{  
	
		 if ($_GET['sc'] == 7) 
	
		 {$file = "drugs.php";}
		 
		 if ($_GET['sc'] == 8) 
		 {$file = "drugs.php";}
		 
		 if ($_GET['sc'] > 8)
		 {$file = "procedures.php";} 
		 
		  if ($_GET['sc'] < 7)
		 {$file = "procedures.php";} }

		 echo "<a href=\"javascript:third('$pro3', '$pro9', '$pro2','$file');\" class=\"home\" title=\"Select\"></a>";
		 
	
	
	 echo "</td>";
      echo "<td><input type=\"text\" disabled=\"disabled\" name=\"date\" id=\"date\" value=\"";
 	  echo $row_effective['formatted_date']; echo "\" style=\"height:100%;width:99%;\"/></td>
    </tr>";
  }} while ($row_effective = mysql_fetch_assoc($effective)); ?>

    
    <input type="hidden" name="session" id="session" value="<?php echo $_SESSION['License'] ; ?>"/>
    <input type="hidden" name="ls" id="ls" value="<?php echo $_GET['ls'] ; ?>"/>
     <input type="hidden" name="ef" id="ef" value="<?php echo $_GET['ef'] ; ?>"/>
     <input type="hidden" name="sc" id="sc" value="<?php echo $_GET['sc'] ; ?>"/>
    
<tr bgcolor="#e5e5e5" >
      <td align="left" colspan="2" valign="top"><input type="text" <?php echo $disable; ?> name="Start_date9" id="Start_date9" readonly="readonly" 
      <?php echo "onClick=\"validate('$_SESSION[License]','$_GET[ls]','$_GET[ef]','$_GET[sc]');\"" ?> value="" style="height:100%;width:75%;"/>
      <a class="no" href="javascript:NewCssCal('Start_date9','yyyymmdd')"><img src="../images/icons/calendar.png" width="16" height="16" alt="Pick a date" /></a><br></td>
    </tr>
<tr bgcolor="#e5e5e5" >
  <td align="left" colspan="2" valign="top"><div class= "error" id="nodateError">Dates should be like 2010-12-31</div></td>
</tr>
</table>
</form>
</body>
</html>
<?php
mysql_free_result($effective);
?>
