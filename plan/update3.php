<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();

echo $ef = $_POST['ef']; echo "&nbsp";
echo $company = $_POST['company']; echo "&nbsp";
echo $scheme = $_POST['scheme'];echo "&nbsp";
echo $plan = $_POST['plan'];echo "&nbsp";
echo $enrolee = $_POST['enrolee'];echo "&nbsp";
echo $che = $_POST['che']; echo "&nbsp";  
echo $id2 = $_POST['Id2']; echo "&nbsp";
echo $sta = $_POST['sta']; echo "&nbsp";
echo $license = $_POST['license']; echo "&nbsp";


echo $status = $sta - 1;

echo "now sta = "; echo $sta;


if ($che == 1)
{
	
	$newsta = 2;
	
	}
	
	if ($che == 0)
{
	
	$newsta = 1;
	
	}
	


echo $che;

if ($status >= 0)

{
	$query = "UPDATE enrolee_scheme_status SET Status ='$che',Sta ='$newsta' WHERE Id ='$id2'";
	
}

else

{
  $query = "INSERT INTO enrolee_scheme_status ( 
											   
      Enrolee_FK
    , Scheme_FK
    , License
    , `Status`
    , Effective_FK
	, Sta
                            )
                        VALUES
                        ('$enrolee','$scheme','$license','$che','$ef','2')" ;	
  
	}
	
	echo $query;
	


$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

$connection = mysql_connect("$host", "$username", "$password");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection);
$sql= $query;
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";


$URL="plan.php?co=$company&pl=$plan&sc=$scheme&id=$ef"; 
header ("Location: $URL");

mysql_close($connection)

?>
