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
    // $Blood = $FORM['ctl00_reportmaster_txtBlood'];
    // $Parasites = $FORM['ctl00_reportmaster_txtParasites'];
	// $Proteins = $FORM['ctl00_reportmaster_txtProteins'];
    // $Occultblood = $FORM['ctl00_reportmaster_txtOccultblood']; 
    // $Reducingsubstance = $FORM['ctl00_reportmaster_txtReducingsubstance']; 
    // $Ova = $FORM['ctl00_reportmaster_txOva']; 
    // $Cysts = $FORM['ctl00_reportmaster_txCysts']; 
    // $Vegetativeforms = $FORM['ctl00_reportmaster_txVegetativeforms']; 
    // $Redbloodcells = $FORM['ctl00_reportmaster_txRedbloodcells']; 
    // $Epithelialcells = $FORM['ctl00_reportmaster_txEpithelialcells']; 
    // $Puscells = $FORM['ctl00_reportmaster_txPuscells']; 
    // $Macrophages = $FORM['ctl00_reportmaster_txMacrophages']; 
    // $Others = $FORM['ctl00_reportmaster_txOthers']; 
    // $RBCMorphology = $FORM['ctl00_reportmaster_txtRBCMorphology']; 
    // $WBCsonPS = $FORM['ctl00_reportmaster_txtWBCsonPS']; 
    //$ESR = $FORM['ctl00_reportmaster_txtESR']; 
    $admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO `p_s_bilirubin` (`RegistrationID`, `PatientId`, 
		   `Bilirubin_total`, `Bilirubin_direct`, `Bilirubin_indirect`,
		
		`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:BilirubinTotal,:BilirubinDirect,:BilirubinIndirect,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE	`Bilirubin_total`=:BilirubinTotal_dup,`Bilirubin_direct`=:BilirubinDirect_dup,`Bilirubin_indirect`=:BilirubinIndirect_dup,ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':BilirubinTotal', $BilirubinTotal, PDO::PARAM_INT);
	$statement->bindParam(':BilirubinTotal_dup', $BilirubinTotal, PDO::PARAM_INT);
 	$statement->bindParam(':BilirubinDirect', $BilirubinDirect, PDO::PARAM_INT);
	$statement->bindParam(':BilirubinDirect_dup', $BilirubinDirect, PDO::PARAM_INT);
	$statement->bindParam(':BilirubinIndirect', $BilirubinIndirect, PDO::PARAM_INT);
	$statement->bindParam(':BilirubinIndirect_dup', $BilirubinIndirect, PDO::PARAM_INT);
	// $statement->bindParam(':Blood', $Blood, PDO::PARAM_INT);
	// $statement->bindParam(':Blood_dup', $Blood, PDO::PARAM_INT);
	// $statement->bindParam(':Proteins', $Proteins, PDO::PARAM_INT);
	// $statement->bindParam(':Proteins_dup', $Proteins, PDO::PARAM_INT);
	// $statement->bindParam(':Parasites', $Parasites, PDO::PARAM_INT);
	// $statement->bindParam(':Parasites_dup', $Parasites, PDO::PARAM_INT);
	// $statement->bindParam(':Occultblood', $Occultblood, PDO::PARAM_INT);
	// $statement->bindParam(':Occultblood_dup', $Occultblood, PDO::PARAM_INT);
	// $statement->bindParam(':Reducingsubstance', $Reducingsubstance, PDO::PARAM_INT);
	// $statement->bindParam(':Reducingsubstance_dup', $Reducingsubstance, PDO::PARAM_INT);
	// $statement->bindParam(':Ova', $Ova, PDO::PARAM_INT);
	// $statement->bindParam(':Ova_dup', $Ova, PDO::PARAM_INT);
	// $statement->bindParam(':Cysts', $Cysts, PDO::PARAM_INT);
	// $statement->bindParam(':Cysts_dup', $Cysts, PDO::PARAM_INT);
	// $statement->bindParam(':Vegetativeforms', $Vegetativeforms, PDO::PARAM_INT);
	// $statement->bindParam(':Vegetativeforms_dup', $Vegetativeforms, PDO::PARAM_INT);
	// $statement->bindParam(':Redbloodcells', $Redbloodcells, PDO::PARAM_INT);
	// $statement->bindParam(':Redbloodcells_dup', $Redbloodcells, PDO::PARAM_INT);
	// $statement->bindParam(':Epithelialcells', $Epithelialcells, PDO::PARAM_INT);
	// $statement->bindParam(':Epithelialcells_dup', $Epithelialcells, PDO::PARAM_INT);
	// $statement->bindParam(':Puscells', $Puscells, PDO::PARAM_INT);
	// $statement->bindParam(':Puscells_dup', $Puscells, PDO::PARAM_INT);
	// $statement->bindParam(':Macrophages', $Macrophages, PDO::PARAM_INT);
	// $statement->bindParam(':Macrophages_dup', $Macrophages, PDO::PARAM_INT);
	// $statement->bindParam(':Others', $Others, PDO::PARAM_INT);
	// $statement->bindParam(':Others_dup', $Others, PDO::PARAM_INT);
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