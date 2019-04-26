<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
	$form = $_GET;
	$AdminID=$form['ctl00_AdminID'];
	$category_name=$form['ctl00_ward_name'];
	$bed_count=$form['ctl00_bed_count'];
$db = getDB();
$statement=$db->prepare("INSERT INTO `ward_details` 
			(`ward_name`, `bed_count`,`bed_available`, `EnteredBy`) 
	VALUES  (:category_name,:bed_available,:bed_count, :AdminID)
ON DUPLICATE KEY UPDATE 
	`ward_name` = :category_name_dup, `bed_count`=:bed_count_dup, `bed_available`=:bed_available_dup, `ModifiedBy`=:AdminID_dup, `WhenModified`=Now(); ");
	/* INSERT INTO `ward_details`(`ward_name`, `bed_count`,`bed_available`, `EnteredBy`)  SELECT * FROM (SELECT :category_name,:bed_available,:bed_count, :AdminID) AS tmp WHERE NOT EXISTS (
    SELECT `ward_name` FROM ward_details WHERE `ward_name` = :category_name) LIMIT 1;"
	 */
$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
$statement->bindParam(':category_name', $category_name, PDO::PARAM_INT);
$statement->bindParam(':bed_count', $bed_count, PDO::PARAM_INT);
$statement->bindParam(':bed_available', $bed_count, PDO::PARAM_INT);
$statement->bindParam(':AdminID_dup', $AdminID, PDO::PARAM_INT);
$statement->bindParam(':category_name_dup', $category_name, PDO::PARAM_INT);
$statement->bindParam(':bed_count_dup', $bed_count, PDO::PARAM_INT);
$statement->bindParam(':bed_available_dup', $bed_count, PDO::PARAM_INT);
$statement->execute();
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
$db=null;
?>