 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $Report = $FORM['ctl00_reportmaster_txtReport'];
    $Specimen = $FORM['ctl00_reportmaster_txtSpecimen'];
    $Method = $FORM['ctl00_reportmaster_txtMethod'];
    $Result1 = $FORM['ctl00_reportmaster_txtResult1'];
    $Gramsstain = $FORM['ctl00_reportmaster_txtGramsstain'];
    $Wetmount = $FORM['ctl00_reportmaster_txtWetmount'];
    $Ziehlneelsonsstain = $FORM['ctl00_reportmaster_txtZiehlneelsonsstain']; 
    $Result2 = $FORM['ctl00_reportmaster_txtResult2']; 
    $Note = $FORM['ctl00_reportmaster_txtNote']; 
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
    $statement=$db->prepare("INSERT INTO `p_sputum_c_s` (`RegistrationID`, `PatientId`, 
		 `Report`, `Specimen`, `Method`, `M_Result`, `Grams_stain`, `Wet_mount`, `Zieh_lneelsons_stain`, `O_Result`, `Note`,
		
		`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:Report,:Specimen,:Method,:Result1,:Gramsstain,:Wetmount,:Ziehlneelsonsstain,:Result2,:Note,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE	`Report`=:Report_dup,`Specimen`=:Specimen_dup,`Method`=:Method_dup,`M_Result`=:Result1_dup,`Grams_stain`=:Gramsstain_dup,`Wet_mount`=:Wetmount_dup,`Zieh_lneelsons_stain`=:Ziehlneelsonsstain_dup,`O_Result`=:Result2_dup,`Note`=:Note_dup,ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':Report', $Report, PDO::PARAM_INT);
	$statement->bindParam(':Report_dup', $Report, PDO::PARAM_INT);
 	$statement->bindParam(':Specimen', $Specimen, PDO::PARAM_INT);
	$statement->bindParam(':Specimen_dup', $Specimen, PDO::PARAM_INT);
	$statement->bindParam(':Method', $Method, PDO::PARAM_INT);
	$statement->bindParam(':Method_dup', $Method, PDO::PARAM_INT);
	$statement->bindParam(':Result1', $Result1, PDO::PARAM_INT);
	$statement->bindParam(':Result1_dup', $Result1, PDO::PARAM_INT);
	$statement->bindParam(':Gramsstain', $Gramsstain, PDO::PARAM_INT);
	$statement->bindParam(':Gramsstain_dup', $Gramsstain, PDO::PARAM_INT);
	$statement->bindParam(':Wetmount', $Wetmount, PDO::PARAM_INT);
	$statement->bindParam(':Wetmount_dup', $Wetmount, PDO::PARAM_INT);
	$statement->bindParam(':Ziehlneelsonsstain', $Ziehlneelsonsstain, PDO::PARAM_INT);
	$statement->bindParam(':Ziehlneelsonsstain_dup', $Ziehlneelsonsstain, PDO::PARAM_INT);
	$statement->bindParam(':Result2', $Result2, PDO::PARAM_INT);
	$statement->bindParam(':Result2_dup', $Result2, PDO::PARAM_INT);
	$statement->bindParam(':Note', $Note, PDO::PARAM_INT);
	$statement->bindParam(':Note_dup', $Note, PDO::PARAM_INT);
	// $statement->bindParam(':Lymphocytes', $Lymphocytes, PDO::PARAM_INT);
	// $statement->bindParam(':Lymphocytes_dup', $Lymphocytes, PDO::PARAM_INT);
	// $statement->bindParam(':Eosinophils', $Eosinophils, PDO::PARAM_INT);
	// $statement->bindParam(':Eosinophils_dup', $Eosinophils, PDO::PARAM_INT);
	// $statement->bindParam(':Monocytes', $Monocytes, PDO::PARAM_INT);
	// $statement->bindParam(':Monocytes_dup', $Monocytes, PDO::PARAM_INT);
	// $statement->bindParam(':Basophils', $Basophils, PDO::PARAM_INT);
	// $statement->bindParam(':Basophils_dup', $Basophils, PDO::PARAM_INT);
	// $statement->bindParam(':PlateletCount', $PlateletCount, PDO::PARAM_INT);
	// $statement->bindParam(':PlateletCount_dup', $PlateletCount, PDO::PARAM_INT);
	// $statement->bindParam(':MPV', $MPV, PDO::PARAM_INT);
	// $statement->bindParam(':MPV_dup', $MPV, PDO::PARAM_INT);
	// $statement->bindParam(':PlateletsonSmear', $PlateletsonSmear, PDO::PARAM_INT);
	// $statement->bindParam(':PlateletsonSmear_dup', $PlateletsonSmear, PDO::PARAM_INT);
	// $statement->bindParam(':RBCMorphology', $RBCMorphology, PDO::PARAM_INT);
	// $statement->bindParam(':RBCMorphology_dup', $RBCMorphology, PDO::PARAM_INT);
	// $statement->bindParam(':WBCsonPS', $WBCsonPS, PDO::PARAM_INT);
	// $statement->bindParam(':WBCsonPS_dup', $WBCsonPS, PDO::PARAM_INT);
	//$statement->bindParam(':ESR', $ESR, PDO::PARAM_INT);
	//$statement->bindParam(':ESR_dup', $ESR, PDO::PARAM_INT);
	
	
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_INT);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_INT);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_INT);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_INT);
	$statement->execute();
	if ($statement->rowCount() > 0){$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.Report_generated='1',pprm.LastModified=NOW() WHERE `PatientId`=:PatID");$state->bindParam(':PatID', $PatID, PDO::PARAM_INT);$state->execute();echo "Data Saved";}else{echo "no insert";}
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