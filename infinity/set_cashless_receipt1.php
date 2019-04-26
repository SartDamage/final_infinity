<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;

  $comapny_name = $form['company_name'];
  $policy_no = $form['Policy_No_CR'];
  $company_detail = $form['company_details'];
  $card_no_gmc = $form['card_no_CR'];
  $reg_no = $form['Reg_No_CR'];
  $AI_no = $form['AI_no_CR'];
  $lot_no = $form['lot_no'];
  $mfg_dt = $form['mfg_date'];
  $Hospital_reg_no = $form['Hospital_reg_No_CR'];
  $cost = $form['subtotal'];
	$service_tax = $form['service_tax'];
	$total_cost = $form['total_cost'];
  $exp_dt = $form['exp_date'];
	$vt_remark=$form['vt_remark'];
	$tl_doctor=$form['tl_doctor'];
  $pat_main_id = $form['pat_main_id'];
  $reg_hidden_id = $form['reg_hidden_id'];
  $receipt_hidden_id = $form['receipt_hidden_id'];
	//if(isset($form['tl_doctor'])){$tl_doctor=$from['tl_doctor'];}else{$tl_doctor='NA';}
	//if(isset($form['vt_remark'])){$vt_remark=$from['vt_remark'];}else{$vt_remark='NA';}
  $AdminID=$userDetails->ID;
//echo 'id='.$particulars.'date='.$quantity.'time='.$cost.'comments'.$price.'pay='.$paymenttype;
	$db = getDB();
    $statement=$db->prepare("INSERT INTO `cashless_receipt`
    	(`receiptID`,
			`patientID`,
			`Registration_id`,
			`comapny_name`,
    	`company_detail`,
      `policy_no`,
      `card_no_gmc`,
      `AI_no`,
      `reg_no`,
      `lot_no`,
      `mfg_dt`,
			`exp_dt`,
      `Hospital_reg_no`,
      `cost`,
      `EnteredBy`,
      `WhenEntered`,
	   	`authorized_doctor`,
	    `remark`,
		   `total_cost`,
		   `service_tax`)
    	VALUES
    	(:receiptID,
			 :patientID,
			 :Registration_id,
			 :comapny_name,
    	 :company_detail,
    	 :policy_no,
    	 :card_no_gmc,
    	 :AI_no,
    	 :reg_no,
    	 :lot_no,
    	 :mfg_dt,
			 :exp_dt,
    	 :Hospital_reg_no,
    	 :cost,
    	 :EnteredBy,
    	 NOW(),
		   :authorized_doctor,
		   :remark,
		   :total_cost,
		   :service_tax)
       ON DUPLICATE KEY UPDATE
         `comapny_name`=:comapny_name1,
         `company_detail`=:company_detail1,
         `policy_no`=:policy_no1,
         `card_no_gmc`=:card_no_gmc1,
         `AI_no`=:AI_no1,
         `reg_no`=:reg_no1,
         `lot_no`=:lot_no1,
         `mfg_dt`=:mfg_dt1,
         `exp_dt`=:exp_dt1,
         `Hospital_reg_no`=:Hospital_reg_no1,
         `cost`=:cost1,
         `ModifiedBy`=:ModifiedBy,
         `WhenModified`= NOW(),
			   `authorized_doctor`=:authorized_doctor,
			   `remark` =:remark,
				 `total_cost` =:total_cost,
				  `service_tax` =:service_tax" );
		$statement->bindParam(':receiptID', $receipt_hidden_id);
		$statement->bindParam(':patientID', $pat_main_id);
		$statement->bindParam(':Registration_id', $reg_hidden_id);
    $statement->bindParam(':comapny_name', $comapny_name);
    $statement->bindParam(':comapny_name1', $comapny_name);
    $statement->bindParam(':company_detail', $company_detail);
    $statement->bindParam(':company_detail1', $company_detail);
    $statement->bindParam(':policy_no', $policy_no);
    $statement->bindParam(':policy_no1', $policy_no);
    $statement->bindParam(':card_no_gmc', $card_no_gmc);
    $statement->bindParam(':card_no_gmc1',$card_no_gmc);
    $statement->bindParam(':AI_no',$AI_no);
    $statement->bindParam(':AI_no1',$AI_no);
    $statement->bindParam(':reg_no',$reg_no);
    $statement->bindParam(':reg_no1',$reg_no);
    $statement->bindParam(':lot_no',$lot_no);
    $statement->bindParam(':lot_no1',$lot_no);
    $statement->bindParam(':mfg_dt',$mfg_dt);
    $statement->bindParam(':mfg_dt1',$mfg_dt);
    $statement->bindParam(':exp_dt',$exp_dt);
    $statement->bindParam(':exp_dt1',$exp_dt);
    $statement->bindParam(':Hospital_reg_no',$Hospital_reg_no);
    $statement->bindParam(':Hospital_reg_no1',$Hospital_reg_no);
    $statement->bindParam(':cost',$cost);
    $statement->bindParam(':cost1',$cost);
    $statement->bindParam(':ModifiedBy',$AdminID);
    $statement->bindParam(':EnteredBy',$AdminID);
		$statement->bindParam(':authorized_doctor',$tl_doctor);
		$statement->bindParam(':remark',$vt_remark);
		$statement->bindParam(':total_cost',$total_cost);
		$statement->bindParam(':service_tax',$service_tax);
    $statement->execute();

    $db=null;

      foreach ($form['particulars'] as $key => $value) {
				//echo "swati";
      	$particulars = $value;
      	$particulars_price = $form['cost'][$key];

        $db = getDB();
        if($particulars=="" || $particulars==null){

         }else{
        $statement1=$db->prepare("INSERT INTO `cashless_receipt_particulars`
        (`receiptID`,
        `patientID`,
        `Registration_id`,
        `particulars`,
        `amount`,
        `EnteredBy`,
        `WhenEntered`)
        VALUES
        (:receiptID, :patientID, :Registration_id, :particulars, :amount, :EnteredBy, NOW())
        ON DUPLICATE KEY UPDATE
          `amount`=:amount1,
          `ModifiedBy`=:ModifiedBy,
          `WhenModified`= NOW()");
        $statement1->bindParam(':receiptID', $receipt_hidden_id);
        $statement1->bindParam(':patientID', $pat_main_id);
        $statement1->bindParam(':Registration_id', $reg_hidden_id);
        $statement1->bindParam(':amount', $particulars_price);
        $statement1->bindParam(':amount1', $particulars_price);
        $statement1->bindParam(':particulars', $particulars);
        $statement1->bindParam(':ModifiedBy',$AdminID);
        $statement1->bindParam(':EnteredBy',$AdminID);
        $statement1->execute();

				$count=$statement1->rowCount();

				//echo $count."\n";

        }

      }
			echo "success";
$db=null;
?>
