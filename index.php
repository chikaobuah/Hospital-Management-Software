<?php require_once('Connections/localhost.php'); ?>
<?php
session_start();
session_destroy();
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
$query_recCompany = "SELECT licensee.Id, licensee.Licensee FROM licensee";
$recCompany = mysql_query($query_recCompany, $localhost) or die(mysql_error());
$row_recCompany = mysql_fetch_assoc($recCompany);
$totalRows_recCompany = mysql_num_rows($recCompany);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
<meta http-equiv="pragma" content="NO-CACHE" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
<title>Newmed</title>
<link rel="stylesheet" href="common/layout.css" />  
<script src="script/jquery-1.2.1.js" type="text/javascript"></script> 
<script src="script/jquery.dimensions.js" type="text/javascript"></script> 
<script src="script/jquery.accordion.js" type="text/javascript"></script> 
<script type="text/javascript" src="common/script.js"></script>
<script type="text/javascript">
function loginProcess() {
	var var_userid=document.getElementById("userid").value;
	var var_password=document.getElementById("password").value;
	var var_company=document.getElementById("company").value;
	
	var checkValidation=emptyValidation('userid~password');
	
	if(checkValidation==true) {
		
		
	requestInfo('login_check.php?userid='+var_userid+'&password='+var_password+'&company='+var_company,'loginDetails','redirect.php');


		
	} else {
		return false;
	}
}
</script>


</head>


<style type="text/css">
<!--


div#login {
	position:relative;
	width:450px;
	margin: 10% auto;
	background:url(images/interaction/background.png) repeat-x #fff; 
	height:250px;
	
	
	
     
}


#login div#apDiv1  {
	position: absolute; 
	width:20%;
	left:20px;
	top:50px;
	
	

}
#login div#apDiv2{
	position: absolute;
	width:70%;
	float:left;
	top: 50px;
	left:109px;
}
-->
</style>
</head>

<body>

<script type="text/javascript">
function noNumbers(e)
{
var keynum
var keychar
var numcheck

if(window.event) // IE
{
keynum = e.keyCode
}
else if(e.which) // Netscape/Firefox/Opera
{
keynum = e.which
}
keychar = String.fromCharCode(keynum)
numcheck = /\d/
return !numcheck.test(keychar)
}
</script>

<div id="header" align="right">
  <img alt="" class="gsfx_img_png" style="width: 51;height: 17;" src="images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" />
  </div>
  
  
  
<div id ="login" >


<div id="apDiv1">
<img src="images/interaction/login.png" width="87" height="114" />
      
</div>
<div id="apDiv2">
<form id="form69"  autocomplete="off" enctype="multipart/form-data" method="post" action="">
            <table width="100%"  border="0" align="right"  >
              <tr >
                <td colspan="2"></td>
              </tr>
              <tr>
                <td align="left" style="width:20%" ><strong>Company</strong></td>
                <td align="left" style="width:80%"><select name="company" size="1" id="company"  style="width:100%;" tabindex="1">
                  <?php
do {  
?>
                  <option value="<?php echo $row_recCompany['Id']?>"><?php echo $row_recCompany['Licensee']?></option>
                  <?php
} while ($row_recCompany = mysql_fetch_assoc($recCompany));
  $rows = mysql_num_rows($recCompany);
  if($rows > 0) {
      mysql_data_seek($recCompany, 0);
	  $row_recCompany = mysql_fetch_assoc($recCompany);
  }
?>
                </select></td>
              </tr>
              <tr>
                <td align="left" valign="middle"><strong>User ID</strong></td>
                <td align="left" ><input name="userid" type="text"  tabindex="2"id="userid"  style="width:100%;" onkeydown="return noNumbers(event)" /></td>
              </tr>
              <tr>
                <td align="left" valign="middle"><strong>Password</strong></td>
                <td align="left" ><input name="password"  tabindex="3"type="password" id="password" style="width:100%;" /></td>
              </tr>
              <tr>
                <td align="left" valign="middle" >&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" >&nbsp;</td>
                <td align="left"><input type="button"  tabindex="4"name="button" value="Login" onclick="return loginProcess()"  
                style="background: url(images/nav-bg.jpg) repeat-x;"></td>
              </tr>
              <tr>
                <td  style="font-weight:bold; height:30px"colspan="2"><div id="loginDetails"  style="text-align:center;  color:#F00"><strong></strong>
                  <?php 
		  if(isset($_GET['stat']))    
		  {
			  $stat=$_GET['stat'];
			  
			  if($stat==1)    
		  {  echo " your account has been disabled"; }
		    
			  if($stat==0)    
		  {  echo " No role assign yet";  }
		  }
		  
		  ?>
                </div></td>
              </tr>
            </table>
    </form>
</div> 


</div>
<?php
mysql_free_result($recCompany);
?>
