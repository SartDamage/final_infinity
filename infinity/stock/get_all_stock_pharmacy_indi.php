<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$uid=$_GET['dr_ID'];
$db = getDB();
$statement=$db->prepare("SELECT id,type,brand,model_no,department,number_stock,price from stock_individual where id=:rowid ");
$statement->bindParam(':rowid', $uid, PDO::PARAM_STR);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;
?>