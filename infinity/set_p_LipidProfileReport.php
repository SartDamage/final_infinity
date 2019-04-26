 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $choltrol = $FORM['ctl00_reportmaster_txtcholtrol'];
    $trigly = $FORM['ctl00_reportmaster_txttrigly'];
    $hdl = $FORM['ctl00_reportmaster_txthdl'];
    $ldl = $FORM['ctl00_reportmaster_txtldl'];
    $vldl = $FORM['ctl00_reportmaster_txtvldl'];
    $chol_hdl = $FORM['ctl00_reportmaster_txtchol_hdl'];
    $ldl_hdl = $FORM['ctl00_reportmaster_txtldl_hdl']; 
    // $Albumin = $FORM['ctl00_reportmaster_txtAlbumin']; 
    // $Globulin = $FORM['ctl00_reportmaster_txtGlobulin']; 
    // $AGRatio = $FORM['ctl00_reportmaster_txtAGRatio']; 
    // $Ggtp = $FORM['ctl00_reportmaster_txtGgtp']; 
    // $Comment = $FORM['ctl00_reportmaster_txtComment']; 
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
    $statement=$db->prepare("INSERT INTO `p_lipid_profile` (`RegistrationID`, `PatientId`, 
	
	`Cholesterol`, `Triglyceride`, `Hdl_cholesterol`, `Idl_cholesterol`, `Vldl_cholesterol`, `Chol_hdl`, `Idl_hdl`,  
	
	`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:choltrol,:trigly,:hdl,:ldl,:vldl,:chol_hdl,:ldl_hdl,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE	
`Cholesterol`=:choltrol_dup,`Triglyceride`=:trigly_dup,`Hdl_cholesterol`=:hdl_dup,`Idl_cholesterol`=:ldl_dup,`Vldl_cholesterol`=:vldl_dup,`Chol_hdl`=:chol_hdl_dup,`Idl_hdl`=:ldl_hdl_dup,
		
		ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':choltrol', $choltrol, PDO::PARAM_INT);
	$statement->bindParam(':choltrol_dup', $choltrol, PDO::PARAM_INT);
 	$statement->bindParam(':trigly', $trigly, PDO::PARAM_INT);
	$statement->bindParam(':trigly_dup', $trigly, PDO::PARAM_INT);
	$statement->bindParam(':hdl', $hdl, PDO::PARAM_INT);
	$statement->bindParam(':hdl_dup', $hdl, PDO::PARAM_INT);
	$statement->bindParam(':ldl', $ldl, PDO::PARAM_INT);
	$statement->bindParam(':ldl_dup', $ldl, PDO::PARAM_INT);
	$statement->bindParam(':vldl', $vldl, PDO::PARAM_INT);
	$statement->bindParam(':vldl_dup', $vldl, PDO::PARAM_INT);
	$statement->bindParam(':chol_hdl', $chol_hdl, PDO::PARAM_INT);
	$statement->bindParam(':chol_hdl_dup', $chol_hdl, PDO::PARAM_INT);
	$statement->bindParam(':ldl_hdl', $ldl_hdl, PDO::PARAM_INT);
	$statement->bindParam(':ldl_hdl_dup', $ldl_hdl, PDO::PARAM_INT);
	// $statement->bindParam(':Albumin', $Albumin, PDO::PARAM_INT);
	// $statement->bindParam(':Albumin_dup', $Albumin, PDO::PARAM_INT);
	// $statement->bindParam(':Globulin', $Globulin, PDO::PARAM_INT);
	// $statement->bindParam(':Globulin_dup', $Globulin, PDO::PARAM_INT);
	// $statement->bindParam(':AGRatio', $AGRatio, PDO::PARAM_INT);
	// $statement->bindParam(':AGRatio_dup', $AGRatio, PDO::PARAM_INT);
	// $statement->bindParam(':Ggtp', $Ggtp, PDO::PARAM_INT);
	// $statement->bindParam(':Ggtp_dup', $Ggtp, PDO::PARAM_INT);
	// $statement->bindParam(':Comment', $Comment, PDO::PARAM_INT);
	// $statement->bindParam(':Comment_dup', $Comment, PDO::PARAM_INT);
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