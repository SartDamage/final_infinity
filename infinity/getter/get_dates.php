<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
$form=$_POST;

$token=$form['token'];


							$db = getDB();

if($token == 1){
		$from_date = $form['from_date'];
		$to_date = $form['to_date'];

$statement=$db->prepare("SELECT * FROM `patientregistrationmaster` WHERE `WhenEntered`>=:from_date AND `WhenEntered` <=:to_date");

$statement->bindParam(':from_date', $from_date);									
$statement->bindParam(':to_date', $to_date);									
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//var_dump($results);
$json_results=json_encode($results);
echo $json_results;
}else{


}






?>	