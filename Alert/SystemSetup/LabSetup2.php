<?php require_once('../../Connections/localhost.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form70")) {
  $insertSQL = sprintf("INSERT INTO stock_alert (Stock, Maximum_Day, maximum_quantity, Minimum_Day, Minimum_Quantity, Alert_Message, Contact_Person, Contact_Email, Contact_Phone, Creator, Created) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['stock'], "int"),
                       GetSQLValueString($_POST['maximumdate'], "int"),
                       GetSQLValueString($_POST['maximumquantity'], "int"),
                       GetSQLValueString($_POST['minimumdate'], "int"),
                       GetSQLValueString($_POST['minimumquantity'], "int"),
                       GetSQLValueString($_POST['message'], "text"),
                       GetSQLValueString($_POST['contactperson'], "text"),
                       GetSQLValueString($_POST['contactemail'], "text"),
                       GetSQLValueString($_POST['contactphone'], "text"),
                       GetSQLValueString($_POST['creator'], "int"),
                       GetSQLValueString($_POST['created'], "date"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());
}

mysql_select_db($database_localhost, $localhost);
$query_recStock = "SELECT stock.Generic, stock.Id FROM stock";
$recStock = mysql_query($query_recStock, $localhost) or die(mysql_error());
$row_recStock = mysql_fetch_assoc($recStock);
$totalRows_recStock = mysql_num_rows($recStock);

mysql_select_db($database_localhost, $localhost);
$query_recDrug = "SELECT drug.Id, drug.Drug FROM drug";
$recDrug = mysql_query($query_recDrug, $localhost) or die(mysql_error());
$row_recDrug = mysql_fetch_assoc($recDrug);
$totalRows_recDrug = mysql_num_rows($recDrug);

mysql_select_db($database_localhost, $localhost);
$query_recReagent = "SELECT reagent.Id, reagent.Reagent FROM reagent";
$recReagent = mysql_query($query_recReagent, $localhost) or die(mysql_error());
$row_recReagent = mysql_fetch_assoc($recReagent);
$totalRows_recReagent = mysql_num_rows($recReagent);

mysql_select_db($database_localhost, $localhost);
$query_recAlertTable = "SELECT     stock.Generic     , stock_alert.Minimum_Day     , stock_alert.Maximum_Day     , stock_alert.Minimum_Quantity     , stock_alert.maximum_quantity     , stock_alert.Alert_Message     , stock_alert.Contact_Person     , stock_alert.Contact_Email     , stock_alert.Contact_Phone FROM     newmed06.stock_alert     INNER JOIN newmed06.stock          ON (stock_alert.Stock = stock.Id);";
$recAlertTable = mysql_query($query_recAlertTable, $localhost) or die(mysql_error());
$row_recAlertTable = mysql_fetch_assoc($recAlertTable);
$totalRows_recAlertTable = mysql_num_rows($recAlertTable);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

     <head>
		<meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
		<meta http-equiv="pragma" content="NO-CACHE" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
		<title>Newmed</title>
		<link rel="stylesheet" href="../../common/layout.css" />
		<link rel="alternate" type="application/rss+xml" title="NarutoFan.com News & Updates" href="http://rss.narutofan.com/rss.xml" />
  <!--[if lte IE 6]>
  <link href="/static/css/layout.ie6.css" rel="stylesheet" type="text/css" />
  <![endif]-->
  <link rel="stylesheet" href="../../css/structure.css" type="text/css" />
<link rel="stylesheet" href="../../css/form.css" type="text/css" />
<link rel="stylesheet" href="../../css/theme.css" type="text/css" />
<script type="text/javascript" src="../script/datetimepicker_css.js"></script>

<script type="text/javascript" src="../script/wufoo.js"></script>

  <script type="text/javascript" src="../../common/jquery.min.js"></script>
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
  <img alt="" class="gsfx_img_png" style="width: 51;height: 17;" src="../../images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" /></div>
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
           <table width="100%" border="0">
             <tr>
               <td align="left"><form name="form70" id="form70" class="wufoo topLabel page" autocomplete="off" enctype="multipart/form-data" method="POST" action="<?php echo $editFormAction; ?>">
    <div class="info">
      <h2>Stock Alert Setup</h2>
      </div>
    <ul>
      
      <li id="foli2" 		class="full">
        
        <div>  <span class="leftHalf"> <label class="" id="title2" for="Field2"> Stock </label>
        <select id="stock" 			name="stock" 		 width="20px"	class="" 			tabindex="1" >
          <option value="0">--- select stock item ----</option>
          <?php
do {  
?>
          <option value="<?php echo $row_recStock['Id']?>"><?php echo $row_recStock['Generic']?></option>
          <?php
} while ($row_recStock = mysql_fetch_assoc($recStock));
  $rows = mysql_num_rows($recStock);
  if($rows > 0) {
      mysql_data_seek($recStock, 0);
	  $row_recStock = mysql_fetch_assoc($recStock);
  }
?>
        </select>
        </span> <span class="leftHalf"> <label for="Field6">Min Day</label>
          <span>
          <input type="text" id="minimumdate" name="minimumdate"  class="field text " size="5" tabindex="2" />
          </span></span> 
        <span class="leftHalf"> <label for="Field6">Max Day</label>
          <span><input type="text" id="maximumdate" name="maximumdate"  class="field text " size="5" tabindex="3" />
          </span>  </span>
        <span class="leftHalf"> <label for="Field4">Mini Quantity</label>
          <input id="minimumuquantity" 			name="minimumquantity" 			type="text" 	size="10"	class="field text" 			value="" 			tabindex="4" 			/>
          </span>
        <span class="leftHalf"> <label for="Field4">Max Quantity</label>
          <input id="maximumuquantity" 			name="maximumquantity" 			type="text" 	size="10"		class="field text" 			value="" 			tabindex="5" 			/>
          </span>
          <span class="leftHalf"> <label for="Field4">Alert Message</label>
        <input id="message" 			name="message" 			type="text" 			class="field text addr" 			value="" 			tabindex="6" 		size="50"	/>
          </span><span class="leftHalf"> <label for="Field4">Contact Person</label>
          <input id="contactperson" 			name="contactperson" 			type="text" 			class="field text" 			value="" 			tabindex="7" 			/>
          </span><span class="leftHalf"> <label for="Field4">Contact Email</label>
            <input id="contactemail" 			name="contactemail" 			type="text" 			class="field text " 			value="" 			tabindex="8" 			/>
            </span><span class="leftHalf"> <label for="Field4">Contact Phone</label>
              <input id="contactphone" 			name="contactphone" 			type="text" 			class="field text " 			value="" 			tabindex="9" 			/>
              </span> 
        </li>
    <div align="right">  
      <li class="buttons " >
        <input type="hidden" name="currentPage" id="currentPage" value="dB5YAYUJLThQ1vViLqkRtO8PC6nWmLuPsz2BRQNT4gw=" />
        <input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="Submit"  tabindex="10"/>
        </li>
      </div>
      </ul>
    <input type="hidden" name="licensee" value="<?php echo " ".$_SESSION["License"]." " ?>" />
    <input type="hidden" name="creator" value="<?php echo " ".$_SESSION["userid"]." " ?>" />
    <input type="hidden" name="created" value="<?php  echo date('Y-m-d h:m:s'); ?>" />
    <input type="hidden" name="uptimestamp" value="<?php  echo date('Y-m-d h:m:s'); ?>" />
  <input type="hidden" name="eroleeId" value="<?php $EID=$_GET["id"]; echo $EID ; ?>" />
    
    <input type="hidden" name="MM_insert" value="form69" />
    <input type="hidden" name="MM_update" value="form69" />
    <input type="hidden" name="MM_insert" value="form70" />
               </form></td>
             </tr>
             <tr>
               <td align="left"><li class="invoice">
      <div align="center">
      <table  style="border-bottom:dashed; border-bottom-color:; "   class="invoice" cellpadding="1" width="100%" align="left" >
  <tr c class="captop"  bgcolor="#999999">
                 <table border="0">
                   <tr>
                     <td>Generic</td>
                     <td>Minimum_Day</td>
                     <td>Maximum_Day</td>
                     <td>Minimum_Quantity</td>
                     <td>maximum_quantity</td>
                     <td>Alert_Message</td>
                     <td>Contact_Person</td>
                     <td>Contact_Email</td>
                     <td>Contact_Phone</td>
                   </tr>
                   <?php do { ?>
                     <tr>
                       <td><?php echo $row_recAlertTable['Generic']; ?></td>
                       <td><?php echo $row_recAlertTable['Minimum_Day']; ?></td>
                       <td><?php echo $row_recAlertTable['Maximum_Day']; ?></td>
                       <td><?php echo $row_recAlertTable['Minimum_Quantity']; ?></td>
                       <td><?php echo $row_recAlertTable['maximum_quantity']; ?></td>
                       <td><?php echo $row_recAlertTable['Alert_Message']; ?></td>
                       <td><?php echo $row_recAlertTable['Contact_Person']; ?></td>
                       <td><?php echo $row_recAlertTable['Contact_Email']; ?></td>
                       <td><?php echo $row_recAlertTable['Contact_Phone']; ?></td>
                     </tr>
                     <?php } while ($row_recAlertTable = mysql_fetch_assoc($recAlertTable)); ?>
               </table> 
    
             
             <tr>
               <td align="left">&nbsp;</td>
             </tr>
             <tr>
               <td>&nbsp;</td>
             </tr>
           </table>
          
 
    
   
     <div>  </div>   
</body>
    <?php
mysql_free_result($recStock);

mysql_free_result($recDrug);

mysql_free_result($recReagent);

mysql_free_result($recAlertTable);
?>
     