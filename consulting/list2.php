<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="../common/consultingAX.js"></script>
<title>Untitled Document</title>
</head>

<body>
<?php
$Capitation = $_GET['cap'];
$Principal = $_GET['pr'];
$Enrolee = $_GET['en'];
$Scheme = $_GET['sc'];
$lc2 = $_GET['lc2'];
$lc = $_GET['lc'];
$status = $_GET['st'];
$VisitID = $_GET['id'];
$VisitID2 = $_GET['id2'];?>
<table width="100%" border="0">
  <tr>
    <td height="27" bgcolor="#999999" align="center"><strong>Treatment</strong></td>
  </tr><?php $lc = $_GET['lc']?>
 <?php 
  $pro = "diagnosis.php";
	  if ($pro == $_GET['lc2'])
	  {
		 $color = "#FFFFFF";
		 
		  }
		  
		  else
		  {
			  $color = "";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
    <td align="left"><?php echo "<a href=\"javascript:listt2('$Principal','$Enrolee', '$Scheme', '$Capitation', '$lc', '$lc2', '$status', '$VisitID', '$VisitID2','showlist2','diagnosis.php');\">";?><font size = "-2">Diagnosis</font></a></td>
  </tr>
   <?php 
  $pro = 2;
	  if ($pro == $_GET['lc2'])
	  {
		 $color = "#FFFFFF";
		 
		  }
		  
		  else
		  {
			  $color = "";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
    <td align="left"><?php echo "<a href=\"javascript:listt2e('$Principal','$Enrolee', '$Scheme', '$Capitation', '$lc', '$lc2', '$status', '$VisitID', '$VisitID2','showlist2','prescription.php');\">";?><font size = "-2">Prescriptions</font></a></td>
  </tr>
  <?php 
  $pro = 3;
	  if ($pro == $_GET['lc2'])
	  {
		 $color = "#FFFFFF";
		 
		  }
		  
		  else
		  {
			  $color = "";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
    <td align="left"><?php echo "<a href=\"javascript:listt2a('$Principal','$Enrolee', '$Scheme', '$Capitation', '$lc', '$lc2', '$status', '$VisitID', '$VisitID2','showlist2','investigation.php');\">";?><font size = "-2">Investigations</font></a></td>
  </tr>
  <?php 
  $pro = 4;
	  if ($pro == $_GET['lc2'])
	  {
		 $color = "#FFFFFF";
		 
		  }
		  
		  else
		  {
			  $color = "";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
    <td align="left"><?php echo "<a href=\"javascript:listt2b('$Principal','$Enrolee', '$Scheme', '$Capitation', '$lc', '$lc2', '$status', '$VisitID', '$VisitID2','showlist2','allergy.php');\">";?><font size = -2>Allergy</font></a></td>
  </tr>
  <?php 
  $pro = 5;
	  if ($pro == $_GET['lc2'])
	  {
		 $color = "#FFFFFF";
		 
		  }
		  
		  else
		  {
			  $color = "";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
    <td align="left"><?php echo "<a href=\"javascript:listt2c('$Principal','$Enrolee', '$Scheme', '$Capitation', '$lc', '$lc2', '$status', '$VisitID', '$VisitID2','showlist2','health.php');\">";?><font size = -2>Family Health</font></td>
  </tr>
   <?php 
  $pro2 = 7;
	  if ($pro2 == $_GET['lc2'])
	  {
		 $color = "#FFFFFF";
		 
		  }
		  
		  else
		  {
			  $color = "";
			  }
		   echo "<tr align=\"left\" bgcolor=\"$color\">"; ?>
    <td align="left"><?php echo "<a href=\"javascript:listt2d('$Principal','$Enrolee', '$Scheme', '$Capitation', '$lc', '$lc2', '$status', '$VisitID', '$VisitID2','showlist2','appointment.php');\">";?><font size = "-2">Appointment</font></td>
  </tr>
</table>
</body>
</html>