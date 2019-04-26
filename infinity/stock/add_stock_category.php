<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);   
	$category_id=""; 
	$form = $_GET;
	$AdminID=$form['ctl00_AdminID'];
	$category_name=$form['ctl00_category_name'];
	if(isset($form['ctl00_category_ID']) && $form['ctl00_category_ID']<>""){
		$category_id=$form['ctl00_category_ID'];
	}
	//$bed_count=$form['ctl00_bed_count'];
$db = getDB();
if($category_id<>""){
	$statement=$db->prepare("UPDATE `stock_category` SET `category`=:category_name,`WhenModified`=NOW(),`ModifiedBy`=:AdminID WHERE `ID`=:category_id");
		/* INSERT INTO `ward_details`(`ward_name`, `bed_count`,`bed_available`, `EnteredBy`)  SELECT * FROM (SELECT :category_name,:bed_available,:bed_count, :AdminID) AS tmp WHERE NOT EXISTS (
		SELECT `ward_name` FROM ward_details WHERE `ward_name` = :category_name) LIMIT 1;"
		 */
	$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
	$statement->bindParam(':category_name', $category_name, PDO::PARAM_STR);
	$statement->bindParam(':category_id', $category_id, PDO::PARAM_STR);

	$statement->execute();
	if($statement->rowCount() > 0){
		echo "1";
	}else{ 
		echo "0";
	}
}else{
	$statement=$db->prepare("INSERT INTO `stock_category` 
				(`category`, `EnteredBy`) 
		VALUES  (:category_name, :AdminID)
	ON DUPLICATE KEY UPDATE 
		`category` = :category_name_dup, `ModifiedBy`=:AdminID_dup, `WhenModified`=Now(); ");
		/* INSERT INTO `ward_details`(`ward_name`, `bed_count`,`bed_available`, `EnteredBy`)  SELECT * FROM (SELECT :category_name,:bed_available,:bed_count, :AdminID) AS tmp WHERE NOT EXISTS (
		SELECT `ward_name` FROM ward_details WHERE `ward_name` = :category_name) LIMIT 1;"
		 */
	$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
	$statement->bindParam(':category_name', $category_name, PDO::PARAM_STR);
	$statement->bindParam(':AdminID_dup', $AdminID, PDO::PARAM_STR);
	$statement->bindParam(':category_name_dup', $category_name, PDO::PARAM_STR);

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