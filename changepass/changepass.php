<?php require_once('../Connections/localhost.php'); ?>
<?php
$pagetask="Change Password";

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
$query_Recordset1 = "SELECT `Access_Level` FROM `access`";
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
		<meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
		<meta http-equiv="pragma" content="NO-CACHE" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
		<title>Newmed</title>
		<link rel="stylesheet" href="../common/layout.css" />
        
<style>
  .error {
  font-family: Tahoma;
font-size: 8pt;
  color: red;
  margin-left: 0px;
  display:none;
  }
  
</style>
  
<script>
  function checkForm() {
	  
var minLength = 6;

old = document.getElementById("old").value;
  password = document.getElementById("password").value;
  password2 = document.getElementById("password2").value;
  
  if (old == "") {
  hideAllErrors();
document.getElementById("oldError").style.display = "inline";
document.getElementById("old").select();
document.getElementById("old").focus();
  return false;
  } else if (document.getElementById("password").value.length < 6) {
hideAllErrors();
document.getElementById("password3Error").style.display = "inline";
document.getElementById("password").select();
document.getElementById("password").focus();
  return false;
  } else if (password == "") {
hideAllErrors();
document.getElementById("passwordError").style.display = "inline";
document.getElementById("password").select();
document.getElementById("password").focus();
  return false;

  } else if (password2 == "") {
hideAllErrors();
document.getElementById("password2Error").style.display = "inline";
document.getElementById("password2").select();
document.getElementById("password2").focus();
  return false;
  } else if (password2 != password) {
hideAllErrors();
document.getElementById("password22Error").style.display = "inline";
document.getElementById("password2").select();
document.getElementById("password2").focus();
  return false;
  
  
  }
  return true;
  }
 
  function hideAllErrors() {
document.getElementById("oldError").style.display = "none"
document.getElementById("passwordError").style.display = "none"
document.getElementById("password2Error").style.display = "none"
document.getElementById("password3Error").style.display = "none"
document.getElementById("password22Error").style.display = "none"
  }
</script>
        
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
     <body>
     <div id="header" align="right">
	
	 <img alt=""    style="width: 51;height: 17;" src="../images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" />
    <div style=" color:#CF0; font-weight:bold">
	 <?php 
	echo "".$_SESSION["userid"]." || <a style=\" color:#CF0\" href='../logout.php'>Log Out</a> ";	?> 
    </div>
	 
  </div>
    <div id="links">
            
              
  <?php   
  include('../auth.php');
?>


            
 </div>
    	 	<div id="links-sub"></div>
           <div id="content">
           <table width="100%" height="100%" border="0" align="center" bgcolor="#e5e5e5">
  <tr>
    <td width="100px" height="500px" valign="middle">
       
    <table width="357" border="0" align="center" >
    
    <form onSubmit="return checkForm();" method="post" action="update.php">
<input type="hidden" name="LId" id="LId" value="<?php echo $row_recuser['userlid'];?>" style="width:100%;"/>


<tr >
    <td width="158" align="left" bgcolor="#b0b0b0"><strong>User id</strong></td>
    <td width="256">
      
      <input type="text" disabled="disabled" name="textfield" id="textfield" value="<?php echo $_SESSION['userid'];?>" style="width:98%"/>
      
    </td>
    </tr>
  <tr>
    <td align="left" bgcolor="#b0b0b0"><strong>Old password</strong></td>
    <td width="256"><input type="password" name="old" value="" id = "old" style="width:98%"><br>
<div class = "error" id = "oldError">Please enter your old password<br></div>
</td>
  </tr>
  <tr>
    <td align="left" bgcolor="#b0b0b0"><strong>New password</strong></td>
    <td><input type="password" name="password" value="" id= "password" style="width:98%"><br>
<div class= "error" id="passwordError">Please enter your new password<br></div>
<div class= "error" id="password3Error">Your password most be at least 6 digits long<br></div></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#b0b0b0"><strong>Confim password</strong></td>
    <td><input type="password" name="password2" id="password2" style="width:98%"><br>
<div class= "error" id="password2Error">Please re-enter your new password<br></div>
<div class= "error" id="password22Error">Alert: Your password doesn't match<br></div></td>
  </tr>
     <?php 
	 if (isset($_GET['report'])){
	 
	 if ($_GET['report'] == 1)
	{
	
	echo
	
    "<tr>
    <td align=\"center\" colspan=\"2\">Your password has been changed</font></td>
	</tr> " ;
	}
	
	if ($_GET['report'] == 2)
	{
	
	echo
	
    "<tr>
    <td align=\"center\" colspan=\"2\"><font color=\"#F00\">Your old password was incorrect</font></td>
	</tr> " ;
	}
	
	
	else 
	{
	
	echo
	
    " " ;
	}
	
	 }
	
	?>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><input name="" type="submit" value="Change" /></td>
  </tr>
</table>
</td>

  </tr>
</table> 
</body>
    <?php
mysql_free_result($Recordset1);
?>
     