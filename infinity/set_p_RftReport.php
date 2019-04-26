 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $Bloodurea = $FORM['ctl00_reportmaster_txtBloodurea'];
    $Bloodureanitrogen = $FORM['ctl00_reportmaster_txtBloodureanitrogen'];
    $Screatinine = $FORM['ctl00_reportmaster_txtScreatinine'];
    $Suricacid = $FORM['ctl00_reportmaster_txtSuricacid'];
    $Sphosphorus = $FORM['ctl00_reportmaster_txtSphosphorus'];
    $Scalcium = $FORM['ctl00_reportmaster_txtScalcium'];
    $Totalproteins = $FORM['ctl00_reportmaster_txtTotalproteins']; 
    $Salbumin = $FORM['ctl00_reportmaster_txtSalbumin']; 
    $Globumin = $FORM['ctl00_reportmaster_txtGlobumin']; 
    $Agratio = $FORM['ctl00_reportmaster_txtAgratio']; 
    $Ssodium = $FORM['ctl00_reportmaster_txtSsodium']; 
    $Spotassium = $FORM['ctl00_reportmaster_txtSpotassium']; 
    $Schlorides = $FORM['ctl00_reportmaster_txtSchlorides']; 
    $Comments = $FORM['ctl00_reportmaster_txtComments']; 
    // $MPV = $FORM['ctl00_reportmaster_txtMPV']; 
    // $PlateletsonSmear = $FORM['ctl00_reportmaster_txtPlateletsonSmear']; 
    // $RBCMorphology = $FORM['ctl00_reportmaster_txtRBCMorphology']; 
    // $WBCsonPS = $FORM['ctl00_reportmaster_txtWBCsonPS']; 
    //$ESR = $FORM['ctl00_reportmaster_txtESR']; 
    $admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO `p_rft` (`RegistrationID`, `PatientId`, 
		 `Blood_urea`, `Blood_urea_nitrogen`, `S_creatinine`, `S_uric_acid`, `S_phosphorus`, `S_calcium`, `Total_proteins`, `S_albumin`, `Globumin`, `A_g_ratio`, `S_sodium`, `S_potassium`, `S_chlorides`, `Comments`,
		
		`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:Bloodurea,:Bloodureanitrogen,:Screatinine,:Suricacid,:Sphosphorus,:Scalcium,:Totalproteins,:Salbumin,:Globumin,:Agratio,:Ssodium,:Spotassium,:Schlorides,:Comments,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE	`Blood_urea`=:Bloodurea_dup,`Blood_urea_nitrogen`=:Bloodureanitrogen_dup,`S_creatinine`=:Screatinine_dup,`S_uric_acid`=:Suricacid_dup,`S_phosphorus`=:Sphosphorus_dup,`S_calcium`=:Scalcium_dup,`Total_proteins`=:Totalproteins_dup,`S_albumin`=:Salbumin_dup,`Globumin`=:Globumin_dup,`A_g_ratio`=:Agratio_dup,`S_sodium`=:Ssodium_dup,`S_potassium`=:Spotassium_dup,`S_chlorides`=:Schlorides_dup,`Comments`=:Comments_dup,
		
		ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':Bloodurea', $Bloodurea, PDO::PARAM_STR);
	$statement->bindParam(':Bloodurea_dup', $Bloodurea, PDO::PARAM_STR);
 	$statement->bindParam(':Bloodureanitrogen', $Bloodureanitrogen, PDO::PARAM_STR);
	$statement->bindParam(':Bloodureanitrogen_dup', $Bloodureanitrogen, PDO::PARAM_STR);
	$statement->bindParam(':Screatinine', $Screatinine, PDO::PARAM_STR);
	$statement->bindParam(':Screatinine_dup', $Screatinine, PDO::PARAM_STR);
	$statement->bindParam(':Suricacid', $Suricacid, PDO::PARAM_STR);
	$statement->bindParam(':Suricacid_dup', $Suricacid, PDO::PARAM_STR);
	$statement->bindParam(':Sphosphorus', $Sphosphorus, PDO::PARAM_STR);
	$statement->bindParam(':Sphosphorus_dup', $Sphosphorus, PDO::PARAM_STR);
	$statement->bindParam(':Scalcium', $Scalcium, PDO::PARAM_STR);
	$statement->bindParam(':Scalcium_dup', $Scalcium, PDO::PARAM_STR);
	$statement->bindParam(':Totalproteins', $Totalproteins, PDO::PARAM_STR);
	$statement->bindParam(':Totalproteins_dup', $Totalproteins, PDO::PARAM_STR);
	$statement->bindParam(':Salbumin', $Salbumin, PDO::PARAM_STR);
	$statement->bindParam(':Salbumin_dup', $Salbumin, PDO::PARAM_STR);
	$statement->bindParam(':Globumin', $Globumin, PDO::PARAM_STR);
	$statement->bindParam(':Globumin_dup', $Globumin, PDO::PARAM_STR);
	$statement->bindParam(':Agratio', $Agratio, PDO::PARAM_STR);
	$statement->bindParam(':Agratio_dup', $Agratio, PDO::PARAM_STR);
	$statement->bindParam(':Ssodium', $Ssodium, PDO::PARAM_STR);
	$statement->bindParam(':Ssodium_dup', $Ssodium, PDO::PARAM_STR);
	$statement->bindParam(':Spotassium', $Spotassium, PDO::PARAM_STR);
	$statement->bindParam(':Spotassium_dup', $Spotassium, PDO::PARAM_STR);
	$statement->bindParam(':Schlorides', $Schlorides, PDO::PARAM_STR);
	$statement->bindParam(':Schlorides_dup', $Schlorides, PDO::PARAM_STR);
	$statement->bindParam(':Comments', $Comments, PDO::PARAM_STR);
	$statement->bindParam(':Comments_dup', $Comments, PDO::PARAM_STR);
	// $statement->bindParam(':MPV', $MPV, PDO::PARAM_STR);
	// $statement->bindParam(':MPV_dup', $MPV, PDO::PARAM_INT);
	// $statement->bindParam(':PlateletsonSmear', $PlateletsonSmear, PDO::PARAM_INT);
	// $statement->bindParam(':PlateletsonSmear_dup', $PlateletsonSmear, PDO::PARAM_INT);
	// $statement->bindParam(':RBCMorphology', $RBCMorphology, PDO::PARAM_INT);
	// $statement->bindParam(':RBCMorphology_dup', $RBCMorphology, PDO::PARAM_INT);
	// $statement->bindParam(':WBCsonPS', $WBCsonPS, PDO::PARAM_INT);
	// $statement->bindParam(':WBCsonPS_dup', $WBCsonPS, PDO::PARAM_INT);
	//$statement->bindParam(':ESR', $ESR, PDO::PARAM_INT);
	//$statement->bindParam(':ESR_dup', $ESR, PDO::PARAM_INT);
	
	
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
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