<?php
$rawatt="1274!11!10019!1!2018-09-27_14:49:26 1275!11!10019!1!2018-09-27_14:49:26";
/* explode("!",$rawatt); */

$rawatt_split=explode(" ",$rawatt);
print_r($rawatt_split);
foreach ($rawatt_split as $splival)
{
	/* $newsubvalue=explode("!",$splival);
	$keyindex=$newsubvalue[0];
	$serialnumber=$newsubvalue[1];
	$userid=$newsubvalue[2];
	$datt=$newsubvalue[4];
	echo "<br>";
	echo "The index key is:".$keyindex;
	echo "<br>";
	echo "Serial no key is:".$serialnumber;
	echo "<br>";
	echo "The user id key is:".$userid;
	echo "<br>";
	echo "The date is is:".$datt;
		echo "<br>";
			echo "<br>"; */

}
/*  foreach($eachatt as $newvalue)
{
	$newsubvalue=explode("!",$newvalue);
	$keyindex=$newsubvalue[0];
	$serialnumber=$newsubvalue[1];
	$userid=$newsubvalue[2];
	$datt=$newsubvalue[4];
	echo "<br>";
	echo "The index key is:".$keyindex;
	echo "<br>";
	echo "Serial no key is:".$serialnumber;
	echo "<br>";
	echo "The user id key is:".$userid;
	echo "<br>";
	echo "The date is is:".$datt;
}  */
?>