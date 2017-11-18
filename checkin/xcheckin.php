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

mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = "SELECT `Access_Level` FROM `access`";
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
	echo "".$_SESSION["role"]." : ".$_SESSION["userid"]." || <a href='../logout.php'>Log Out</a> "; */
?>
  <img alt="" class="gsfx_img_png" style="width: 51;height: 17;" src="images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" /></div>
    <div id="links">
            
             <!-- <li class="selected"><a class="section" href="http://www.narutofan.com/">Main </a></li> -->   
  <?php   
  
  $field1 = $row_Recordset1['Access_Level'];//echo $field1;

  
            if( $field1<6)
{
	 
  echo  "<ul><li class=\"selected\">
                <a class=\"section\" href=\"Untitled2.php\">Front Desk</a>
        					<ul>
        						<li><a href=\"http://www.narutofan.com/\"><b>Register</b></a></li>
        						<li><a href=\"http://www.narutofan.com/main/advertising.html\">Check in</a></li>
        						<li><a href=\"http://www.narutofan.com/plus/support\">Vitals</a></li>
        						<li class=\"last\"><a href=\"http://www.narutofan.com/main/abuse.html\">result</a></li>
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





<table width="100%" border="1" height="400">
  <tr>
    <td width="30%"><table width="100%" border="1">
  <tr>
    <th scope="col">Waiting List</th>
  </tr>
</table><div style="border : solid 2px #ff0000; width : auto; height : 400px; overflow : auto; margin-top: -2px;"> </div><table width="100%" border="1">
  <tr>
    <th scope="col">Queue Length=</th>
  </tr>
</table></td>
    <td ><table width="100%" height="100%" border="1" align="left" >
      <tr>
        <td width="26%" height="100">
         <div style="width : auto; height : 150px; overflow : auto; margin-top: -24px; top: 0px;"> 
        <table width="100%" border="1">
          <tr>
            <th scope="col">Service</th>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table> </div></td>
        <td width="74%"><table width="100%" border="1" height="100%">
          <tr>
            <th height="23" scope="col">&nbsp;</th>
          </tr>
          <tr>
            <td height="100%"><table width="100%" height="100%" border="1">
              <tr>
                <td width="20%">picture</td>
                <td width="60%"><table width="100%" border="1" height="100%">
  <tr>
    <td width="23%">Plan </td>
    <td width="77%">&nbsp;</td>
  </tr>
  <tr>
    <td height="27">Pin Code</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="27">Principal</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Provider</td>
    <td>&nbsp;</td>
  </tr>
</table>
&nbsp;</td>
                <td width="20%"><table width="100%" border="1" height="100%">
                  <tr>
                    <th scope="col">Ticket No.</th>
                  </tr>
                  <tr>
                    <td height="60%">&nbsp;</td>
                  </tr>
                  <tr>
                   <th scope="col">Date</th>
                  </tr>
                </table></td>
              </tr>
            </table>
          
            
            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>
        <div style=" width : auto; height : 300px; overflow : auto; margin-top: -2px; top: 0px;"> 
        <table width="100%" border="1">
          <tr>
            <th scope="col">Bill Board</th>
          </tr>
          <tr>
            <td>Alert</td>
          </tr>
          <tr>
            <td>Plan Result</td>
          </tr>
          <tr>
            <td>Allergy</td>
          </tr>
          <tr>
            <td>Bill</td>
          </tr>
          <tr>
            <td>Health </td>
          </tr>
          <tr>
            <td>Appointment</td>
          </tr>
        </table>
        </div>
        </td>
        <td></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="1">
  <tr>
    <td width="30%">&nbsp;</td>
    <td width="11%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
  </tr>
  <tr>
    
  </tr>
</table>



</div>
</body>
</html>