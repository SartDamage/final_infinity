<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
$statement=$db->prepare("SELECT bn.*,wd.ward_name,wd.bed_count,wd.bed_available,bt.bed_type FROM `bed_number` as bn 
	Join `ward_details` as wd ON bn.ward_id=wd.ID
    JOIN `bed_type` as bt ON bn.bed_type=bt.ID
    WHERE 1");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;
?>