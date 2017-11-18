<?php require_once('../Connections/localhost.php'); ?>

<?php
$eff = $_POST['Start_date'];
$session = $_POST['session'];
$status = 1;
$pr = $_POST['pr'];
$ef = $_POST['ef'];

$host="localhost"; 
$username="root";
$password="";
$database="newmed06";

$connection3 = mysql_connect("$host", "$username", "$password");
if (!$connection3)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("newmed06", $connection3);
$sql3="INSERT INTO provider ( 
   Provider_FK
    , License
    , provider.Status
    )
VALUES
('$eff','$session','$status')";
if (!mysql_query($sql3,$connection3))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";


$URL="tariff.php?pr=$pr&ef=$ef"; 
header ("Location: $URL");

mysql_close($connection3)
?>

