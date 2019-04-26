<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['value_active'])):
    $quickVar1a = $_GET['value_active'];
    $pathodrID = $_GET['dr_ID'];
    $statement=$db->prepare("UPDATE pathology_dr_assigned SET IsActive = :quickVar1a where pathodrID=:pathodrID;"); 
	$statement->bindParam(':quickVar1a', $quickVar1a, PDO::PARAM_INT);
	$statement->bindParam(':pathodrID', $pathodrID, PDO::PARAM_INT);
	$statement->execute();
	$db=null;
	$db = getDB();
	$stmt=$db->prepare("SELECT pda.IsActive FROM pathology_dr_assigned AS pda WHERE pda.pathodrID=:pathodrID1");
	$stmt->bindParam(':pathodrID1', $pathodrID, PDO::PARAM_INT);
	$stmt->execute();
	$results=$stmt->fetch(PDO::FETCH_ASSOC);
	$json=json_encode($results);
	//return $json;
	echo $json;
	$db=null;
endif;
?>