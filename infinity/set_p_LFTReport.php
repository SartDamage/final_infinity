 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $BilirubinTotal = $FORM['ctl00_reportmaster_txtBilirubinTotal'];
    $BilirubinDirect = $FORM['ctl00_reportmaster_txtBilirubinDirect'];
    $BilirubinIndirect = $FORM['ctl00_reportmaster_txtBilirubinIndirect'];
    $Sgot = $FORM['ctl00_reportmaster_txtSgot'];
    $Sgpt = $FORM['ctl00_reportmaster_txtSgpt'];
    $AlkalinePhosphatase = $FORM['ctl00_reportmaster_txtAlkalinePhosphatase'];
    $TotalProteins = $FORM['ctl00_reportmaster_txtTotalProteins']; 
    $Albumin = $FORM['ctl00_reportmaster_txtAlbumin']; 
    $Globulin = $FORM['ctl00_reportmaster_txtGlobulin']; 
    $AGRatio = $FORM['ctl00_reportmaster_txtAGRatio']; 
    $Ggtp = $FORM['ctl00_reportmaster_txtGgtp']; 
    $Comment = $FORM['ctl00_reportmaster_txtComment']; 
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
    $statement=$db->prepare("INSERT INTO `p_liver_function_tests` (`RegistrationID`, `PatientId`, 
	
	`Bilirubin_total`, `Bilirubin_direct`, `Bilirubin_indirect`, `S_G_O_T`, `S_G_P_T`, `Alkaline_phosphatase`, `Total_proteins`, `Albumin`, `Globulin`, `A_g_ratio`, `G_G_T_P`, `Comments`,
	
	`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:BilirubinTotal,:BilirubinDirect,:BilirubinIndirect,:Sgot,:Sgpt,:AlkalinePhosphatase,:TotalProteins,:Albumin,:Globulin,:AGRatio,:Ggtp,:Comment,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE	
`Bilirubin_total`=:BilirubinTotal_dup,`Bilirubin_direct`=:BilirubinDirect_dup,`Bilirubin_indirect`=:BilirubinIndirect_dup,`S_G_O_T`=:Sgot_dup,`S_G_P_T`=:Sgpt_dup,`Alkaline_phosphatase`=:AlkalinePhosphatase_dup,`Total_proteins`=:TotalProteins_dup,`Albumin`=:Albumin_dup,`Globulin`=:Globulin_dup,`A_g_ratio`=:AGRatio_dup,`G_G_T_P`=:Ggtp_dup,`Comments`=:Comment_dup,
		
		ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':BilirubinTotal', $BilirubinTotal);
	$statement->bindParam(':BilirubinTotal_dup', $BilirubinTotal);
 	$statement->bindParam(':BilirubinDirect', $BilirubinDirect);
	$statement->bindParam(':BilirubinDirect_dup', $BilirubinDirect);
	$statement->bindParam(':BilirubinIndirect', $BilirubinIndirect);
	$statement->bindParam(':BilirubinIndirect_dup', $BilirubinIndirect);
	$statement->bindParam(':Sgot', $Sgot);
	$statement->bindParam(':Sgot_dup', $Sgot);
	$statement->bindParam(':Sgpt', $Sgpt);
	$statement->bindParam(':Sgpt_dup', $Sgpt);
	$statement->bindParam(':AlkalinePhosphatase', $AlkalinePhosphatase);
	$statement->bindParam(':AlkalinePhosphatase_dup', $AlkalinePhosphatase);
	$statement->bindParam(':TotalProteins', $TotalProteins);
	$statement->bindParam(':TotalProteins_dup', $TotalProteins);
	$statement->bindParam(':Albumin', $Albumin);
	$statement->bindParam(':Albumin_dup', $Albumin);
	$statement->bindParam(':Globulin', $Globulin);
	$statement->bindParam(':Globulin_dup', $Globulin);
	$statement->bindParam(':AGRatio', $AGRatio);
	$statement->bindParam(':AGRatio_dup', $AGRatio);
	$statement->bindParam(':Ggtp', $Ggtp);
	$statement->bindParam(':Ggtp_dup', $Ggtp);
	$statement->bindParam(':Comment', $Comment);
	$statement->bindParam(':Comment_dup', $Comment);
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
	if ($statement->rowCount() > 0){$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.Report_generated='1',pprm.LastModified=NOW() WHERE `PatientId`=:PatID");$state->bindParam(':PatID', $PatID, PDO::PARAM_STR);$state->execute();echo "Data Saved";}else{echo "no insert";}
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