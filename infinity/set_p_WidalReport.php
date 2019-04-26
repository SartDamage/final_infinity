 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $STyphiAntigenO = $FORM['ctl00_reportmaster_txtSTyphiAntigenO'];
    $STyphiAntigenH = $FORM['ctl00_reportmaster_txtSTyphiAntigenH'];
    $SParatyphiA = $FORM['ctl00_reportmaster_txtSParatyphiA'];
    $SParatyphiB = $FORM['ctl00_reportmaster_txtSParatyphiB'];
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
    $statement=$db->prepare("INSERT INTO `p_widal` (`RegistrationID`, `PatientId`, 
		   `S_typhi_antigen_O`,`S_typhi_antigen_H`,S_paratyphi_A_H,S_paratyphi_B_H,
		
		`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:STyphiAntigenO,:STyphiAntigenH,:SParatyphiA,:SParatyphiB,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE	S_typhi_antigen_O=:STyphiAntigenO_dup,S_typhi_antigen_H=:STyphiAntigenH_dup,S_paratyphi_A_H=:SParatyphiA_dup,S_paratyphi_B_H=:SParatyphiB_dup,ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':STyphiAntigenO', $STyphiAntigenO, PDO::PARAM_INT);
	$statement->bindParam(':STyphiAntigenO_dup', $STyphiAntigenO, PDO::PARAM_INT);
 	$statement->bindParam(':STyphiAntigenH', $STyphiAntigenH, PDO::PARAM_INT);
	$statement->bindParam(':STyphiAntigenH_dup', $STyphiAntigenH, PDO::PARAM_INT);
	$statement->bindParam(':SParatyphiA', $SParatyphiA, PDO::PARAM_INT);
	$statement->bindParam(':SParatyphiA_dup', $SParatyphiA, PDO::PARAM_INT);
	$statement->bindParam(':SParatyphiB', $SParatyphiB, PDO::PARAM_INT);
	$statement->bindParam(':SParatyphiB_dup', $SParatyphiB, PDO::PARAM_INT);
		
	
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
	$db = getDB();
	$stmt=$db->prepare("SELECT pda.IsActive FROM pathologycategorymaster AS pda WHERE pda.PathologyCategoryID=:pathodrID1");
	$stmt->bindParam(':pathodrID1', $pathodrID, PDO::PARAM_INT);
	$stmt->execute();*/
/* 	$results=$statement->fetch(PDO::FETCH_ASSOC);
	$json=json_encode($results);
	//return $json;
	echo $json;*/
	$db=null;
?>