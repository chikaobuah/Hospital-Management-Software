<?php require_once('../Connections/localhost.php'); 
session_start();

?>
<?php
$vr="";
$vx="";
$pagetask="Role-Task";
$v=$_SESSION["Licensehq1"];
$vv=$_SESSION["License"];

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
	
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
		<title>Newmed</title>
		<link rel="stylesheet" href="../common/layout.css"/>
        
		<script language="javascript" type="text/javascript" src="cvv.js"></script>
        <script type="text/javascript" src="../common/scripts/jquery.min.js"></script>
   		<link rel="stylesheet" type="text/css" href="../common/css/style.css" />
   		<script type="text/javascript" src="../common/scripts/custom.js"></script>
                


  
	</head>

<body>
<div id="header" align="right">
<img alt=""    style="width: 51;height: 17;" src="../images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" />
<div style=" color:#CF0; font-weight:bold">
<?php 	echo "".$_SESSION["userid"]." || <a style=\" color:#CF0\" href='../logout.php'>Log Out</a> ";	?> 
</div>
</div>
<div id="links"> <?php include('../auth.php')?> </div>
<div id="links-sub">

</div>
<div  id="content">

<table width="100%"   style=" border-style:solid; border-color:#224466; "   >


  <tr>
    
    <td   valign="top" style="border-right-style:solid; border-right-color:#224466; font-weight:bold"width="32%">
      
      <div  style=" width : auto; height : 380px; overflow : auto;"> 
  <table  class="sample">
    <tr  class="header">
      <td >License </td> 
      </tr> 
  </table> 
        <?php 

	
//connect to the database
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 

//-select the database to use
$mydb=mysql_select_db("newmed06");

$sql="    		
	SELECT
    Id
    , Licensee
    FROM
    newmed06.licensee  where Licensee_Hqs = $v";
$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);
echo "<table  id =\"test\" class=\"sample\" >";


do{
$Licensee =$row['Licensee'];
$ID=$row['Id'];
	

echo "<tr class=\"tablebody\" >"; 

  $color = "#E5E5E5";  

echo "<td >";
echo "<a class=\"linkr\" onClick=\"getData('rl.php?id=$ID','tk1.php?lic=$ID') \">"   . $Licensee ."</a>";
echo "</td>";


 } 

while($row=mysql_fetch_array($result));
echo "</tr>";
echo "</table>";
?>
        
        </div></td>
    <td  valign="top" style="border-right-style:solid; border-right-color:#224466; font-weight:bold"width="36%">
      
      <div style=" width : auto; height : 380px; overflow-y : hidden; overflow-x:hidden";>
        <table  class=" sample">
          <tr>
            <td   class="header">Role  </td> 
            </tr> 
  </table>
        

       <div id="role"  align="left" style=" padding:3px; width : auto;  overflow-y : auto; overflow-x:hidden; background-color:#e5e5e5;">    
          <?php 


$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");
$sqlr="  SELECT
    Id
    , Licensee
    FROM
    newmed06.licensee where Licensee_Hqs = $v  ORDER BY Id LIMIT 1 ";
$resultr=mysql_query($sqlr); 
$rowr=mysql_fetch_array($resultr);
$Licensee =$rowr['Licensee'];
$li=$rowr['Id'];
















$cm=$li;


if(isset($_GET['rol']))
{$vr=$_GET['rol'];}



//connect to the  database
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");
$sqlr="  SELECT Id , Role  , Rlid FROM  newmed06.role WHERE role.Rlid  = $cm ";
$resultr=mysql_query($sqlr); 
$rowr=mysql_fetch_array($resultr);
echo "<table  id =\"test\" class=\"sample\"  >";


do{

$role =$rowr['Role'];
$rl=$rowr['Id'];
	


 $color = "#e5e5e5"; 

echo "<tr class=\"tablebody\" ><td bgcolor=\"$color\">";
echo "<a class=\"linkr\" onClick=\"gettask('tk.php?id=$rl&lic=$cm') \">"   . $role ."</a>\n";

 } 

while($rowr=mysql_fetch_array($resultr));

echo "</table>";



echo "<form id=\"form2\"  name=\"form2\"    method=\"POST\">"; 

echo  "<input type=\"text\" name=\"rolename\" id=\"rolename\"  size=\"25\"/>";
 
  
echo "<input type=\"button\" name=\"button2\" id=\"button2\" onClick=\"addrole('thanks.php')\" style=\"background: url(../images/nav-bg.png) repeat-x;\" value=\"Add\" />";



echo "</form>";



?></div> </div>
  </td>
    <td    valign="top"width="32%">
      
      <table  class="sample">
        <tr>
          <td   class="header">Task </td> 
          </tr> 
  </table>
      <div id="task" style=" width : auto; height : 400px;  overflow-y : auto; overflow-x:hidden";> 
     
        
        <?php 


$sqltsk="  SELECT
    Id
    , Role
    , Rlid
FROM
    newmed06.role  WHERE Rlid=2 ORDER BY Id LIMIT 1; ";
$resulttsk=mysql_query($sqltsk); 
$rowtsk=mysql_fetch_array($resulttsk);
$cm2=$rowtsk['Id'];








$dbt=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydbt=mysql_select_db("newmed06");
$sqlt="SELECT   Id , Task , Addr FROM  newmed06.task order by Task";

$resultt=mysql_query($sqlt); 
$rowt=mysql_fetch_array($resultt);

echo "<table class=\"sample\">";
do{
echo "<tr class=\"tablebody\" ><td >";
$task =$rowt['Task'];
$tid =$rowt['Id'];






$sqlrt="SELECT COUNT(Task) AS myCount FROM  newmed06.role_task	WHERE Role=$cm2 AND Task=$tid ";
$resultrt=mysql_query($sqlrt); 
$row_rt=mysql_fetch_array($resultrt);
$tcount= $row_rt['myCount']; 

if ($tcount<1)
{
		echo "<form action=\"addtask.php?rl=$cm2&tsk=$tid&lcn=\" method=\"POST\">"; 
		echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" value=\"0\" onClick=\"submit();\" />";
		echo "<a>"   . $task ."</a>";
		echo "</form>"; 
}
else

{
	echo "<form action=\"removetask.php?rl=$cm2&tsk=$tid&lcn=\" method=\"POST\">"; 
	echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" checked=\"checked\" value=\"1\" onClick=\"submit();\" />";
	echo "<a >"   . $task ."</a>";
	echo "</form>";
}



 } 
while($rowt=mysql_fetch_array($resultt));
echo "</table>";








?>
        </div>
      
      
      </td>
  </tr>
  </table>










</div>
</body>
</html>