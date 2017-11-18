<?php require_once('../Connections/localhost.php'); ?>
<?php

$enr=$_GET['id'];

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
$query_Recdependants = "SELECT    enrolee_principal.Enrolee
    , enrolee_principal.Principal
	 , enrolee_principal.Enrolee
    , enrolee_principal.Status
    , enrolee.Surname
    , enrolee.First_Name
    , enrolee.Other_Name
FROM
    newmed06.enrolee_principal
    INNER JOIN newmed06.enrolee 
        ON (enrolee_principal.Enrolee = enrolee.LId) WHERE Principal=$enr";
$Recdependants = mysql_query($query_Recdependants, $localhost) or die(mysql_error());
$row_Recdependants = mysql_fetch_assoc($Recdependants);
$totalRows_Recdependants = mysql_num_rows($Recdependants);

mysql_select_db($database_localhost, $localhost);
$query_Recprincipal = "SELECT
    enrolee_principal.Principal as p2
    , enrolee.Surname
    , enrolee.First_Name
    , enrolee.Other_Name
FROM
    newmed06.enrolee_principal
    INNER JOIN newmed06.enrolee 
        ON (enrolee_principal.Principal = enrolee.LId) WHERE Enrolee=$enr";
$Recprincipal = mysql_query($query_Recprincipal, $localhost) or die(mysql_error());
$row_Recprincipal = mysql_fetch_assoc($Recprincipal);
$totalRows_Recprincipal = mysql_num_rows($Recprincipal);




	mysql_select_db($database_localhost, $localhost);
$query_Recprincipalscheme = "SELECT
    enrolee_scheme.Enrolee
    , scheme.Scheme
    , enrolee.Surname
	, scheme.LId
	,enrolee_scheme.Principal
FROM
    newmed06.enrolee_scheme
    INNER JOIN newmed06.scheme 
        ON (enrolee_scheme.Scheme = scheme.LId)
    INNER JOIN newmed06.enrolee 
        ON (enrolee_scheme.Enrolee = enrolee.LId) WHERE  enrolee_scheme.Enrolee =  $enr";
$Recprincipalscheme = mysql_query($query_Recprincipalscheme, $localhost) or die(mysql_error());
$row_Recprincipalscheme = mysql_fetch_assoc($Recprincipalscheme);
$totalRows_Recprincipalscheme = mysql_num_rows($Recprincipalscheme);
	


mysql_select_db($database_localhost, $localhost);
$query_Recscheme = "SELECT
    scheme.LId
    , scheme.Scheme
    , status.Status
FROM
    newmed06.scheme
    INNER JOIN newmed06.status 
        ON (scheme.Status = status.Id) order by Scheme";

$Recscheme = mysql_query($query_Recscheme, $localhost) or die(mysql_error());
$row_Recscheme = mysql_fetch_assoc($Recscheme);
$totalRows_Recscheme = mysql_num_rows($Recscheme);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<link rel="stylesheet" href="../common/layout.css" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table  style="font-weight:bold"width="100%" border="0">
  <tr>
    <td>
    <?php
	
	// Code to display user name at the top of the page
	$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");
$sql="    SELECT
    First_Name
	 , Other_Name
    , Surname
    , LId
FROM
    newmed06.enrolee  WHERE LID=$enr ";
$result=mysql_query($sql); 
$row=mysql_fetch_array($result);


	echo $row['Surname']." ".$row['First_Name']." ".$row['Other_Name']." ". "(Enrolee's Principal-Scheme-Profile)";
	 ?>
    
    
    
    </td>
  </tr>
</table>

<table width="100%" border="0">
  <tr>
    <td  height="20"bgcolor="#FFCC66" width="auto"><strong>Available Principals</strong></td>
    <td bgcolor="#FFCC66"width="auto"><strong>Enrolee's Principal(s)</strong></td>
    <td bgcolor="#FFCC66"width="auto"><strong>Available dependents</strong></td>
    <td bgcolor="#FFCC66"width="auto"><strong>Enrolee's dependent(s)</strong></td>
    <td bgcolor="#FFCC66"width="auto"><strong>Available Schemes</strong> </td>
    <td bgcolor="#FFCC66"width="auto"><strong>Enrolees Schemes</strong></td>
  </tr>
  <tr>
    <td valign="top"> <div  style="border : solid 3px #ffcc66; width : 215px; height : 400px; overflow-y : auto; overflow-x:hidden; font-size:9px";>
	<?php 
	
$numrows=0;
$letter ="";
	 


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
    newmed06.enrolee   ORDER BY Surname";

//-run the query against the mysql query function
$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);

//1st inner div
echo "<table border=\"0\" align=\"left\">";

do{
$FirstName =$row['First_Name'];
$LastName=$row['Surname'];
$Others=$row['Other_Name'];
$ID=$row['LId'];
	
//-display the result of the array

echo "<tr>";
echo "<form action=\"insertprincipal.php?id=$enr&prn=$ID\" method=\"POST\">"; 
echo "<td bgcolor=\"#fff5d9\" align=\"left\" >";

echo "<a class=\"linkq\" href=\"registern.php?a=2&by=$letter&id=$ID\">"."<b>"   . $LastName . " ".$FirstName." ".$Others . "<b>" ."</a>";

echo "</td>";
echo "<td bgcolor=\"#FFE297\" align=\"left\" >"; 
echo "<input name=\"button\" type=\"submit\"  id=\"button\" value=\"ADD\"  />";
echo "</td>";
echo "</form>"; 
echo "</tr>";
} 

while($row=mysql_fetch_array($result));

echo "</table>";



?></div></td >

    <td  valign="top">
     
     <div  style="border : solid 3px #ffcc66; width : 212px; height : 400px; overflow-y : auto; overflow-x:hidden; font-size:9px" ;>
      <table width="100%" border="0">
                <?php do { ?>
          <tr>
          
         	 
          
            <td bgcolor="#fff5d9"><?php $ID2=$row_Recprincipal['p2'] ; echo $row_Recprincipal['Surname']." ".$row_Recprincipal['First_Name']; ?></td>
            
            <?php  if (isset($ID2 )) {?>
            <?php echo "<form action=\"removep.php?id=$enr&prn=$ID2\" method=\"POST\">"; ?>
          
            <td  bgcolor="#FFE297"><?php echo "<input name=\"button\" type=\"submit\"   id=\"button\" value=\"REMOVE\"  />"; ?></td>
            <?php } ?><?php echo "</form>"; ?></tr>
          <?php } while ($row_Recprincipal = mysql_fetch_assoc($Recprincipal)); ?>
    </table></div></td>
  
    <td valign="top"><div  style="border : solid 3px #FFCC66; width : 212px; height : 400px; overflow : auto; font-size:9px"> 
	<?php 
$numrows=0;
$letter ="";
//connect to the database
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
//-select the database to use
$mydb=mysql_select_db("newmed06");

//-query the database table

$sql="    SELECT
    First_Name
	 , Other_Name
    , Surname
    , LId
FROM
    newmed06.enrolee   ORDER BY Surname";

//-run the query against the mysql query function
$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);

//1st inner div
echo "<table border=\"0\" align=\"left\">";

do{
$FirstName =$row['First_Name'];
$LastName=$row['Surname'];
$Others=$row['Other_Name'];
$ID3=$row['LId'];
	
//-display the result of the array
$enr=$_GET['id'];
echo "<tr>";
echo "<form action=\"insertdependant.php?id=$enr&dep=$ID3\" method=\"POST\">"; 
echo "<td height=\"20\" bgcolor=\"#fff5d9\" align=\"left\" >";
echo "<a class=\"linkq\" href=\"checkin.php?by=$letter&id=$ID3\">" ."<b>"  . $LastName . " ".$FirstName." ".$Others . "</b>"  ."</a>";
echo "</td>";
echo "<td bgcolor=\"#FFE297\" align=\"left\" >"; 
echo "<input name=\"button\" type=\"submit\"   id=\"button\" value=\"ADD\"  />";
echo "</td>";
echo "</form>"; 
echo "</tr>";
} 

while($row=mysql_fetch_array($result));

echo "</table>";



?></div></td>
    <td valign="top">
     <div id="add" style="border : solid 3px #FFCC66; width : 212px; height : 400px; overflow : auto; font-size:9px">
       <table width="100%" border="0">
       
         <?php do { ?>
           <tr>
             <td bgcolor="#fff5d9"><?php   $ID3=$row_Recdependants['Enrolee'] ; echo $row_Recdependants['Surname'] . " ".$row_Recdependants['First_Name']; ?></td>
             <?php  if (isset($ID3 )) {?>
              <?php echo "<form action=\"removedep.php?id=$enr&dep=$ID3\" method=\"POST\">"; ?>
             <td  bgcolor="#FFE297"><?php echo "<input name=\"button\" type=\"submit\"   id=\"button\" value=\"REMOVE\"  />"; ?></td>
           <?php } ?><?php echo "</form>"; ?></tr>
           <?php } while ($row_Recdependants = mysql_fetch_assoc($Recdependants)); ?>
       </table>
     </div>    
    </td>
    <td> <div id="add" style="border : solid 3px #FFCC66; width : 212px; height : 400px; overflow : auto; font-size:9px"><?php 


echo "<table border=\"0\" align=\"center\">";

do { 
      
	  $scheme=$row_Recscheme['LId'];
	  $status=$row_Recscheme['Status'];
	echo "<tr>";
	echo "<td bgcolor=\"#fff5d9\" align=\"left\" >";
	echo "<form action=\"insertpb.php\" method=\"POST\">";  
	echo $row_Recscheme['Scheme']; 
	echo "</td>";
	echo "<td bgcolor=\"#fff5d9\" align=\"left\" >";
	echo $row_Recscheme['Status']; 
    echo "</td>";
	echo "<td bgcolor=\"#FFE297\" align=\"left\" >";
	echo "<input name=\"button\" type=\"submit\" class=\"btTxt submit\"  id=\"button\" value=\"ADD\"  />";
	echo "</form>";
	echo "</td>";
	echo "</tr>"; 
    } 
while ($row_Recscheme = mysql_fetch_assoc($Recscheme)); 
echo "</table>";

  ?> </div></td>
    <td valign="top"> <div style="border : solid 3px #FFCC66; width : 212px; height : 400px; overflow-y : auto; overflow-x:hidden";>
    <?php
	
	
	
echo "<table border=\"0\" align=\"center\">";
 
do { 
    
	
	echo "<tr>";
	echo "<td bgcolor=\"#fff5d9\" align=\"left\" >";  
	echo "<form action=\"deleteeb.php\" method=\"POST\">";  
    echo $row_Recprincipalscheme['Scheme']; 
	echo "</td>";
	echo "<td bgcolor=\"#fff5d9\" align=\"left\" >";
	echo $row_Recprincipalscheme['Surname']; 
	echo "</td>";
	echo "<td bgcolor=\"#FFE297\" align=\"left\" >";
	echo "<p><input name=\"button\" type=\"submit\" class=\"btTxt submit\"  id=\"button\" value=\"Remove\"  /></p>";
	echo "</form>";
	echo "</td>";
	echo "</tr>";	
	    } 
				
while ($row_Recprincipalscheme = mysql_fetch_assoc($Recprincipalscheme)); 
echo "</table>";

	?>
    
    
    </div>
    
    </td>
  </tr>

</table>
</body>
</html>
<?php
mysql_free_result($Recdependants);

mysql_free_result($Recprincipal);
?>
