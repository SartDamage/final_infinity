<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;

  $amount = $form['rupees'];
  $payment_type = $form['paymenttype'];
  $full_part_payment = $form['partradio'];
  $cheque_no = $form['cheque_no'];
  $drawn_on = $form['drawn_on'];
  $acc_no = $form['acc_no'];
  $current_date = $form['current_date'];
	$receipt_No = $form['receipt_No'];
  $reg_id = $form['reg_id'];
  $pat_id = $form['pat_id'];
	$paid_date = $form['paid_date'];
	$patient_name = $form['patient_name'];

  $AdminID=$userDetails->ID;
//echo 'id='.$particulars.'date='.$quantity.'time='.$cost.'comments'.$price.'pay='.$paymenttype;
	$db = getDB();
    $statement=$db->prepare("INSERT INTO `receipt`
    	(`recieptID`,
    	`patientID`,
      `registrationID`,
      `total`,
      `payment_type`,
      `cheque_no`,
      `receipt_date`,
      `Drawn_on`,
      `Account_no`,
      `paid_in_installment`,
      `paid_date`,
      `patient_name`,
      `EnteredBy`,
      `WhenEntered`)
    	VALUES
    	(:recieptID,
    	 :patientID,
    	 :registrationID,
    	 :total,
    	 :payment_type,
    	 :cheque_no,
    	 :receipt_date,
    	 :Drawn_on,
    	 :Account_no,
    	 :paid_in_installment,
    	 :paid_date,
    	 :patient_name,
    	 :EnteredBy,
    	 NOW())
       ON DUPLICATE KEY UPDATE
         `total`=:total1,
         `payment_type`=:payment_type1,
         `Drawn_on`=:Drawn_on1,
         `cheque_no`=:cheque_no1,
         `Account_no`=:Account_no1,
         `paid_in_installment`=:paid_in_installment1,
         `paid_date`=:paid_date1,
         `patient_name`=:patient_name1,
         `ModifiedBy`=:ModifiedBy,
         `WhenModified`= NOW()");

    $statement->bindParam(':recieptID', $receipt_No);
    $statement->bindParam(':patientID', $pat_id);
    $statement->bindParam(':registrationID', $reg_id);
    $statement->bindParam(':total', $amount);
    $statement->bindParam(':total1', $amount);
    $statement->bindParam(':payment_type', $payment_type);
    $statement->bindParam(':payment_type1', $payment_type);
    $statement->bindParam(':cheque_no',$cheque_no);
    $statement->bindParam(':cheque_no1',$cheque_no);
    $statement->bindParam(':Account_no',$acc_no);
    $statement->bindParam(':Account_no1',$acc_no);
    $statement->bindParam(':paid_in_installment',$full_part_payment);
    $statement->bindParam(':paid_in_installment1',$full_part_payment);
    $statement->bindParam(':Drawn_on',$drawn_on);
    $statement->bindParam(':Drawn_on1',$drawn_on);
    $statement->bindParam(':receipt_date',$current_date);
    $statement->bindParam(':paid_date',$paid_date);
    $statement->bindParam(':paid_date1',$paid_date);
    $statement->bindParam(':patient_name',$patient_name);
    $statement->bindParam(':patient_name1',$patient_name);
    $statement->bindParam(':ModifiedBy',$AdminID);
    $statement->bindParam(':EnteredBy',$AdminID);
    $statement->execute();

    $db=null;

      echo "success";
?>
