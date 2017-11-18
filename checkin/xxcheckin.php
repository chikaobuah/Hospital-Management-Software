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
$query_Recvisit = "SELECT Enrolee, Ticket_No, Status, id FROM visit";
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
        ON (scheme.Status = status.Id);";

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
        ON (enrolee_principal.Enrolee = enrolee.LId);";
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
   $jide=""; 
  

	$gill=" Front Desk ";
  echo  "<ul><li class=\"selected\">
                <a class=\"section\" href=\"Untitled2.php\">$gill</a>
        					<ul>
        						<li><a href=\"register.php\"><b>Register </b></a></li>
        						<li><a href=\"checkin.php\">checkin</a></li>
        						<li class=\"last\"><a href=\"vitals.php\">vitals</a></li>
							</ul>
              </li>" ;		
 
echo "</ul>"
?>


            
 </div>
  <div id="links-sub"></div>







<div id="content">

<table width="100%" border="1" height="400">
  <tr>
 
<td width="31%"  valign="top"><table width="100%" border="0" style="margin-top:0px">
  <tr>
    <th scope="col">Enrolee List</th>
  </tr>
</table>


<table width="100%" border="0">
  <tr>
    <td width="10%" valign="top"><div style="border : solid 3px #0099ff; width : 30px; height : 380px; font-size:12px ">
    
   <a href="?by=ALL">All</a><br />  <a href="?by=A">A</a><br /> <a href="?by=B">B</a> <br /> <a href="?by=C">C</a> <br /> <a href="?by=D">D</a><br /> <a href="?by=E">E</a> <br /><a href="?by=F">F</a><br /> <a href="?by=G">G</a><br /> <a href="?by=H">H</a><br /> <a href="?by=I">I</a><br /> <a href="?by=J">J</a><br /> <a href="?by=K">K</a><br /><a href="?by=L">L</a><br /> <a href="?by=M">M</a><br /> <a href="?by=N">N</a><br /> <a href="?by=O">O</a><br /> <a href="?by=P">P</a><br /> <a href="?by=Q">Q</a><br /> <a href="?by=R">R</a><br /> <a href="?by=S">S</a><br /> <a href="?by=T">T</a><br /> <a href="?by=U">U</a><br /> <a href="?by=V">V</a><br /> <a href="?by=W">W</a><br /> <a href="?by=X">X</a><br /> <a href="?by=Y">Y</a><br /> <a href="?by=Z">Z</a></p>
    
    </div></td>
    <td width="90%" valign="top"><div style="border : solid 3px #0099ff; width : auto; height : 380px; overflow : auto;"> 

        
    <?php 
	
$numrows=0;
$letter ="";
	 
if (isset($_GET['by']))
{
$letter=$_GET['by'];

//connect to the database
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 

//-select the database to use
$mydb=mysql_select_db("newmed06");

//-query the database table
//$sql="SELECT LId, First_Name, Surname FROM enrolee WHERE Surname LIKE '" . $letter . "%'  ";
$sql="    SELECT
    First_Name
	 , Other_Name
    , Surname
    , LId
FROM
    newmed06.enrolee  WHERE Surname LIKE '" . $letter . "%'  ";

//-run the query against the mysql query function
$result=mysql_query($sql); 

//-count results
$numrows=mysql_num_rows($result);

//-create while loop and loop through result set

echo "<table width=\"100%\" border=\"0\" align=\"left\" >";
echo "<tr><th>Last Name</th>";
echo "<th>First Name</th>";
echo "<th>Others</th></tr>"; 
$row=mysql_fetch_array($result);


do{
$FirstName =$row['First_Name'];
$LastName=$row['Surname'];
$Others=$row['Other_Name'];
$ID=$row['LId'];
	
//-display the result of the array

    echo "<tr><td bgcolor=\"#c6dbfb\" align=\"left\" >"; 
	echo "<a href=\"checkin.php?by=$letter&id=$ID\">"   . $LastName ."</a></li>\n";
	
	echo "</td><td bgcolor=\"#c6dbfb\" align=\"left\">"; 
	echo  "<a href=\"checkin.php?by=$letter&id=$ID\">"  . $Others ."</a></li>\n";
	
	echo "</td><td bgcolor=\"#c6dbfb\" align=\"left\">";
	echo  "<a href=\"checkin.php?by=$letter&id=$ID\">"  .$FirstName ."</a></li>\n";
			
	    } 

while($row=mysql_fetch_array($result));

echo "</th>";
echo "</table>";


}

?>
    
    </div></td>
  </tr>
</table>



<table width="100%" border="0">
  <tr>
    <th >
    <div style="border : solid 3px #0099ff; width : auto; height : auto; overflow : auto;"> 
    <?php
    echo "<p>" .$numrows . " results found for " . $letter . "</p>"; 
    ?>
    </div>
    </th>
  </tr>
</table>
</td>
    <td width="69%" valign="top" ><table width="100%" height="100%" border="0" align="left"  >
      <tr>
        <td width="74%" height="202" valign="top"><table width="100%" border="1" height="64%">
          <tr>
            <th height="23" scope="col"><?php    ?></th>
            </tr>
          <tr>
            <td height="100%" valign="top"><table width="100%" height="100%" border="0">
              <tr>
                <td width="23%">picture</td>
                <td width="77%" valign="top"><table width="100%" border="1" height="157">
                  <tr>
                    <td  height="25">Plan </td>
                    <td width="82%" >
                      
                      
                      
                      
                      
                      
                      
                      <p>
                        <?php 

if(isset($_GET['id']))
{
$cm2=$_GET['id'];
//connect to the  database
mysql_select_db($database_localhost, $localhost);
$query_Recenroleescheme = "SELECT
     enrolee_scheme.Enrolee
    , scheme.Scheme
    , scheme.LId
    , enrolee.Surname
    , enrolee.First_Name
    , scheme.Capitation
FROM
    newmed06.enrolee_scheme
    INNER JOIN newmed06.scheme 
        ON (enrolee_scheme.Scheme = scheme.LId)
    INNER JOIN newmed06.enrolee 
        ON (enrolee_scheme.Enrolee = enrolee.LId) WHERE  enrolee = $cm2 ";
$Recenroleescheme = mysql_query($query_Recenroleescheme, $localhost) or die(mysql_error());
$row_Recenroleescheme = mysql_fetch_assoc($Recenroleescheme);
$totalRows_Recprincipalscheme = mysql_num_rows($Recenroleescheme);

$capi=$row_Recenroleescheme['Capitation'];
$dte=date('Y-m-d h:m:s');

//2nd Inner div
//echo '<div style="border : solid 2px #ff0000; width : inherit; height : 100px; overflow : auto;">';
echo "<table border=\"0\" align=\"center\">";
//echo "<tr><th>Enrolee's Scheme</th>";
//echo "<th>Principal </th>";
//echo "<th>Action</th></tr>"; 
do { 
    
	$pscheme=$Recenroleescheme['LId'];
    $pprince=5;
	  
	echo "<form action=\"deleteeb.php?ivd=$cm2&scp=$pscheme&ssp=$pprince\" method=\"POST\">";  
    echo "<tr><td>"; 
	
	
	echo "<a href=\"checkin.php?by=$letter&id=$cm2&cap=$capi&dte=$dte\">"   . $row_Recenroleescheme['Scheme'] ."</a></li>\n";
	//echo "</td><td>"; 
	//echo $row_Recenroleescheme['Surname']." ".$row_Recenroleescheme['First_Name']; 
//	echo "</td><td>";
	//echo "<p><input name=\"button\" type=\"submit\" class=\"btTxt submit\"  id=\"button\" value=\"Remove\"  /></p>";
	echo "</form>";
    } 
				
while ($row_Recenroleescheme = mysql_fetch_assoc($Recenroleescheme)); 
echo "</table>";
//echo '</div>' ;

}
$jide="Amole Jide"
?>
                        </p>
                      </td>
                    </tr>
                  <tr>
                    <td height="25">Pin Code</td>
                    <td>&nbsp;</td>
                    </tr>
                  <tr>
                    <td height="25">Principal</td>
                    <td><?php  
					
					if(isset($_GET['id']))
{
					echo $jide;
					
}
					;?></td>
                    </tr>
                  <tr>
                    <td height="25">Provider</td>
                    <td>&nbsp;</td>
                    </tr>
                  
                  </table>
                  </td>
                </tr>
              </table>
              
              
              </td>
            </tr>
        </table></td>
        <td width="74%" valign="top"><table width="100%" border="0">
          <tr>
            <td  valign="">
            
              <table width="100%" border="0">
  <tr>
  
  
   <th scope="col">Service</th>
  </tr>
</table>
            </td>
          </tr>
          <tr>
          
        

            <td  height="18"><div style="border : solid 3px #0099ff; width : auto; height : 240px; overflow : auto;">           
 <?php           

$colname_Recordset2 = "-1";

if(isset($_GET['cap'])){
$colname2_Recordset2=$_GET['cap'];
$colname_Recordset2 =$_GET['dte'];

mysql_select_db($database_localhost, $localhost);
$query_capiset2 = sprintf("SELECT * FROM scheme_cover_service WHERE Effective <= %s and Capitation = %s ORDER BY Effective ASC", GetSQLValueString($colname_Recordset2, "date"),GetSQLValueString($colname2_Recordset2, "int"));
$capiset2 = mysql_query($query_capiset2, $localhost) or die(mysql_error());
//echo "<table width=\"100%\" border=\"0\" align=\"left\" >";
$row_capiset2 = mysql_fetch_array($capiset2);
$totalRows_capiset2 = mysql_num_rows($capiset2);

do { 
          $row_capiset2['Id']; 
          $row_capiset2['Effective']; 
          $row_capiset2['Created']; 
          $row_capiset2['Creator']; 
          $capiset2['Cover']; 
          $row_capiset2['Scheme']; 
          $servicecover = $row_capiset2['Cover']; 
        		} 
				
		while ($row_capiset2 = mysql_fetch_assoc($capiset2)); 
        
         echo $servicecover; 
   
   
   
 mysql_select_db($database_localhost, $localhost);
$query_coverser = "	 SELECT
    cover_service.Service_FK
    , cover_service.Cover
    , service.Service
FROM
    newmed06.cover_service
    INNER JOIN newmed06.service    ON (cover_service.Service_FK = service.Id) 
	
	WHERE 
	
	cover_service.Cover= $servicecover";
						
$coverser = mysql_query($query_coverser, $localhost) or die(mysql_error());
echo "<table width=\"100%\" border=\"0\" align=\"left\" >";
$row_coverser= mysql_fetch_array($coverser);
$totalRows_coverser = mysql_num_rows($coverser);




do{
	
$sevice= $row_coverser['Service']; 
 
//-display the result of the array
echo "<tr><td  bgcolor=\"#c6dbfb\" align=\"left\" >"; 
//echo "<a href=\"license.php?by=$letter&id=$ID\">"   . $sevice ."</a></li>\n";
echo "<input name=\"checkbox\" type=\"checkbox\"   id=\"checkbox\" value=\"Remove\"  />" . $sevice;
 } 

while($row_coverser= mysql_fetch_array($coverser));

echo "</th>";
echo "</table>";


            
//-create while loop and loop through result set



//echo "</th>";
//echo "</table>";

}
            
  ?>   
    </div></td>
          </tr>
          </table></td>
      </tr>
      <tr>
        <td height="143" bgcolor="#99FF33"><p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p></td>
        <td valign="top" ><table  height="100%"width="100%" border="1" >
          <tr>
            <th scope="col">Bill Board
            
            
                        
            </th>
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
            
          </tr>
          <tr>
            <td>Appointment</td>
          </tr>
        </table></td>
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
    <td width="19%"><label>
      <input type="submit" name="button" id="button" value="Submit" />
    </label></td>
  </tr>
  <tr>
    
  </tr>
</table>







</div>

</body>

</html>
<?php
mysql_free_result($Recvisit);

mysql_free_result($Recenroly);
?>
