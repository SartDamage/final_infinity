<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $Haemoglobin = $FORM['ctl00_reportmaster_txtHaemoglobin'];
    $RBCCount = $FORM['ctl00_reportmaster_txtRBCCount'];
    $PCV = $FORM['ctl00_reportmaster_txtPCV'];
    $MCV = $FORM['ctl00_reportmaster_txtMCV'];
    $MCH = $FORM['ctl00_reportmaster_txtMCH'];
    $MCHC = $FORM['ctl00_reportmaster_txtMCHC'];
    $RDW = $FORM['ctl00_reportmaster_txtRDW']; 
    $TotalWBCCount = $FORM['ctl00_reportmaster_txtTotalWBCCount']; 
    $Neutrophils = $FORM['ctl00_reportmaster_txtNeutrophils']; 
    $Lymphocytes = $FORM['ctl00_reportmaster_txtLymphocytes']; 
    $Eosinophils = $FORM['ctl00_reportmaster_txtEosinophils']; 
    $Monocytes = $FORM['ctl00_reportmaster_txtMonocytes']; 
    $Basophils = $FORM['ctl00_reportmaster_txtBasophils']; 
    $PlateletCount = $FORM['ctl00_reportmaster_txtPlateletCount']; 
    $MPV = $FORM['ctl00_reportmaster_txtMPV']; 
    $PlateletsonSmear = $FORM['ctl00_reportmaster_txtPlateletsonSmear']; 
    $RBCMorphology = $FORM['ctl00_reportmaster_txtRBCMorphology']; 
    $WBCsonPS = $FORM['ctl00_reportmaster_txtWBCsonPS']; 
    $ESR = $FORM['ctl00_reportmaster_txtESR']; 
    $admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO `p_cbc_esr_and_platelet`(`RegistrationID`, `PatientId`, `Haemoglobin`, `Rbc_Count`, `Pcv`, `Mcv`, `Mch`, `Mchc`, `Rdw`, `Total_wbc_count`, `Neutrophils`, `Lymphocytes`, `Eosinophils`, `Monocytes`, `Basophils`, `Platelet_count`, `MPV`, `Platelets_on_smear`, `Rbc_morphology`, `Wbcs_on_ps`, `Esrendof1hour`, `WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	:Haemoglobin,:RBCCount,:PCV,:MCV,:MCH,:MCHC,:RDW,:TotalWBCCount,:Neutrophils,:Lymphocytes,:Eosinophils,:Monocytes,:Basophils,:PlateletCount,:MPV,:PlateletsonSmear,:RBCMorphology,:WBCsonPS,:ESR,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE	`Haemoglobin`=:Haemoglobin_dup,`Rbc_Count`=:RBCCount_dup,`Pcv`=:PCV_dup,`Mcv`=:MCV_dup,`Mch`=:MCH_dup,`Mchc`=:MCHC_dup,`Rdw`=:RDW_dup,`Total_wbc_count`=:TotalWBCCount_dup,`Neutrophils`=:Neutrophils_dup,`Lymphocytes`=:Lymphocytes_dup,`Eosinophils`=:Eosinophils_dup,`Monocytes`=:Monocytes_dup,`Basophils`=:Basophils_dup,`Platelet_count`=:PlateletCount_dup,`MPV`=:MPV_dup,`Platelets_on_smear`=:PlateletsonSmear_dup,`Rbc_morphology`=:RBCMorphology_dup,`Wbcs_on_ps`=:WBCsonPS_dup,`Esrendof1hour`=:ESR_dup,ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':Haemoglobin', $Haemoglobin, PDO::PARAM_STR);
	$statement->bindParam(':Haemoglobin_dup', $Haemoglobin, PDO::PARAM_STR);
 	$statement->bindParam(':RBCCount', $RBCCount, PDO::PARAM_STR);
	$statement->bindParam(':RBCCount_dup', $RBCCount, PDO::PARAM_STR);
	$statement->bindParam(':PCV', $PCV, PDO::PARAM_STR);
	$statement->bindParam(':PCV_dup', $PCV, PDO::PARAM_STR);
	$statement->bindParam(':MCV', $MCV, PDO::PARAM_STR);
	$statement->bindParam(':MCV_dup', $MCV, PDO::PARAM_STR);
	$statement->bindParam(':MCH', $MCH, PDO::PARAM_STR);
	$statement->bindParam(':MCH_dup', $MCH, PDO::PARAM_STR);
	$statement->bindParam(':MCHC', $MCHC, PDO::PARAM_STR);
	$statement->bindParam(':MCHC_dup', $MCHC, PDO::PARAM_STR);
	$statement->bindParam(':RDW', $RDW, PDO::PARAM_STR);
	$statement->bindParam(':RDW_dup', $RDW, PDO::PARAM_STR);
	$statement->bindParam(':TotalWBCCount', $TotalWBCCount, PDO::PARAM_STR);
	$statement->bindParam(':TotalWBCCount_dup', $TotalWBCCount, PDO::PARAM_STR);
	$statement->bindParam(':Neutrophils', $Neutrophils, PDO::PARAM_STR);
	$statement->bindParam(':Neutrophils_dup', $Neutrophils, PDO::PARAM_STR);
	$statement->bindParam(':Lymphocytes', $Lymphocytes, PDO::PARAM_STR);
	$statement->bindParam(':Lymphocytes_dup', $Lymphocytes, PDO::PARAM_STR);
	$statement->bindParam(':Eosinophils', $Eosinophils, PDO::PARAM_STR);
	$statement->bindParam(':Eosinophils_dup', $Eosinophils, PDO::PARAM_STR);
	$statement->bindParam(':Monocytes', $Monocytes, PDO::PARAM_STR);
	$statement->bindParam(':Monocytes_dup', $Monocytes, PDO::PARAM_STR);
	$statement->bindParam(':Basophils', $Basophils, PDO::PARAM_STR);
	$statement->bindParam(':Basophils_dup', $Basophils, PDO::PARAM_STR);
	$statement->bindParam(':PlateletCount', $PlateletCount, PDO::PARAM_STR);
	$statement->bindParam(':PlateletCount_dup', $PlateletCount, PDO::PARAM_STR);
	$statement->bindParam(':MPV', $MPV, PDO::PARAM_STR);
	$statement->bindParam(':MPV_dup', $MPV, PDO::PARAM_STR);
	$statement->bindParam(':PlateletsonSmear', $PlateletsonSmear, PDO::PARAM_STR);
	$statement->bindParam(':PlateletsonSmear_dup', $PlateletsonSmear, PDO::PARAM_STR);
	$statement->bindParam(':RBCMorphology', $RBCMorphology, PDO::PARAM_STR);
	$statement->bindParam(':RBCMorphology_dup', $RBCMorphology, PDO::PARAM_STR);
	$statement->bindParam(':WBCsonPS', $WBCsonPS, PDO::PARAM_STR);
	$statement->bindParam(':WBCsonPS_dup', $WBCsonPS, PDO::PARAM_STR);
	$statement->bindParam(':ESR', $ESR, PDO::PARAM_STR);
	$statement->bindParam(':ESR_dup', $ESR, PDO::PARAM_STR);
	
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
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
			$state->bindParam(':PatID', $PatID, PDO::PARAM_STR);
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