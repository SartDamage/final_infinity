 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $T3 = $FORM['ctl00_reportmaster_txtT3'];
    $T4 = $FORM['ctl00_reportmaster_txtT4'];
    $TSH = $FORM['ctl00_reportmaster_txtTSH'];
    $admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO `p_t3_t4_tsh` (`RegistrationID`, `PatientId`, 
		   `T3_tri_iodothyronine`, `T4_thyroxine`, `TSH_thyroid_stimulating_hormone`,
		
		`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:T3,:T4,:TSH,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE	`T3_tri_iodothyronine`=:T3_dup,`T4_thyroxine`=:T4_dup,`TSH_thyroid_stimulating_hormone`=:TSH_dup,ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':T3', $T3, PDO::PARAM_STR);
	$statement->bindParam(':T3_dup', $T3, PDO::PARAM_STR);
 	$statement->bindParam(':T4', $T4, PDO::PARAM_STR);
	$statement->bindParam(':T4_dup', $T4, PDO::PARAM_STR);
	$statement->bindParam(':TSH', $TSH, PDO::PARAM_STR);
	$statement->bindParam(':TSH_dup', $TSH, PDO::PARAM_STR);
	
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
	$statement->execute();
	if ($statement->rowCount() > 0){$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.Report_generated='1',pprm.LastModified=NOW() WHERE `PatientId`=:PatID");$state->bindParam(':PatID', $PatID, PDO::PARAM_STR);$state->execute();echo "Data Saved";}else{echo "no insert";}
endif;
	$db=null;
?>