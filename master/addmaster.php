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
$query_Reclicensehq = "SELECT
    licensee_hqs.Licensee
    , licensee.Licensee
    , licensee.Id
FROM
    newmed06.licensee
    INNER JOIN newmed06.licensee_hqs 
        ON (licensee.Licensee_Hqs = licensee_hqs.Licensee)WHERE licensee_hqs.Licensee=licensee.Id";
$Reclicensehq = mysql_query($query_Reclicensehq, $localhost) or die(mysql_error());
$row_Reclicensehq = mysql_fetch_assoc($Reclicensehq);
$totalRows_Reclicensehq = mysql_num_rows($Reclicensehq);
?>
<?php require_once('../Connections/localhost.php');
session_start();
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
        
        
        
        
        
<script type="text/javascript">var GB_ROOT_DIR = "http://localhost/NewMed10/newphp/greybox/";</script>
<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />   
        
        
        
        
        
        
        
        
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
<div  id="content">
  <table width="100%" border="1" height="400">
    <tr>
      <td width="83%" valign="top" ><table width="100%" border="0">
        <tr>
          <td width="50%"><form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
            <div style="border : solid 2px #ffff; width : auto; height : 435px; overflow : auto;">
              <table width="100%" border="0" align="left" height="100%">
                <tr>
                  <td width="23%" align="left">&nbsp;</td>
                  <td bgcolor="#c6dbfb"width="27%" align="left"><strong> Licensee Hqs<br />
                  </strong></td>
                  <td align="left" width="4%">&nbsp;</td>
                  <td align="left" width="28%"><select name="lhq"  style="width:100px"  id="lhq">
                    
                    <?php
do {  
?>
                    <option value="<?php echo $row_Reclicensehq['Id']?>"><?php echo $row_Reclicensehq['Licensee']?></option>
                    <?php
} while ($row_Reclicensehq = mysql_fetch_assoc($Reclicensehq));
  $rows = mysql_num_rows($Reclicensehq);
  if($rows > 0) {
      mysql_data_seek($Reclicensehq, 0);
	  $row_Reclicensehq = mysql_fetch_assoc($Reclicensehq);
  }
?>
                  </select></td>
                  <td align="left" width="18%">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td bgcolor="#c6dbfb"align="left"><strong>User ID<br />
                  </strong></td>
                  <td align="left">&nbsp;</td>
                  <td align="left"><input id="postcode8"  name="userid" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td bgcolor="#c6dbfb"align="left"><strong>User Name <br /> </strong></td>
                  <td align="left">&nbsp;</td>
                  <td align="left"><input id="postcode7"  name="username" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td bgcolor="#c6dbfb"align="left"><strong>Enrolee ID<br />
                  </strong></td>
                  <td align="left">&nbsp;</td>
                  <td align="left"><input id="postcode6"  name="enroleeid" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td  align="left">&nbsp;</td>
                  <td bgcolor="#c6dbfb"align="left"><strong>Postal code <br />
                  </strong></td>
                  <td align="left">&nbsp;</td>
                  <td align="left"><input id="postcode5"  name="postcode4" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td bgcolor="#c6dbfb"align="left"><strong>Credit Limit<br />
                  </strong></td>
                  <td align="left">&nbsp;</td>
                  <td align="left"><input id="postcode5"  name="credit" 	type="text"  value=""   style="width:95px  "   	tabindex="6" /></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td  align="left">&nbsp;</td>
                  <td align="left"></td>
                  <td align="left">&nbsp;</td>
                  <td align="left"></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td   align="left"></td>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label>
                    <input type="submit" name="button" id="button" value="Submit" />
                  </label></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td  align="left">&nbsp;</td>
                  <td  align="left"></td>
                  <td align="left">&nbsp;</td>
                  <td align="left"></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"></td>
                  <td align="left">&nbsp;</td>
                  <td align="left"></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  </tr>
              </table>
            </div>
            <input type="hidden" name="MM_insert" value="form1" />
         <input type="hidden" name="creator" value="<?php echo " ".$_SESSION["userid"]." " ?>" />
  		<input type="hidden" name="created" value="<?php  echo date('Y-m-d h:m:s'); ?>" />
   		<input type="hidden" name="upsize_ts" value="<?php echo date('Y-m-d h:m:s'); ?>" />
          <input type="hidden" name="id" value="<?php  $LIdx= $row_lnum['myCount'] + 1; echo $LIdx; ?>" />
          </form></td>
        </tr>
      </table></td>
    </tr>
  </table>
 

	

 
   
</div>
</body>

</html>
<?php
mysql_free_result($Reclicensehq);
?>
