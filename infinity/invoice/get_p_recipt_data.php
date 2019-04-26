<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$FORM=$_GET;
if (isset($FORM['PatientId'])  || 	isset($form['RegistrationID'])){
		
		$PatientId = $FORM['PatientId'];
		$RegistrationID = $FORM['RegistrationID'];
	}
$db = getDB();
$statement=$db->prepare("SELECT * FROM `pathology_reciepts` AS pr WHERE pr.PatientId=:PatientId AND pr.RegistrationID=:RegistrationID");
$statement->bindParam(':PatientId', $PatientId, PDO::PARAM_STR);
$statement->bindParam(':RegistrationID', $RegistrationID, PDO::PARAM_STR);
$statement->execute();
$results=$statement->fetch(PDO::FETCH_OBJ);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;
?>