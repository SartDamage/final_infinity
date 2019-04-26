<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$FORM=$_GET;
$db = getDB();
if (isset($FORM['PatientId'])  || 	isset($form['RegistrationID'])){
		
		$PatientId = $FORM['PatientId'];
		$RegistrationID = $FORM['RegistrationID'];


$statement=$db->prepare("SELECT * FROM `opd_reciepts` AS o_r WHERE o_r.PatientId=:PatientId AND o_r.RegistrationID=:RegistrationID");
$statement->bindParam(':PatientId', $PatientId);
$statement->bindParam(':RegistrationID', $RegistrationID);
$statement->execute();
$results=$statement->fetch(PDO::FETCH_OBJ);
$json=json_encode($results);
//return $json;
echo $json;
	}
$db=null;
?>