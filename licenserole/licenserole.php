<?php require_once('../Connections/localhost.php'); 
session_start();

?>
<?php
$vr="";
$vx="";

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
		<link rel="stylesheet" href="../common/layout.css" />
		<script language="javascript" type="text/javascript" src="cvv.js"></script>
        <link rel="stylesheet" type="text/css" href="../common/css/style.css" />
		<script type="text/javascript" src="../common/scripts/jquery.min.js"></script>
		<script type="text/javascript" src="../common/scripts/custom.js"></script>


        
	
	</head>

<body>

<div id="header" align="right">
	
	 <img alt=""    style="width: 51;height: 17;" src="../images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" />
    <div style=" color:#CF0; font-weight:bold">
	 <?php 
	echo "".$_SESSION["userid"]." || <a style=\" color:#CF0\" href='../logout.php'>Log Out</a> ";	?> 
    </div>
	 
  </div>    <div id="links">

            
   <?php   
  

	$lrolename=" Installation ";
  echo  "<ul><li class=\"selected\"><a class=\"section\" href=\"../license/license.php\">$lrolename</a>
        					<ul>
        						<li><a href=\"../license/license.php\">License setup </a></li>
        						<li><a href=\"../licenserole/licenserole.php\"><b>Role Setup</b></a></li>
								<li><a href=\"../licenseuserrole/licenseuserrole.php\">Access control</a></li>
							</ul>
              </li>" ;		
 
echo "</ul>"
?>         
 </div>
  <div id="links-sub"> </div>
<div  id="content">
    <div id="rsLicense">
  
      
            
              <table   class="sample">
                <tr  class="header">
                  <td >License </td>
                </tr>
              </table>
              <div>
              </div>
              <?php 

	
//connect to the database
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 

//-select the database to use
$mydb=mysql_select_db("newmed06");

//-query the database table
$sql="    		
	SELECT
    Id
    , Licensee
    FROM
    newmed06.licensee  where Id <> 1 order by Id";
//-run the query against the mysql query function
$result=mysql_query($sql); 
//-count results
$numrows=mysql_num_rows($result);
//-create while loop and loop through result set
$row=mysql_fetch_array($result);
echo "<table class=\"sample\" >";
//echo "<ul class=\"list\">";


do{
$Licensee =$row['Licensee'];
$ID=$row['Id'];
	

echo "<tr class=\"tablebody\"><td >";
if(isset($_GET['id'])){$vx=$_GET['id'];}
if ($ID == $vx){ $color = "#84b8d0";  }  else  {  $color = "#e5e5e5";  }
echo "<td >";

echo "<a class=\"linkr\" onClick=\"getData('rl.php?id=$ID','tk1.php?lic=$ID') \">"   . $Licensee ."</a>";
echo "</td>";

 } 

while($row=mysql_fetch_array($result));
echo "</tr>";
echo "</table>";
//echo 	"</ul>";
?>
      
    
            
    </div>
    
<div id="rsservicepoint">

              <table  class="sample">
                <tr class="header">
                  <td >Service Point </td>
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
    newmed06.licensee WHERE Id <> 1 ORDER BY Id LIMIT 1 ";
$resultr=mysql_query($sqlr); 
$rowr=mysql_fetch_array($resultr);
$Licensee =$rowr['Licensee'];
$li=$rowr['Id'];
	
	
	


$cm=$li;
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb1=mysql_select_db("newmed06");
$sqlr1="  SELECT Id , Role  , Rlid FROM  newmed06.role WHERE role.Rlid = $cm ";
$resultr1=mysql_query($sqlr1); 
$rowr1=mysql_fetch_array($resultr1);

echo "<table class=\"sample\">";
do{

$role =$rowr1['Role'];
$rl=$rowr1['Id'];
echo "<tr class=\"tablebody\">"; 
echo "<td>";	
echo "<a class=\"linkr\" onClick=\"gettask('tk.php?id=$rl&lic=$cm') \">"    . $role ."</a></li>\n";
echo "</td>";
 } 

while($rowr1=mysql_fetch_array($resultr1));

echo "</tr>";
echo "</table>";



echo "<form id=\"form2\"  name=\"form2\"    method=\"POST\"/>"; 

echo  "<input type=\"text\" name=\"rolename\" id=\"rolename\" size=\"25\"  onchange=\"addrole('addrole.php')\" />";
echo  "<input type=\"hidden\" name=\"lic\" id=\"lic\" value=\"". $cm." \"   />";


 
echo "</form>";
    




?>
              </div>


            
    </div>
    
    <div id="rstask">
      
              <table class="sample">
                <tr class="header">
                  <td >Task</td>
                </tr>
              </table>
      
<div id="task"  align="left" style=" padding:3px; width : auto; height : 420px; overflow-y : auto; overflow-x:hidden;  background-color:#e5e5e5;">
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









$sqlt="SELECT   Id , Task , Addr FROM  newmed06.task order by Task";
$resultt=mysql_query($sqlt); 
$rowt=mysql_fetch_array($resultt);

echo "<table class=\"sample\">";
do{
echo "<tr class=\"tablebody\"><td >";
$task =$rowt['Task'];
$tid =$rowt['Id'];






$sqlrt="SELECT COUNT(Task) AS myCount FROM  newmed06.role_task	WHERE Role=$cm2 AND Task=$tid ";
$resultrt=mysql_query($sqlrt); 
$row_rt=mysql_fetch_array($resultrt);
$tcount= $row_rt['myCount']; 

if ($tcount<1)
{
		echo "<form action=\"addtask.php?rl=$cm2&tsk=$tid&lcn\" method=\"POST\">"; 
		echo "<a class=\"linkr\" >" ;
		echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" value=\"0\" onClick=\"submit();\" />";
		echo $task ."</a></li>\n";
		echo "</form>"; 
}
else

{
	echo "<form action=\"removetask.php?rl=$cm2&tsk=$tid&lcn=\" method=\"POST\">"; 
	echo "<a class=\"linkr\"  >";
	echo "<input type=\"checkbox\" name=\"che\" id=\"checkbox\" checked=\"checked\" value=\"1\" onClick=\"submit();\" />";
	echo  $task ."</a></li>\n";
	echo "</form>";
}











	

 

 } 
while($rowt=mysql_fetch_array($resultt));



echo "</table>";






?>
             
            </div>
    </div>
</div>
</body>
</html>