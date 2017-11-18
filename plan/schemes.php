<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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

$colname_reclisschemes = "-1";
if (isset($_SESSION['License'])) {
  $colname_reclisschemes = $_SESSION['License'];
}
$colname2_reclisschemes = "-1";
if (isset($_GET['pl'])) {
  $colname2_reclisschemes = $_GET['pl'];
}
$colname3_reclisschemes = "-1";
if (isset($_GET['co'])) {
  $colname3_reclisschemes = $_GET['co'];
}
mysql_select_db($database_localhost, $localhost);
$query_reclisschemes = sprintf("SELECT     scheme.Scheme     , client.Client     , client.Short     , client.LId AS Cli    , scheme.LId     , scheme.Status AS sta FROM     newmed06.program     INNER JOIN newmed06.service          ON (program.Service_FK = service.Id)     INNER JOIN newmed06.scheme          ON (scheme.Program_FK = program.Id)     INNER JOIN newmed06.client          ON (scheme.HMO_FK = client.LId) WHERE Licensee = %s AND service.Id = %s AND scheme.Company_FK = %s ORDER BY scheme.Created", GetSQLValueString($colname_reclisschemes, "int"),GetSQLValueString($colname2_reclisschemes, "int"),GetSQLValueString($colname3_reclisschemes, "int"));
$reclisschemes = mysql_query($query_reclisschemes, $localhost) or die(mysql_error());
$row_reclisschemes = mysql_fetch_assoc($reclisschemes);
$totalRows_reclisschemes = mysql_num_rows($reclisschemes);

?>

</head>

<body>
  <form method="post" name="form2" id="form2">
<table width="100%" align="left" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;" class="sample">
  <tr bgcolor="#b0b0b0">
    <td width="2%" >&nbsp;</td>
    <td width="2%" >&nbsp;</td>
    <td width="43%"  align="center"><font size="+1">Plan</font></td>
    <td width="49%"  align="center"><font size="+1">Client</font></td>
    </tr>
     <?php if ($_GET['co'] >= 0)
		
		{
			$disable = "" ;} 
		 
		 else {$disable = "disabled=\"disabled\"" ;}
		 
			
			
			?>

            
            
            
  <?php do { 
  
  if ($totalRows_reclisschemes>0) {
// echo "<form action=\"update.php\" method=\"post\" id=\"form1\"> ";
  
 $pro2 = $row_reclisschemes['LId']; 
 
	  if ($pro2 == $_GET['sc'])
	 {
		 $color = "#84B8D0";
		 
		  }
		  
		  else
		  {
			  $color = "#e5e5e5";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; 
  
     echo  "<td align=\"left\">";
			$scheme = $row_reclisschemes['LId'];
			$plan = $_GET['pl'];
			$id = $_GET['id'];
			$company = $_GET['co'];
			
			 if ($company >= 0)
		
		{
			 echo "<a href=\"javascript:third('$company','$plan','$scheme','$id');\" class=\"home\" title=\"Select\">&nbsp;</a>";
			}
			
				
		echo "</td>";
     echo "<td align=\"left\">";

	if ($row_reclisschemes['sta'] == 1)
	  {
		  
		   echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" checked=\"checked\" value=\"1\" onClick=\"EditPla('$pro2','$row_reclisschemes[Scheme]','$row_reclisschemes[Cli]',this.value,'$_GET[co]','$_GET[pl]','$_GET[id]','$_GET[sc]','1');\"/>";
	  }
	  else 
	  { 
	  
	 echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" value=\"0\" onClick=\"EditPla('$pro2','$row_reclisschemes[Scheme]','$row_reclisschemes[Cli]',this.value,'$_GET[co]','$_GET[pl]','$_GET[id]','$_GET[sc]','1');\" />";
		  }
		   
		  echo "</td>";
      echo "<td align=\"left\">";
          echo "<input type=\"text\" name=\"scheme\"  id=\"scheme\" value=\"";
		  echo $row_reclisschemes['Scheme']; 
		  echo " \"style=\" font-size:10px; height:100%;width:100%;min-height:13px;\" onchange=\"EditPla('$pro2',this.value,'$row_reclisschemes[Cli]','$row_reclisschemes[sta]','$_GET[co]','$_GET[pl]','$_GET[id]','$_GET[sc]','2');\" />";
    echo "</td>
      <td align=\"left\">";
           echo "<select name=\"client\" id=\"client\" onchange=\"EditPla('$pro2','$row_reclisschemes[Scheme]',this.value,'$row_reclisschemes[sta]','$_GET[co]','$_GET[pl]','$_GET[id]','$_GET[sc]','2');\" style=\"font-size:10px; height:19px; width:100%;\">";
            echo "<option value=\""; echo $row_reclisschemes['Cli']; 
			echo "\">";
			echo $row_reclisschemes['Client']; 
			echo "</option>";
              
do {  

            echo "<option value=\"";
			echo $row_rec1['LId'];
            echo "\">";
			echo $row_rec1['Client'];
			echo "</option>";
             
} while ($row_rec1 = mysql_fetch_assoc($rec1));
  $rows = mysql_num_rows($rec1);
  if($rows > 0) {
      mysql_data_seek($rec1, 0);
	  $row_rec1 = mysql_fetch_assoc($rec1);
  }
      
	  echo "</select>";
     
        
     echo "</td>";
//	 echo "</form>";
      echo "</tr>";
  }} while ($row_reclisschemes = mysql_fetch_assoc($reclisschemes)); ?>
    
  
    <tr bgcolor="#e5e5e5">
      <td align="left">&nbsp;</td>
      <td align="left" valign="top"><input type="checkbox" name="che" id="checkbox"  <?php echo $disable; ?> checked="checked" value = "1"/></td>
      <td align="left" valign="top"><input type="text" name="scheme2" <?php echo $disable; ?> id="scheme2" value="" style=" min-height:16px;height:100%;width:100%;"/></td>
      <td align="left" valign="top">
            <select name="client" id="client" style="height:21px; width:100%;" <?php echo $disable; ?> onchange="validate4(this.value);">
            <option value="<?php echo $row_reclisschemes['Lid']; ?>"><?php echo $row_reclisschemes['Client']; ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_rec1['LId']?>"><?php echo $row_rec1['Client']?></option>
              <?php
} while ($row_rec1 = mysql_fetch_assoc($rec1));
  $rows = mysql_num_rows($rec1);
  if($rows > 0) {
      mysql_data_seek($rec1, 0);
	  $row_rec1 = mysql_fetch_assoc($rec1);
  }
?>
            </select>
            <input type="hidden" name="company" id="company" value="<?php echo $_GET['co']; ?>" style="height:100%;width:99%;"/>
        <input type="hidden" name="scheme_FK" id="scheme_FK" value="<?php echo $_GET['sc']; ?>" style="height:100%;width:99%;"/>
        <input type="hidden" name="plan" id="plan" value="<?php echo $_GET['pl']; ?>" style="height:100%;width:99%;"/> 
        <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" style="height:100%;width:99%;"/>   
      </td>
     
  </tr>
    <tr bgcolor="#e5e5e5">
      <td align="left">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top"><div class= "error" id="Error7">These field cannot be empty</div></td>
      <td align="left" valign="top"><div class= "error" id="Error8">These field cannot be empty</div></td>
    </tr>
    
</table> 
</form>            



</body>
</html>
<?php
mysql_free_result($reclisschemes);
?>
