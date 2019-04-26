<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);



		$db = getDB();
		$statement=$db->prepare("SELECT * FROM `biometric_details` WHERE `token`='0'");

	$statement->execute();
	$results=$statement->fetchAll(PDO::FETCH_ASSOC);
	//var_dump($results);
	$json_results=json_encode($results);
	print_r($json_results);
?>