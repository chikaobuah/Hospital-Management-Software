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


$colname_Recordset22 = "-1";
if (isset($_GET['sc'])) {
  $colname_Recordset22 = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset22 = sprintf("SELECT enrolee_scheme.Principal     , enrolee_scheme.Scheme     , enrolee_scheme.Status ,enrolee.LId    , enrolee.Surname     , enrolee.First_Name     , enrolee.Other_Name FROM newmed06.enrolee_scheme     INNER JOIN newmed06.enrolee          ON (enrolee_scheme.Enrolee = enrolee.LId) WHERE Scheme = %s  ", GetSQLValueString($colname_Recordset22, "int"));
$Recordset22 = mysql_query($query_Recordset22, $localhost) or die(mysql_error());
$row_Recordset22 = mysql_fetch_assoc($Recordset22);
$totalRows_Recordset22 = mysql_num_rows($Recordset22);

$date = date('Y-m-d h:m:s');

$colname_Recordset2223 = "-1";
if (isset($_GET['sc'])) {
  $colname_Recordset2223 = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset2223 = sprintf("SELECT Capitation FROM scheme_capitation WHERE Scheme = %s AND Effective <= '$date' ", GetSQLValueString($colname_Recordset2223, "int"));
$Recordset2223 = mysql_query($query_Recordset2223, $localhost) or die(mysql_error());
$row_Recordset2223 = mysql_fetch_assoc($Recordset2223);
$totalRows_Recordset2223 = mysql_num_rows($Recordset2223);


$colname_count = "-1";
if (isset($_GET['sc'])) {
  $colname_count = $_GET['sc'];
}
$colname2_count = "-1";
if (isset($_GET['id'])) {
  $colname2_count = $_GET['id'];
}
mysql_select_db($database_localhost, $localhost);
$query_count = sprintf("SELECT COUNT(*) AS 'count' FROM enrolee_scheme_status WHERE Scheme_FK = %s AND enrolee_scheme_status.Status = 1 AND enrolee_scheme_status.Effective_FK = %s", GetSQLValueString($colname_count, "int"),GetSQLValueString($colname2_count, "int"));
$count = mysql_query($query_count, $localhost) or die(mysql_error());
$row_count = mysql_fetch_assoc($count);
$totalRows_count = mysql_num_rows($count);

$colname_cap = "-1";
if (isset($_GET['id'])) {
  $colname_cap = $_GET['id'];
}
mysql_select_db($database_localhost, $localhost);
$query_cap = sprintf("SELECT * FROM scheme_payment WHERE Id = %s", GetSQLValueString($colname_cap, "int"));
$cap = mysql_query($query_cap, $localhost) or die(mysql_error());
$row_cap = mysql_fetch_assoc($cap);
$totalRows_cap = mysql_num_rows($cap);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
tr.class :hover {background: #C6DBFB;}
</style>
</head>

<body>

  <?php do { ?>
    
      <?php $capt = $row_Recordset2223['Capitation']; ?>
   
    <?php } while ($row_Recordset2223 = mysql_fetch_assoc($Recordset2223)); ?>
<table width="100%" align="left" bgcolor="#e5e5e5">
  <tr bgcolor="#b0b0b0">
    <?php 
	
	
	if ($row_cap['Paying'] != 0)
	
	{
		
										$nos = ($row_cap['Amount'] / $row_cap['Paying']); 
										$count = $row_count['count']; 
	
										if ($nos > $count)
										{
											 $sub = $nos - $count;
											echo "<td bgcolor=\"#FF3300\" colspan=\"2\" >";
											echo "you have registered"; 
											echo "&nbsp;"; 
											echo $sub; 
											echo "&nbsp;"; 
											echo "LESS enrolees than where paid for";
											echo "</td>";
											}
	
											if ($nos < $count)
										{
											 $sub = $count - $nos;
											 echo "<td bgcolor=\"#FF3300\" colspan=\"2\" >";
											echo "you have registered "; 
											echo "&nbsp;"; 
											echo $sub; 
											echo "&nbsp;";
											echo "MORE enrolees than where paid for";
											echo "</td>";
											}
	
											if ($nos = $count)
										{
											 
											echo "";
											}
	
		}
		

	?>
  </tr>
  <tr>
    <td bgcolor="#b0b0b0" colspan="2" ><strong><?php echo $row_count['count']; ?>&nbsp;Enrolee(s) &nbsp;(<?php echo $row_cap['Paying']; ?>)&nbsp;Total =&nbsp;<?php echo $total = $row_cap['Paying']*$row_count['count']; ?></strong></td>
  </tr>
   
   <form action="update4.php" method="post" id="form6">
   <input type="hidden" name="enrolee" id="enrolee" value="<?php echo $row_Recordset22['LId']; ?>"/>
  <input type="hidden" name="company" id="company" value="<?php echo $_GET['co']; ?>"/>
  <input type="hidden" name="plan" id="plan" value="<?php echo $_GET['pl']; ?>"/>
  <input type="hidden" name="scheme" id="scheme" value="<?php echo $_GET['sc']; ?>"/>
  <input type="hidden" name="ef" id="ef" value="<?php echo $_GET['id']; ?>"/>
  <input type="hidden" name="license" id="license" value="<?php echo $_SESSION['License']; ?>"/>
  <tr height="5px" class="class">
     
    <td width="1%" align="left" bgcolor="#e5e5e5"><input type="checkbox" name="che" id="checkbox" value="1"onClick="submit();" /><strong>Select all</strong></td> 
  </tr>
  </form> 
  <?php do { ?>
  <form action="update3.php" method="post" id="form5">
  <input type="hidden" name="enrolee" id="enrolee" value="<?php echo $row_Recordset22['LId']; ?>"/>
  <input type="hidden" name="company" id="company" value="<?php echo $_GET['co']; ?>"/>
  <input type="hidden" name="plan" id="plan" value="<?php echo $_GET['pl']; ?>"/>
  <input type="hidden" name="scheme" id="scheme" value="<?php echo $_GET['sc']; ?>"/>
  <input type="hidden" name="ef" id="ef" value="<?php echo $_GET['id']; ?>"/>
  <input type="hidden" name="license" id="license" value="<?php echo $_SESSION['License']; ?>"/>
   
  <tr class="class">
    <td width="96%" align="left" bgcolor="#e5e5e5" style="padding:3px 1px;">
    
    
     <?php 
$colname_loading = $row_Recordset22['LId'];
$colname2_loading = $_GET['sc'];
$colname3_loading = $_GET['id'];

mysql_select_db($database_localhost, $localhost);
$query_loading = sprintf("SELECT * FROM enrolee_scheme_status WHERE Enrolee_FK = %s AND Scheme_FK =%s AND Effective_FK = %s", GetSQLValueString($colname_loading, "int"),GetSQLValueString($colname2_loading, "int"),GetSQLValueString($colname3_loading, "int"));
$loading = mysql_query($query_loading, $localhost) or die(mysql_error());
$row_loading = mysql_fetch_assoc($loading);
$totalRows_loading = mysql_num_rows($loading);
$sta = $row_loading['Status'];
      ?>
      <input name="Id2" type="hidden" value="<?php echo $row_loading['Id']; ?>" style="width:99%"/>
      <input name="sta" type="hidden" value="<?php echo $row_loading['Sta'];?>" style="width:99%"/>
      
	<?php if ($row_loading['Status'] == 1)
	  {
		  
		   echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" checked=\"checked\" value=\"1\" onClick=\"submit();\" />";
	  }
	  else 
	  { 
	  
	 echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" value=\"1\" onClick=\"submit();\" />";
		  }
		   ?>
    
    
    
    <font size="-2"><?php echo $row_Recordset22['Surname']; ?>&nbsp;<?php echo $row_Recordset22['First_Name']; ?>&nbsp;<?php echo $row_Recordset22['Other_Name']; ?>&nbsp;</font></td>

  </tr></form>
  <?php } while ($row_Recordset22 = mysql_fetch_assoc($Recordset22)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset22);

mysql_free_result($Recordset2223);

mysql_free_result($cap);
?>
