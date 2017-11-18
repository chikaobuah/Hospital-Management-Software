<?php require_once('Connections/localhost.php'); ?>
<?php
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

$maxRows_info = 10;
$pageNum_info = 0;
if (isset($_GET['pageNum_info'])) {
  $pageNum_info = $_GET['pageNum_info'];
}
$startRow_info = $pageNum_info * $maxRows_info;

$colname_info = "-1";
if (isset($_GET['en'])) {
  $colname_info = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_info = sprintf("SELECT * FROM enrolee WHERE LId = %s", GetSQLValueString($colname_info, "int"));
$query_limit_info = sprintf("%s LIMIT %d, %d", $query_info, $startRow_info, $maxRows_info);
$info = mysql_query($query_limit_info, $localhost) or die(mysql_error());
$row_info = mysql_fetch_assoc($info);

if (isset($_GET['totalRows_info'])) {
  $totalRows_info = $_GET['totalRows_info'];
} else {
  $all_info = mysql_query($query_info);
  $totalRows_info = mysql_num_rows($all_info);
}
$totalPages_info = ceil($totalRows_info/$maxRows_info)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/menu.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
</head>

<body>
<table border="0">
  <tr>
    <td width="80">&nbsp;</td>
    <td width="188">&nbsp;</td>
    <td width="30">&nbsp;</td>
    <td width="106">&nbsp;</td>
    <td width="216">&nbsp;</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><font size="-2">Picture</font></td>
      <td rowspan="5"><input type="image" src="<?php echo $row_info['Picture']; ?>" /></td>
      <td>&nbsp;</td>
      <td><font size="-2">Nationality</font></td>
      <td><?php echo $row_info['Nationality']; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><font size="-2">Religion</font></td>
      <td><?php echo $row_info['Religion']; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><font size="-2">Occupation</font></td>
      <td><?php echo $row_info['Occupation']; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><font size="-2">Home Address</font></td>
      <td><?php echo $row_info['Home_Address']; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><font size="-2">Home Country</font></td>
      <td><?php echo $row_info['Home_Country']; ?></td>
    </tr>
    <tr>
      <td><font size="-2">Reg No</font></td>
      <td><?php echo $row_info['Reg_No']; ?></td>
      <td>&nbsp;</td>
      <td><font size="-2">Home State</font></td>
      <td><?php echo $row_info['Home_State']; ?></td>
    </tr>
    <tr>
      <td><font size="-2">Registered</font></td>
      <td><?php echo $row_info['Registered']; ?></td>
      <td>&nbsp;</td>
      <td><font size="-2">Home LGA</font></td>
      <td><?php echo $row_info['Home_LGA']; ?></td>
    </tr>
    <tr>
      <td><font size="-2">Surname</font></td>
      <td><?php echo $row_info['Surname']; ?></td>
      <td>&nbsp;</td>
      <td><font size="-2">Home City</font></td>
      <td><?php echo $row_info['Home_City']; ?></td>
    </tr>
    <tr>
      <td><font size="-2">First Name</font></td>
      <td><?php echo $row_info['First_Name']; ?></td>
      <td>&nbsp;</td>
      <td><font size="-2">Home PostCode</font></td>
      <td><?php echo $row_info['Home_PostCode']; ?></td>
    </tr>
    <tr>
      <td><font size="-2">Other Name</font></td>
      <td><?php echo $row_info['Other_Name']; ?></td>
      <td>&nbsp;</td>
      <td><font size="-2">Home Phone</font></td>
      <td><?php echo $row_info['Home_Phone']; ?></td>
    </tr>
    <tr>
      <td><font size="-2">Born</font></td>
      <td><?php echo $row_info['Born']; ?></td>
      <td>&nbsp;</td>
      <td><font size="-2">Job Place</font></td>
      <td><?php echo $row_info['Job_Place']; ?></td>
    </tr>
    <tr>
      <td><font size="-2">Age At Reg</font></td>
      <td><?php echo $row_info['Age_At_Reg']; ?></td>
      <td>&nbsp;</td>
      <td><font size="-2">Business Phone</font></td>
      <td><?php echo $row_info['Business_Phone']; ?></td>
    </tr>
    <tr>
      <td><font size="-2">Gender</font></td>
      <td><?php echo $row_info['Gender']; ?></td>
      <td>&nbsp;</td>
      <td><font size="-2">Mobile Phone</font></td>
      <td><?php echo $row_info['Mobile_Phone']; ?></td>
    </tr>
    <tr>
      <td><font size="-2">Marital</font></td>
      <td><?php echo $row_info['Marital']; ?></td>
      <td>&nbsp;</td>
      <td><font size="-2">Email</font></td>
      <td><?php echo $row_info['Email']; ?></td>
    </tr>
    <tr>
      <td><font size="-2">Tribe</font></td>
      <td><?php echo $row_info['Tribe']; ?></td>
      <td>&nbsp;</td>
      <td><font size="-2">Job Title</font></td>
      <td><?php echo $row_info['Job_Title']; ?></td>
    </tr>
    <tr>
      <td><font size="-2">Origin State</font></td>
      <td><?php echo $row_info['Origin_State']; ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php } while ($row_info = mysql_fetch_assoc($info)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($info);
?>
