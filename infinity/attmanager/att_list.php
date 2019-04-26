<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
//include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";


//$json=json_encode($results);
//return $json;
//echo $json;

?>

<?PHP 

$value="15";
$rawatt="";

 foreach($_POST as $key => $value) 
{
	
	$rawatt= $key;
$rawatt_split=explode(",",$rawatt);

$array_len=sizeof($rawatt_split);
for($i=0;$i<$array_len-1;$i++){
	$newsubvalue=explode("!",$rawatt_split[$i]);
	$keyindex=$newsubvalue[0];
	$serialnumber=$newsubvalue[1];
	$userid=$newsubvalue[2];
	$datt=$newsubvalue[4];
	/* echo "/";
	echo $keyindex;
	echo "/";
	echo $serialnumber;
	echo "/";
	echo $userid;
	echo "/";
	echo $datt;
	echo " || "; */
	//Db entry
	$db = getDB();
$statement=$db->prepare("INSERT INTO `attendance_manager` (`position_key`, `serial_number`,`user_id`,`att_time`) VALUES (:key_index,:serial_no,:user_id,:att_time)");
$statement->bindParam(':key_index', $keyindex);
$statement->bindParam(':serial_no', $serialnumber);
$statement->bindParam(':user_id', $userid);
$statement->bindParam(':att_time', $datt);
$statement->execute();

	
	//
	
	
	
	
	$db=null;
}

}
	
	
	?>