<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$pat_id=$_POST['ID'];
$db = getDB();
$statement1=$db->prepare("SELECT * from receipt where recieptID=:pat_id");
$statement1->bindParam(':pat_id', $pat_id);
$statement1->execute();
$results1=$statement1->fetchAll(PDO::FETCH_ASSOC);
$json1=json_encode($results1);
echo $json1;

$db=null;

?>
