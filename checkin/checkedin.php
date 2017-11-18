<?php 	
require_once('../Connections/localhost.php'); 


$fn=$_GET['fn'];
$ID2=$_GET['nd'];




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



$sql=" SELECT
    enrolee_checkin.Licensee
    , enrolee_checkin.LId
    , enrolee_checkin.Status
    , enrolee.Full_Name
,  (YEAR(CURDATE())-YEAR(Born)) - (RIGHT(CURDATE(),5)<RIGHT(enrolee.Born,5)) AS age 
FROM
    newmed06.enrolee_checkin
    INNER JOIN newmed06.enrolee 
        ON (enrolee_checkin.LId = enrolee.LId)WHERE enrolee_checkin.Status=1  order by Surname ";

$result=mysql_query($sql); 
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);


do {
	
	$Full_Name=titleCase ($row['Full_Name']);
	$ID=$row['LId'];
	$age=$row['age'];
		
		

 if($numrows!=0) 
{
echo "<a  class=\"linkr\" 
onClick=\"getData('data1chkin.php?id=$ID','dataplan1stchkin.php?id=$ID&fn=$Full_Name','picture.php?id=$ID' ,'billboard1st.php?id=$ID','service1stchkin.php?id=$ID','clinicchkin.php?id=$ID','countermsgchkin.php?x=1&id=$ID','billboard0.php?id=$ID','ticketchkin.php?id=$ID')\">" .$Full_Name ." "."(".$age.")". "</a>\n";
}
}
while($row=mysql_fetch_array($result));
echo  "<a  class=\"linkr\" 
onClick=\"getData('data1chkin.php?id=$ID2','dataplan1stchkin.php?id=$ID2&fn=$fn','picture.php?id=$ID2' ,'billboard1st.php?id=$ID2','service1stchkin.php?id=$ID2','clinicchkin.php?id=$ID2','countermsgchkin.php?x=1&id=$ID2','billboard0.php?id=$ID2','ticketchkin.php?id=$ID2')\">" .$fn . "</a>\n";
	

//echo $numrows." "."Record"."(s)";
//echo $ID2." "."Record"."(s)";


?>