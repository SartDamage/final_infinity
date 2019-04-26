<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $blood_sugar = $FORM['ctl00_reportmaster_txtBloodSugar'];
    $urine_sugar = $FORM['ctl00_reportmaster_txtUrineSugar'];
    $urine_acetone = $FORM['ctl00_reportmaster_txtUrineAcetone'];
    /* $result1 = $FORM['ctl00_reportmaster_txresult1'];
    $gramstain = $FORM['ctl00_reportmaster_txGramsstain'];
    $result2 = $FORM['ctl00_reportmaster_txResult2'];
    $note = $FORM['ctl00_reportmaster_txNote']; */
    $admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO p_blood_sugar_fasting (`RegistrationID`, `PatientId`, `Blood_sugar`,`Urine_sugar`,`Urine_acetone`, `WhenEntered`, `EnteredBy`, `IsActive`) VALUES (:RegID,:PatID,:blood_sugar,:urine_sugar,:urine_acetone,NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE 
			`Blood_sugar`=:blood_sugar_dup,`Urine_sugar`=:urine_sugar_dup,`Urine_acetone`=:urine_acetone_dup,ModifiedBy=:AdminID_dup,LastModified=NOW()");
	/* $statement->bindParam(':quickVar1a', $quickVar1a, PDO::PARAM_INT); */
/* 	$statement->bindParam(':specimen', $specimen, PDO::PARAM_INT);
	$statement->bindParam(':specimen_dup', $specimen, PDO::PARAM_INT);
	$statement->bindParam(':method', $method, PDO::PARAM_INT);
	$statement->bindParam(':method_dup', $method, PDO::PARAM_INT);
	$statement->bindParam(':result1', $result1, PDO::PARAM_INT);
	$statement->bindParam(':result1_dup', $result, PDO::PARAM_INT);*/
	$statement->bindParam(':blood_sugar', $blood_sugar, PDO::PARAM_INT);
	$statement->bindParam(':blood_sugar_dup', $blood_sugar, PDO::PARAM_INT); 
	$statement->bindParam(':urine_sugar', $urine_sugar, PDO::PARAM_INT);
	$statement->bindParam(':urine_sugar_dup', $urine_sugar, PDO::PARAM_INT);
	$statement->bindParam(':urine_acetone', $urine_acetone, PDO::PARAM_INT);
	$statement->bindParam(':urine_acetone_dup', $urine_acetone, PDO::PARAM_INT);
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_INT);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_INT);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_INT);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_INT);
	$statement->execute();
	/* if ($statement->rowCount() > 0)
    {
			$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.Report_generated='1',pprm.LastModified=NOW() WHERE `PatientId`=:PatID");
			$state->bindParam(':PatID', $PatID, PDO::PARAM_INT);
			$state->execute();
        echo "Data Saved";
    }
	else{echo "no insert";} */
	if ($statement->rowCount() > 0)
    {
			$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.Report_generated='1',pprm.LastModified=NOW() WHERE `PatientId`=:PatID");
			$state->bindParam(':PatID', $PatID, PDO::PARAM_INT);
			$state->execute();
        echo "Data Saved";
    }
	else{echo "no insert";} 
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