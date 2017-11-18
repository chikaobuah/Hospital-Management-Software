<?php require_once('../Connections/localhost.php'); 
session_start();
?>

<?php
$pagetask="Check-in";
$v=$_SESSION["License"];


$row_Recordset2="";
$row_Recordset3="";
$row_Recordset2['Enrolee']="";
$row_Recordset2['Scheme']="";
$row_Recordset3['First_Name']="";
$row_Recordset3['Surname']="";
$schmaoxx="";
$row_Recordset2['sc']="";


$sv="sv";
$sch="";
$psn="";
$pfn="";
$sn="";
$fn="";
$sc="";
$picture="";
$client="";
$program="";
$contact="";
$contactmp="";

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
$query_Recvisit = "SELECT Enrolee, Ticket_No, Status FROM visit";
$Recvisit = mysql_query($query_Recvisit, $localhost) or die(mysql_error());
$row_Recvisit = mysql_fetch_assoc($Recvisit);
$totalRows_Recvisit = mysql_num_rows($Recvisit);

mysql_select_db($database_localhost, $localhost);
$query_Recenroly = "SELECT Licensee, LId, Reg_No, Surname, First_Name, Gender, Marital FROM enrolee";
$Recenroly = mysql_query($query_Recenroly, $localhost) or die(mysql_error());
$row_Recenroly = mysql_fetch_assoc($Recenroly);
$totalRows_Recenroly = mysql_num_rows($Recenroly);

mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = "SELECT `Access_Level` FROM `access`";
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_localhost, $localhost);
$query_Recscheme = "SELECT
    scheme.LId
    , scheme.Scheme
    , status.Status
FROM
    newmed06.scheme
    INNER JOIN newmed06.status 
        ON (scheme.Status = status.Id)";

$Recscheme = mysql_query($query_Recscheme, $localhost) or die(mysql_error());
$row_Recscheme = mysql_fetch_assoc($Recscheme);
$totalRows_Recscheme = mysql_num_rows($Recscheme);



mysql_select_db($database_localhost, $localhost);
$query_Recprincipal = "SELECT
    enrolee.First_Name
    , enrolee.Surname
FROM
    newmed06.principal
    INNER JOIN newmed06.enrolee_principal 
        ON (principal.Enrolee = enrolee_principal.Enrolee)
    INNER JOIN newmed06.enrolee 
        ON (enrolee_principal.Enrolee = enrolee.LId)";
$Recprincipal = mysql_query($query_Recprincipal, $localhost) or die(mysql_error());
$row_Recprincipal = mysql_fetch_assoc($Recprincipal);
$totalRows_Recprincipal = mysql_num_rows($Recprincipal);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
		<meta http-equiv="pragma" content="NO-CACHE" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
<title>Newmed</title>
		<link rel="stylesheet" href="../common/layout.css" />
		<script type="text/javascript">
function showHint(str)
{
	
	if (str.length==0)
  		{ 
  			document.getElementById("txtHint").innerHTML="";
  			return;
  		}
	if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
  			xmlhttp=new XMLHttpRequest();
  		}
			else
  		{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
  
  
	xmlhttp.onreadystatechange=function()
  		{
 		if (xmlhttp.readyState==4 && xmlhttp.status==200)
    		{
    			document.getElementById("dd").innerHTML=xmlhttp.responseText;
    		}
	
  		}
  
	xmlhttp.open("GET","gethint.php?q="+str,true);//Send the request off to a file on the server
	xmlhttp.send();
}
</script>
<script language="javascript" type="text/javascript" src="cvv.js"></script>
<script language="JavaScript">
function toggle(x,origColor){
	var newColor = 'blue';
	if ( x.style ) {
		x.style.backgroundColor = (newColor == x.style.backgroundColor)? origColor : newColor;
	}
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
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>	
 	
</head>

<body>

<div id="header" align="right">
	
	 <img alt=""    style="width: 51;height: 17;" src="../images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" />
    <div style=" color:#CF0; font-weight:bold">
	 <?php 
	echo "".$_SESSION["userid"]." || <a style=\" color:#CF0\" href='../logout.php'>Log Out</a> ";	?> 
    </div>
	 
  </div>
    <div id="links">
            
             <!-- <li class="selected"><a class="section" href="http://www.narutofan.com/">Main </a></li> -->   
  <?php   
  include('../auth.php');
?>


            
 </div>
  <div id="links-sub"></div>







<div id="content">

<table width="100%" border="1" height="394" >
  <tr>
 

    <td  width="17%" valign="top">
   <table width="100%"  height="100%" border="0">
  <tr>
    <td height="28" align="left"><form>
      <input type="text"  style="width:310px" onfocus="this.value='';" onkeyup="showHint(this.value)" value="Enter Enrolle name"   align="left" />
    </form></td>
  </tr>
  <tr>
    <td   valign="top"align="left">
  
<div id="dd" style=" width : 320px; height : 380px;  font-weight:bold;  overflow-y : auto; overflow-x:hidden;"> 
  <?php 
	

$date = date('Y-m-d');




$sql=" SELECT
    visit_queue.Enrolee
    , visit_queue.Visit_date
    , visit_queue.Visit
    , visit_queue.Queued
    , visit_queue.Task
    , visit_queue.Next_task
    , visit_queue.Exited
    , enrolee.Full_Name
	, CURDATE(),  (YEAR(CURDATE())-YEAR(Born)) - (RIGHT(CURDATE(),5)<RIGHT(enrolee.Born,5)) AS age 
FROM
 newmed06.visit_queue INNER JOIN newmed06.enrolee ON (visit_queue.Enrolee = enrolee.LId) 
 
 WHERE Visit_date LIKE '%". $date ."%'  and Task=9 and visit_queue.Exited IS NULL";

$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);

do {
	$Full_Name =$row['Full_Name'];
	$ID=$row['Enrolee'];
	$Visit_date=$row['Visit_date'];
	$Visit=$row['Visit'];
	$age=$row['age'];
	 
		



echo "<a  class=\"linkr\" onClick=\"getData('ticket.php?id=$ID','dataplan1st.php?id=$ID','picture.php?id=$ID', 'vitalsforenr.php?id=$ID&vi=$Visit')\">" .$Full_Name ." "."(".$age.")"."</a>\n";

  
  
  
}

while($row=mysql_fetch_array($result));

echo $numrows." "."Records";

?>
</div>
  </tr>
</table>
 
 

         
    </td>
    <td width="68%" valign="top" ><table width="100%" height="431" border="0">
      <tr>
        <td height="121" valign="top"><table  align="left"width="100%" height="115" border="0">
         
         <tr>
           <td  valign="top"width="59%">
             <div id=scheme> 
               <table width="100%" height="100" border="0">
  <tr>
    <td height="26" style="background:#999"></td>
  </tr>
  <tr>
    <td valign="top">
    		<table width="100%" border="0" height="70">
		         <tr>
                   <td width="36%"height="25" bgcolor="#FFD659">Principal</td>
                   <td width="64%" bgcolor="#FFF5D9"></td>
                 </tr>
                 <tr>
                   <td  bgcolor="#FFD659"height="25">&nbsp;</td>
                   <td bgcolor="#FFF5D9" ></td>
                 </tr>
               </table>
     </td>
  </tr>
</table>
              </div>
             
             
             </td>
           <td width="41%"height="110"  valign="top"><table width="100%" border="0">
             <tr>
               
               <td  valign="top"width="19%" height="97">
                 <div  id="picture" style="border : solid 2px #FFCC33; width : auto; height : 97px; ">
                   
                   
                  <img src=<?php echo $picture ?> width="160" height="97" /></div></td>
               
               <td  valign="top"width="19%">
                 <div id="ticket"  align="center" style="border : solid 2px #FFCC33; width : 160; height : 100%; ">
<table width="100%" height="100%" border="0">
                   <tr>
                     <td height="26" style="background:#999"><strong>Ticket No.</strong></td>
                     </tr>
                   <tr>
                     <td height="41"  valign="top">  </td>
                     </tr>
                   <tr>
                     <td height="26" bgcolor="#FFC20D"></td>
                     </tr>
                     </table>
                     </div>
                 </td>
               </tr>
            </table></td>
         </tr>
        </table></td>
      </tr>
      <tr>
        <td valign="top"><table width="100%" height="290" border="1">
          <tr>
            <td width="21%" height="284"  valign="top" style=""><table     width="100%" height="192" border="0" >
                 <tr>
                   <th bgcolor="#009966" height="22" width="18%" scope="col">Bill Board </th>
                 </tr>
                 <tr>
                   <td bgcolor="#91FF91"><a class="linkr"  >Birthday</a><br/>
                     <a class="linkr"  >Plan Result</a><br/>
                     <a class="linkr"  > Allergy</a><br/>
                     <a class="linkr"  >Bill</a><br/>
                     <a class="linkr"  >Appointment</a>
                     </td>
                 </tr>
                 </table></td>
                 <td width="79%" valign="top"  bgcolor="#DDFFDD" style=""><table width="100%" height="100%" border="0">
             <tr>
             
               <td bgcolor="#DDFFDD" width="81%">&nbsp;</td>
               
             </tr>
           </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
     
     
       
     
    </td>
    <td width="15%" valign="top" >
    
       <div  id="vitalsforenr">
       
       
      </div>
     
      
      
      

      
      </td>
    
    
    
  </tr>
</table>








</div>

</body>

</html>
<?php
mysql_free_result($Recvisit);

mysql_free_result($Recenroly);
?>
