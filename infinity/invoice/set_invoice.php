 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
$FORM = $_GET;
if ((isset($FORM['ctl00_reportmaster_AdminID'])) || (isset($FORM["ctl00_AdminID"]))):
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
	}else if (isset($FORM['balance'])){
		$due = $FORM['balance'];
	}else{$due="0.00";}
	/**/
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
	}
	/**/
	if (($due=="0" ||$due=="0.00" || $due="") && (( $paid!=""||$paid!=null||$paid!="0" || $paid!="0.00" || $paid!="00" || $advance != "0.00" || $advance !="00" || $advance != null)|| $discount!="0" || $discount!="00" ||$discount!="0.00" || $discount != "" ) ){$payment=2;}//complete payment done
	else if ( ($due!="0"|| $due!="0.00" || $due!="") && ( ($paid=="" ||$paid=="0" || $paid=="0.00") && ($advance==""||$advance==null ||$advance=="0" || $advance=="0.00") ) ){$payment="0";}//else if ( ($due!="0" ||$due!="0.00" || $due!="") && (($advance=="")||($advance==null) ||($advance=="0") || ($advance=="0.00")) ){$payment="0";}//no payment done
	else if ( ($due!="0"|| $due!="" || $due!="0.00" ) && (($paid!="" || $paid!="00" || $paid!="0.00" ) || ($advance!=""||$advance!="0" || $advance!="0.00") ) ){$payment=1;}//partial payment done
	//else if ( (($due!="0")|| $due!="" || $due!="0.00" ) && ($advance!=""||$advance!="0" || $advance!="0.00") ) 
	//{$payment=1;}//partial payment
	else {$payment=0;}
    if (isset($FORM['ctl00_reportmaster_AdminID'])){$admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
	}else if (isset($FORM["ctl00_AdminID"])){$admin_ID = $FORM['ctl00_AdminID'];}
	
	if (isset($FORM['ctl00_reportmaster_RegID'])){$RegID = $FORM['ctl00_reportmaster_RegID'];
	}else if(isset($FORM['regID'])){$RegID = $FORM['regID'];}

	if (isset($FORM['ctl00_reportmaster_PatID'])){$PatID = $FORM['ctl00_reportmaster_PatID'];
	}else if(isset($FORM['patID'])){$PatID = $FORM['patID'];}
	
    
    if (isset($FORM['advance'])){ 
		$statement=$db->prepare("INSERT INTO `pathology_reciepts` (`RegistrationID`, `PatientId`, 
		  `subtotal`,`TotalAmount`,`advance`, `paid`, `discount`,`payment_type`,`cheque_no`,`electronic_id`,
		
		`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:subtotal,:total,:advance,:paid,:discount,:payment_type,:cheque_no,:transcation_id,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE `subtotal`=:subtotal,`TotalAmount`=:total_dup,`advance`=:advance_dup,`paid`=:paid_dup, `discount`=:discount_dup,payment_type=:payment_type,cheque_no=:cheque_no,electronic_id=:transcation_id,ModifiedBy=:AdminID_dup,WhenModified=NOW()");
	$statement->bindParam(':total', $total, PDO::PARAM_STR);
	$statement->bindParam(':total_dup', $total, PDO::PARAM_STR);
 	$statement->bindParam(':subtotal', $subtotal, PDO::PARAM_STR);
	$statement->bindParam(':subtotal_dup', $subtotal, PDO::PARAM_STR);
 	$statement->bindParam(':discount', $discount, PDO::PARAM_STR);
	$statement->bindParam(':discount_dup', $discount, PDO::PARAM_STR);
	$statement->bindParam(':advance', $advance, PDO::PARAM_STR);
	$statement->bindParam(':advance_dup', $advance, PDO::PARAM_STR);
	$statement->bindParam(':paid', $paid, PDO::PARAM_STR);
	$statement->bindParam(':paid_dup', $paid, PDO::PARAM_STR);

	$statement->bindParam(':payment_type', $paymenttype, PDO::PARAM_STR);
	$statement->bindParam(':cheque_no', $cheque_no, PDO::PARAM_STR);
	$statement->bindParam(':transcation_id', $transcation_id, PDO::PARAM_STR);
	
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
	$statement->execute();
	if ($statement->rowCount() > 0){ 
		$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.payment=:payment WHERE `Department`=:PatID ;  UPDATE `pathopatientregistrationparent` as pprp SET pprp.Payment=:payment_dup WHERE `PathoRegID`=:PatID1;");
		$state->bindParam(':PatID', $PatID, PDO::PARAM_STR);
		$state->bindParam(':PatID1', $PatID, PDO::PARAM_STR);
		$state->bindParam(':payment', $payment, PDO::PARAM_STR);
		$state->bindParam(':payment_dup', $payment, PDO::PARAM_STR);
		$state->execute();
		echo "Reciept Saved";
	}else{echo "Could'nt Save";}
		
	  $db=null;
	}
	else{
    $statement=$db->prepare("INSERT INTO `pathology_reciepts` (`RegistrationID`, `PatientId`, 
		  `subtotal`,`TotalAmount`, `paid`, `discount`, 
		
		`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:subtotal,:total,:paid,:discount,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE `subtotal`=:subtotal,`TotalAmount`=:total_dup,`paid`=:paid_dup, `discount`=:discount_dup,  ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':total', $total, PDO::PARAM_STR);
	$statement->bindParam(':total_dup', $total, PDO::PARAM_STR);
 	$statement->bindParam(':subtotal', $subtotal, PDO::PARAM_STR);
	$statement->bindParam(':subtotal_dup', $subtotal, PDO::PARAM_STR);
 	$statement->bindParam(':discount', $discount, PDO::PARAM_STR);
	$statement->bindParam(':discount_dup', $discount, PDO::PARAM_STR);
	$statement->bindParam(':paid', $paid, PDO::PARAM_STR);
	$statement->bindParam(':paid_dup', $paid, PDO::PARAM_STR);


	
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
	$statement->execute();
	if ($statement->rowCount() > 0){ 
		$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.payment=:payment WHERE `Department`=:PatID ;  UPDATE `pathopatientregistrationparent` as pprp SET pprp.Payment=:payment_dup WHERE `PathoRegID`=:PatID1;");
		$state->bindParam(':PatID', $PatID, PDO::PARAM_STR);
		$state->bindParam(':PatID1', $PatID, PDO::PARAM_STR);
		$state->bindParam(':payment', $payment, PDO::PARAM_STR);
		$state->bindParam(':payment_dup', $payment, PDO::PARAM_STR);
		$state->execute();
		echo "Reciept Saved";
	}else{echo "Could'nt Save";}
		
	  /* echo "Data Saved"; */
	  $db=null;
	}
endif;
/* $db=null;
	$db = getDB();
	$statement=$db->prepare("SELECT * FROM p_hbs_ag Where PatientId=:PatID"); 
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_INT);
	$statement->execute();
	/* $db = getDB();
	$stmt=$db->prepare("SELECT pda.IsActive FROM pathologycategorymaster AS pda WHERE pda.PathologyCategoryID=:pathodrID1");
	$stmt->bindParam(':pathodrID1', $pathodrID, PDO::PARAM_INT);
	$stmt->execute();*/
/* 	$results=$statement->fetch(PDO::FETCH_ASSOC);
	$json=json_encode($results);
	//return $json;
	echo $json;*/
	$db=null;
?>