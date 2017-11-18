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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO visit_note (Enrolee, Created, Creator, Visit, Note, upsize_ts) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Enrolee'], "int"),
                       GetSQLValueString($_POST['Created'], "date"),
                       GetSQLValueString($_POST['Creator'], "int"),
                       GetSQLValueString($_POST['Visit'], "date"),
                       GetSQLValueString($_POST['Note'], "text"),
                       GetSQLValueString($_POST['upsize_ts'], "date"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());
					
					
  $insertGoTo = "consulttwo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$maxRows_recvist1 = 10;
$pageNum_recvist1 = 0;
if (isset($_GET['pageNum_recvist1'])) {
  $pageNum_recvist1 = $_GET['pageNum_recvist1'];
}
$startRow_recvist1 = $pageNum_recvist1 * $maxRows_recvist1;

$colname_recvist1 = "-1";
if (isset($_GET['id'])) {
  $colname_recvist1 = $_GET['id'];
}
mysql_select_db($database_localhost, $localhost);
$query_recvist1 = sprintf("SELECT * FROM visit WHERE Created = %s", GetSQLValueString($colname_recvist1, "date"));
$query_limit_recvist1 = sprintf("%s LIMIT %d, %d", $query_recvist1, $startRow_recvist1, $maxRows_recvist1);
$recvist1 = mysql_query($query_limit_recvist1, $localhost) or die(mysql_error());
$row_recvist1 = mysql_fetch_assoc($recvist1);

if (isset($_GET['totalRows_recvist1'])) {
  $totalRows_recvist1 = $_GET['totalRows_recvist1'];
} else {
  $all_recvist1 = mysql_query($query_recvist1);
  $totalRows_recvist1 = mysql_num_rows($all_recvist1);
}
$totalPages_recvist1 = ceil($totalRows_recvist1/$maxRows_recvist1)-1;

$maxRows_recfull1 = 10;
$pageNum_recfull1 = 0;
if (isset($_GET['pageNum_recfull1'])) {
  $pageNum_recfull1 = $_GET['pageNum_recfull1'];
}
$startRow_recfull1 = $pageNum_recfull1 * $maxRows_recfull1;

$colname2_recfull1 = "-1";
if (isset($_GET['en'])) {
  $colname2_recfull1 = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_recfull1 = sprintf("SELECT enrolee.LId, 
enrolee.Surname     
, enrolee.First_Name    
 , enrolee.Other_Name    
  , enrolee.Born     
  , tribe.Tribe        
  , visit.Created     
  , gender.Gender     
  , enrolee.Home_Address     
  , enrolee.Home_Phone     
  , enrolee.Picture     
  , enrolee_principal.Principal     
  , enrolee_principal.Relationship 
  ,marital.Marital
  FROM newmed06.visit     
  INNER JOIN newmed06.enrolee          
  ON (visit.Enrolee = enrolee.LId)     
  INNER JOIN newmed06.tribe          
  ON (enrolee.Tribe = tribe.Id)     
  INNER JOIN newmed06.gender          
  ON (enrolee.Gender = gender.Id)     
  INNER JOIN newmed06.enrolee_principal          
  ON (enrolee_principal.Enrolee = enrolee.LId)
  INNER JOIN newmed06.marital 
  ON (enrolee.Marital = marital.Id) WHERE visit.Enrolee = %s", GetSQLValueString($colname2_recfull1, "int"));
$query_limit_recfull1 = sprintf("%s LIMIT %d, %d", $query_recfull1, $startRow_recfull1, $maxRows_recfull1);
$recfull1 = mysql_query($query_limit_recfull1, $localhost) or die(mysql_error());
$row_recfull1 = mysql_fetch_assoc($recfull1);

if (isset($_GET['totalRows_recfull1'])) {
  $totalRows_recfull1 = $_GET['totalRows_recfull1'];
} else {
  $all_recfull1 = mysql_query($query_recfull1);
  $totalRows_recfull1 = mysql_num_rows($all_recfull1);
}
$totalPages_recfull1 = ceil($totalRows_recfull1/$maxRows_recfull1)-1;

$maxRows_recenrolee1 = 10;
$pageNum_recenrolee1 = 0;
if (isset($_GET['pageNum_recenrolee1'])) {
  $pageNum_recenrolee1 = $_GET['pageNum_recenrolee1'];
}
$startRow_recenrolee1 = $pageNum_recenrolee1 * $maxRows_recenrolee1;

$colname_recenrolee1 = "-1";
if (isset($_GET['en'])) {
  $colname_recenrolee1 = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_recenrolee1 = sprintf("SELECT * FROM visit_note WHERE Enrolee = %s", GetSQLValueString($colname_recenrolee1, "int"));
$query_limit_recenrolee1 = sprintf("%s LIMIT %d, %d", $query_recenrolee1, $startRow_recenrolee1, $maxRows_recenrolee1);
$recenrolee1 = mysql_query($query_limit_recenrolee1, $localhost) or die(mysql_error());
$row_recenrolee1 = mysql_fetch_assoc($recenrolee1);

if (isset($_GET['totalRows_recenrolee1'])) {
  $totalRows_recenrolee1 = $_GET['totalRows_recenrolee1'];
} else {
  $all_recenrolee1 = mysql_query($query_recenrolee1);
  $totalRows_recenrolee1 = mysql_num_rows($all_recenrolee1);
}
$totalPages_recenrolee1 = ceil($totalRows_recenrolee1/$maxRows_recenrolee1)-1;

$maxRows_recnotes = 5;
$pageNum_recnotes = 0;
if (isset($_GET['pageNum_recnotes'])) {
  $pageNum_recnotes = $_GET['pageNum_recnotes'];
}
$startRow_recnotes = $pageNum_recnotes * $maxRows_recnotes;

$colname3_recnotes = "-1";
if (isset($_GET['en'])) {
  $colname3_recnotes = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_recnotes = sprintf("SELECT DISTINCT     visit_note.Note     , visit_note.Created     , user.User_Name FROM newmed06.service,      newmed06.visit_note     INNER JOIN newmed06.user          ON (visit_note.Creator = user.LId) WHERE visit_note.Enrolee = %s ORDER BY visit_note.Created DESC", GetSQLValueString($colname3_recnotes, "int"));
$query_limit_recnotes = sprintf("%s LIMIT %d, %d", $query_recnotes, $startRow_recnotes, $maxRows_recnotes);
$recnotes = mysql_query($query_limit_recnotes, $localhost) or die(mysql_error());
$row_recnotes = mysql_fetch_assoc($recnotes);

if (isset($_GET['totalRows_recnotes'])) {
  $totalRows_recnotes = $_GET['totalRows_recnotes'];
} else {
  $all_recnotes = mysql_query($query_recnotes);
  $totalRows_recnotes = mysql_num_rows($all_recnotes);
}
$totalPages_recnotes = ceil($totalRows_recnotes/$maxRows_recnotes)-1;

$colname_recuser = "-1";
if (isset($_SESSION['username'])) {
  $colname_recuser = $_SESSION['username'];
}
mysql_select_db($database_localhost, $localhost);
$query_recuser = sprintf("SELECT LId FROM `user` WHERE User_Id = %s", GetSQLValueString($colname_recuser, "text"));
$recuser = mysql_query($query_recuser, $localhost) or die(mysql_error());
$row_recuser = mysql_fetch_assoc($recuser);
$totalRows_recuser = mysql_num_rows($recuser);

$colname_recre = "-1";
if (isset($_GET['pr'])) {
  $colname_recre = $_GET['pr'];
}
mysql_select_db($database_localhost, $localhost);
$query_recre = sprintf("SELECT Surname, First_Name, Other_Name FROM enrolee WHERE LId = %s", GetSQLValueString($colname_recre, "int"));
$recre = mysql_query($query_recre, $localhost) or die(mysql_error());
$row_recre = mysql_fetch_assoc($recre);
$totalRows_recre = mysql_num_rows($recre);

$maxRows_recdes = 10;
$pageNum_recdes = 0;
if (isset($_GET['pageNum_recdes'])) {
  $pageNum_recdes = $_GET['pageNum_recdes'];
}
$startRow_recdes = $pageNum_recdes * $maxRows_recdes;

$colname_recdes = "-1";
if (isset($_GET['en'])) {
  $colname_recdes = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_recdes = sprintf("SELECT relationship.Relationship     , family_disease.Disease     , disease.Disease FROM newmed06.family_disease     INNER JOIN newmed06.enrolee          ON (family_disease.Enrolee = enrolee.LId)     INNER JOIN newmed06.relationship          ON (family_disease.Relationship = relationship.Id)     INNER JOIN newmed06.disease          ON (family_disease.Disease = disease.Id) where enrolee.LId = %s", GetSQLValueString($colname_recdes, "int"));
$query_limit_recdes = sprintf("%s LIMIT %d, %d", $query_recdes, $startRow_recdes, $maxRows_recdes);
$recdes = mysql_query($query_limit_recdes, $localhost) or die(mysql_error());
$row_recdes = mysql_fetch_assoc($recdes);

if (isset($_GET['totalRows_recdes'])) {
  $totalRows_recdes = $_GET['totalRows_recdes'];
} else {
  $all_recdes = mysql_query($query_recdes);
  $totalRows_recdes = mysql_num_rows($all_recdes);
}
$totalPages_recdes = ceil($totalRows_recdes/$maxRows_recdes)-1;

$maxRows_recdrug = 10;
$pageNum_recdrug = 0;
if (isset($_GET['pageNum_recdrug'])) {
  $pageNum_recdrug = $_GET['pageNum_recdrug'];
}
$startRow_recdrug = $pageNum_recdrug * $maxRows_recdrug;

$colname_recdrug = "-1";
if (isset($_GET['en'])) {
  $colname_recdrug = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_recdrug = sprintf("SELECT     drug.Drug FROM     newmed06.enrolee_allergy     INNER JOIN newmed06.enrolee          ON (enrolee_allergy.Enrolee = enrolee.LId)     INNER JOIN newmed06.drug          ON (enrolee_allergy.Drug = drug.Id) WHERE enrolee.LId = %s", GetSQLValueString($colname_recdrug, "int"));
$query_limit_recdrug = sprintf("%s LIMIT %d, %d", $query_recdrug, $startRow_recdrug, $maxRows_recdrug);
$recdrug = mysql_query($query_limit_recdrug, $localhost) or die(mysql_error());
$row_recdrug = mysql_fetch_assoc($recdrug);

if (isset($_GET['totalRows_recdrug'])) {
  $totalRows_recdrug = $_GET['totalRows_recdrug'];
} else {
  $all_recdrug = mysql_query($query_recdrug);
  $totalRows_recdrug = mysql_num_rows($all_recdrug);
}
$totalPages_recdrug = ceil($totalRows_recdrug/$maxRows_recdrug)-1;

$maxRows_recvitals = 10;
$pageNum_recvitals = 0;
if (isset($_GET['pageNum_recvitals'])) {
  $pageNum_recvitals = $_GET['pageNum_recvitals'];
}
$startRow_recvitals = $pageNum_recvitals * $maxRows_recvitals;

$colname_recvitals = "-1";
if (isset($_GET['id'])) {
  $colname_recvitals = $_GET['id'];
}
$colname2_recvitals = "-1";
if (isset($_GET['en'])) {
  $colname2_recvitals = $_GET['en'];
}
mysql_select_db($database_localhost, $localhost);
$query_recvitals = sprintf("SELECT vital.Vital     , measure.Measure     , visit_vital.Reading FROM newmed06.visit_vital     INNER JOIN newmed06.visit          ON (visit_vital.Enrolee = visit.Enrolee)     INNER JOIN newmed06.vital          ON (visit_vital.Vital_FK = vital.Id)     INNER JOIN newmed06.measure          ON (vital.Measure = measure.Id) WHERE visit.Created = %s AND visit.Enrolee = %s", GetSQLValueString($colname_recvitals, "date"),GetSQLValueString($colname2_recvitals, "int"));
$query_limit_recvitals = sprintf("%s LIMIT %d, %d", $query_recvitals, $startRow_recvitals, $maxRows_recvitals);
$recvitals = mysql_query($query_limit_recvitals, $localhost) or die(mysql_error());
$row_recvitals = mysql_fetch_assoc($recvitals);

if (isset($_GET['totalRows_recvitals'])) {
  $totalRows_recvitals = $_GET['totalRows_recvitals'];
} else {
  $all_recvitals = mysql_query($query_recvitals);
  $totalRows_recvitals = mysql_num_rows($all_recvitals);
}
$totalPages_recvitals = ceil($totalRows_recvitals/$maxRows_recvitals)-1;

$colname_recsheme = "-1";
if (isset($_GET['sc'])) {
  $colname_recsheme = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_recsheme = sprintf("SELECT     program.Program     , client.Client     , scheme.Scheme FROM     newmed06.scheme     INNER JOIN newmed06.client          ON (scheme.Company_FK = client.LId)     INNER JOIN newmed06.program          ON (scheme.Program_FK = program.Id) WHERE  scheme.LId = %s", GetSQLValueString($colname_recsheme, "int"));
$recsheme = mysql_query($query_recsheme, $localhost) or die(mysql_error());
$row_recsheme = mysql_fetch_assoc($recsheme);
$totalRows_recsheme = mysql_num_rows($recsheme);

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
$colname2_Recordset1 = "-1";
if (isset($_GET['sc'])) {
  $colname2_Recordset1 = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = sprintf("SELECT * FROM scheme_cover_drug WHERE Effective <= %s and Scheme = %s ORDER BY Effective ASC", GetSQLValueString($colname_Recordset1, "date"),GetSQLValueString($colname2_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset2 = $_GET['id'];
}
$colname2_Recordset2 = "-1";
if (isset($_GET['sc'])) {
  $colname2_Recordset2 = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset2 = sprintf("SELECT * FROM scheme_cover_service WHERE Effective <= %s and Scheme = %s ORDER BY Effective ASC", GetSQLValueString($colname_Recordset2, "date"),GetSQLValueString($colname2_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $localhost) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset3 = $_GET['id'];
}
$colname2_Recordset3 = "-1";
if (isset($_GET['sc'])) {
  $colname2_Recordset3 = $_GET['sc'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset3 = sprintf("SELECT * FROM scheme_cover_procedure WHERE Effective <= %s and Scheme = %s ORDER BY Effective ASC", GetSQLValueString($colname_Recordset3, "date"),GetSQLValueString($colname2_Recordset3, "int"));
$Recordset3 = mysql_query($query_Recordset3, $localhost) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

$maxRows_reclist = 1;
$pageNum_reclist = 1;
if (isset($_GET['pageNum_reclist'])) {
  $pageNum_reclist = $_GET['pageNum_reclist'];
}
$startRow_reclist = $pageNum_reclist * $maxRows_reclist;


mysql_select_db($database_localhost, $localhost);
$query_reclist = "SELECT
    enrolee_principal.Principal
    , enrolee.Surname
    , enrolee.First_Name
    , enrolee.Other_Name
    , enrolee.Born
    , visit.Created
    , enrolee.Picture
    , enrolee.LId
    , gender.Gender
FROM
    newmed06.enrolee_principal
    INNER JOIN newmed06.enrolee 
        ON (enrolee_principal.Enrolee = enrolee.LId)
    INNER JOIN newmed06.visit 
        ON (visit.Enrolee = enrolee.LId)
    INNER JOIN newmed06.gender 
        ON (enrolee.Gender = gender.Id) where visit.Status = 1";
$reclist = mysql_query($query_reclist, $localhost) or die(mysql_error());
$row_reclist = mysql_fetch_assoc($reclist);
$totalRows_reclist = mysql_num_rows($reclist);

if (isset($_GET['totalRows_reclist'])) {
  $totalRows_reclist = $_GET['totalRows_reclist'];
} else {
  $all_reclist = mysql_query($query_reclist);
  $totalRows_reclist = mysql_num_rows($all_reclist);
}
$totalPages_reclist = ceil($totalRows_reclist/$maxRows_reclist)-1;
?>
<script type="text/javascript">var GB_ROOT_DIR = "http://localhost/advance_php_paging/greybox/";</script>
<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />

<table width="100%" border="0">
  <tr>
    <td><table border="0" align="left">
      <tr>
        <td colspan="2"><strong>Personal Info</strong></td>
      </tr>
      <tr>
        <td><font size="-2">Name</font></td>
        <td>
            <input type="text" disabled="disabled" name="textfield" id="textfield" value="<?php echo $row_recfull1['Surname']; ?>" />
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="text" disabled="disabled" name="textfield" id="textfield" value="<?php echo $row_recfull1['First_Name']; ?>&nbsp;<?php echo $row_recfull1['Other_Name']; ?>" /></td>
      </tr>
      <tr>
        <td><font size="-2">Gender</font></td>
        <td><input type="text" disabled="disabled" name="textfield" id="textfield" value="<?php echo $row_recfull1['Gender']; ?>" /></td>
      </tr>
      <tr>
        <td><font size="-2">Family </font></td>
        <td><input type="text" disabled="disabled" name="textfield" id="textfield" value="<?php echo $row_recre['Surname'];?>&nbsp;<?php echo $row_recre['First_Name'];?>" /></td>
      </tr>
      <tr>
        <td><font size="-2">Scheme</font></td>
        <td><input type="text" disabled="disabled" name="textfield" id="textfield" value="<?php echo $row_recsheme['Scheme'];?>" /></td>
      </tr>
      <tr>
        <td><font size="-2">Program</font></td>
        <td><input type="text" disabled="disabled" name="textfield" id="textfield" value="<?php echo $row_recsheme['Program'];?>" /></td>
      </tr>
      <tr>
        <td><font size="-2">Company</font></td>
        <td><input type="text" disabled="disabled" name="textfield" id="textfield" value="<?php echo $row_recsheme['Client'];?>" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><form id="form" name="form1" method="post" action="">
          <label>
            <?php $VisitID =  $_GET['id'];
		   			$Enrolee = $_GET['en'];
					$Principal = $_GET['pr'];
					$Scheme = $_GET['sc'];
					
		   echo "<a href=contact.php?pr=$Principal&en=$Enrolee&sc=$Scheme&id=$VisitID title=\"Contact\" rel=\"gb_page_center[700,500]\" ><font color=\"#009\">Contact</font>
			 </a>" ?>
          </label>
        </form></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <table border="0" align="left">
    <tr>
      <td><strong>Vitals</strong></td>
    </tr>
    <tr>
      <td><table border="0">
        <?php do { ?>
          <tr>
              <td><font size="-2"><?php echo $row_recvitals['Vital']; ?></font>&nbsp;</td>
              <td><font size="-1"><?php echo $row_recvitals['Reading']; ?></font></td>
              <td><font size="-1"><?php echo $row_recvitals['Measure']; ?></font></td>
          </tr>
          <?php } while ($row_recvitals = mysql_fetch_assoc($recvitals)); ?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><form id="form3" name="form1" method="post" action="">
            <?php $VisitID =  $_GET['id'];
		   			$Enrolee = $_GET['en'];
					$Principal = $_GET['pr'];
					$Scheme = $_GET['sc'];
					
					
		   echo "<a href=newvitals.php?pr=$Principal&en=$Enrolee&sc=$Scheme&id=$VisitID title=\"Add new vital reading\" rel=\"gb_page_center[350,150]\" ><font color=\"#009\">new</font>
			 </a>" ?>
          </form></td>
        </tr>
        
      </table></td>
    </tr>
  </table>
 <table border="0" align="left" width="100%">
      <tr>
        <td><font size="-2">This enrollee has been known to react to the following drugs:</font></td>
      </tr>
      <tr>
        <td><table border="0">
          <?php do { ?>
          <tr>
            <td><font size="-1"><?php echo $row_recdrug['Drug']; ?></font></td>
          </tr>
          <?php } while ($row_recdrug = mysql_fetch_assoc($recdrug)); ?>
        </table></td>
      </tr>
      <tr>
        <td><?php $VisitID =  $_GET['id'];
		   			$Enrolee = $_GET['en'];
					$Principal = $_GET['pr'];
					$Scheme = $_GET['sc'];
					
					
		   echo "<a href=newalergy.php?pr=$Principal&en=$Enrolee&sc=$Scheme&id=$VisitID title=\"Add new Drug Alergy\" rel=\"gb_page_center[350,150]\" ><font color=\"#009\">Add new</font>
			 </a>" ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>

      </tr>
    </table>
    <table border="0" width="100%" align="left">
      <tr>
        <td colspan="2"><strong>Family History</strong></td>
      </tr>
      <tr>
        <td colspan="2"><table border="0">
          <?php do { ?>
          <tr>
            <td><font size="-2"><?php echo $row_recdes['Relationship']; ?>:</font>&nbsp;</td>
            <td><font size="-1"><?php echo $row_recdes['Disease']; ?></font></td>
          </tr>
          <?php } while ($row_recdes = mysql_fetch_assoc($recdes)); ?>
        </table></td>
      </tr>
      <tr>
        <td><form id="form4" name="form1" method="post" action="">
          <label>
            <?php $VisitID =  $_GET['id'];
		   			$Enrolee = $_GET['en'];
					$Principal = $_GET['pr'];
					$Scheme = $_GET['sc'];
					
					
		   echo "<a href=newfamdis.php?pr=$Principal&sc=$Scheme&en=$Enrolee&id=$VisitID title=\"Add new Family diesase\" rel=\"gb_page_center[350,150]\" ><font color=\"#009\">Add new</font>
			 </a>" ?>
          </label>
        </form></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
<?php
mysql_free_result($recvist1);

mysql_free_result($recvitals);
?>
