<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$form=$_GET;
$db = getDB();
if (isset($form['UID'])) {
	$UID = base64_decode($form['UID']);
	$statement=$db->prepare("SELECT ex.* FROM `expense` AS ex JOIN `staff_ledger` as sl on ex.`authorized_for`=sl.ID where `authorized_for`=:uid");
	$statement->bindParam(':uid',$UID, PDO::PARAM_INT);
	$statement->execute();
}else{
	$statement=$db->prepare("SELECT ex.*,sl.firstname,sl.lastname FROM `expense` AS ex  JOIN `staff_ledger` as sl on ex.`authorized_for`=sl.ID where 1");
	$statement->execute();
} 



$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;
?>