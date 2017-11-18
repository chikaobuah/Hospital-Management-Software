<?php function get_date($month, $year, $week, $day, $direction) {
  if($direction > 0)
    $startday = 1;
  else
    $startday = date('t', mktime(0, 0, 0, $month, 1, $year));

  $start = mktime(0, 0, 0, $month, $startday, $year);
  $weekday = date('N', $start);

  if($direction * $day >= $direction * $weekday)
    $offset = -$direction * 7;
  else
    $offset = 0;

  $offset += $direction * ($week * 7) + ($day - $weekday);
  return mktime(0, 0, 0, $month, $startday + $offset, $year);
} ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
		<meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
		<meta http-equiv="pragma" content="NO-CACHE" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
		<title>Newmed</title>
        
<style type="text/css">
table.sample {
	border-width: 0px;
	border-spacing: 0px;
	border-style:inset;
	border-color: gray;
	border-collapse:collapse;
	background-color: white;
	
}
table.sample th {
	border-width: 0px;
	border-spacing:0px;
	padding: 0px;
	border-style: inset;
	border-color: gray;
	background-color: white;
	-moz-border-radius: ;
}
table.sample td {
	border-width: 0px;
	border-spacing:0px;
	padding: 0px;
	border-style: inset;
	border-color: gray;
	background-color: white;
	-moz-border-radius: ;
}
</style>

<table class="sample">
<tr>
	<th>
	    <input type="text" name="textfield" id="textfield" style=" width:100%; height:100%;"/>
     </th>
	<td><input type="text" name="textfield" id="textfield" style=" width:100%; height:100%;" /></td>
</tr>
<tr>
	<th>
	    <input type="text" name="textfield" id="textfield" style=" width:100%; height:100%;" />
     </th>
	<td><input type="text" name="textfield" id="textfield" style=" width:100%; height:100%;" /></td>
</tr>
<tr>
	<th>
	    <input type="text" name="textfield" id="textfield" style=" width:100%; height:100%;" />
     </th>
	<td><input type="text" name="textfield" id="textfield"  style=" width:100%; height:100%;"/></td>
</tr>
<tr>
	<th>
	    <input type="text" name="textfield" id="textfield" style=" width:100%; height:100%;" />
     </th>
	<td><input type="text" name="textfield" id="textfield" style=" width:100%; height:100%;" /></td>
</tr>
</table>