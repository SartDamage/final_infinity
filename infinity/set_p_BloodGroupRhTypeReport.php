<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $blood_group = $FORM['ctl00_reportmaster_txtBloodGroup'];
    $rhfactor = $FORM['ctl00_reportmaster_txtRhFactor'];
    /* $result1 = $FORM['ctl00_reportmaster_txresult1'];
    $gramstain = $FORM['ctl00_reportmaster_txGramsstain'];
    $result2 = $FORM['ctl00_reportmaster_txResult2'];
    $note = $FORM['ctl00_reportmaster_txNote']; */
    $admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO p_blood_group__rh_factor (`RegistrationID`, `PatientId`, `Blood_group`,`Rh_factor`, `WhenEntered`, `EnteredBy`, `IsActive`) VALUES (:RegID,:PatID,:blood_group,:rhfactor,NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE 
			`Blood_group`=:blood_group_dup,`Rh_factor`=:rhfactor_dup,ModifiedBy=:AdminID_dup,LastModified=NOW()");
	/* $statement->bindParam(':quickVar1a', $quickVar1a, PDO::PARAM_INT); */
/* 	$statement->bindParam(':specimen', $specimen, PDO::PARAM_INT);
	$statement->bindParam(':specimen_dup', $specimen, PDO::PARAM_INT);
	$statement->bindParam(':method', $method, PDO::PARAM_INT);
	$statement->bindParam(':method_dup', $method, PDO::PARAM_INT);
	$statement->bindParam(':result1', $result1, PDO::PARAM_INT);
	$statement->bindParam(':result1_dup', $result, PDO::PARAM_INT);
	$statement->bindParam(':gramstain', $gramstain, PDO::PARAM_INT);
	$statement->bindParam(':gramstain_dup', $gramstain, PDO::PARAM_INT); */
	$statement->bindParam(':blood_group', $blood_group, PDO::PARAM_INT);
	$statement->bindParam(':blood_group_dup', $blood_group, PDO::PARAM_INT);
	$statement->bindParam(':rhfactor', $rhfactor, PDO::PARAM_INT);
	$statement->bindParam(':rhfactor_dup', $rhfactor, PDO::PARAM_INT);
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