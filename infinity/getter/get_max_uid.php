<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);



		$db = getDB();
	$statement=$db->prepare("SELECT MAX(uid) AS maximum FROM biometric_details");
	$statement->execute();
	$results=$statement->fetchAll(PDO::FETCH_ASSOC);
	//var_dump($results);
	$json_results=json_encode($results);
	echo $json_results;

?>