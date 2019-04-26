 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
$FORM = $_POST;
$stock_update_val="";
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
	}if (isset($FORM['paymenttype'])){
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
	}/* else if (isset($FORM['balance'])){
		$due = $FORM['balance'];
	} */else{$due="0.00";}
	
	if(isset($FORM['pname']))
	{
$patname=$FORM['pname'];
		}
		else{
		$patname="";
			}
			
			if(isset($FORM['p_age']))
			{
		$p_age=$FORM['p_age'];
				}
				else{
					$p_age="";
					}
					if(isset($FORM['sex']))
					{
				$p_sex=$FORM['sex'];
						}
						else{
						$p_sex="";
							}
			
			
/*	////////////////particulars/////amount
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

	
	*/if (($due=="0" ||$due=="0.00" || $due="") && (( $paid!=""||$paid!=null||$paid!="0" || $paid!="0.00" || $paid!="00" || $advance != "0.00" || $advance !="00" || $advance != null)|| $discount!="0" || $discount!="00" ||$discount!="0.00" || $discount != "" ) ){$payment=2;}//complete payment done
	else if ( ($due!="0"|| $due!="0.00" || $due!="") && ( ($paid=="" ||$paid=="0" || $paid=="0.00") && ($advance==""||$advance==null ||$advance=="0" || $advance=="0.00") ) ){$payment="0";}//else if ( ($due!="0" ||$due!="0.00" || $due!="") && (($advance=="")||($advance==null) ||($advance=="0") || ($advance=="0.00")) ){$payment="0";}//no payment done
	else if ( ($due!="0"|| $due!="" || $due!="0.00" ) && (($paid!="" || $paid!="00" || $paid!="0.00" ) || ($advance!=""||$advance!="0" || $advance!="0.00") ) ){$payment=1;}//partial payment done
	//else if ( (($due!="0")|| $due!="" || $due!="0.00" ) && ($advance!=""||$advance!="0" || $advance!="0.00") ) 
	//{$payment=1;}//partial payment
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
  
	//echo $FORM['ctl00_reportmaster_AdminID']."\n".$total."\n".$subtotal."\n".$discount."\n".$advance."\n".$due."\n".$payment."\n".$RegID."\n".$PatID."\n";
	$statement=$db->prepare("INSERT INTO `pharmacy_bill` ( `patient_name`,`age`,`sex`,`recieptID`,`Registered_ID`, `instance_id`,  `advance`, `amount`, `paid`, `discount`,`payment_type`,`cheque_no`,`electronic_id`, `WhenEntered`, `EnteredBy`) VALUES (:name,:age,:sex,:RecieptID,:RegID,:PatID,:advance,:subtotal,:paid,:discount,:payment_type,:cheque_no,:transcation_id,NOW(),:AdminID)
	ON DUPLICATE KEY UPDATE 
	`advance`=:advance_dup, `amount`=:subtotal_dup, `paid`=:paid_dup, `discount`=:discount,payment_type=:payment_type,cheque_no=:cheque_no,electronic_id=:transcation_id,`WhenModified`=NOW(),`ModifiedBy`=:AdminID_dup");
    $statement->bindParam(':name', $patname);
	$statement->bindParam(':age', $p_age);
	$statement->bindParam(':sex', $p_sex);
	$statement->bindParam(':advance', $advance);
	$statement->bindParam(':advance_dup', $advance);
	$statement->bindParam(':subtotal', $subtotal );
	$statement->bindParam(':subtotal_dup', $subtotal );
	$statement->bindParam(':paid', $paid );
	$statement->bindParam(':paid_dup', $paid );
 	$statement->bindParam(':discount', $discount );
 	$statement->bindParam(':discount_dup', $discount );
	/*$statement->bindParam(':due', $due ); */
	
	$statement->bindParam(':payment_type', $paymenttype );
	$statement->bindParam(':cheque_no', $cheque_no );
	$statement->bindParam(':transcation_id', $transcation_id );

	
	$statement->bindParam(':AdminID', $admin_ID );
	$statement->bindParam(':AdminID_dup', $admin_ID );
	$statement->bindParam(':RegID', $RegID );
	/* $statement->bindParam(':RegID_dup', $RegID ); */
	$statement->bindParam(':PatID', $PatID );
	/* $statement->bindParam(':PatID_dup', $PatID ); */
	$statement->bindParam(':RecieptID', $RecieptID );
	$statement->execute();
	if ($statement->rowCount() > 0){
		echo "added successfully";
	}else{ echo "unsuccesful";}
	$particulars ="";
	$sql_array = array();
    foreach($FORM["particulars"] as $key => $text_field){
		$particulars = $text_field;
		$quantity = $FORM['qty'][$key];
		$batch = $FORM['batch'][$key];
		$exp_date = $FORM['mnf'][$key];
	

        
		
		$amount=$FORM['price'][$key];
		$cost=$FORM['cost'][$key];
		if($text_field == "" || $text_field == null){}
		else if($text_field<> "" && $text_field<> null){
		$sql_array[] = '(' . $particulars . ', '.$quantity.', '.$amount.', '.$cost.')'; 
		$state=$db->prepare("INSERT INTO `pharmacy_bill_particulars` ( `reciept_id`,`instance_id`, `Registered_ID`,  `no_of_days`, `particulars`, `amount`, `WhenEntered`, `EnteredBy`,`exp_date`,`batch_no`) VALUES
		(:RecieptID,:PatID,:RegID,:days,:particulars,:amount,NOW(),:AdminID,:expdate,:batch_no)
 ON DUPLICATE KEY UPDATE `reciept_id`=:RecieptID_dup,`Registered_ID`=:RegID_dup,`no_of_days`=:days_dup, `particulars`=:particulars_dup, `amount`=:amount_dup, `WhenModified`=NOW(),`ModifiedBy`=:AdminID_dup");
		$state->bindParam(':RecieptID', $RecieptID );
		$state->bindParam(':RecieptID_dup', $RecieptID );
		$state->bindParam(':PatID', $PatID );
		$state->bindParam(':RegID', $RegID );
		$state->bindParam(':RegID_dup', $RegID );
		$state->bindParam(':days', $quantity );
		$state->bindParam(':days_dup', $quantity );
		$state->bindParam(':particulars', $particulars );
		$state->bindParam(':particulars_dup', $particulars );
		$state->bindParam(':amount', $amount );
		$state->bindParam(':amount_dup', $amount );
		$state->bindParam(':AdminID', $admin_ID );
		$state->bindParam(':AdminID_dup', $admin_ID );
		$state->bindParam(':expdate', $exp_date);
		$state->bindParam(':batch_no', $batch);
		$state->execute();
		if ($state->rowCount() ==1){
				$stockupdate=$db->prepare("SELECT `brand`,`model_no`,`number_stock` from `stock_individual` where `category`=4");
		$stockupdate->execute();
		$results=$stockupdate->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $stockval)
		{
			$model_nop=$stockval['model_no'];
           if($particulars==$model_nop)
		   {
		$currval= $stockval['number_stock'];	
		 $stock_update_val=$currval-$quantity;
		 
		 $stockinupdate=$db->prepare("UPDATE `stock_individual` SET `number_stock`=:stocknum,`WhenModified`=NOW()  WHERE `model_no`=:model_name");
		 $stockinupdate->bindParam(':stocknum', $stock_update_val, PDO::PARAM_INT);
		 $stockinupdate->bindParam(':model_name', $model_nop, PDO::PARAM_INT);

		$stockinupdate->execute();
		 
		   }
		
		}
		}
		 elseif ($state->rowCount()==2)
		 {
				$stockupdate=$db->prepare("SELECT `brand`,`model_no`,`number_stock` from `stock_individual` where `category`=4");
		$stockupdate->execute();
		$results=$stockupdate->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $stockval)
		{
			$model_nop=$stockval['model_no'];
           if($particulars==$model_nop)
		   {
		$currval= $stockval['number_stock'];	
		 $stock_update_val=$currval-$quantity;
		 
		 $stockinupdate=$db->prepare("UPDATE `stock_individual` SET `number_stock`=:stocknum,`WhenModified`=NOW()  WHERE `model_no`=:model_name");
		 $stockinupdate->bindParam(':stocknum', $stock_update_val, PDO::PARAM_INT);
		 $stockinupdate->bindParam(':model_name', $model_nop, PDO::PARAM_INT);

		$stockinupdate->execute();
		 
		   }
		
		}
			 }
		
		else{ 	echo "unsuccesful";}
		}
		//write sql to enter individual particulars
    }
	  $db=null;
	}
}
	
?>