<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$ID=$_POST['ID'];
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
$statement=$db->prepare("DELETE  FROM `pathologycategorymaster` WHERE PathologyCategoryID=:ID");
$statement->bindParam("ID", $ID,PDO::PARAM_STR) ;
$statement->execute();
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
$db=null;
?>