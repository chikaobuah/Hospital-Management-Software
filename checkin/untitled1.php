
<?php
 
 
function dateDiff($dformat, $endDate, $beginDate)
{
    $date_parts1=explode($dformat, $beginDate);
    $date_parts2=explode($dformat, $endDate);
    $start_date=gregoriantojd($date_parts1[0], $date_parts1[1], $date_parts1[2]);
    $end_date=gregoriantojd($date_parts2[0], $date_parts2[1], $date_parts2[2]);
    return $end_date - $start_date;
}




$date1="07/11/2003";
$date2="09/04/2004";
 
echo  "If we subtract " . $date1 . " from " . $date2 . " we get " . dateDiff("/", $date2, $date1) . ".";
?>