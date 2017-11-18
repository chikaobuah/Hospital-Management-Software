
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
	  ?>
    <td colspan="3"> <a href=consulting.php>Go</a> </td>
  </tr>
</table>
</body>
</html>
