<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);
$db=null;
$db = getDB();
$AdminID=$userDetails->ID;
$form = $_POST;
$date_bill=$form['date_bill'];
$vendor_name=$form['vendor_name'];
$rID=$form['rID'];
$particulars=$form['particulars'];
$vendor_contact=$form['vendor_contact'];
$autho=$form['autho_real'];
$Amount=$form['Amount'];
$department=$form['department'];
$paymenttype=$form['paymenttype'];
	if($paymenttype=="cash"){
		$query="INSERT INTO `expense`(`vendor_name`, `eID`, `particulars`, `vendor_contact`, `authorized_for`, `amount`, `payment_type`, `date`,`department`,`WhenEntered`,`EnteredBy`) VALUES (:vendor_name,:eID,:particulars,:vendor_contact,:authorized_for,:Amount,:paymenttype,:date_bill,:department,NOW(),:AdminID) ON DUPLICATE KEY UPDATE 
			WhenEntered=NOW()";
	}else if($paymenttype=="cheque"){
		$query="INSERT INTO `expense`(`vendor_name`, `eID`, `particulars`, `vendor_contact`, `authorized_for`, `amount`, `payment_type`, `date`, `cheque_number`,`department`,`WhenEntered`,`EnteredBy`) VALUES (:vendor_name,:eID,:particulars,:vendor_contact,:authorized_for,:Amount,:paymenttype,:date_bill,:cheque_number,:department,NOW(),:AdminID) ON DUPLICATE KEY UPDATE 
			WhenEntered=NOW()";
		$cheque_number=$form['cheque_number'];
	}else if($paymenttype=="electronic"){
		$query="INSERT INTO `expense`(`vendor_name`, `eID`, `particulars`, `vendor_contact`, `authorized_for`, `amount`, `payment_type`, `date`, `electronic_number`,`department`,`WhenEntered`,`EnteredBy`) VALUES (:vendor_name,:eID,:particulars,:vendor_contact,:authorized_for,:Amount,:paymenttype,:date_bill,:cheque_number,:department,NOW(),:AdminID) ON DUPLICATE KEY UPDATE 
			WhenEntered=NOW()";
		$cheque_number=$form['elctronic_number'];
	}
    $statement=$db->prepare($query);
			
	$statement->bindParam(':vendor_name', $vendor_name, PDO::PARAM_STR);
	$statement->bindParam(':eID', $rID, PDO::PARAM_STR);
	
	$statement->bindParam(':particulars', $particulars, PDO::PARAM_STR);
	$statement->bindParam(':vendor_contact', $vendor_contact, PDO::PARAM_STR);
	$statement->bindParam(':authorized_for', $autho, PDO::PARAM_STR);
	$statement->bindParam(':Amount', $Amount, PDO::PARAM_STR);
	$statement->bindParam(':department', $department, PDO::PARAM_STR);
	$statement->bindParam(':paymenttype', $paymenttype, PDO::PARAM_STR);
	$statement->bindParam(':date_bill', $date_bill, PDO::PARAM_STR);
	if ($paymenttype=="cheque" || $paymenttype=="electronic" ){
		$statement->bindParam(':cheque_number', $cheque_number, PDO::PARAM_STR);
		}
	
	$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
	
	$statement->execute();
	$db=null;
	$db = getDB();
	if ($statement->rowCount() > 0)
    {
        echo "Expense Saved";
		
    }
	else{echo "Error";}
	$db=null;
?>	