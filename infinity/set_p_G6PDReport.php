 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $Result = $FORM['ctl00_reportmaster_txtResult'];
    $Method = $FORM['ctl00_reportmaster_txtMethod'];
    $admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO `p_glucose__6_phosphate_dehydrogenase`(`RegistrationID`, `PatientId`, `Result`,`Method`, `WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:Result,:Method,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE	`Result`=:Result_dup,`Method`=:Method_dup,ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':Result', $Result, PDO::PARAM_STR);
	$statement->bindParam(':Result_dup', $Result, PDO::PARAM_STR);
 	$statement->bindParam(':Method', $Method, PDO::PARAM_STR);
	$statement->bindParam(':Method_dup', $Method, PDO::PARAM_STR);
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
	$statement->execute();
	if ($statement->rowCount() > 0){$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.Report_generated='1',pprm.LastModified=NOW() WHERE `PatientId`=:PatID");$state->bindParam(':PatID', $PatID, PDO::PARAM_STR);$state->execute();echo "Data Saved";}else{echo "no insert";}
endif;
	$db=null;
?>