<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;
  $subtotal = $form['subtotal'];
  $total = $form['total'];
  $cheque_number = $form['cheque_number'];
  $elctronic_number = $form['elctronic_number'];
  $discount = $form['discount'];
  $advance = $form['advance'];
  $paid = $form['paid'];
  $due = $form['due'];
  $pat_main_id = $form['pat_main_id'];
  $reg_hidden_id = $form['reg_hidden_id'];
  $receipt_hidden_id = $form['receipt_hidden_id'];
  $paymenttype=$form['paymenttype'];
	if(isset($form['tl_doctor'])){$tl_doctor=$form['tl_doctor'];}else{$tl_doctor='NA';}
	if(isset($form['vt_remark'])){$vt_remark=$form['vt_remark'];}else{$vt_remark='NA';}
  $AdminID=$userDetails->ID;
//echo 'id='.$particulars.'date='.$quantity.'time='.$cost.'comments'.$price.'pay='.$paymenttype;
	$db = getDB();
    $statement=$db->prepare("INSERT INTO `reimbursement_receipt`
    	(`recieptID`,
    	`instance_id`,
      `Registered_ID`,
      `amount`,
      `paid`,
      `discount`,
      `payment_type`,
      `cheque_no`,
			`balance`,
      `electronic_id`,
      `EnteredBy`,
      `WhenEntered`,
		  `authorized_doctor`,
			`remark`
			 )
    	VALUES
    	(:recieptID,
    	 :patientID,
    	 :registrationID,
    	 :total,
    	 :amount_paid,
    	 :discount,
    	 :payment_type,
    	 :cheque_no,
			 :balance,
    	 :transaction_id,
    	 :EnteredBy,
    	 NOW(),
		   :authorized_doctor,
		   :remark)
       ON DUPLICATE KEY UPDATE
         `amount`=:total1,
         `paid`=:amount_paid1,
         `discount`=:discount1,
         `payment_type`=:payment_type1,
         `cheque_no`=:cheque_no1,
         `balance`=:balance1,
         `electronic_id`=:transaction_id1,
         `ModifiedBy`=:ModifiedBy,
         `WhenModified`= NOW(),
			   `authorized_doctor`=:authorized_doctor_dup,
			    `remark` =:remark_dup");
    $statement->bindParam(':recieptID', $receipt_hidden_id);
    $statement->bindParam(':patientID', $pat_main_id);
    $statement->bindParam(':registrationID', $reg_hidden_id);
    $statement->bindParam(':total', $subtotal);
    $statement->bindParam(':total1', $subtotal);
    $statement->bindParam(':amount_paid', $paid);
    $statement->bindParam(':amount_paid1', $paid);
    $statement->bindParam(':discount',$discount);
    $statement->bindParam(':discount1',$discount);
    $statement->bindParam(':balance',$due);
    $statement->bindParam(':balance1',$due);
    $statement->bindParam(':payment_type',$paymenttype);
    $statement->bindParam(':payment_type1',$paymenttype);
    $statement->bindParam(':cheque_no',$cheque_number);
    $statement->bindParam(':cheque_no1',$cheque_number);
    $statement->bindParam(':transaction_id',$elctronic_number);
    $statement->bindParam(':transaction_id1',$elctronic_number);
    $statement->bindParam(':ModifiedBy',$AdminID);
    $statement->bindParam(':EnteredBy',$AdminID);
		$statement->bindParam(':authorized_doctor',$tl_doctor);
		$statement->bindParam(':remark',$vt_remark);
    $statement->bindParam(':EnteredBy',$AdminID);
		$statement->bindParam(':authorized_doctor_dup',$tl_doctor);
		$statement->bindParam(':remark_dup',$vt_remark);
    $statement->execute();

    $db=null;

      foreach ($form['particulars'] as $key => $value) {
				echo "swati";
      	$particulars = $value;
      	$cost = $form['cost'][$key];
      	$quantity = $form['qty'][$key];
      	$price = $form['price'][$key];

        $db = getDB();
        if($particulars=="" || $particulars==null){

         }else{
        $statement1=$db->prepare("INSERT INTO `reimbursement_rcpt_particulars`
        (`reciept_id`,
        `instance_id`,
        `Registered_ID`,
        `no_of_days`,
        `particulars`,
        `amount`,
        `EnteredBy`,
        `WhenEntered`)
        VALUES
        (:reciept_id, :patientID, :Registered_ID, :no_of_days, :particulars, :amount, :EnteredBy, NOW())
        ON DUPLICATE KEY UPDATE
          `no_of_days`=:no_of_days1,
          `ModifiedBy`=:ModifiedBy,
          `amount`=:amount1,
          `WhenModified`= NOW()");
        $statement1->bindParam(':reciept_id', $receipt_hidden_id);
        $statement1->bindParam(':patientID', $pat_main_id);
        $statement1->bindParam(':Registered_ID', $reg_hidden_id);
        $statement1->bindParam(':no_of_days', $quantity);
        $statement1->bindParam(':no_of_days1', $quantity);
        $statement1->bindParam(':particulars', $particulars);
        $statement1->bindParam(':amount',$cost);
        $statement1->bindParam(':amount1',$cost);
        $statement1->bindParam(':ModifiedBy',$AdminID);
        $statement1->bindParam(':EnteredBy',$AdminID);
        $statement1->execute();

				$count=$statement1->rowCount();

				echo $count."\n";

        }

      }
      echo "success";
$db=null;
?>
