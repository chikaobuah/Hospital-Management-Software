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

$maxRows_recStock = 10;
$pageNum_recStock = 0;
if (isset($_GET['pageNum_recStock'])) {
  $pageNum_recStock = $_GET['pageNum_recStock'];
}
$startRow_recStock = $pageNum_recStock * $maxRows_recStock;

mysql_select_db($database_localhost, $localhost);
$query_recStock = "SELECT
    stock_category.category_name
    , stock.Generic
    , stock.Selling_Unit_Description
    , stock.Unit_of_Measure
    , stock.Unit_Cost_Price
	, stock.Quantity_In_Pack
       , stock.Unit_Selling_Price
FROM
    newmed06.stock
    , newmed06.stock_category";
$query_limit_recStock = sprintf("%s LIMIT %d, %d", $query_recStock, $startRow_recStock, $maxRows_recStock);
$recStock = mysql_query($query_limit_recStock, $localhost) or die(mysql_error());
$row_recStock = mysql_fetch_assoc($recStock);

if (isset($_GET['totalRows_recStock'])) {
  $totalRows_recStock = $_GET['totalRows_recStock'];
} else {
  $all_recStock = mysql_query($query_recStock);
  $totalRows_recStock = mysql_num_rows($all_recStock);
}
$totalPages_recStock = ceil($totalRows_recStock/$maxRows_recStock)-1;


?>
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
    <td>&nbsp;
      <li class="invoice">
<div align="center">
<table  style="border-bottom:dashed; border-bottom-color:"   class="invoice" cellpadding="1" width="100%">
  <tr c class="captop"  bgcolor="#999999">
    <td>Category</td>
          <td>Generic Name</td>
          <td>Unit of Measure</td>
          <td>Selling Unit Description</td>
          <td>Quantity In Pack</td>
          <td>Old Cost Price</td>
           <td>Price Loading</td>
       
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_recStock['category_name']; ?></td>
            <td><?php echo $row_recStock['Generic']; ?></td>
            <td><?php echo $row_recStock['Unit_of_Measure']; ?></td>
            <td><?php echo $row_recStock['Selling_Unit_Description']; ?></td>
            <td><?php echo $row_recStock['Quantity_In_Pack']; ?></td>
            <td><?php echo $row_recStock['Unit_Cost_Price']; ?></td>
            <td> <input id="load" 			name="load" 			type="text" 			class="field text" 			value="" 			tabindex="3" 			/>
         </td>
         <td>     <input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="Load" tabindex="30"/>
            </td>
          </tr>
          <?php } while ($row_recStock = mysql_fetch_assoc($recStock)); ?>
      </table></div></li></td>
  </tr>
</table>
           </div>   
</body>
    <?php
mysql_free_result($Recordset1);

mysql_free_result($recStock);
?>
     