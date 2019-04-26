<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$form=$_GET;
$PatID=$form["ID"];
$test=$form["test"];
$test=base64_decode($test);
$db = getDB();
$statement=$db->prepare("Select * FROM $test Where `PatientId` = :PatID");
$statement->bindParam(':PatID', $PatID, PDO::PARAM_INT);
$statement->execute();
$results=$statement->fetch(PDO::FETCH_OBJ);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;
?>