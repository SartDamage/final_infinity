<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_GET;
	$AdminID=$form['ctl00_AdminID'];
	$category_name=$form['ctl00_name'];
	$ccharges=$form['ctl00_charges'];
	$staffid=$form['ctl00_staff_ID'];
$db = getDB();
$statement=$db->prepare("UPDATE `staff_ledger` SET `Consultation_charges`=:ccharges WHERE `ID`=:staffid");
	/* INSERT INTO `ward_details`(`ward_name`, `bed_count`,`bed_available`, `EnteredBy`)  SELECT * FROM (SELECT :category_name,:bed_available,:bed_count, :AdminID) AS tmp WHERE NOT EXISTS (
    SELECT `ward_name` FROM ward_details WHERE `ward_name` = :category_name) LIMIT 1;"
	 */
/* $statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
$statement->bindParam(':category_name', $category_name, PDO::PARAM_INT); */
$statement->bindParam(':ccharges', $ccharges, PDO::PARAM_INT);
$statement->bindParam(':staffid', $staffid, PDO::PARAM_INT);
/* $statement->bindParam(':bed_available', $bed_count, PDO::PARAM_INT);
$statement->bindParam(':AdminID_dup', $AdminID, PDO::PARAM_INT);
$statement->bindParam(':category_name_dup', $category_name, PDO::PARAM_INT);
$statement->bindParam(':bed_count_dup', $bed_count, PDO::PARAM_INT);
$statement->bindParam(':bed_available_dup', $bed_count, PDO::PARAM_INT); */
$statement->execute();
echo $statement->rowCount() ? true : false;
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $statement;
$db=null;
?>