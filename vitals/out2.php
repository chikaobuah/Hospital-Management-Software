<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php 
$date = $_GET['date'];
$URL="consulting.php?pr=0&sc=0&en=0&id=0000-00-00&id2=0000-00-00&prc=1&src=1&drc=1&cap=0&date=$date&st=0"; 
header ("Location: $URL");

?>
<body>
</body>
</html>