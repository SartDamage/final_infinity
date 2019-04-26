<?php
include  $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_GET;
	$AdminID=$form['ctl00_AdminID'];
	$ward_name=$form['add_ward_name_main'];
	$bed_type_id=$form['add_bed_type'];
	$bed_name=$form['ctl00_bed_name'];
$db = getDB();
$statement=$db->prepare("INSERT INTO `bed_number` 
			(`ward_id`, `bed_type`,`bed_name`, `EnteredBy`,`WhenEntered`) 
	VALUES  (:ward_name,:bed_type,:bed_name, :AdminID,Now())
ON DUPLICATE KEY UPDATE 
	`ward_id` = :ward_name_dup, `bed_type`=:bed_type_dup, `bed_name`=:bed_name_dup, `ModifiedBy`=:AdminID_dup, `WhenModified`=Now(); ");
	/* INSERT INTO `ward_details`(`ward_name`, `bed_type`,`bed_available`, `EnteredBy`)  SELECT * FROM (SELECT :category_name,:bed_available,:bed_type, :AdminID) AS tmp WHERE NOT EXISTS (
    SELECT `ward_name` FROM ward_details WHERE `ward_name` = :category_name) LIMIT 1;"
	 */
$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
$statement->bindParam(':ward_name', $ward_name, PDO::PARAM_INT);
$statement->bindParam(':bed_type', $bed_type_id, PDO::PARAM_INT);
$statement->bindParam(':bed_name', $bed_name, PDO::PARAM_INT);

$statement->bindParam(':AdminID_dup', $AdminID, PDO::PARAM_INT);
$statement->bindParam(':ward_name_dup', $ward_name, PDO::PARAM_INT);
$statement->bindParam(':bed_type_dup', $bed_type_id, PDO::PARAM_INT);
$statement->bindParam(':bed_name_dup', $bed_name, PDO::PARAM_INT);
$statement->execute();
$count = $statement->rowCount();
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
echo $count;
$db=null;
?>