<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;
	$RegID=$form['regID'];
	if (isset($form['patID'])){$PatID=$form['patID'];}
	if (isset($form['dr_assigned-0'])){$dr_assigned=$form['dr_assigned-0'];}else{$dr_assigned="N.A.";}
	if (isset($form['opd_remark'])){$opd_remark=$form['opd_remark'];}else{$opd_remark="N.A.";}
	//$LabID="1";//$form['dr_assigned'];
	if(isset($form['total'])){$total=$form["total"];}else{$total="00";}
	if(isset($form['advance'])){$advance=$form["advance"];}else{$advance="00";}
	if(isset($form['balance'])){$balance=$form["balance"];}else{$balance="00";}

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
	//$RegID=$form['RegID'];
	if(($balance==0 || $balance ==00 || $balance =="0.00") &&  ($total!=0)){$Payment=2;}else if(($balance!=0 || $balance!=00) && (($total==0) || ($total==00) || $total=="0.00") ){$Payment=0;}else if(($balance!=0) &&  ($total!=0)){$Payment=1;}else{$Payment=0;}
	$AdminID=$form['ctl00_AdminID'];
	$db = getDB();

	$statement=$db->prepare("INSERT INTO `patientopd` (`RegID`,`visit_date`,`WhenEntered`,`EnteredBy`,`doctor_assigned`,`remark`,`charges`,`Paid`,`Payment`,`isUHID`,`UHID`) VALUES (:RegID,NOW(),NOW(),:AdminID,:dr_assigned,:opd_remark,:total,:Paid,:Payment,:isUHID,:UHID)");
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
	//$statement->bindParam(':visit_date', $RegID, PDO::PARAM_STR);

	$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);
	$statement->bindParam(':dr_assigned', $dr_assigned, PDO::PARAM_INT);
	$statement->bindParam(':opd_remark', $opd_remark, PDO::PARAM_STR);
	$statement->bindParam(':total', $total, PDO::PARAM_INT);
	$statement->bindParam(':Paid', $advance, PDO::PARAM_INT);
	$statement->bindParam(':Payment', $Payment, PDO::PARAM_INT);
	$statement->bindParam(':isUHID', $use_UHID, PDO::PARAM_INT);
	$statement->bindParam(':UHID', $UHID, PDO::PARAM_INT);
	$statement->execute();
if (($statement->rowCount()>0))
   {/* Update worked because query affected X amount of rows. */
		//echo "Out Patient entered successfully.";
		$get_data=$db->prepare("SELECT * FROM `patientregistrationmaster` WHERE `RegistrationID`=:RegID;");
		$get_data->bindParam(':RegID', $RegID, PDO::PARAM_STR);
		$get_data->execute();
		$results=$get_data->fetchAll();
		if($get_data->rowCount() > 0){
			echo json_encode($results);
		}else{
			echo "unsuccesful";
		}
}else{
	echo false;
	$error = $statement->errorInfo();
	echo "unsuccesful";
}


//$results=$statement->fetch(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
//return true;
$db=null;
?>
