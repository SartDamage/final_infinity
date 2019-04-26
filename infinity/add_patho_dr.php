<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_GET;
	$AdminID=$form['ctl00_AdminID'];
	$category_name=$form['ctl00_drname'];
$db = getDB();

	//$statement=$db->prepare("INSERT INTO `pathology_dr_assigned`(`pathologist_name`, `EnteredBy`)  SELECT * FROM (SELECT :category_name, :AdminID) AS tmp WHERE NOT EXISTS (SELECT `pathologist_name` FROM pathology_dr_assigned WHERE `pathologist_name` = :category_name) LIMIT 1;");
	$statement=$db->prepare("INSERT INTO `pathology_dr_assigned`( `pathologist_name`, `WhenEntered`, `EnteredBy`) VALUES (:category_name,NOW(),:AdminID);");
	$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
	$statement->bindParam(':category_name', $category_name, PDO::PARAM_STR);
	$statement->execute();

//return $json;
//echo $json;
//$db=null;
?>