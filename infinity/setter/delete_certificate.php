<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$cert_id=$_POST['id'];
$db = getDB();
$statement=$db->prepare("DELETE FROM `certificate_details` where `id`=:c_id");
$statement->bindParam(':c_id',$cert_id);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$count = $statement->rowCount();
echo $count;

$db=null;
?>