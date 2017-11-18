<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" bgcolor="#e5e5e5" style="border:thin; border-color:#000; border-collapse:collapse;">
  <tr bgcolor="#b0b0b0" >
    <td align="center" class="header">To Load ...</td>
  </tr>
<tr align="left" bgcolor="#84B8D0" class="tablebody">
          <?php $ls = $_GET['ls']; ?>
    <td align="left"><?php 
							session_start();
							if ($ls == 1)
							{echo "<strong>Licensee</strong></td>";}
							
							if ($ls == 2)
							{echo "<strong>Client</strong></td>";}
							
							if ($ls == 3)
							{echo "<strong>Program</strong></td>";}
							
							if ($ls == 4)
							{echo "<strong>Plan</strong></td>";}
							
							if ($ls == 5)
							{echo "<strong>Principal</strong></td>";}
							
							if ($ls == 6)
							{echo "<strong>Service</strong></td>";}
							
							if ($ls == 7)
							{echo "<strong>Drugs</strong></td>";}
							
							if ($ls == 8)
							{echo "<strong>Procedures</strong></td>";}
							
							else
							{echo " ";}

							?>
  </tr>
</table>
</body>
</html>