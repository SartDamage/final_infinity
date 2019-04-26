
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
	////////////////particulars/////amount
	if (isset($FORM['particulars-0'])){$particulars_0=$FORM['particulars-0'];}else if (isset($FORM['dr_assigned-0'])){$particulars_0=$FORM['dr_assigned-0'];}else{$particulars_0="Dr consultation Charges";}
	if (isset($FORM['particulars-1'])){$particulars_1=$FORM['particulars-1']; if($particulars_1==null || $particulars_1 ==""){$particulars_1=00;}}else{$particulars_1=00;}
	if (isset($FORM['particulars-2'])){$particulars_2=$FORM['particulars-2'];if($particulars_2==null || $particulars_2 ==""){$particulars_2=00;}}else{$particulars_2=00;}
	if (isset($FORM['particulars-3'])){$particulars_3=$FORM['particulars-3'];if($particulars_3==null || $particulars_3 ==""){$particulars_3=00;}}else{$particulars_3=00;}
	if (isset($FORM['particulars-4'])){$particulars_4=$FORM['particulars-4'];if($particulars_4==null || $particulars_4 ==""){$particulars_4=00;}}else{$particulars_4=00;}
	if (isset($FORM['price-0'])){$price_0=$FORM['price-0'];}else if(isset($FORM['total'])){$price_0=$FORM['total'];}else{$price_0=00;}
	if (isset($FORM['price-1'])){$price_1=$FORM['price-1'];if($price_1==null || $price_1 ==""){$price_1="00";}}else{$price_1="00";}
	if (isset($FORM['price-2'])){$price_2=$FORM['price-2'];if($price_2==null || $price_2 ==""){$price_2="00";}}else{$price_2="00";}
	if (isset($FORM['price-3'])){$price_3=$FORM['price-3'];if($price_3==null || $price_3 ==""){$price_3="00";}}else{$price_3="00";}
	if (isset($FORM['price-4'])){$price_4=$FORM['price-4'];if($price_4==null || $price_4 ==""){$price_4="00";}}else{$price_4="00";}
	//////////////////////////////

	
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
	}else if(isset($FORM['patID'])){$PatID = $FORM['patID'];}else if(isset($FORM['ID'])){$PatID = $FORM['ID'];}
    
    if (isset($FORM['advance'])){ 
		$statement=$db->prepare("INSERT INTO `opd_reciepts` (`RegistrationID`, `PatientId`, 
		  `subtotal`,`TotalAmount`,`advance`, `paid`, `discount`,`payment_type`,`cheque_no`,`electronic_id`,

		    `particulars_0`, `particulars_1`, `particulars_2`, `particulars_3`, `particulars_4`, `price_0`, `price_1`, `price_2`, `price_3`, `price_4`,
		
		`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:subtotal,:total,:advance,:paid,:discount,:payment_type,:cheque_no,:transcation_id,
	
	:particulars_0,:particulars_1,:particulars_2,:particulars_3,:particulars_4,:price_0,:price_1,:price_2,:price_3,:price_4,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE `subtotal`=:subtotal,`TotalAmount`=:total_dup,`advance`=:advance_dup,`paid`=:paid_dup, `discount`=:discount_dup,payment_type=:payment_type,cheque_no=:cheque_no,electronic_id=:transcation_id, 
		
`particulars_0`=:particulars_0_dup,
`particulars_1`=:particulars_1_dup, 
`particulars_2`=:particulars_2_dup, 
`particulars_3`=:particulars_3_dup, 
`particulars_4`=:particulars_4_dup, 
 `price_0`=:price_0_dup,
 `price_1`=:price_1_dup,
 `price_2`=:price_2_dup,
 `price_3`=:price_3_dup,
 `price_4`=:price_4_dup,
		
		ModifiedBy=:AdminID_dup,WhenModified=NOW()");
	$statement->bindParam(':total', $total, PDO::PARAM_STR);
	$statement->bindParam(':total_dup', $total, PDO::PARAM_STR);
 	$statement->bindParam(':subtotal', $subtotal, PDO::PARAM_STR);
	$statement->bindParam(':subtotal_dup', $subtotal, PDO::PARAM_STR);
 	$statement->bindParam(':discount', $discount, PDO::PARAM_STR);
	$statement->bindParam(':discount_dup', $discount, PDO::PARAM_STR);
		
	$statement->bindParam(':payment_type', $paymenttype, PDO::PARAM_STR);
	$statement->bindParam(':cheque_no', $cheque_no, PDO::PARAM_STR);
	$statement->bindParam(':transcation_id', $transcation_id, PDO::PARAM_STR);
	
	$statement->bindParam(':advance', $advance, PDO::PARAM_STR);
	$statement->bindParam(':advance_dup', $advance, PDO::PARAM_STR);
	$statement->bindParam(':paid', $paid, PDO::PARAM_STR);
	$statement->bindParam(':paid_dup', $paid, PDO::PARAM_STR);
	
	$statement->bindParam(':particulars_0', $particulars_0, PDO::PARAM_STR);
	$statement->bindParam(':particulars_1', $particulars_1, PDO::PARAM_STR);
	$statement->bindParam(':particulars_2', $particulars_2, PDO::PARAM_STR);
	$statement->bindParam(':particulars_3', $particulars_3, PDO::PARAM_STR);
	$statement->bindParam(':particulars_4', $particulars_4, PDO::PARAM_STR);
	$statement->bindParam(':price_0', $price_0, PDO::PARAM_STR);
	$statement->bindParam(':price_1', $price_1, PDO::PARAM_STR);
	$statement->bindParam(':price_2', $price_2, PDO::PARAM_STR);
	$statement->bindParam(':price_3', $price_3, PDO::PARAM_STR);
	$statement->bindParam(':price_4', $price_4, PDO::PARAM_STR);
		$statement->bindParam(':particulars_0_dup', $particulars_0, PDO::PARAM_STR);
	$statement->bindParam(':particulars_1_dup', $particulars_1, PDO::PARAM_STR);
	$statement->bindParam(':particulars_2_dup', $particulars_2, PDO::PARAM_STR);
	$statement->bindParam(':particulars_3_dup', $particulars_3, PDO::PARAM_STR);
	$statement->bindParam(':particulars_4_dup', $particulars_4, PDO::PARAM_STR);
	$statement->bindParam(':price_0_dup', $price_0, PDO::PARAM_STR);
	$statement->bindParam(':price_1_dup', $price_1, PDO::PARAM_STR);
	$statement->bindParam(':price_2_dup', $price_2, PDO::PARAM_STR);
	$statement->bindParam(':price_3_dup', $price_3, PDO::PARAM_STR);
	$statement->bindParam(':price_4_dup', $price_4, PDO::PARAM_STR);
	
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
	$statement->execute();
	if ($statement->rowCount() > 0){ 
		$paid_new = strval($advance) + strval($paid);
		$state=$db->prepare("UPDATE `patientopd` as popd SET popd.Payment=:payment,popd.paid=:paid_new WHERE `patientID`=:PatID ;");
		$state->bindParam(':PatID', $PatID, PDO::PARAM_STR);
		//$state->bindParam(':PatID1', $PatID, PDO::PARAM_STR);
		$state->bindParam(':payment', $payment, PDO::PARAM_STR);
		$state->bindParam(':paid_new', $paid_new, PDO::PARAM_STR);
		//$state->bindParam(':payment_dup', $payment, PDO::PARAM_STR);
		$state->execute();
		echo "Reciept Saved";
	}else{echo "Could'nt Save";}
		
	  $db=null;
	}
	else{
    $statement=$db->prepare("INSERT INTO `opd_reciepts` (`RegistrationID`, `PatientId`, 
		  `subtotal`,`TotalAmount`, `paid`, `discount`, 
		
		 `particulars_0`, `particulars_1`, `particulars_2`, `particulars_3`, `particulars_4`, `price_0`, `price_1`, `price_2`, `price_3`, `price_4`,
		
		`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
		:subtotal,:total,:paid,:discount,
		
		:particulars_0,:particulars_1,:particulars_2,:particulars_3,:particulars_4,:price_0,:price_1,:price_2,:price_3,:price_4,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE `subtotal`=:subtotal,`TotalAmount`=:total_dup,`paid`=:paid_dup, `discount`=:discount_dup,

		`particulars_0`=:particulars_0_dup, `particulars_1`=:particulars_1_dup, `particulars_2`=:particulars_2_dup, `particulars_3`=:particulars_3_dup, `particulars_4`=:particulars_4_dup, `price_0`=:price_0_dup, `price_1`=:price_1_dup, `price_2`=:price_2_dup, `price_3`=:price_3_dup, `price_4`=:price_4_dup,

		ModifiedBy=:AdminID_dup,WhenModified=NOW()");
	$statement->bindParam(':total', $total, PDO::PARAM_STR);
	$statement->bindParam(':total_dup', $total, PDO::PARAM_STR);
 	$statement->bindParam(':subtotal', $subtotal, PDO::PARAM_STR);
	$statement->bindParam(':subtotal_dup', $subtotal, PDO::PARAM_STR);
 	$statement->bindParam(':discount', $discount, PDO::PARAM_STR);
	$statement->bindParam(':discount_dup', $discount, PDO::PARAM_STR);
	$statement->bindParam(':paid', $paid, PDO::PARAM_STR);
	$statement->bindParam(':paid_dup', $paid, PDO::PARAM_STR);
	
	$statement->bindParam(':particulars_0', $particulars_0, PDO::PARAM_STR);
	$statement->bindParam(':particulars_1', $particulars_1, PDO::PARAM_STR);
	$statement->bindParam(':particulars_2', $particulars_2, PDO::PARAM_STR);
	$statement->bindParam(':particulars_3', $particulars_3, PDO::PARAM_STR);
	$statement->bindParam(':particulars_4', $particulars_4, PDO::PARAM_STR);
	$statement->bindParam(':price_0', $price_0, PDO::PARAM_STR);
	$statement->bindParam(':price_1', $price_1, PDO::PARAM_STR);
	$statement->bindParam(':price_2', $price_2, PDO::PARAM_STR);
	$statement->bindParam(':price_3', $price_3, PDO::PARAM_STR);
	$statement->bindParam(':price_4', $price_4, PDO::PARAM_STR);	
	$statement->bindParam(':particulars_0_dup', $particulars_0, PDO::PARAM_STR);
	$statement->bindParam(':particulars_1_dup', $particulars_1, PDO::PARAM_STR);
	$statement->bindParam(':particulars_2_dup', $particulars_2, PDO::PARAM_STR);
	$statement->bindParam(':particulars_3_dup', $particulars_3, PDO::PARAM_STR);
	$statement->bindParam(':particulars_4_dup', $particulars_4, PDO::PARAM_STR);
	$statement->bindParam(':price_0_dup', $price_0, PDO::PARAM_STR);
	$statement->bindParam(':price_1_dup', $price_1, PDO::PARAM_STR);
	$statement->bindParam(':price_2_dup', $price_2, PDO::PARAM_STR);
	$statement->bindParam(':price_3_dup', $price_3, PDO::PARAM_STR);
	$statement->bindParam(':price_4_dup', $price_4, PDO::PARAM_STR);
	
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
	$statement->execute();
	if ($statement->rowCount() > 0){ 
		$state=$db->prepare("UPDATE `patientopd` as popd SET popd.Payment=:payment WHERE `patientID`=:PatID ;");
		$state->bindParam(':PatID', $PatID, PDO::PARAM_STR);
		$state->bindParam(':payment', $payment, PDO::PARAM_STR);
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
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
	$statement->execute();
	/* $db = getDB();
	$stmt=$db->prepare("SELECT pda.IsActive FROM pathologycategorymaster AS pda WHERE pda.PathologyCategoryID=:pathodrID1");
	$stmt->bindParam(':pathodrID1', $pathodrID, PDO::PARAM_STR);
	$stmt->execute();*/
/* 	$results=$statement->fetch(PDO::FETCH_ASSOC);
	$json=json_encode($results);
	//return $json;
	echo $json;*/
	$db=null;
?>