<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
$form=$_POST;
	$db = getDB();
$id=$form['ID'];
$statement=$db->prepare("SELECT * FROM `stock_individual` WHERE `ID`=:ID");
									
$statement->bindParam(':ID', $ID);									
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//var_dump($results);
$json_results=json_encode($results);
echo $json_results;
}else{


}






?>	