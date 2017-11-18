 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<table width="200" border="1">
  <tr>
    <td rowspan="3">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>

  </tr>
  <tr><?php session_start();
		 $_SESSION["username"]= 'fabamwo';
	  $_SESSION["License"]= 1;
	  
	  
	  $scr = 5;
	  $mod = "AddPre";
$pr = 100000;
$en = 100006;
$sc = 23;
$id = "2010-07-20 11:11:11"; 
$st = 5; 
$cap = 500; 
$lc2 = 1; 
$lc = 1; 
$id2 = "2010-07-20 11:11:11";



	  ?>
    <td colspan="3"><?php echo "<a href=untitled3.php?pr=$pr&en=$en&x=$x&y=$y&z=$z&style=$style&usage=$usage&sc=$sc&st=$st&cap=$cap&lc2=$lc2&lc=$lc&creator=$creator&drug_FK=$drug_FK&provider=$provider&provider=$appointment&request=$request&scr=$scr&mod=$mod&id=$id&&id2=$id2>"; ?>Go</a> </td>
  </tr>
</table>
</body>
</html>
