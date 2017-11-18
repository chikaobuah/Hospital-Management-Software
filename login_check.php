<?php
include("Connections/localhost.php");
include("Connections/mysql.lib.php");

$obj=new connect;
$obj1=new connect;
$obj2=new connect;
$userid=$_GET["userid"];
$password=$_GET["password"];
$companyId=$_GET["company"];




$dbxx=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydbxx=mysql_select_db("newmed06");
$sqlxx="SELECT Licensee_Hqs FROM newmed06.licensee WHERE Licensee.Id=$companyId";
$resultxx=mysql_query($sqlxx); 
$numrowsxx=mysql_num_rows($resultxx);
$rowxx=mysql_fetch_array($resultxx);

$Licensehq =$rowxx['Licensee_Hqs']; 





$sql="select User_Id from user where User_Id='$userid' and  Licensee_Hqs='$Licensehq'";
$obj->query($sql);
$U_num=$obj->num_rows();


if($U_num!=0) {
	$sql1="select User_Password from user where User_Id='$userid' and User_Password='$password' and  Licensee_Hqs='$Licensehq'";
	$obj1->query($sql1);
	$P_num=$obj1->num_rows();
	
	if($P_num!=0) {
		$sql2="select Licensee_Hqs from user where User_Id='$userid' and User_Password='$password' and Licensee_Hqs='$Licensehq'";
		$obj2->query($sql2);
	$C_num=$obj2->num_rows();
	
	if($C_num!=0) {
	// this is where the license and userid seession are created	
	 session_start();
	 $_SESSION["userid"]=$userid;
	 $_SESSION["License"]=$companyId;
	 $_SESSION["Licensehq1"]=$Licensehq;
	
	
	
		echo "1";
	
	}
	else
	{
		echo "Enter valid User ID/Password";
	}
	}
	
	else {
		echo "Enter valid User ID/Password";
	}
}  else {
	echo "Enter valid User ID/Password";
}

?>