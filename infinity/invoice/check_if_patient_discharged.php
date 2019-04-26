<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
if (isset($_GET['patientID'])):
    $patientID = base64_decode($_GET['patientID']);
	
	$db = getDB();
	$statement=$db->prepare("SELECT pipd.discharge_date_time,pipd.admit_date_time FROM `patientipd` as pipd WHERE `patientID`=:pid");
	$statement->bindParam(':pid', $patientID, PDO::PARAM_INT);
	$statement->execute();
	$results=$statement->fetchAll(PDO::FETCH_ASSOC);
	$json=json_encode($results);
	echo $json;
	return $json;
	//$db=null;
endif;
?>