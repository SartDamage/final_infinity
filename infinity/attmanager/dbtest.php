<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);

//$json=json_encode($results);
//return $json;
//echo $json;

?>

<?PHP 

	$keyindex="3";
	$serialnumber="2";
	$userid="2";
	$datt="3";
	
	$db = getDB();
$statement=$db->prepare("INSERT INTO `attendance_manager` (`position_key`, `serial_number`,`user_id`,`att_time`) VALUES (:key_index,:serial_no,:user_id,:att_time");
$statement->bindParam(':key_index', $keyindex);
$statement->bindParam(':serial_no', $serialnumber);
$statement->bindParam(':user_id', $userid);
$statement->bindParam(':att_time', $userid);
$statement->execute();

	
	//
	
	
	
	
	$db=null;


	
	
	?>