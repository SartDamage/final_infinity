<?php
include   $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include   $_SERVER['DOCUMENT_ROOT']."/session.php";
include   $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
$statement=$db->prepare("SELECT * FROM `stock_category` WHERE 1");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;
?>