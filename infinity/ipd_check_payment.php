<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$db = getDB();
	$form = $_GET;
	//$bed_number_id= $form['bed_number_id'];
	$patID = $form['patID'];
	$AdminID = $userDetails->ID;
	$statement=$db->prepare("SELECT ib.advance,ib.amount,ib.paid,ib.discount FROM `ipd_bill` as ib WHERE `instance_id`=:patID ");
	$statement->bindParam(':patID', $patID, PDO::PARAM_STR);
	$statement->execute();
	$total_balance = "";
	$amount = "";
	if($statement->rowCount() > 0){
		$data=$statement->fetchALL();
		foreach($data as $row) {
			$total_balance = (floatval($row['amount'])-floatval($row['advance'])-floatval($row['paid'])-floatval($row['discount']));
			$amount=$row['amount'];
		}
		//echo "Amount ".$amount;
		//echo "total_balance ".floatval($total_balance);
		if($amount=="0"){
			echo "2";
		}else if($total_balance== "0" || $total_balance == "00" || $total_balance == "0.00"){
			echo "0";
		}else{
			echo "1";
		}
	}else{
		echo "Some error occured, \n please try again. or is already discharged";
		$error = $statement->errorInfo();
	}
?>