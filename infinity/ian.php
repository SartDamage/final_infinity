<?php
$date=new DateTime(); //this returns the current date time
$result = $date->format('Y-m-d-H-i-m');
$result = explode('-',$result);
$result = implode("",$result);
echo "$result\n";
$prefix="R";
$RegID = ''.$prefix.''.$result.'';
echo $RegID;
?> 