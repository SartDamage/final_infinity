<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_GET;
	$AdminID=$form['ctl00_AdminID'];
	$department=$form['ct100_charge_department'];
	$charge_title=$form['ctl00_charge_name'];
	$amount=$form['ctl00_charge_amount'];
	if (isset($form['ctl00_charge_ID']) && ($form['ctl00_charge_ID'] != null)){
		$ID=$form['ctl00_charge_ID'];
		$query="UPDATE `standard_charges` 
						SET `department`=:department, `charge_title`=:charge_title, `amount`=:amount, `WhenModified`=NOW(), `ModifiedBy`=:AdminID WHERE `ID`=:ID;";
	}else {
		$query="INSERT INTO `standard_charges` 
						(`department`, `charge_title`, `amount`, `WhenEntered`, `EnteredBy`) 
				VALUES  (:department,:charge_title,:amount,NOW(),:AdminID)
				 ON DUPLICATE KEY UPDATE `department`=:department_dup,`charge_title`=:charge_title_dup, `amount`=:amount_dup, `WhenModified`= NOW(), `ModifiedBy`=:AdminID_dup ;";
	}
$db = getDB();
$statement=$db->prepare($query);

if (isset($form['ctl00_charge_ID']) && ($form['ctl00_charge_ID'] != null)){
	$statement->bindParam(':ID', $ID, PDO::PARAM_STR);
	$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
	$statement->bindParam(':department', $department, PDO::PARAM_STR);
	$statement->bindParam(':charge_title', $charge_title, PDO::PARAM_STR);
	$statement->bindParam(':amount', $amount, PDO::PARAM_STR);
}else{
	$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
	$statement->bindParam(':department', $department, PDO::PARAM_STR);
	$statement->bindParam(':charge_title', $charge_title, PDO::PARAM_STR);
	$statement->bindParam(':amount', $amount, PDO::PARAM_STR);
	$statement->bindParam(':AdminID_dup', $AdminID, PDO::PARAM_STR);
	$statement->bindParam(':department_dup', $department, PDO::PARAM_STR);
	$statement->bindParam(':charge_title_dup', $charge_title, PDO::PARAM_STR);
	$statement->bindParam(':amount_dup', $amount, PDO::PARAM_STR);
}
/*$statement->execute();*/
if ($statement->execute())
{
	// success
	if (isset($form['ctl00_charge_ID']) && ($form['ctl00_charge_ID'] != null)){
		echo "Changes Made";
	}else{
		echo "Charges added";
	}
}else{
	if (isset($form['ctl00_charge_ID']) && ($form['ctl00_charge_ID'] != null)){
		echo "No Change Made";
	}else{
		echo "Not added";
	}
}
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
$db=null;
?>