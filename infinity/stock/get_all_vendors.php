<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
$statement=$db->prepare("SELECT `vendor` FROM `stock_individual` GROUP BY `vendor`");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
$vendor=array();
foreach($results as $row){
    array_push($vendor,$row['vendor']);
}
echo json_encode($vendor);
$db=null;
?>
