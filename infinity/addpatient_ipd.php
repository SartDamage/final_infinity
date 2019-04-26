 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;
	$RegID=$form['regID'];
	//if (isset($form['patID'])){$PatID=$form['patID'];}
	if (isset($form['dr_assigned-0'])){$dr_assigned=$form['dr_assigned-0'];}else{$dr_assigned="N.A.";}
	//$LabID="1";//$form['dr_assigned'];
	if(isset($form['MLC_check_hidden'])){$is_MLC = $form['MLC_check_hidden'];}else{$is_MLC="no";}
	if($is_MLC=="yes"){
		$MLC_station=$form['MLC_station'];$MLC_type=$form['MLC_type'];$MLC_place=$form['MLC_place'];
	}else{$MLC_station = $MLC_type = $MLC_place="";}
        $UHID="";
        $use_UHID="1";
        if(isset($form['use_UHID'])){
            if($form['use_UHID']=='yes'){
                if(isset($form['UHID_number'])){
                    $UHID=$form['UHID_number'];
                }else{}
                $use_UHID="1";
            }else{
                $use_UHID="0";
            }
        }
	$department_name=$form['department_select'];
	$dr_assigned=$form['dr_assigned-0'];
	$bed_type=$form['bed_type_select'];
	$ward_no=$form['ward_no_select_hidden'];
	$bed_number_ID=$form['bed_number_ID'];
	$referred_by=$form['referred_by'];
	$case=$form['case'];
	$deposit_amount="0";
	$bed_charge_fetched = "";
	$bed_type_name = "";
	//$deposit_amount=$form['deposit_amount'];


	$AdminID=$form['ctl00_AdminID'];

	$db = getDB();
	$query=$db->prepare("SELECT pi.discharge_date_time FROM `patientipd` as pi WHERE pi.RegID=:registrationid");
	$query->bindParam(":registrationid", $RegID);
	$query->execute();
	$query_results=$query->fetch();
	//echo $query_results;
	$discharge_date ="";
	if ($query->rowCount() > 0){
		if($query_results['discharge_date_time'] <> null){
			$date= substr($query_results['discharge_date_time'],0,10);
			$date = explode('-', $date);
			$discharge_date = $date[2]."-".$date[1]."-".$date[0];
		}else{
			echo "";
		}
		//echo $discharge_date;

		if($discharge_date <> "" ){
			$statement=$db->prepare("INSERT INTO `patientipd`
				( `RegID`,`isUHID`,`UHID`, `admit_date_time`, `doctor_assigned`,
					 `amount_deposit`, `symptoms`,  `isMLC`, `MLC_type`, `MLC_place`,
					 `MLC_station`, `bedno`, `wardno`, `bed_type`, `ReferredBy`,
					 `WhenEntered`, `EnteredBy`)
			VALUES (:RegID,:use_UHID,:UHID,NOW(),:dr_assigned,:deposit_amount,
			:case,:isMLC,:MLC_type,:MLC_place,:MLC_station,:bed_no,:ward_no,:bed_type,:referred_by,Now(),:AdminID)");
			$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
			$statement->bindParam(':use_UHID', $use_UHID, PDO::PARAM_STR);
			$statement->bindParam(':UHID', $UHID, PDO::PARAM_STR);
			$statement->bindParam(':dr_assigned', $dr_assigned, PDO::PARAM_STR);
			$statement->bindParam(':deposit_amount', $deposit_amount, PDO::PARAM_STR);
			$statement->bindParam(':case', $case, PDO::PARAM_STR);
			$statement->bindParam(':isMLC', $is_MLC, PDO::PARAM_STR);
			$statement->bindParam(':MLC_type', $MLC_type, PDO::PARAM_STR);
			$statement->bindParam(':MLC_place', $MLC_place, PDO::PARAM_STR);
			$statement->bindParam(':MLC_station', $MLC_station, PDO::PARAM_STR);
			$statement->bindParam(':bed_no', $bed_number_ID, PDO::PARAM_STR);
			$statement->bindParam(':ward_no', $ward_no, PDO::PARAM_STR);
			$statement->bindParam(':bed_type', $bed_type, PDO::PARAM_STR);
			$statement->bindParam(':referred_by', $referred_by, PDO::PARAM_STR);
			$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
			$statement->bindParam(':dr_assigned', $dr_assigned, PDO::PARAM_INT);

			$statement->execute();
		if (($statement->rowCount()>0))
		   {/* Update worked because query affected X amount of rows. */


					$state=$db->prepare("UPDATE `bed_number` SET `bed_status`='1' WHERE `ID`=:bed_no AND `bed_type`=:bed_type AND `ward_id`=:ward_no ");

					$state->bindParam(':bed_no', $bed_number_ID, PDO::PARAM_STR);
					$state->bindParam(':ward_no', $ward_no, PDO::PARAM_STR);
					$state->bindParam(':bed_type', $bed_type, PDO::PARAM_STR);

					$state->execute();
					$bed_charge_fetched_1;
					$bed_type_name_1;
					if (($state->rowCount()>0))
						{

							$bed_charge_fetched;
							$bed_type_name;

							$recieptID="";
							$recieptID1="";
							$recieptID2="";
							$recieptID3="";
							$PatID="";

							$advance="0.00";
							$paid="0.00";
							$subtotal="0.00";
							$discount="0.00";

							$query=$db->prepare("SELECT `patientID` FROM `patientipd` WHERE ID=( SELECT max(ID) FROM `patientipd`)");
							$query->execute();
							$c=$query->rowCount();
							$resource=$query->fetchAll(PDO::FETCH_ASSOC );
							if ($c <> "" || $c <> null || $c <> 0){
								foreach ($resource as $row){
									$PatID=$row['patientID'];
								}
							}
							$stat=$db->prepare("SELECT MAX(`recieptID`) FROM ipd_bill");
							$stat->execute();
							$results=$stat->fetchColumn();
							//$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							preg_match_all('!\d+!', $results, $matches);
							if( $results==null){
										$matches=1;
									}else{
										$matches = $matches[0][0]+1;
									}
							$RecieptID = "IPDR".str_pad($matches, 8, "0", STR_PAD_LEFT);
							$stat=null;

							$stat1=$db->prepare("SELECT MAX(`recieptID`) FROM reimbursement_receipt");
							$stat1->execute();
							$results1=$stat1->fetchColumn();
							//$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							preg_match_all('!\d+!', $results1, $matches1);
							if( $results1==null){
										$matches1=1;
									}else{
										$matches1 = $matches1[0][0]+1;
									}
							$RecieptID1 = "RMBR".str_pad($matches1, 8, "0", STR_PAD_LEFT);
							$stat1=null;

							$stat2=$db->prepare("SELECT MAX(`receiptID`) FROM cashless_receipt");
							$stat2->execute();
							$results2=$stat2->fetchColumn();
							//$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							preg_match_all('!\d+!', $results2, $matches2);
							if( $results2==null){
										$matches2=1;
									}else{
										$matches2 = $matches2[0][0]+1;
									}
							$RecieptID2 = "CSHL".str_pad($matches1, 8, "0", STR_PAD_LEFT);
							$stat2=null;

							$stat3=$db->prepare("SELECT MAX(`recieptID`) FROM demo_receipt");
							$stat3->execute();
							$results3=$stat3->fetchColumn();
							//$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							preg_match_all('!\d+!', $results3, $matches3);
							if( $results3==null){
										$matches3=1;
									}else{
										$matches3 = $matches3[0][0]+1;
									}
							$RecieptID3 = "DEMO".str_pad($matches3, 8, "0", STR_PAD_LEFT);
							$stat3=null;


							$getbeddetails=$db->prepare("select ib.recieptID,bt.bed_charges, bt.bed_type FROM ipd_bill ib
							JOIN patientipd as pid on ib.instance_id = pid.patientID
							JOIN bed_type as bt on bt.ID=pid.bed_type
								WHERE ib.`instance_id`=:patid limit 1");
							$getbeddetails->bindParam(':patid', $PatID, PDO::PARAM_STR);
							$getbeddetails->execute();
							$c=$getbeddetails->rowCount();
							if($c<> "" || $c<> null){
							$res=$getbeddetails->fetchAll(PDO::FETCH_ASSOC);
								foreach ($res as $row1){
									//global $bed_charge_fetched,$bed_type_name;
									$recieptID = $row1['recieptID'];
									$bed_charge_fetched = $row1['bed_charges'];
									$bed_type_name = $row1['bed_type'];

								}

							}

							/*******************************************************************************/
							$statement=$db->prepare("INSERT INTO `ipd_bill` ( `recieptID`,`Registered_ID`, `instance_id`,  `advance`, `amount`, `paid`, `discount`, `WhenEntered`, `EnteredBy`) VALUES (:RecieptID,:RegID,:PatID,:advance,:subtotal,:paid,:discount,NOW(),:AdminID) ON DUPLICATE KEY UPDATE `advance`=:advance_dup, `amount`=:subtotal_dup, `paid`=:paid_dup, `discount`=:discount,`WhenModified`=NOW(),`ModifiedBy`=:AdminID_dup");
							$statement->bindParam(':advance', $advance, PDO::PARAM_STR);
							$statement->bindParam(':advance_dup', $advance, PDO::PARAM_STR);
							$statement->bindParam(':subtotal', $subtotal, PDO::PARAM_STR);
							$statement->bindParam(':subtotal_dup', $subtotal, PDO::PARAM_STR);
							$statement->bindParam(':paid', $paid, PDO::PARAM_STR);
							$statement->bindParam(':paid_dup', $paid, PDO::PARAM_STR);
							$statement->bindParam(':discount', $discount, PDO::PARAM_STR);
							$statement->bindParam(':discount_dup', $discount, PDO::PARAM_STR);
							/*$statement->bindParam(':due', $due, PDO::PARAM_INT); */

							$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
							$statement->bindParam(':AdminID_dup', $AdminID, PDO::PARAM_STR);
							$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
							/*$statement->bindParam(':RegID_dup', $RegID, PDO::PARAM_INT);*/
							$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
							/*$statement->bindParam(':PatID_dup', $PatID, PDO::PARAM_INT);*/
							$statement->bindParam(':RecieptID', $RecieptID, PDO::PARAM_STR);/*@@@value line 81 ~ 68 @@@*/
							$statement->execute();
							if ($statement->rowCount() > 0){

								$statement1=$db->prepare("INSERT INTO `reimbursement_receipt` ( `recieptID`,`Registered_ID`, `instance_id`,  `advance`, `amount`, `paid`, `discount`, `WhenEntered`, `EnteredBy`) VALUES (:RecieptID,:RegID,:PatID,:advance,:subtotal,:paid,:discount,NOW(),:AdminID) ON DUPLICATE KEY UPDATE `advance`=:advance_dup, `amount`=:subtotal_dup, `paid`=:paid_dup, `discount`=:discount,`WhenModified`=NOW(),`ModifiedBy`=:AdminID_dup");
								$statement1->bindParam(':advance', $advance, PDO::PARAM_STR);
								$statement1->bindParam(':advance_dup', $advance, PDO::PARAM_STR);
								$statement1->bindParam(':subtotal', $subtotal, PDO::PARAM_STR);
								$statement1->bindParam(':subtotal_dup', $subtotal, PDO::PARAM_STR);
								$statement1->bindParam(':paid', $paid, PDO::PARAM_STR);
								$statement1->bindParam(':paid_dup', $paid, PDO::PARAM_STR);
								$statement1->bindParam(':discount', $discount, PDO::PARAM_STR);
								$statement1->bindParam(':discount_dup', $discount, PDO::PARAM_STR);
								/*$statement->bindParam(':due', $due, PDO::PARAM_INT); */

								$statement1->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
								$statement1->bindParam(':AdminID_dup', $AdminID, PDO::PARAM_STR);
								$statement1->bindParam(':RegID', $RegID, PDO::PARAM_STR);
								/*$statement->bindParam(':RegID_dup', $RegID, PDO::PARAM_INT);*/
								$statement1->bindParam(':PatID', $PatID, PDO::PARAM_STR);
								/*$statement->bindParam(':PatID_dup', $PatID, PDO::PARAM_INT);*/
								$statement1->bindParam(':RecieptID', $RecieptID1, PDO::PARAM_STR);/*@@@value line 81 ~ 68 @@@*/
								$statement1->execute();

								if ($statement1->rowCount() > 0){

										$statement2=$db->prepare("INSERT INTO `cashless_receipt` ( `receiptID`,`Registration_id`, `patientID`,`cost`, `WhenEntered`, `EnteredBy`) VALUES (:receiptID,:Registration_id,:patientID,:cost,NOW(),:AdminID)");

										$statement2->bindParam(':Registration_id', $RegID, PDO::PARAM_STR);
										/*$statement->bindParam(':RegID_dup', $RegID, PDO::PARAM_INT);*/
										$statement2->bindParam(':patientID', $PatID, PDO::PARAM_STR);
										/*$statement->bindParam(':PatID_dup', $PatID, PDO::PARAM_INT);*/
										$statement2->bindParam(':receiptID', $RecieptID2, PDO::PARAM_STR);/*@@@value line 81 ~ 68 @@@*/
										$statement2->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);/*@@@value line 81 ~ 68 @@@*/
										$statement2->bindParam(':cost', $subtotal, PDO::PARAM_STR);/*@@@value line 81 ~ 68 @@@*/
										$statement2->execute();

										if ($statement2->rowCount() > 0){
											$statement3=$db->prepare("INSERT INTO `demo_receipt` ( `recieptID`,`registrationID`, `patientID`, `total`, `amount_paid`, `discount`, `WhenEntered`, `EnteredBy`) VALUES (:RecieptID,:RegID,:PatID,:subtotal,:paid,:discount,NOW(),:AdminID) ON DUPLICATE KEY UPDATE `total`=:subtotal_dup, `amount_paid`=:paid_dup, `discount`=:discount,`WhenModified`=NOW(),`ModifiedBy`=:AdminID_dup");
											$statement3->bindParam(':subtotal', $subtotal, PDO::PARAM_STR);
											$statement3->bindParam(':subtotal_dup', $subtotal, PDO::PARAM_STR);
											$statement3->bindParam(':paid', $paid, PDO::PARAM_STR);
											$statement3->bindParam(':paid_dup', $paid, PDO::PARAM_STR);
											$statement3->bindParam(':discount', $discount, PDO::PARAM_STR);
											$statement3->bindParam(':discount_dup', $discount, PDO::PARAM_STR);
											/*$statement->bindParam(':due', $due, PDO::PARAM_INT); */

											$statement3->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
											$statement3->bindParam(':AdminID_dup', $AdminID, PDO::PARAM_STR);
											$statement3->bindParam(':RegID', $RegID, PDO::PARAM_STR);
											/*$statement->bindParam(':RegID_dup', $RegID, PDO::PARAM_INT);*/
											$statement3->bindParam(':PatID', $PatID, PDO::PARAM_STR);
											/*$statement->bindParam(':PatID_dup', $PatID, PDO::PARAM_INT);*/
											$statement3->bindParam(':RecieptID', $RecieptID3, PDO::PARAM_STR);/*@@@value line 81 ~ 68 @@@*/
											$statement3->execute();

											if ($statement3->rowCount() > 0){
								$quantity='1';
								/**********************************************************************************/
								$st=$db->prepare("INSERT INTO `ipd_bill_particulars` (`reciept_id`,`instance_id`,`Registered_ID`,`no_of_days`,`particulars`,`amount`,`WhenEntered`,`EnteredBy`) VALUES (:RecieptID,:PatID,:RegID,:days,:particulars,:amount,NOW(),:AdminID);");

								$st->bindParam(':RecieptID', $RecieptID, PDO::PARAM_STR);

								$st->bindParam(':PatID', $PatID, PDO::PARAM_STR);

								$st->bindParam(':RegID', $RegID, PDO::PARAM_STR);

								$st->bindParam(':days', $quantity, PDO::PARAM_STR);

								$st->bindParam(':particulars', $bed_type_name, PDO::PARAM_STR);

								$st->bindParam(':amount', $bed_charge_fetched, PDO::PARAM_STR);

								$st->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);

								$st->execute();

								/************************************************************************************/
								$query=$db->prepare("SELECT charge_title,amount FROM `standard_charges` WHERE `is_constant`='1' and `IsActive`='1'");
								$query->execute();
								$results=$query->fetchAll();
								foreach ($results as $row1){

								$state=$db->prepare("INSERT INTO `ipd_bill_particulars` ( `reciept_id`,`instance_id`, `Registered_ID`,  `no_of_days`, `particulars`, `amount`, `WhenEntered`, `EnteredBy`) VALUES (:RecieptID,:PatID,:RegID,:days,:particulars,:amount,NOW(),:AdminID);");

								$state->bindParam(':RecieptID', $RecieptID, PDO::PARAM_STR);
								$state->bindParam(':PatID', $PatID, PDO::PARAM_STR);
								$state->bindParam(':RegID', $RegID, PDO::PARAM_STR);
								$state->bindParam(':days', $quantity, PDO::PARAM_STR);
								$state->bindParam(':particulars', $row1['charge_title'], PDO::PARAM_STR);
								$state->bindParam(':amount', $row1['amount'], PDO::PARAM_STR);
								$state->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);

								$state->execute();
								}
								$get_data=$db->prepare("SELECT * FROM `patientregistrationmaster` WHERE `RegistrationID`=:RegID;");
									$get_data->bindParam(':RegID', $RegID, PDO::PARAM_STR);
									$get_data->execute();
									$results=$get_data->fetchAll();
									if($get_data->rowCount() > 0){
										echo json_encode($results);
									}else{
										echo "unsuccesful";
									}
								//echo "In Patient entered successfully.";
							}
						}
          }
						}else{ echo "unsuccesful";}

						}
						else {echo false;
							$error = $state->errorInfo();
							echo "unsuccesful";
						}
			}
			else{
			echo false;
			$error = $statement->errorInfo();
			echo "unsuccesful";
		}
		}
		else{
			echo "Patient already exists, Discharge before creating new in-patient";
		}
	}
	else{
		/*@@@@@@@@@@@@@@@@@@@@*/
    $statement=$db->prepare("INSERT INTO `patientipd`
      ( `RegID`,`isUHID`,`UHID`, `admit_date_time`, `doctor_assigned`,
         `amount_deposit`, `symptoms`,  `isMLC`, `MLC_type`, `MLC_place`,
         `MLC_station`, `bedno`, `wardno`, `bed_type`, `ReferredBy`,
         `WhenEntered`, `EnteredBy`)
    VALUES (:RegID,:use_UHID,:UHID,NOW(),:dr_assigned,:deposit_amount,
    :case,:isMLC,:MLC_type,:MLC_place,:MLC_station,:bed_no,:ward_no,:bed_type,:referred_by,Now(),:AdminID)");
    $statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
    $statement->bindParam(':use_UHID', $use_UHID, PDO::PARAM_STR);
    $statement->bindParam(':UHID', $UHID, PDO::PARAM_STR);
    $statement->bindParam(':dr_assigned', $dr_assigned, PDO::PARAM_STR);
    $statement->bindParam(':deposit_amount', $deposit_amount, PDO::PARAM_STR);
    $statement->bindParam(':case', $case, PDO::PARAM_STR);
    $statement->bindParam(':isMLC', $is_MLC, PDO::PARAM_STR);
    $statement->bindParam(':MLC_type', $MLC_type, PDO::PARAM_STR);
    $statement->bindParam(':MLC_place', $MLC_place, PDO::PARAM_STR);
    $statement->bindParam(':MLC_station', $MLC_station, PDO::PARAM_STR);
    $statement->bindParam(':bed_no', $bed_number_ID, PDO::PARAM_STR);
    $statement->bindParam(':ward_no', $ward_no, PDO::PARAM_STR);
    $statement->bindParam(':bed_type', $bed_type, PDO::PARAM_STR);
    $statement->bindParam(':referred_by', $referred_by, PDO::PARAM_STR);
    $statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
    $statement->bindParam(':dr_assigned', $dr_assigned, PDO::PARAM_INT);

			$statement->execute();
		if (($statement->rowCount()>0))
		   {/* Update worked because query affected X amount of rows. */

					$state=$db->prepare("UPDATE `bed_number` SET `bed_status`='1' WHERE `ID`=:bed_no AND `bed_type`=:bed_type AND `ward_id`=:ward_no ");

					$state->bindParam(':bed_no', $bed_number_ID, PDO::PARAM_STR);
					$state->bindParam(':ward_no', $ward_no, PDO::PARAM_STR);
					$state->bindParam(':bed_type', $bed_type, PDO::PARAM_STR);

					$state->execute();
					$bed_charge_fetched_1;
					$bed_type_name_1;
					if (($state->rowCount()>0))
						{

							$bed_charge_fetched;
							$bed_type_name;

							$recieptID="";
							$recieptID1="";
							$PatID="";

							$advance="0.00";
							$paid="0.00";
							$subtotal="0.00";
							$discount="0.00";

							$query=$db->prepare("SELECT `patientID` FROM `patientipd` WHERE ID=( SELECT max(ID) FROM `patientipd`)");
							$query->execute();
							$c=$query->rowCount();
							$resource=$query->fetchAll(PDO::FETCH_ASSOC );
							if ($c <> "" || $c <> null || $c <> 0){
								foreach ($resource as $row){
									$PatID=$row['patientID'];
								}
							}
							$stat=$db->prepare("SELECT MAX(`recieptID`) FROM ipd_bill");
							$stat->execute();
							$results=$stat->fetchColumn();
							//$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							preg_match_all('!\d+!', $results, $matches);
							if( $results==null){
										$matches=1;
									}else{
										$matches = $matches[0][0]+1;
									}
							$RecieptID = "IPDR".str_pad($matches, 8, "0", STR_PAD_LEFT);
							$stat=null;

							$stat1=$db->prepare("SELECT MAX(`recieptID`) FROM reimbursement_receipt");
							$stat1->execute();
							$results1=$stat1->fetchColumn();
							//$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							preg_match_all('!\d+!', $results1, $matches1);
							if( $results1==null){
										$matches1=1;
									}else{
										$matches1 = $matches1[0][0]+1;
									}
							$RecieptID1 = "RMBR".str_pad($matches1, 8, "0", STR_PAD_LEFT);
							$stat1=null;

							$stat2=$db->prepare("SELECT MAX(`receiptID`) FROM cashless_receipt");
							$stat2->execute();
							$results2=$stat2->fetchColumn();
							//$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							preg_match_all('!\d+!', $results2, $matches2);
							if( $results2==null){
										$matches2=1;
									}else{
										$matches2 = $matches2[0][0]+1;
									}
							$RecieptID2 = "CSHL".str_pad($matches1, 8, "0", STR_PAD_LEFT);
							$stat2=null;

              $stat3=$db->prepare("SELECT MAX(`recieptID`) FROM demo_receipt");
							$stat3->execute();
							$results3=$stat3->fetchColumn();
							//$json=json_encode($results);
							//return $json;
							//$str = 'In My Cart : 11 12 items';
							preg_match_all('!\d+!', $results3, $matches3);
							if( $results3==null){
										$matches3=1;
									}else{
										$matches3 = $matches3[0][0]+1;
									}
							$RecieptID3 = "DEMO".str_pad($matches3, 8, "0", STR_PAD_LEFT);
							$stat3=null;


							$getbeddetails=$db->prepare("select ib.recieptID,bt.bed_charges, bt.bed_type FROM ipd_bill ib
							JOIN patientipd as pid on ib.instance_id = pid.patientID
							JOIN bed_type as bt on bt.ID=pid.bed_type
								WHERE ib.`instance_id`=:patid limit 1");
							$getbeddetails->bindParam(':patid', $PatID, PDO::PARAM_STR);
							$getbeddetails->execute();
							$c=$getbeddetails->rowCount();
							if($c<> "" || $c<> null){
							$res=$getbeddetails->fetchAll(PDO::FETCH_ASSOC);
								foreach ($res as $row1){
									//global $bed_charge_fetched,$bed_type_name;
									$recieptID = $row1['recieptID'];
									$bed_charge_fetched = $row1['bed_charges'];
									$bed_type_name = $row1['bed_type'];
								}
							}

							/*******************************************************************************/
							$statement=$db->prepare("INSERT INTO `ipd_bill` ( `recieptID`,`Registered_ID`, `instance_id`,  `advance`, `amount`, `paid`, `discount`, `WhenEntered`, `EnteredBy`) VALUES (:RecieptID,:RegID,:PatID,:advance,:subtotal,:paid,:discount,NOW(),:AdminID) ON DUPLICATE KEY UPDATE `advance`=:advance_dup, `amount`=:subtotal_dup, `paid`=:paid_dup, `discount`=:discount,`WhenModified`=NOW(),`ModifiedBy`=:AdminID_dup");
							$statement->bindParam(':advance', $advance, PDO::PARAM_STR);
							$statement->bindParam(':advance_dup', $advance, PDO::PARAM_STR);
							$statement->bindParam(':subtotal', $subtotal, PDO::PARAM_STR);
							$statement->bindParam(':subtotal_dup', $subtotal, PDO::PARAM_STR);
							$statement->bindParam(':paid', $paid, PDO::PARAM_STR);
							$statement->bindParam(':paid_dup', $paid, PDO::PARAM_STR);
							$statement->bindParam(':discount', $discount, PDO::PARAM_STR);
							$statement->bindParam(':discount_dup', $discount, PDO::PARAM_STR);
							/*$statement->bindParam(':due', $due, PDO::PARAM_INT); */

							$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
							$statement->bindParam(':AdminID_dup', $AdminID, PDO::PARAM_STR);
							$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
							/*$statement->bindParam(':RegID_dup', $RegID, PDO::PARAM_INT);*/
							$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
							/*$statement->bindParam(':PatID_dup', $PatID, PDO::PARAM_INT);*/
							$statement->bindParam(':RecieptID', $RecieptID, PDO::PARAM_STR);/*@@@value line 81 ~ 68 @@@*/
							$statement->execute();
							if ($statement->rowCount() > 0){

								$statement1=$db->prepare("INSERT INTO `reimbursement_receipt` ( `recieptID`,`Registered_ID`, `instance_id`,  `advance`, `amount`, `paid`, `discount`, `WhenEntered`, `EnteredBy`) VALUES (:RecieptID,:RegID,:PatID,:advance,:subtotal,:paid,:discount,NOW(),:AdminID) ON DUPLICATE KEY UPDATE `advance`=:advance_dup, `amount`=:subtotal_dup, `paid`=:paid_dup, `discount`=:discount,`WhenModified`=NOW(),`ModifiedBy`=:AdminID_dup");
								$statement1->bindParam(':advance', $advance, PDO::PARAM_STR);
								$statement1->bindParam(':advance_dup', $advance, PDO::PARAM_STR);
								$statement1->bindParam(':subtotal', $subtotal, PDO::PARAM_STR);
								$statement1->bindParam(':subtotal_dup', $subtotal, PDO::PARAM_STR);
								$statement1->bindParam(':paid', $paid, PDO::PARAM_STR);
								$statement1->bindParam(':paid_dup', $paid, PDO::PARAM_STR);
								$statement1->bindParam(':discount', $discount, PDO::PARAM_STR);
								$statement1->bindParam(':discount_dup', $discount, PDO::PARAM_STR);
								/*$statement->bindParam(':due', $due, PDO::PARAM_INT); */

								$statement1->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
								$statement1->bindParam(':AdminID_dup', $AdminID, PDO::PARAM_STR);
								$statement1->bindParam(':RegID', $RegID, PDO::PARAM_STR);
								/*$statement->bindParam(':RegID_dup', $RegID, PDO::PARAM_INT);*/
								$statement1->bindParam(':PatID', $PatID, PDO::PARAM_STR);
								/*$statement->bindParam(':PatID_dup', $PatID, PDO::PARAM_INT);*/
								$statement1->bindParam(':RecieptID', $RecieptID1, PDO::PARAM_STR);/*@@@value line 81 ~ 68 @@@*/
								$statement1->execute();

								if ($statement1->rowCount() > 0){

										$statement2=$db->prepare("INSERT INTO `cashless_receipt` ( `receiptID`,`Registration_id`, `patientID`,`cost`, `WhenEntered`, `EnteredBy`) VALUES (:receiptID,:Registration_id,:patientID,:cost,NOW(),:AdminID)");

										$statement2->bindParam(':Registration_id', $RegID, PDO::PARAM_STR);
										/*$statement->bindParam(':RegID_dup', $RegID, PDO::PARAM_INT);*/
										$statement2->bindParam(':patientID', $PatID, PDO::PARAM_STR);
										/*$statement->bindParam(':PatID_dup', $PatID, PDO::PARAM_INT);*/
										$statement2->bindParam(':receiptID', $RecieptID2, PDO::PARAM_STR);/*@@@value line 81 ~ 68 @@@*/
										$statement2->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);/*@@@value line 81 ~ 68 @@@*/
										$statement2->bindParam(':cost', $subtotal, PDO::PARAM_STR);/*@@@value line 81 ~ 68 @@@*/
										$statement2->execute();

                    if ($statement2->rowCount() > 0){
                      $statement3=$db->prepare("INSERT INTO `demo_receipt` ( `recieptID`,`registrationID`, `patientID`, `total`, `amount_paid`, `discount`, `WhenEntered`, `EnteredBy`) VALUES (:RecieptID,:RegID,:PatID,:subtotal,:paid,:discount,NOW(),:AdminID) ON DUPLICATE KEY UPDATE `total`=:subtotal_dup, `amount_paid`=:paid_dup, `discount`=:discount,`WhenModified`=NOW(),`ModifiedBy`=:AdminID_dup");
											$statement3->bindParam(':subtotal', $subtotal, PDO::PARAM_STR);
											$statement3->bindParam(':subtotal_dup', $subtotal, PDO::PARAM_STR);
											$statement3->bindParam(':paid', $paid, PDO::PARAM_STR);
											$statement3->bindParam(':paid_dup', $paid, PDO::PARAM_STR);
											$statement3->bindParam(':discount', $discount, PDO::PARAM_STR);
											$statement3->bindParam(':discount_dup', $discount, PDO::PARAM_STR);
											/*$statement->bindParam(':due', $due, PDO::PARAM_INT); */

											$statement3->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
											$statement3->bindParam(':AdminID_dup', $AdminID, PDO::PARAM_STR);
											$statement3->bindParam(':RegID', $RegID, PDO::PARAM_STR);
											/*$statement->bindParam(':RegID_dup', $RegID, PDO::PARAM_INT);*/
											$statement3->bindParam(':PatID', $PatID, PDO::PARAM_STR);
											/*$statement->bindParam(':PatID_dup', $PatID, PDO::PARAM_INT);*/
											$statement3->bindParam(':RecieptID', $RecieptID3, PDO::PARAM_STR);/*@@@value line 81 ~ 68 @@@*/
											$statement3->execute();

											if ($statement3->rowCount() > 0){

								$quantity='1';
								/**********************************************************************************/
								$st=$db->prepare("INSERT INTO `ipd_bill_particulars` (`reciept_id`,`instance_id`,`Registered_ID`,`no_of_days`,`particulars`,`amount`,`WhenEntered`,`EnteredBy`) VALUES (:RecieptID,:PatID,:RegID,:days,:particulars,:amount,NOW(),:AdminID);");

								$st->bindParam(':RecieptID', $RecieptID, PDO::PARAM_STR);
								$st->bindParam(':PatID', $PatID, PDO::PARAM_STR);
								$st->bindParam(':RegID', $RegID, PDO::PARAM_STR);
								$st->bindParam(':days', $quantity, PDO::PARAM_STR);
								$st->bindParam(':particulars', $bed_type_name, PDO::PARAM_STR);
								$st->bindParam(':amount', $bed_charge_fetched, PDO::PARAM_STR);
								$st->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);

								$st->execute();

								/************************************************************************************/
								$query=$db->prepare("SELECT charge_title,amount FROM `standard_charges` WHERE `is_constant`='1' and `IsActive`='1'");
								$query->execute();
								$results=$query->fetchAll();
								foreach ($results as $row1){

									$state=$db->prepare("INSERT INTO `ipd_bill_particulars` ( `reciept_id`,`instance_id`, `Registered_ID`,  `no_of_days`, `particulars`, `amount`, `WhenEntered`, `EnteredBy`) VALUES (:RecieptID,:PatID,:RegID,:days,:particulars,:amount,NOW(),:AdminID);");

									$state->bindParam(':RecieptID', $RecieptID, PDO::PARAM_STR);
									$state->bindParam(':PatID', $PatID, PDO::PARAM_STR);
									$state->bindParam(':RegID', $RegID, PDO::PARAM_STR);
									$state->bindParam(':days', $quantity, PDO::PARAM_STR);
									$state->bindParam(':particulars', $row1['charge_title'], PDO::PARAM_STR);
									$state->bindParam(':amount', $row1['amount'], PDO::PARAM_STR);
									$state->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);

									$state->execute();
								}
									$get_data=$db->prepare("SELECT * FROM `patientregistrationmaster` WHERE `RegistrationID`=:RegID;");
									$get_data->bindParam(':RegID', $RegID, PDO::PARAM_STR);
									$get_data->execute();
									$results=$get_data->fetchAll();
									if($get_data->rowCount() > 0){
										echo json_encode($results);
									}else{
										echo "unsuccesful";
									}
									/* echo "In Patient entered successfully."; */

							}
						}
          }
						}else{ echo "unsuccesful";}

						}
						else {echo false;
							$error = $state->errorInfo();
							echo "unsuccesful";
						}
		}else{
			echo false;
			$error = $statement->errorInfo();
			echo "unsuccesful";
		}
		/*@@@@@@@@@@@@@@@@@@@@*/
	}


//$results=$statement->fetch(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
//return true;
$db=null;
?>
