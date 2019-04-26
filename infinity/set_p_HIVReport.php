 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $HIVAntibody = $FORM['ctl00_reportmaster_txtHIVAntibody'];
    $HIV1 = $FORM['ctl00_reportmaster_txtHIV1'];
    $HIV11 = $FORM['ctl00_reportmaster_txtHIV11'];
    $Interpretation = $FORM['ctl00_reportmaster_txtInterpretation'];
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
    $statement=$db->prepare("INSERT INTO `p_hiv` (`RegistrationID`, `PatientId`, `Hiv_antibody`,`Hiv_1`,`Hiv11`,`Interpretation`, `WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,

	:HIVAntibody,:HIV1,:HIV11,:Interpretation,

	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE	`Hiv_antibody`=:HIVAntibody_dup,`Hiv_1`=:HIV1_dup,`Hiv11`=:HIV11_dup,`Interpretation`=:Interpretation_dup,ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':HIVAntibody', $HIVAntibody, PDO::PARAM_INT);
	$statement->bindParam(':HIVAntibody_dup', $HIVAntibody, PDO::PARAM_INT);
 	$statement->bindParam(':HIV1', $HIV1, PDO::PARAM_INT);
	$statement->bindParam(':HIV1_dup', $HIV1, PDO::PARAM_INT);
	$statement->bindParam(':HIV11', $HIV11, PDO::PARAM_INT);
	$statement->bindParam(':HIV11_dup', $HIV11, PDO::PARAM_INT);
	$statement->bindParam(':Interpretation', $Interpretation, PDO::PARAM_INT);
	$statement->bindParam(':Interpretation_dup', $Interpretation, PDO::PARAM_INT);
	// $statement->bindParam(':MCH', $MCH, PDO::PARAM_INT);
	// $statement->bindParam(':MCH_dup', $MCH, PDO::PARAM_INT);
	// $statement->bindParam(':MCHC', $MCHC, PDO::PARAM_INT);
	// $statement->bindParam(':MCHC_dup', $MCHC, PDO::PARAM_INT);
	// $statement->bindParam(':RDW', $RDW, PDO::PARAM_INT);
	// $statement->bindParam(':RDW_dup', $RDW, PDO::PARAM_INT);
	// $statement->bindParam(':TotalWBCCount', $TotalWBCCount, PDO::PARAM_INT);
	// $statement->bindParam(':TotalWBCCount_dup', $TotalWBCCount, PDO::PARAM_INT);
	// $statement->bindParam(':Neutrophils', $Neutrophils, PDO::PARAM_INT);
	// $statement->bindParam(':Neutrophils_dup', $Neutrophils, PDO::PARAM_INT);
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


	$statement->bindParam(':AdminID', $admin_ID);
	$statement->bindParam(':AdminID_dup', $admin_ID);
	$statement->bindParam(':RegID', $RegID);
	$statement->bindParam(':PatID', $PatID);
	$statement->execute();
	if ($statement->rowCount() > 0){
    $state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.Report_generated='1',pprm.LastModified=NOW()
    WHERE `PatientId`=:PatID");
    $state->bindParam('PatID', $PatID);
    $state->execute();echo "Data Saved";
  }else{echo "no insert";}
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
