<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;
	$AdminID=$form['ctl00_AdminID'];
	$category_name=$form['ctl00_categoryname'];
$db = getDB();
if(isset($form['ct100_AdminID']))
	{
		$statement=$db->prepare("INSERT INTO `pathologycategorymaster`(`PathologyCategoryName`, `WhenEntered`, `EnteredBy`)  SELECT * FROM (SELECT :category_name,NOW(), :AdminID) AS tmp WHERE NOT EXISTS (
			SELECT `PathologyCategoryName` FROM pathologycategorymaster WHERE `PathologyCategoryName` = :category_name
		) LIMIT 1;");
		$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
		$statement->bindParam(':category_name', $category_name, PDO::PARAM_INT);
		$statement->execute();
	}
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
$db=null;
?>