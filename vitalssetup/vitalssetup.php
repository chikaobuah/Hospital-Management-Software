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

$colname_vitals = "-1";
if (isset($_SESSION['License'])) {
  $colname_vitals = $_SESSION['License'];
}
mysql_select_db($database_localhost, $localhost);
$query_vitals = sprintf("SELECT     vital.Vital     , vital.Id     , vital.Measure AS Measure_FK     , vital.License     , measure.Measure FROM     newmed06.vital     INNER JOIN newmed06.measure          ON (vital.Measure = measure.Id) WHERE License = %s", GetSQLValueString($colname_vitals, "int"));
$vitals = mysql_query($query_vitals, $localhost) or die(mysql_error());
$row_vitals = mysql_fetch_assoc($vitals);
$totalRows_vitals = mysql_num_rows($vitals);

mysql_select_db($database_localhost, $localhost);
$query_measure = "SELECT * FROM measure";
$measure = mysql_query($query_measure, $localhost) or die(mysql_error());
$row_measure = mysql_fetch_assoc($measure);
$totalRows_measure = mysql_num_rows($measure);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
		<meta http-equiv="pragma" content="NO-CACHE" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
		<title>Newmed</title>
		<link rel="stylesheet" href="../common/layout.css" />
  <!--[if lte IE 6]>
  <link href="/static/css/layout.ie6.css" rel="stylesheet" type="text/css" />
  <![endif]-->
  <script type="text/javascript" src="common/jquery.min.js"></script>
    <script type="text/javascript">
      jQuery(function() {
        jQuery('.tabs .tab').click(function() {
          jQuery(this).siblings().removeClass('selected');
          jQuery(this).addClass('selected');  
        });
        jQuery('#links .section').hover(function() {
          
          jQuery(this).parent().addClass('hover');
        });
      });
    </script>		
	</head>
<body>
     <div id="header" align="right"><?php 
	echo "".$_SESSION["Rolename"]." : ".$_SESSION["userid"]." || <a href='../logout.php'>Log Out</a> "; 
?>
  <img alt="" class="gsfx_img_png" style="width: 51;height: 17;" src="../images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" /></div>
    <div id="links">
            
             <!-- <li class="selected"><a class="section" href="http://www.narutofan.com/">Main </a></li> -->   
  <?php   
	$lrolename= $_SESSION["Rolename"];
	$nu=$_SESSION["tkno"];
    $mur=$_SESSION['tcount'];
	
  echo  "<ul><li class=\"selected\">";
  echo " <a class=\"section\" >$lrolename</a>";
  echo "<ul>";
  
  if ($mur>0){
  $a=0;	
  echo " <li>";
  echo "<a href=\"  ";
  // the code bellow the address of the task
  echo $_SESSION['mtkadd'];
  echo "\">";
  echo "<b>";
  echo $_SESSION['mtk'].' <br />';
  echo "</b>";
  echo "</a>";
  echo "</li>";}
	
	

  
	
	do{
		
  echo " <li>";
  echo "<a href=\"  ";
  // the code bellow the address of the task
  echo $_SESSION['Addr'][$a];
  echo "\">";
  echo "<b>";
  echo $_SESSION['animals'][$a].' <br />';
  echo "</b>";
  echo "</a>";
  echo "</li>";
  $nu--;
  $a++;
  }

while ( $nu>0);
  echo "</ul>";
  echo "</li>";

echo "</ul>";
?> 
            </ul>  
    </div>
    	 	<div id="links-sub"></div>
<div id="content">
<table width="400px" height="500px" border="0" align="center">
  <tr align="left">
    <td height="500px" valign="top"><div id="newone">
    <table width="100%">
  <tr bgcolor="#C6DBFB">
    <td width="51%"><strong>Vital</strong></td>
    <td width="45%"><strong>Measure</strong></td>
    <td width="4%">&nbsp;</td>
  </tr>
  <?php do { ?>
  <form id="formu2" name="formu2" method="post" action="updatev.php">
   <input name="session" type="hidden" value="<?php echo $_SESSION['License']; ?>"/>
      <input name="Id" type="hidden" value="<?php echo $row_vitals['Id']; ?>"/>
    <tr bgcolor="#DFFCFF">
      <td><input type="text" name="vitals" id="vitals" style="width:99%;" value="<?php echo $row_vitals['Vital']; ?>"/></td>
      <td><select name="measure" id="measure" style="width:99%;">
        <option value="<?php echo $row_vitals['Measure_FK']; ?>"><?php echo $row_vitals['Measure']; ?></option>
          <?php
do {  
?>
          <option value="<?php echo $row_measure['Id']?>"><?php echo $row_measure['Measure']?></option>
          <?php
} while ($row_measure = mysql_fetch_assoc($measure));
  $rows = mysql_num_rows($measure);
  if($rows > 0) {
      mysql_data_seek($measure, 0);
	  $row_measure = mysql_fetch_assoc($measure);
  }
?>
        </select></td>
      <td><input type="submit" value="Edit" title="Edit" style="color: #07c;
        padding: 0px;
        letter-spacing: 0px;
        font-size:8px;
         width:100%;"/></td>
    </tr>
  </form>
    <?php } while ($row_vitals = mysql_fetch_assoc($vitals)); ?>
    <form id="formu2" name="formu2" method="post" action="insertv.php">
     <input name="session" type="hidden" value="<?php echo $_SESSION['License']; ?>"/>
    <tr bgcolor="#ccc">
    <td><input type="text" name="vitals" id="textfield" style="width:99%;"/></td>
    <td>
      <select name="measure" id="measure" style="width:99%;">
        <?php
do {  
?>
        <option value="<?php echo $row_measure['Id']?>"><?php echo $row_measure['Measure']?></option>
        <?php
} while ($row_measure = mysql_fetch_assoc($measure));
  $rows = mysql_num_rows($measure);
  if($rows > 0) {
      mysql_data_seek($measure, 0);
	  $row_measure = mysql_fetch_assoc($measure);
  }
?>
      </select></td>
    <td><input type="submit" value="Add" title="Add" style="color: #07c;
        padding: 0px;
        letter-spacing: 0px;
        font-size:8px;
         width:100%;"/></td>
    </tr>
    </form>
</table>
        
          
        
    </div></td>
  </tr>
</table>
</div>

</body>
</html>
<?php
mysql_free_result($vitals);

mysql_free_result($measure);
?>
