<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$currdate=date("Y-m-d");
if(isset($_GET['Approv']))
{
	$approval=$_GET['Approv'];//would be either 1 or 2
	
	
}
else{
	
	
}
$idfromget=$_GET['dr_ID'];//userid primary of paid_leave table
$db = getDB();
$statement=$db->prepare("UPDATE `paid_leave_user` SET `token` = :tokens WHERE `paid_leave_user`.`id` =:ID");
$statement->bindParam(':tokens', $approval, PDO::PARAM_STR);
$statement->bindParam(':ID', $idfromget, PDO::PARAM_STR);
$statement->execute();

//$json=json_encode($results);
//return $json;

$db=null;
?>