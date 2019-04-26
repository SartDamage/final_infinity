<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
if (isset($_GET['dr_ID'])):
    $dr_ID = $_GET['dr_ID'];
	$db = getDB();
	$statement=$db->prepare("SELECT * FROM `ward_details` AS wd where wd.ID=:dr_ID");
	$statement->bindParam(':dr_ID', $dr_ID, PDO::PARAM_INT);
	$statement->execute();
	$results=$statement->fetchAll(PDO::FETCH_ASSOC);
	$json=json_encode($results);
	echo $json;
	return $json;
	//$db=null;
endif;
?>