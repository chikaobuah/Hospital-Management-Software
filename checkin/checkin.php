<?php require_once('../Connections/localhost.php'); 
session_start();
?>

<?php
$pagetask="Check-in";
$v=$_SESSION["License"];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
		<meta http-equiv="pragma" content="NO-CACHE" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
<title>Newmed</title>
		<link rel="stylesheet" href="../common/layout.css" />

<script language="javascript" type="text/javascript" src="cvv.js"></script>


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
            
              
  <?php   
  include('../auth.php');
?>


            
 </div>
  <div id="links-sub"></div>







<div  id="content">

<table width="100%"   height="394">

  <tr>
 

    <td   width="18%"valign="top">
   <table width="100%"  height="100%" border="0">
  <tr>
    <td height="28" align="left"><form>
      <input type="text"  style="width:100%" onfocus="this.value='';" onkeyup="showHint(this.value)" value="Enter Enrollee name"   align="left" />
    
    </form></td>
  </tr>
  <tr>
  <?php 	function  titleCase($string)  { 
        $len=strlen($string); 
        $i=0; 
        $last= ""; 
        $new= ""; 
        $string=strtoupper($string); 
        while  ($i<$len): 
                $char=substr($string,$i,1); 
                if  (ereg( "[A-Z]",$last)): 
                        $new.=strtolower($char); 
                else: 
                        $new.=strtoupper($char); 
                endif; 
                $last=$char; 
                $i++; 
        endwhile; 
        return($new); 
}?>
    <td   valign="top"align="left">
  
<div id="dd" style=" width : 320px; height : 380px;  font-weight:bold;  overflow-y : auto; overflow-x:hidden;"> 
 
 <div id="d1"  style="  width : 320px;    font-weight:bold; overflow-y : auto; overflow-x:hidden;" >
   <?php 



$sql=" SELECT
    enrolee_checkin.Licensee
    , enrolee_checkin.LId
    , enrolee_checkin.Status
    , enrolee.Full_Name
,  (YEAR(CURDATE())-YEAR(Born)) - (RIGHT(CURDATE(),5)<RIGHT(enrolee.Born,5)) AS age 
FROM
    newmed06.enrolee_checkin
    INNER JOIN newmed06.enrolee 
        ON (enrolee_checkin.LId = enrolee.LId)WHERE enrolee_checkin.Status=0  order by Surname ";

$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);


do {
	
	$Full_Name=titleCase ($row['Full_Name']);
	$ID=$row['LId'];
	$age=$row['age'];
		

 if($numrows!=0) 
{

echo "<a  class=\"linkr\" 
onClick=\"getData('data1.php?id=$ID','dataplan1st.php?id=$ID&fn=$Full_Name','picture.php?id=$ID' ,'billboard1st.php?id=$ID','service1st.php?id=$ID&fn=$Full_Name','clinic.php?id=$ID','countermsg.php?x=1&id=$ID&fn=$Full_Name','billboard0.php?id=$ID','ticket.php?id=$ID')\">" .$Full_Name ." "."(".$age.")". "</a>\n";
}
}
while($row=mysql_fetch_array($result));

	
	

echo $numrows." "."Record"."(s)";

?>
 </div>
 <div  id="d2" style="background:#ffd659;  overflow-y : auto; overflow-x:hidden;">  <?php 



$sql=" SELECT
    enrolee_checkin.Licensee
    , enrolee_checkin.LId
    , enrolee_checkin.Status
    , enrolee.Full_Name
,  (YEAR(CURDATE())-YEAR(Born)) - (RIGHT(CURDATE(),5)<RIGHT(enrolee.Born,5)) AS age 
FROM
    newmed06.enrolee_checkin
    INNER JOIN newmed06.enrolee 
        ON (enrolee_checkin.LId = enrolee.LId)WHERE enrolee_checkin.Status=1  order by Surname ";

$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);


do {
	
	$Full_Name=titleCase ($row['Full_Name']);
	$ID=$row['LId'];
	$age=$row['age'];
		

 if($numrows!=0)
{
echo "<a  class=\"linkr\" 
onClick=\"getData('data1chkin.php?id=$ID','dataplan1stchkin.php?id=$ID&fn=$Full_Name','picture.php?id=$ID' ,'billboard1st.php?id=$ID','service1stchkin.php?id=$ID','clinicchkin.php?id=$ID','countermsgchkin.php?x=1&id=$ID','billboard0.php?id=$ID','ticketchkin.php?id=$ID')\">" .$Full_Name ." "."(".$age.")". "</a>\n";
}
}

while($row=mysql_fetch_array($result));

	
	

echo $numrows." "."Record"."(s)";

?> </div>
</div>
  </tr>
</table>
 
 

         
    </td>
    <td width="79%" valign="top" >
     
     
       <table width="100%" height="410" border="0" >
         
         <tr>
           <td  bgcolor="#F2F2F2"width="17%"   valign="top">
           <table width="100%" height="100%" border="0">
                   <tr>
                     <td height="27" bgcolor="#999999"><strong>Plan</strong></td>
                </tr>
                   <tr>
                     <td  valign="top"   ?>
                     <div  align="left"id="plan" style="height:60px"></div></td>
                   </tr>
                  
                   
                   
            </table></td>
           <td width="83%"height="110"  valign="top"><table bgcolor="#f0f5f9" width="100%" border="0">
             <tr>
             <td  valign="top"width="63%">
             <div id=scheme align="left"> 
             <table width="100%" height="100" border="0">
  <tr>
    <td height="26" style="background:#999"></td>
  </tr>
  <tr>
    <td valign="top">
    		<table width="100%" border="0" height="70">
		         <tr>
                   <td width="29%"height="25" bgcolor="#C7DEE9">Principal</td>
                   <td width="71%" bgcolor="#F0F5F9"></td>
                 </tr>
                 <tr>
                   <td  bgcolor="#C7DEE9"height="25"></td>
                   <td bgcolor="#F0F5F9" ></td>
                 </tr>
               </table>
     </td>
  </tr>
</table>
             </div>

             
             </td>
               <td  valign="top"width="19%" height="97">
               <div  id="picture" style="border : solid 2px #FFCC33; width : auto; height : 97px; ">
               
               
               </div></td>
               
               <td  valign="top"width="19%">
                <div id="ticket"  align="center" style="border : solid 2px #FFCC33; width : 160; height : 100%; ">
                 <table width="100%" height="100%" border="0">
                   <tr>
                     <td height="26" style="background:#999"><strong>Tickect No.</strong></td>
                   </tr>
                   <tr>
                     <td height="41" bgcolor="#FFFFFF"></td>
                   </tr>
                   <tr>
                     <td height="26" bgcolor="#FFC20D"><?php  $date = date('d-M-Y'); echo $date; ?></td>
                   </tr>
                   </table>
                   </div>
               </td>
             </tr>
           </table></td>
         </tr>
        
         <tr>
         <td   bgcolor="#F2F2F2" valign="top" style="">
         
         <div id="service" align="left">
         <table width="100%" height="10%" border="0">
                   <tr>
                     <td height="24" bgcolor="#999999"><strong>Service</strong></td>
                   </tr>
                   
                </table>
                 
            </div>     
                 
            </td>
           <td bgcolor="#DDFFDD"  valign="top" style=""><table bgcolor="#DDFFDD" width="100%" height="100%" border="0">
             <tr>
             <td  bgcolor="#F2F2F2" valign="top" width="19%"><table     width="100%" height="300" border="0" >
                 <tr>
                   <th bgcolor="#999999" height="22" width="18%" scope="col">Bill Board </th>
                 </tr>
                 <tr>
                   <td height="45%"  valign="top" > <div id="billboard" align="left"> </div>  </td>
                 </tr>
                 <tr>
                   <td height="22"  align="center" valign="top" bgcolor="#999999"><strong >Clinic</strong></td>
                 </tr>
                 <tr>
                   <td  valign="top" bgcolor="#f2f2f2"><div id="clinic"></div></td>
                 </tr>
                 </table>
                 
                 
                 
                 
                 </td>
               <td  valign="top"bgcolor="#DDFFDD" width="81%"><div id="billboard2">Content for New Div Tag Goes Here</div></td>
               
             </tr>
           </table></td>
         </tr>
       </table>
     
   </td>
    
    
    
  </tr>
</table>



<div  id="foot" style="  height:25px ;     background:#f2f2f2" ; > 
<div  id="timer" style=" width : 100px; height : 25px; background:#CCCCCC; position: relative; top: 0px;   background: url(../images/nav-bg.png) repeat-x;"></div>
<div  id="crtitalinfo" style="width : 205px; height : 25px; margin-left: 120px; background: url(../images/nav-bg.png) repeat-x; position: relative; top: -25px;";>Enrollee information missing</div>
<div  id="prceedbut"  style=" width : 200px; height : 25px; margin-left: 82%;  position: relative; top: -50px;";>

</div>

 
 
 

  </div>


</div>






</body>

</html>