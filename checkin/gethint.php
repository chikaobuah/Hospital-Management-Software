<?php require_once('../Connections/localhost.php'); ?>

<?php

function  titleCase($string)  { 
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
}




$q=$_GET["q"];

$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 
$mydb=mysql_select_db("newmed06");
$sql="
SELECT
    enrolee_checkin.Licensee
    , enrolee_checkin.LId
    , enrolee_checkin.Status
    , enrolee.Full_Name
,  (YEAR(CURDATE())-YEAR(Born)) - (RIGHT(CURDATE(),5)<RIGHT(enrolee.Born,5)) AS age 
FROM
    newmed06.enrolee_checkin
    INNER JOIN newmed06.enrolee 
        ON (enrolee_checkin.LId = enrolee.LId)WHERE enrolee_checkin.Status=0 and Full_Name LIKE '%" . $q . "%' order by Surname ";

//FROM enrolee WHERE Full_Name LIKE '%" . $q . "%' order by Surname";

$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$numrows=mysql_num_rows($result);
do
{

	
	$Full_Name=titleCase ($row['Full_Name']);
	$ID=$row['LId'];
	$age=$row['age'];
		
 if($numrows!=0) 
{

echo "<a  class=\"linkr\" 
onClick=\"getData('data1.php?id=$ID','dataplan1st.php?id=$ID&fn=$Full_Name','picture.php?id=$ID' ,'billboard1st.php?id=$ID','service1st.php?id=$ID','clinic.php?id=$ID','countermsg.php?x=1&id=$ID','billboard0.php?id=$ID')\">" .$Full_Name ." "."(".$age.")". "</a>\n";

}	}

while($row=mysql_fetch_array($result));
echo $numrows." "."Record"."(s)";

?>

