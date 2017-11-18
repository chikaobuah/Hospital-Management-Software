<?php require_once('Connections/localhost.php'); ?>
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

mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = "SELECT `Access_Level` FROM `access`";
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

?>
     <head>
		<meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
		<meta http-equiv="pragma" content="NO-CACHE" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
		<title>Newmed</title>
		<link rel="stylesheet" href="common/layout.css" />
		<link rel="alternate" type="application/rss+xml" title="NarutoFan.com News & Updates" href="http://rss.narutofan.com/rss.xml" />
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
     <div id="header" align="right"><?php /*
	echo "".$_SESSION["role"]." : ".$_SESSION["username"]." || <a href='../logout.php'>Log Out</a> "; */
?>
  <img alt="" class="gsfx_img_png" style="width: 51;height: 17;" src="images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" /></div>
    <div id="links">
            
             <!-- <li class="selected"><a class="section" href="http://www.narutofan.com/">Main </a></li> -->   
  <?php   
  
  $field1 = $row_Recordset1['Access_Level'];//echo $field1;

  
            if( $field1<6)
{
	 
  echo  "<ul><li class=\"selected\">
                <a class=\"section\" href=\"Untitled2.php\">Main</a>
        					<ul>
        						<li><a href=\"http://www.narutofan.com/\"><b>Sub one</b></a></li>
        						<li><a href=\"http://www.narutofan.com/main/advertising.html\">sub two</a></li>
        						<li><a href=\"http://www.narutofan.com/plus/support\">sub three</a></li>
        						<li class=\"last\"><a href=\"http://www.narutofan.com/main/abuse.html\">sub four</a></li>
        					</ul>
              </li>" ;		
  echo  "<li>
                <a class=\"section\" href=\"Untitled3.php\">Desk</a>
        				<ul>
        					<li><a href=\"http://www.narutofan.com/plus/support\">PLUS! Help & Support</a></li>
        					<li class=\"last\"><a href=\"http://www.narutofan.com/main/abuse.html\">Website Help & Abuse Report</a></li>
        				</ul>
        </li>"; 
						
						
echo "<li><a class=\"section\" href=\"enroleebillingsetup.php\">Billing</a></li>";
}
if( $field1>6)
{
echo "<li><a class=\"section\" href=\"enroleebillingsetup.php\">Consulting</a></li>";
echo "<li><a class=\"selected\" href=\"enroleebillingsetup.php\">Reception</a></li>";
echo "<li><a class=\"section\" href=\"enroleebillingsetup.php\">Phamacy</a></li>";
}

?>
            </ul>  
    </div>
    	 	<div id="links-sub"></div>
           <div id="content">
          <?php require_once('Connections/localhost.php'); ?>

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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE visit SET Status=%s WHERE Enrolee=%s AND Created=%s",
                       GetSQLValueString($_POST['textfield3'], "int"),
                       GetSQLValueString($_POST['textfield'], "int"),
                       GetSQLValueString($_POST['textfield2'], "date"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($updateSQL, $localhost) or die(mysql_error());

  $updateGoTo = "out2.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_recvisit = "-1";
if (isset($_GET['id'])) {
  $colname_recvisit = $_GET['id'];
}
mysql_select_db($database_localhost, $localhost);
$query_recvisit = sprintf("SELECT * FROM visit WHERE Created = %s", GetSQLValueString($colname_recvisit, "date"));
$recvisit = mysql_query($query_recvisit, $localhost) or die(mysql_error());
$row_recvisit = mysql_fetch_assoc($recvisit);
$totalRows_recvisit = mysql_num_rows($recvisit);

$maxRows_reclist = 1;
$pageNum_reclist = 1;
if (isset($_GET['pageNum_reclist'])) {
  $pageNum_reclist = $_GET['pageNum_reclist'];
}
$startRow_reclist = $pageNum_reclist * $maxRows_reclist;


mysql_select_db($database_localhost, $localhost);
$query_reclist = "SELECT
    enrolee_principal.Principal
    , enrolee.Surname
    , enrolee.First_Name
    , enrolee.Other_Name
    , enrolee.Born
    , visit.Created
    , enrolee.Picture
    , enrolee.LId
    , gender.Gender
FROM
    newmed06.enrolee_principal
    INNER JOIN newmed06.enrolee 
        ON (enrolee_principal.Enrolee = enrolee.LId)
    INNER JOIN newmed06.visit 
        ON (visit.Enrolee = enrolee.LId)
    INNER JOIN newmed06.gender 
        ON (enrolee.Gender = gender.Id) where visit.Status = 1";
$reclist = mysql_query($query_reclist, $localhost) or die(mysql_error());
$row_reclist = mysql_fetch_assoc($reclist);
$totalRows_reclist = mysql_num_rows($reclist);

if (isset($_GET['totalRows_reclist'])) {
  $totalRows_reclist = $_GET['totalRows_reclist'];
} else {
  $all_reclist = mysql_query($query_reclist);
  $totalRows_reclist = mysql_num_rows($all_reclist);
}
$totalPages_reclist = ceil($totalRows_reclist/$maxRows_reclist)-1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/menu.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<style type="text/css">
<!--

#apDiv1 {
	position:absolute;
	left:222px;
	top:154px;
	width:579px;
	height:230px;
	z-index:1;
}
-->
</style>
</head>

<body>
<div id="apDiv1">
  <table width="100%" border="0">
  <tr>
    <td width="100%" height="23" align="center"><font size="+3">Are you done with this enrolee?</font></td>
  </tr>
</table>

  <table width="100%" border="0">
    <tr>
      <td width="241">&nbsp;</td>
      <td width="141"><form id="form1" name="form1" method="post" action="<?php echo $editFormAction; ?>">
    <p>
      <input type="hidden" name="textfield" id="textfield" value="<?php echo $_GET['en']; ?>" />
    </p>
    <p>
      <input type="hidden" name="textfield2" id="textfield2" value="<?php echo $_GET['id'];?>" />
    </p>
    <p>
      <input type="hidden" name="textfield3" id="textfield3" value="2"/>
    </p>
    <input type="submit" value="Yes"/>
   <?php 
		$VisitID =  $_GET['id'];
		   			$Enrolee = $_GET['en'];
					$Principal = $_GET['pr'];
					$Scheme = $_GET['sc'];
					$procedurecover = $_GET['prc'];
					$servicecover = $_GET['src'];
					$drugcover = $_GET['drc'];
					$capitation = $_GET['cap'];
					$VisitID2 = $_GET['id2'];
					$status = $_GET['st'];
					$date = $_GET['date'];


		  echo "<a href=consulting.php?pr=$Principal&en=$Enrolee&sc=$Scheme&id=$VisitID&prc=$procedurecover&src=$servicecover&drc=$drugcover&id2=$VisitID2&cap=$capitation&date=$date&st=$status>
			 
             <input type=\"submit\" value=\"No\" /></td> </a>" ?>
    <input type="hidden" name="MM_update" value="form1" />
  </form></td>
      <td width="182">&nbsp;</td>
    </tr>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($recvisit);

mysql_free_result($reclist);
?>

           </div>   
</body>
    <?php
mysql_free_result($Recordset1);
?>
     