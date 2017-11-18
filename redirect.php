<?php 

include("Connections/localhost.php");

session_start();
mysql_select_db($database_localhost, $localhost);
$query_userid = "select LId from user where User_Id='".$_SESSION["userid"]."'";
$recuser= mysql_query($query_userid, $localhost) or die(mysql_error());
$row_userid = mysql_fetch_array($recuser);
$_SESSION["userlid"]=$row_userid["LId"];







switch ($_SESSION["Licensehq1"])
{
case 1:
 header("location: /NewMed/license/license.php");
  
  break;

default:
  
  
$rrrt=$_SESSION["License"];

mysql_select_db($database_localhost, $localhost);
$sqlrt="SELECT STATUS AS myCount FROM  newmed06.user	WHERE LId='".$row_userid["LId"]."' ";
$resultrt=mysql_query($sqlrt); 
$row_rt=mysql_fetch_array($resultrt);
$tcount= $row_rt['myCount']; 


echo $tcount;

if ($tcount==0)
{
session_destroy();
header("location: /NewMed/index.php?stat=1");}  

else{	


mysql_select_db($database_localhost, $localhost);
$query_roleid = "SELECT  user_role.User ,user_role.Role as rl , role.Role
 FROM newmed06.user_role  INNER JOIN newmed06.role  ON (user_role.Role = role.Id) where user_role.User='".$row_userid["LId"]."' AND user_role.License='".$_SESSION["License"]."' ";
$recroleuser= mysql_query($query_roleid, $localhost) or die(mysql_error());
$row_roleid = mysql_fetch_array($recroleuser);

//checking if a user has at least one role
mysql_select_db($database_localhost, $localhost);
$query_ticket = "SELECT COUNT(Role) AS myCount FROM newmed06.user_role where USER='".$row_userid["LId"]."' and  License=$rrrt";
$ticket= mysql_query($query_ticket, $localhost) or die(mysql_error());
$row_ticket = mysql_fetch_array($ticket);
$ticketc= $row_ticket['myCount']; 



if($ticketc>0){//if user has role do this

$y=0;
$x=0;
		do{ 

			 $rolidarr[$y] = $row_roleid["rl"]; //id of role
			$rolnamarr[$x] = $row_roleid["Role"]; //name of role
			$y++;// the no of roles user has
			$x++;// the no of roles user has
		}
			while($row_roleid=mysql_fetch_array($recroleuser));
			
$_SESSION["roleid"]=$rolidarr;
$_SESSION["rolename"]=$rolnamarr;
$_SESSION["noofroles"]=$x;




	 
$y2=0;
$rt1=0;
$rtn=0;
do{ 
		$x2=$rolidarr[$y2];	//id of first role
		
		mysql_select_db($database_localhost, $localhost);
		$query_taskid = "SELECT role_task.Role  , role_task.Task as tk  , role_task.RTlid , task.Task, task.Addr
		FROM newmed06.role_task  INNER JOIN newmed06.task ON (role_task.Task = task.Id)
		WHERE role_task.Role= $x2 AND RTlid='".$_SESSION["License"]."' group by Grouporder";
		$rectask= mysql_query($query_taskid, $localhost) or die(mysql_error());
		$row_task = mysql_fetch_array($rectask);
		

		$c=0;
		
// the do staement bellow is to extract the values of the task from $row_task
		do
		{ 
//put task result for $x2 role into array
		$taskidarr[$c] = $row_task["tk"]; //id of task
		$tasknamarr[$c] = $row_task["Task"]; //name of task
		$taskaddarr[$c] = $row_task["Addr"]; //name of task
		$c++;// the no of task user has for $x2 role
//echo $taskidarr[$c];
		
		}
		while($row_task=mysql_fetch_array($rectask));


//$roletask=array();
//assign all the task for role $x2 to array $roletask

$taskidarr[$rt1]=array($taskidarr);
$roletask[$rt1]=array($tasknamarr);
$roletaskaddr[$rt1]=array($taskaddarr);


$arry[] = $c;// the no of task user has for $x2 role store in array $arry
$rt1++;
$y2++;
} while($y>$y2);

$_SESSION["rtn"]=$arry;//session stores the number of task for a given role
$_SESSION["taskidarr"]=$taskidarr;
$_SESSION["roletask"]=$roletask;//names of task assigned to a given role
$_SESSION["roletaskaddr"]=$roletaskaddr;

$addname= $_SESSION["roletaskaddr"][0][0][0];
//echo $_SESSION["rtn"][1];
echo $roletask[0][0][0];



header("location: ".$addname);
}
else
{

session_destroy();
header("location: /NewMed/index.php?stat=0");} }
}




	 ?>

