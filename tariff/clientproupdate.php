<?php 

 
$procedure = $_GET['procedure'];
$pr = $_GET['pr']; 
$ef = $_GET['ef'];
$sc = $_GET['sc'];
$tariff = $_GET['tariff'];
$tariff2 = $_GET['tariff2'];
$eff = $_GET['eff'];
$session = $_GET['session'];

if (preg_match("/^(){0,1}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,1}([0-9]*)$/", $_GET['tariff'])){

$tariff2 = $tariff2 - 1;


if ($tariff2 >= 0)

{
	$query = "UPDATE client_procedures SET Tariff = '$tariff' WHERE Id ='$procedure'";
	
}

else

{
  $query = "INSERT INTO client_procedures ( 
     Client_FK
    , Effective_FK
    , License
    , Procedure_FK
	, Tariff
    )
VALUES
('$pr','$ef','$session','$eff','$tariff')" ;	
  
	}


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

mysql_close($connection);
echo "1";
} else {
	
	echo "Pls Enter a positive number";
	
	}
exit
?>
