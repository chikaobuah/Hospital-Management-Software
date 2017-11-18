
<?php require_once('../Connections/localhost.php'); ?>
<?php

echo $ef = $_POST['ef']; echo "&nbsp";
echo $company = $_POST['company']; echo "&nbsp";
echo $scheme = $_POST['scheme'];echo "&nbsp";
echo $plan = $_POST['plan'];echo "&nbsp";
echo $enrolee = $_POST['enrolee'];echo "&nbsp";
echo $che = $_POST['che']; echo "&nbsp";
echo $Id2 = $_POST['Id2']; echo "&nbsp";  

echo $license = $_POST['license']; echo "&nbsp";

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


$colname_enroleescheme = $scheme;
mysql_select_db($database_localhost, $localhost);
$query_enroleescheme = sprintf("SELECT * FROM enrolee_scheme WHERE Scheme = %s", GetSQLValueString($colname_enroleescheme, "int"));
$enroleescheme = mysql_query($query_enroleescheme, $localhost) or die(mysql_error());
$row_enroleescheme = mysql_fetch_assoc($enroleescheme);
$totalRows_enroleescheme = mysql_num_rows($enroleescheme);



session_start();

?>
<table>

  <?php do { ?>
    <tr>
      <td><?php echo $en = $row_enroleescheme['Enrolee']; ?></td>
      <td><?php echo $row_enroleescheme['Principal']; ?></td>
      <td><?php echo $sc = $row_enroleescheme['Scheme']; ?></td>
      <td><?php echo $row_enroleescheme['COY_ID_No']; ?></td>
      <td><?php echo $row_enroleescheme['HMO_Reg_No']; ?></td>
      <td><?php echo $row_enroleescheme['HMO_ID_No']; ?></td>
      <td><?php echo $row_enroleescheme['HMO_Registered']; ?></td>
      <td><?php echo $row_enroleescheme['NHIS_Reg_No']; ?></td>
      <td><?php echo $row_enroleescheme['NHIS_ID_No']; ?></td>
      <td><?php echo $row_enroleescheme['NHIS_Registered']; ?></td>
      <td><?php echo $row_enroleescheme['Status']; ?></td>
      <td><?php echo $row_enroleescheme['Status_Note']; ?></td>
      <td><?php echo $row_enroleescheme['upsize_ts']; ?></td>
      <td><?php echo $row_enroleescheme['Sta']; ?></td>
      <td><?php echo $row_enroleescheme['Id_FK']; ?></td>
    </tr>
    
    <?php 
	$colname_status = $sc;
	$colname2_status = $en;

mysql_select_db($database_localhost, $localhost);
$query_status = sprintf("SELECT * FROM enrolee_scheme_status WHERE Scheme_FK = %s AND Enrolee_FK = %s", GetSQLValueString($colname_status, "int"),GetSQLValueString($colname2_status, "int"));
$status = mysql_query($query_status, $localhost) or die(mysql_error());
$row_status = mysql_fetch_assoc($status);
$totalRows_status = mysql_num_rows($status); ?>

<?php echo "sta = "; echo $sta = $row_status['Sta'];?>
<?php echo "Id2 = "; echo $Id2 = $row_status['Id'];?>


<?php

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
	
	


if ($status >= 0)

{
	$query = "UPDATE enrolee_scheme_status SET Status ='$che',Sta ='$che' WHERE Id ='$Id2'";
	
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
                        ('$en','$sc','$license','$che','$ef','2')" ;	
  
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
?>



    
    <?php } while ($row_enroleescheme = mysql_fetch_assoc($enroleescheme)); ?>
</table>


<?php

$URL="plan.php?co=$company&pl=$plan&sc=$scheme&id=$ef"; 
header ("Location: $URL");

mysql_close($connection);


mysql_free_result($enroleescheme);

mysql_free_result($status);
?>
