<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
	$surgery_id="";    
	$form = $_GET;
	$AdminID=$form['ctl00_AdminID'];
	$surgery_name=$form['ctl00_surgery_name'];
	if(isset($form['ctl00_surgery_ID']) && $form['ctl00_surgery_ID']<>""){
		$surgery_id=$form['ctl00_surgery_ID'];
	}
	//$bed_count=$form['ctl00_bed_count'];
$db = getDB();
if($surgery_id<>""){
	$statement=$db->prepare("UPDATE `surgery_list` SET `surgery`=:surgery_name,`WhenModified`=NOW(),`ModifiedBy`=:AdminID WHERE `ID`=:surgery_id");
		/* INSERT INTO `ward_details`(`ward_name`, `bed_count`,`bed_available`, `EnteredBy`)  SELECT * FROM (SELECT :category_name,:bed_available,:bed_count, :AdminID) AS tmp WHERE NOT EXISTS (
		SELECT `ward_name` FROM ward_details WHERE `ward_name` = :category_name) LIMIT 1;"
		 */
	$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
	$statement->bindParam(':surgery_name', $surgery_name, PDO::PARAM_STR);
	$statement->bindParam(':surgery_id', $surgery_id, PDO::PARAM_STR);

	$statement->execute();
	if($statement->rowCount() > 0){
		echo "1";
	}else{
		echo "0";  
	}
}else{
	$statement=$db->prepare("INSERT INTO `surgery_list` 
				(`surgery`, `EnteredBy`) 
		VALUES  (:surgery_name, :AdminID)
	ON DUPLICATE KEY UPDATE 
		`surgery` = :surgery_name_dup, `ModifiedBy`=:AdminID_dup, `WhenModified`=Now(); ");
		/* INSERT INTO `ward_details`(`ward_name`, `bed_count`,`bed_available`, `EnteredBy`)  SELECT * FROM (SELECT :category_name,:bed_available,:bed_count, :AdminID) AS tmp WHERE NOT EXISTS (
		SELECT `ward_name` FROM ward_details WHERE `ward_name` = :category_name) LIMIT 1;"
		 */
	$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
	$statement->bindParam(':surgery_name', $surgery_name, PDO::PARAM_STR);
	$statement->bindParam(':AdminID_dup', $AdminID, PDO::PARAM_STR);
	$statement->bindParam(':surgery_name_dup', $surgery_name, PDO::PARAM_STR);

	$statement->execute();
	if($statement->rowCount() > 0){
		echo "1";
	}else{
		echo "0";
	}
}
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
$db=null;
?>