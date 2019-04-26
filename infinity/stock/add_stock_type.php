<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_GET;
	$AdminID=$form['ctl00_AdminID'];
	$stock_category=$form['add_stock_type_main'];
	$type_name=$form['ctl00_type_name'];
	$type_id="";
	if(isset($form['ctl00_type_ID'])){
		$type_id=$form['ctl00_type_ID'];
	}
	//$bed_name=$form['ctl00_bed_name'];
$db = getDB();
if($type_id<>""){
	$statement=$db->prepare("UPDATE `stock_type` SET `category`=:stock_category, `type`=:type_name , `WhenModified`=NOW(),`ModifiedBy`=:AdminID WHERE `ID`=:type_id");
	
	$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
	$statement->bindParam(':stock_category', $stock_category, PDO::PARAM_STR);
	$statement->bindParam(':type_name', $type_name, PDO::PARAM_STR);
	$statement->bindParam(':type_id', $type_id, PDO::PARAM_STR);
}else{
	$statement=$db->prepare("INSERT INTO `stock_type` 
				(`category`, `type`, `EnteredBy`,`WhenEntered`) 
		VALUES  (:stock_category,:type_name, :AdminID,Now())
	ON DUPLICATE KEY UPDATE 
		`category` = :stock_category_dup, `type`=:type_name_dup, `ModifiedBy`=:AdminID_dup, `WhenModified`=Now(); ");
		
	$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
	$statement->bindParam(':stock_category', $stock_category, PDO::PARAM_STR);
	$statement->bindParam(':type_name', $type_name, PDO::PARAM_STR);
	//$statement->bindParam(':bed_name', $bed_name, PDO::PARAM_STR);

	$statement->bindParam(':AdminID_dup', $AdminID, PDO::PARAM_STR);
	$statement->bindParam(':stock_category_dup', $stock_category, PDO::PARAM_STR);
	$statement->bindParam(':type_name_dup', $type_name, PDO::PARAM_STR);
}

$statement->execute();
$count = $statement->rowCount();
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
echo $count;
$db=null;
?>