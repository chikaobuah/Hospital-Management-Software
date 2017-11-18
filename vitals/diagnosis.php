<?php require_once('../Connections/localhost.php'); ?>
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

?>
<title>Untitled Document</title>
<script language="javascript" type="text/javascript" src="../common/consultingAX.js"></script>
</head>

<body>


  
  <form method="post" id="form11" name="form11">
  <input type="hidden" name="pr" id="pr" value="<?php echo $_GET['pr']; ?>" style="width:100%"/>
 <input type="hidden" name="en" id="en" value="<?php echo $_GET['en']; ?>" style="width:100%"/>
 <input type="hidden" name="sc" id="sc" value="<?php echo $_GET['sc']; ?>" style="width:100%"/>
 <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" style="width:100%"/>
 <input type="hidden" name="st" id="st" value="<?php echo $_GET['st']; ?>" style="width:100%"/>
 <input type="hidden" name="cap" id="cap" value="<?php echo $_GET['cap']; ?>" style="width:100%"/>
 <input type="hidden" name="lc2" id="lc2" value="<?php echo $_GET['lc2']; ?>" style="width:100%"/>
 <input type="hidden" name="lc" id="lc" value="<?php echo $_GET['lc']; ?>" style="width:100%"/>
 <input type="hidden" name="id2" id="id2" value="<?php echo $_GET['id2']; ?>" style="width:100%"/>
    
  <div id="AllDiagnosis"></div>
<table width="100%">
<tr>
     <?php 
	if ($_GET['lc2'] == 2)
	{
		
		$disable = "disabled=\"disabled\"";
		
		}
	else
	{
		
		$disable = "";
		
		} ?>
<td width="20%"><input type="text" <?php echo $disable;?> name="string" id="string" value="" style="width:98%;" onChange=" LoadString();"/></td>
<td align="left" width="80%">  
<div id="DiaString"></div>
</td>
<td>
<input type= "button" onclick="AddDiagnosis();" value="Add" title="Add" style="color: #07c;
        padding: 0px;
        letter-spacing: 0px;
        font-size:8px;
         width:25px;
         height:23px;"/>
</td>
</tr>
  </form>
</table>
<script>
LoadDiagnosis();
LoadString();
</script>
</body>
</html>

