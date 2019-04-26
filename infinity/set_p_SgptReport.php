 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $Sgpt = $FORM['ctl00_reportmaster_txtSgpt'];
    // $Method = $FORM['ctl00_reportmaster_txtMethod'];
    // $DateofReading = $FORM['ctl00_reportmaster_txtDateofReading'];
    // $Result = $FORM['ctl00_reportmaster_txtResult'];
    // $MCH = $FORM['ctl00_reportmaster_txtMCH'];
    // $MCHC = $FORM['ctl00_reportmaster_txtMCHC'];
    // $RDW = $FORM['ctl00_reportmaster_txtRDW']; 
    // $TotalWBCCount = $FORM['ctl00_reportmaster_txtTotalWBCCount']; 
    // $Neutrophils = $FORM['ctl00_reportmaster_txtNeutrophils']; 
    // $Lymphocytes = $FORM['ctl00_reportmaster_txtLymphocytes']; 
    // $Eosinophils = $FORM['ctl00_reportmaster_txtEosinophils']; 
    // $Monocytes = $FORM['ctl00_reportmaster_txtMonocytes']; 
    // $Basophils = $FORM['ctl00_reportmaster_txtBasophils']; 
    // $PlateletCount = $FORM['ctl00_reportmaster_txtPlateletCount']; 
    // $MPV = $FORM['ctl00_reportmaster_txtMPV']; 
    // $PlateletsonSmear = $FORM['ctl00_reportmaster_txtPlateletsonSmear']; 
    // $RBCMorphology = $FORM['ctl00_reportmaster_txtRBCMorphology']; 
    // $WBCsonPS = $FORM['ctl00_reportmaster_txtWBCsonPS']; 
    //$ESR = $FORM['ctl00_reportmaster_txtESR']; 
    $admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO `p_sgpt` (`RegistrationID`, `PatientId`, 
		S_G_P_T,
		
		`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:Sgpt,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE	S_G_P_T=:Sgpt_dup,ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':Sgpt', $Sgpt );
	$statement->bindParam(':Sgpt_dup', $Sgpt );
 	// $statement->bindParam(':Method', $Method );
	// $statement->bindParam(':Method_dup', $Method );
	// $statement->bindParam(':DateofReading', $DateofReading );
	// $statement->bindParam(':DateofReading_dup', $DateofReading );
	// $statement->bindParam(':Result', $Result );
	// $statement->bindParam(':Result_dup', $Result );
	// $statement->bindParam(':MCH', $MCH );
	// $statement->bindParam(':MCH_dup', $MCH );
	// $statement->bindParam(':MCHC', $MCHC );
	// $statement->bindParam(':MCHC_dup', $MCHC );
	// $statement->bindParam(':RDW', $RDW );
	// $statement->bindParam(':RDW_dup', $RDW );
	// $statement->bindParam(':TotalWBCCount', $TotalWBCCount );
	// $statement->bindParam(':TotalWBCCount_dup', $TotalWBCCount );
	// $statement->bindParam(':Neutrophils', $Neutrophils );
	// $statement->bindParam(':Neutrophils_dup', $Neutrophils );
	// $statement->bindParam(':Lymphocytes', $Lymphocytes );
	// $statement->bindParam(':Lymphocytes_dup', $Lymphocytes );
	// $statement->bindParam(':Eosinophils', $Eosinophils );
	// $statement->bindParam(':Eosinophils_dup', $Eosinophils );
	// $statement->bindParam(':Monocytes', $Monocytes );
	// $statement->bindParam(':Monocytes_dup', $Monocytes );
	// $statement->bindParam(':Basophils', $Basophils );
	// $statement->bindParam(':Basophils_dup', $Basophils );
	// $statement->bindParam(':PlateletCount', $PlateletCount );
	// $statement->bindParam(':PlateletCount_dup', $PlateletCount );
	// $statement->bindParam(':MPV', $MPV );
	// $statement->bindParam(':MPV_dup', $MPV );
	// $statement->bindParam(':PlateletsonSmear', $PlateletsonSmear );
	// $statement->bindParam(':PlateletsonSmear_dup', $PlateletsonSmear );
	// $statement->bindParam(':RBCMorphology', $RBCMorphology );
	// $statement->bindParam(':RBCMorphology_dup', $RBCMorphology );
	// $statement->bindParam(':WBCsonPS', $WBCsonPS );
	// $statement->bindParam(':WBCsonPS_dup', $WBCsonPS );
	//$statement->bindParam(':ESR', $ESR );
	//$statement->bindParam(':ESR_dup', $ESR );
	
	
	$statement->bindParam(':AdminID', $admin_ID );
	$statement->bindParam(':AdminID_dup', $admin_ID );
	$statement->bindParam(':RegID', $RegID );
	$statement->bindParam(':PatID', $PatID );
	$statement->execute();
	if ($statement->rowCount() > 0){$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.Report_generated='1',pprm.LastModified=NOW() WHERE `PatientId`=:PatID");$state->bindParam(':PatID', $PatID );$state->execute();echo "Data Saved";}else{echo "no insert";}
endif;
/* $db=null;
	$db = getDB();
	$statement=$db->prepare("SELECT * FROM p_hbs_ag Where PatientId=:PatID"); 
	$statement->bindParam(':PatID', $PatID );
	$statement->execute();
	/* $db = getDB();
	$stmt=$db->prepare("SELECT pda.IsActive FROM pathologycategorymaster AS pda WHERE pda.PathologyCategoryID=:pathodrID1");
	$stmt->bindParam(':pathodrID1', $pathodrID );
	$stmt->execute();*/
/* 	$results=$statement->fetch(PDO::FETCH_ASSOC);
	$json=json_encode($results);
	//return $json;
	echo $json;*/
	$db=null;
?>