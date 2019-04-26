 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $Quantity = $FORM['ctl00_reportmaster_txtQuantity'];
    $Colour = $FORM['ctl00_reportmaster_txtColour'];
    $Appearance = $FORM['ctl00_reportmaster_txtAppearance'];
    $Deposit = $FORM['ctl00_reportmaster_txtDeposit'];
    $Ph = $FORM['ctl00_reportmaster_txtPh'];
	$Specificgravity = $FORM['ctl00_reportmaster_txtSpecificgravity'];
    $Proteins = $FORM['ctl00_reportmaster_txtProteins']; 
    $Sugar = $FORM['ctl00_reportmaster_txtSugar']; 
    $Ketone = $FORM['ctl00_reportmaster_txtKetone']; 
    $Bilepigment = $FORM['ctl00_reportmaster_txtBilepigment']; 
    $Bilesalts = $FORM['ctl00_reportmaster_txtBilesalts']; 
    $Occultblood = $FORM['ctl00_reportmaster_txtOccultblood']; 
    $Urobilinogen = $FORM['ctl00_reportmaster_txUrobilinogen']; 
    $Puscells = $FORM['ctl00_reportmaster_txPuscells']; 
    $Epithelialcells = $FORM['ctl00_reportmaster_txEpithelialcells']; 
    $Redbloodcells = $FORM['ctl00_reportmaster_txRedbloodcells']; 
    $Casts = $FORM['ctl00_reportmaster_txCasts']; 
    $Crystals = $FORM['ctl00_reportmaster_txCrystals']; 
    $Otherfindings = $FORM['ctl00_reportmaster_txOtherfindings']; 
    $Comments = $FORM['ctl00_reportmaster_txComments']; 
    $admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO `p_urine_r_m` (`RegistrationID`, `PatientId`, 
		   
		   `Quantity`, `Colour`, `Appearance`, `Deposit`, `pH`, `Specific_gravity`, `Proteins`, `Sugar`, `Ketone`, `Bile_salts`, `Occult_blood`, `Urobilinogen`, `Pus_cells`, `Epithelial_cells`, `Red_blood_cells`, `Casts`, `Crystals`, `Other_findings`, `Comments`,
		
		`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:Quantity,:Colour,:Appearance,:Deposit,:Ph,:Specificgravity,:Proteins,:Sugar,:Ketone,:Bilesalts,:Occultblood,:Urobilinogen,:Puscells,:Epithelialcells,:Redbloodcells,:Casts,:Crystals,:Otherfindings,:Comments,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE	`Quantity`=:Quantity_dup,`Colour`=:Colour_dup,`Appearance`=:Appearance_dup,`Deposit`=:Deposit_dup,`pH`=:Ph_dup,`Specific_gravity`=:Specificgravity_dup,`Proteins`=:Proteins_dup,`Sugar`=:Sugar_dup,`Ketone`=:Ketone_dup,`Bile_salts`=:Bilesalts_dup,`Occult_blood`=:Occultblood_dup,`Urobilinogen`=:Urobilinogen_dup,`Pus_cells`=:Puscells_dup,`Epithelial_cells`=:Epithelialcells_dup,`Red_blood_cells`=:Redbloodcells_dup,`Casts`=:Casts_dup,`Crystals`=:Crystals_dup,`Other_findings`=:Otherfindings_dup,`Comments`=:Comments_dup,ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':Quantity', $Quantity, PDO::PARAM_INT);
	$statement->bindParam(':Quantity_dup', $Quantity, PDO::PARAM_INT);
 	$statement->bindParam(':Colour', $Colour, PDO::PARAM_INT);
	$statement->bindParam(':Colour_dup', $Colour, PDO::PARAM_INT);
	$statement->bindParam(':Appearance', $Appearance, PDO::PARAM_INT);
	$statement->bindParam(':Appearance_dup', $Appearance, PDO::PARAM_INT);
	$statement->bindParam(':Deposit', $Deposit, PDO::PARAM_INT);
	$statement->bindParam(':Deposit_dup', $Deposit, PDO::PARAM_INT);
	$statement->bindParam(':Ph', $Ph, PDO::PARAM_INT);
	$statement->bindParam(':Ph_dup', $Ph, PDO::PARAM_INT);
	$statement->bindParam(':Specificgravity', $Specificgravity, PDO::PARAM_INT);
	$statement->bindParam(':Specificgravity_dup', $Specificgravity, PDO::PARAM_INT);
	$statement->bindParam(':Proteins', $Proteins, PDO::PARAM_INT);
	$statement->bindParam(':Proteins_dup', $Proteins, PDO::PARAM_INT);
	$statement->bindParam(':Sugar', $Sugar, PDO::PARAM_INT);
	$statement->bindParam(':Sugar_dup', $Sugar, PDO::PARAM_INT);
	$statement->bindParam(':Ketone', $Ketone, PDO::PARAM_INT);
	$statement->bindParam(':Ketone_dup', $Ketone, PDO::PARAM_INT);
	// $statement->bindParam(':Bilepigment', $Bilepigment, PDO::PARAM_INT);
	// $statement->bindParam(':Bilepigment_dup', $Bilepigment, PDO::PARAM_INT);
	$statement->bindParam(':Bilesalts', $Bilesalts, PDO::PARAM_INT);
	$statement->bindParam(':Bilesalts_dup', $Bilesalts, PDO::PARAM_INT);
	$statement->bindParam(':Occultblood', $Occultblood, PDO::PARAM_INT);
	$statement->bindParam(':Occultblood_dup', $Occultblood, PDO::PARAM_INT);
	$statement->bindParam(':Urobilinogen', $Urobilinogen, PDO::PARAM_INT);
	$statement->bindParam(':Urobilinogen_dup', $Urobilinogen, PDO::PARAM_INT);
	$statement->bindParam(':Puscells', $Puscells, PDO::PARAM_INT);
	$statement->bindParam(':Puscells_dup', $Puscells, PDO::PARAM_INT);
	$statement->bindParam(':Epithelialcells', $Epithelialcells, PDO::PARAM_INT);
	$statement->bindParam(':Epithelialcells_dup', $Epithelialcells, PDO::PARAM_INT);
	$statement->bindParam(':Redbloodcells', $Redbloodcells, PDO::PARAM_INT);
	$statement->bindParam(':Redbloodcells_dup', $Redbloodcells, PDO::PARAM_INT);
	$statement->bindParam(':Casts', $Casts, PDO::PARAM_INT);
	$statement->bindParam(':Casts_dup', $Casts, PDO::PARAM_INT);
	$statement->bindParam(':Crystals', $Crystals, PDO::PARAM_INT);
	$statement->bindParam(':Crystals_dup', $Crystals, PDO::PARAM_INT);
	$statement->bindParam(':Otherfindings', $Otherfindings, PDO::PARAM_INT);
	$statement->bindParam(':Otherfindings_dup', $Otherfindings, PDO::PARAM_INT);
	$statement->bindParam(':Comments', $Comments, PDO::PARAM_INT);
	$statement->bindParam(':Comments_dup', $Comments, PDO::PARAM_INT);
	
	
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