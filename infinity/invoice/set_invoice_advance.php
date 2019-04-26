 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
$FORM = $_POST;
if(isset($FORM["particulars"]) && is_array($FORM["particulars"])){
 if ((isset($FORM['ctl00_reportmaster_AdminID'])) || (isset($FORM["ctl00_AdminID"]))){
	if (isset($FORM['total'])){
		$total = $FORM['total'];
	}else{$total="0.00";}
	if (isset($FORM['subtotal'])){
		$subtotal = $FORM['subtotal'];
	}else if (isset($FORM['total'])){
		$subtotal=$FORM['total'];
		}else{$subtotal="0";}
	if (isset($FORM['discount'])){
		$discount = $FORM['discount'];
	}else{$discount="0.00";}
	if (isset($FORM['paid'])){
		$paid = $FORM['paid'];
	}else{$paid="0.00";}
	if ( isset($FORM['advance']) ){
		$advance = $FORM['advance'];
		//$advance = "151";
	}else {$advance = "0.00";}
	if (isset($FORM['due'])){
		$due = $FORM['due'];
	}else{$due="0.00";}
	if (isset($FORM['paymenttype'])){
		$paymenttype = $FORM['paymenttype'];
		if($paymenttype=="cash"){
			$cheque_no="";
			$transcation_id="";
		}else if($paymenttype=="cheque"){
			$cheque_no=$FORM['cheque_number'];
			$transcation_id="";
		}else if($paymenttype=="electronic"){
			$cheque_no="";
			$transcation_id=$FORM['elctronic_number'];
		}
	}else{$due="";}


	
	if (($due=="0" ||$due=="0.00" || $due="") && (( $paid!=""||$paid!=null||$paid!="0" || $paid!="0.00" || $paid!="00" )|| $discount!="0" || $discount!="00" ||$discount!="0.00" || $discount != "" ) ){$payment=2;}//complete payment done
	else if ( ($due!="0"|| $due!="0.00" || $due!="") &&  ($paid=="" ||$paid=="0" || $paid=="0.00") ) {$payment="0";}//no payment
	
	else if ( ($due!="0"|| $due!="" || $due!="0.00" ) && ($paid!="" || $paid!="00" || $paid!="0.00" ) ){$payment=1;}//partial payment

	else {$payment=0;}
    if (isset($FORM['ctl00_reportmaster_AdminID'])){$admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
	}else if (isset($FORM["ctl00_AdminID"])){$admin_ID = $FORM['ctl00_AdminID'];}
	
	if (isset($FORM['ctl00_RegID'])){$RegID = $FORM['ctl00_RegID'];
	}else if(isset($FORM['regID'])){$RegID = $FORM['regID'];}else{$RegID="";}
	
	if (isset($FORM['reciept_id'])){$RecieptID = $FORM['reciept_id'];
	}else{$RecieptID = null;}
	
	if (isset($FORM['ctl00_PatID'])){$PatID = $FORM['ctl00_PatID'];
	}else{$PatID=null;}

	
	$statement=$db->prepare("INSERT INTO `advance_ipd_record` ( `recieptID`,`registrationID`, `patientID`, `total`, `amount_paid`, `discount`,`balance`,`payment_type`,`cheque_no`,`transaction_id`, `WhenEntered`, `EnteredBy`) VALUES (:RecieptID, :RegID, :PatID, :subtotal, :paid, :discount, :balance, :payment_type,:cheque_no,:transcation_id, NOW(), :AdminID) ON DUPLICATE KEY UPDATE  `total`=:subtotal_dup, `amount_paid`=:paid_dup,  `discount`=:discount, `balance`=:balance_dup, `WhenModified`=NOW(), `ModifiedBy`=:AdminID_dup");

	$statement->bindParam(':subtotal', $subtotal, PDO::PARAM_INT);
	$statement->bindParam(':subtotal_dup', $subtotal, PDO::PARAM_INT);
	$statement->bindParam(':paid', $paid, PDO::PARAM_INT);
	$statement->bindParam(':paid_dup', $paid, PDO::PARAM_INT);
 	$statement->bindParam(':discount', $discount, PDO::PARAM_INT);
 	$statement->bindParam(':discount_dup', $discount, PDO::PARAM_INT);
	$statement->bindParam(':balance', $due, PDO::PARAM_INT);
 	$statement->bindParam(':balance_dup', $due, PDO::PARAM_INT);
	
	$statement->bindParam(':payment_type', $paymenttype, PDO::PARAM_STR);
	$statement->bindParam(':cheque_no', $cheque_no, PDO::PARAM_STR);
	$statement->bindParam(':transcation_id', $transcation_id, PDO::PARAM_STR);
	/*$statement->bindParam(':due', $due, PDO::PARAM_INT); */
	
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
	/* $statement->bindParam(':RegID_dup', $RegID, PDO::PARAM_INT); */
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
	/* $statement->bindParam(':PatID_dup', $PatID, PDO::PARAM_INT); */
	$statement->bindParam(':RecieptID', $RecieptID, PDO::PARAM_STR);
	$statement->execute();
	if ($statement->rowCount() > 0){
		echo "added successfully";
	}else{ echo "unsuccesful";}
	$particulars ="";
	$sql_array = array();
    foreach($FORM["particulars"] as $key => $text_field){
        $particulars = $text_field;
		$quantity = $FORM['qty'][$key];
		$amount=$FORM['price'][$key];
		$cost=$FORM['cost'][$key];
		if(($FORM['price'][$key])<> "" || null){
		$sql_array[] = '(' . $particulars . ', '.$quantity.', '.$amount.', '.$cost.')'; 
		$state=$db->prepare("INSERT INTO `advance_ipd_record_particular` ( `reciept_id`,`patientID`, `Registered_ID`,  `no_of_days`, `particulars`, `amount`, `WhenEntered`, `EnteredBy`) VALUES (:RecieptID,:PatID,:RegID,:days,:particulars,:amount,NOW(),:AdminID) ON DUPLICATE KEY UPDATE `reciept_id`=:RecieptID_dup,`Registered_ID`=:RegID_dup,`no_of_days`=:days_dup, `particulars`=:particulars_dup, `amount`=:amount_dup, `WhenModified`=NOW(),`ModifiedBy`=:AdminID_dup");
		$state->bindParam(':RecieptID', $RecieptID, PDO::PARAM_STR);
		$state->bindParam(':RecieptID_dup', $RecieptID, PDO::PARAM_STR);
		$state->bindParam(':PatID', $PatID, PDO::PARAM_STR);
		$state->bindParam(':RegID', $RegID, PDO::PARAM_STR);
		$state->bindParam(':RegID_dup', $RegID, PDO::PARAM_STR);
		$state->bindParam(':days', $quantity, PDO::PARAM_STR);
		$state->bindParam(':days_dup', $quantity, PDO::PARAM_STR);
		$state->bindParam(':particulars', $particulars, PDO::PARAM_STR);
		$state->bindParam(':particulars_dup', $particulars, PDO::PARAM_STR);
		$state->bindParam(':amount', $amount, PDO::PARAM_INT);
		$state->bindParam(':amount_dup', $amount, PDO::PARAM_INT);
		$state->bindParam(':AdminID', $admin_ID, PDO::PARAM_STR);
		$state->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_STR);
		$state->execute();
		if ($state->rowCount() > 0){
				//echo "added successfully";
		}else{ 	echo "unsuccesful";}
		}
		//write sql to enter individual particulars
    }
	  $db=null;
	}
}
	
?>