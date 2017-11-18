
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php $days =date('Y-m-d h:m:s');	
$end_date = strtotime(date("Y-m-d", strtotime($days)) . " +30 day");
$end_date = date("Y-m-d", $end_date);
echo $end_date; ?>

<table width="200" border="1">
  <tr>
    <td rowspan="3"><?php session_start();
		 $_SESSION["username"]= 'fabamwo';
	  $_SESSION["License"]= 1;
	  ?> </td>
    <td><?php echo "<a href=appointment.php?sc=1><font color=\"#009\">drugpurchase</font>
			 </a>" ;?></td>2
    <td rowspan="2">&nbsp;</td>
    <td><?php 
		 $_SESSION["username"]= 'fabamwo';
	  $_SESSION["License"]= 1;?>
	  
	  </td>
    <td></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>

  </tr>
  <tr>
    <td colspan="3"><?php 
	  
	 echo $date = date('Y-m-d h:m:s');
	 
      echo "<a href=consulting.php?pr=0&sc=0&en=0&id=0000-00-00&id2=0000-00-00&prc=1&src=1&drc=1&cap=0&st=0&date=2010-04-23 00:00:00><font color=\"#009\">doc</font>
			 </a>" ;?> </td>
  </tr>
</table>
</body>
</html>
