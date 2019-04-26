 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $Sodium = $FORM['ctl00_reportmaster_txtSodium'];
    $Potassium = $FORM['ctl00_reportmaster_txtPotassium'];
    $Chlorides = $FORM['ctl00_reportmaster_txtChlorides'];
    $Bicarbonate = $FORM['ctl00_reportmaster_txtBicarbonate'];
    $admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO `p_sr_electrolytes` (`RegistrationID`, `PatientId`, 
		  `Sodium`, `Potassium`, `Chlorides`, `Bicarbonate`, 
		
		`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:Sodium,:Potassium,:Chlorides,:Bicarbonate,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE	`Sodium`=:Sodium_dup,`Potassium`=:Potassium_dup, `Chlorides`=:Chlorides_dup, `Bicarbonate`=:Bicarbonate_dup, ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':Sodium', $Sodium, PDO::PARAM_INT);
	$statement->bindParam(':Sodium_dup', $Sodium, PDO::PARAM_INT);
 	$statement->bindParam(':Potassium', $Potassium, PDO::PARAM_INT);
	$statement->bindParam(':Potassium_dup', $Potassium, PDO::PARAM_INT);
	$statement->bindParam(':Chlorides', $Chlorides, PDO::PARAM_INT);
	$statement->bindParam(':Chlorides_dup', $Chlorides, PDO::PARAM_INT);
	$statement->bindParam(':Bicarbonate', $Bicarbonate, PDO::PARAM_INT);
	$statement->bindParam(':Bicarbonate_dup', $Bicarbonate, PDO::PARAM_INT);
	
	
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_INT);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_INT);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_INT);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_INT);
	
	$statement->execute();
	
	if ($statement->rowCount() > 0){$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.Report_generated='1',pprm.LastModified=NOW() WHERE `PatientId`=:PatID");$state->bindParam(':PatID', $PatID, PDO::PARAM_INT);$state->execute();echo "Data Saved";}else{echo "no insert";}
		
	  //echo "Data Saved";
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