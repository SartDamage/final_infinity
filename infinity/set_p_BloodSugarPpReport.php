<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    
	$Fasting_Plasma_Glucose = $FORM['ctl00_reportmaster_txtFastingPlasmaGlucose'];
    $Fasting_Urine_Glucose_IFCC = $FORM['ctl00_reportmaster_txtFastingUrineGlucose'];
    $Fasting_Urine_Ketone = $FORM['ctl00_reportmaster_txtFastingUrineKetone'];
    $Fasting_Plasma_Glucose_hrs = $FORM['ctl00_reportmaster_txtPostPrandialPlasmaGlucose'];
    $PP_Urine_Glucose = $FORM['ctl00_reportmaster_txtPPUrineGlucose'];
    $PP_Urine_Ketone = $FORM['ctl00_reportmaster_txtPPUrineKetone'];
	
	$admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO p_blood_sugar_pp (`RegistrationID`, `PatientId`, 
	
	Fasting_Plasma_Glucose, Fasting_Urine_Glucose_IFCC, Fasting_Urine_Ketone, Fasting_Plasma_Glucose_hrs, PP_Urine_Glucose, PP_Urine_Ketone,
	
	`WhenEntered`, `EnteredBy`, `IsActive`) VALUES (:RegID,:PatID,
	
	:Fasting_Plasma_Glucose,:Fasting_Urine_Glucose_IFCC,:Fasting_Urine_Ketone,:Fasting_Plasma_Glucose_hrs,:PP_Urine_Glucose,:PP_Urine_Ketone,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE 
			Fasting_Plasma_Glucose=:Fasting_Plasma_Glucose_dup,Fasting_Urine_Glucose_IFCC=:Fasting_Urine_Glucose_IFCC_dup,Fasting_Urine_Ketone=:Fasting_Urine_Ketone_dup,Fasting_Plasma_Glucose_hrs=:Fasting_Plasma_Glucose_hrs_dup,PP_Urine_Glucose=:PP_Urine_Glucose_dup, PP_Urine_Ketone=:PP_Urine_Ketone_dup,
			
			ModifiedBy=:AdminID_dup,LastModified=NOW()"); 
	/* $statement->bindParam(':quickVar1a', $quickVar1a, PDO::PARAM_INT); */
	$statement->bindParam(':Fasting_Plasma_Glucose', $Fasting_Plasma_Glucose, PDO::PARAM_INT);
	$statement->bindParam(':Fasting_Plasma_Glucose_dup', $Fasting_Plasma_Glucose, PDO::PARAM_INT);
	$statement->bindParam(':Fasting_Urine_Glucose_IFCC', $Fasting_Urine_Glucose_IFCC, PDO::PARAM_INT);
	$statement->bindParam(':Fasting_Urine_Glucose_IFCC_dup', $Fasting_Urine_Glucose_IFCC, PDO::PARAM_INT);
	$statement->bindParam(':Fasting_Urine_Ketone', $Fasting_Urine_Ketone, PDO::PARAM_INT);
	$statement->bindParam(':Fasting_Urine_Ketone_dup', $Fasting_Urine_Ketone, PDO::PARAM_INT);
	$statement->bindParam(':Fasting_Plasma_Glucose_hrs', $Fasting_Plasma_Glucose_hrs, PDO::PARAM_INT);
	$statement->bindParam(':Fasting_Plasma_Glucose_hrs_dup', $Fasting_Plasma_Glucose_hrs, PDO::PARAM_INT);
	$statement->bindParam(':PP_Urine_Glucose', $PP_Urine_Glucose, PDO::PARAM_INT);
	$statement->bindParam(':PP_Urine_Glucose_dup', $PP_Urine_Glucose, PDO::PARAM_INT);
	$statement->bindParam(':PP_Urine_Ketone', $PP_Urine_Ketone, PDO::PARAM_INT);
	$statement->bindParam(':PP_Urine_Ketone_dup', $PP_Urine_Ketone, PDO::PARAM_INT);
	
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_INT);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_INT);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_INT);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_INT);
	$statement->execute();
	$db=null;
	$db = getDB();
	if ($statement->rowCount() > 0)
    {
			$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.Report_generated='1',pprm.LastModified=NOW() WHERE `PatientId`=:PatID");
			$state->bindParam(':PatID', $PatID, PDO::PARAM_INT);
			$state->execute();
        echo "Data Saved";
		
    }
	else{echo "no insert";}
	/* $db = getDB();
	$stmt=$db->prepare("SELECT pda.IsActive FROM pathologycategorymaster AS pda WHERE pda.PathologyCategoryID=:pathodrID1");
	$stmt->bindParam(':pathodrID1', $pathodrID, PDO::PARAM_INT);
	$stmt->execute();*/
	// $results=$statement->fetch(PDO::FETCH_ASSOC);
	// $json=json_encode($results);
	//return $json;
	// echo $json;
	$db=null; 
endif;
?>