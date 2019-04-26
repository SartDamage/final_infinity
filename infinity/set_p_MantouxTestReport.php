 <?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $Date_Of_Inoculation = $FORM['ctl00_reportmaster_txtdateInoculation'];
    $Time_of_Inoculation = $FORM['ctl00_reportmaster_txtTimeInoculation'];
    $Date_of_Reporting = $FORM['ctl00_reportmaster_txtDateofReporting'];
    $PPD_Given = $FORM['ctl00_reportmaster_txtPPDGiven'];
    $Reading_Time = $FORM['ctl00_reportmaster_txtReadingTime'];
    $Erythema = $FORM['ctl00_reportmaster_txtErythema'];
    $Induration = $FORM['ctl00_reportmaster_txtInduration'];
    $Result = $FORM['ctl00_reportmaster_txtResult'];
    $Interpretation_of_Result = $FORM['ctl00_reportmaster_txtInterpretation'];
    
	
	$admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO `p_mantoux_test` (`RegistrationID`, `PatientId`, 
		Date_Of_Inoculation, Time_of_Inoculation, Date_of_Reporting, PPD_Given, Reading_Time, Erythema, Induration, Result, Interpretation_of_Result,
		
		`WhenEntered`, `EnteredBy`,`IsActive`) VALUES  (:RegID,:PatID,
	
	:Date_Of_Inoculation,:Time_of_Inoculation,:Date_of_Reporting,:PPD_Given, :Reading_Time, :Erythema, :Induration, :Result, :Interpretation_of_Result,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE	Date_Of_Inoculation=:Date_Of_Inoculation_dup,Time_of_Inoculation=:Time_of_Inoculation_dup,Date_of_Reporting=:Date_of_Reporting_dup,PPD_Given=:PPD_Given_dup,Reading_Time=:Reading_Time_dup,Erythema=:Erythema_dup,Induration=:Induration_dup,Result=:Result_dup,Interpretation_of_Result=:Interpretation_of_Result_dup,ModifiedBy=:AdminID_dup,LastModified=NOW()");
	$statement->bindParam(':Date_Of_Inoculation', $Date_Of_Inoculation, PDO::PARAM_INT);
	$statement->bindParam(':Date_Of_Inoculation_dup', $Date_Of_Inoculation, PDO::PARAM_INT);
 	$statement->bindParam(':Time_of_Inoculation', $Time_of_Inoculation, PDO::PARAM_INT);
	$statement->bindParam(':Time_of_Inoculation_dup', $Time_of_Inoculation, PDO::PARAM_INT);
	$statement->bindParam(':Date_of_Reporting', $Date_of_Reporting, PDO::PARAM_INT);
	$statement->bindParam(':Date_of_Reporting_dup', $Date_of_Reporting, PDO::PARAM_INT);
	$statement->bindParam(':PPD_Given', $PPD_Given, PDO::PARAM_INT);
	$statement->bindParam(':PPD_Given_dup', $PPD_Given, PDO::PARAM_INT);
	$statement->bindParam(':Reading_Time', $Reading_Time, PDO::PARAM_INT);
	$statement->bindParam(':Reading_Time_dup', $Reading_Time, PDO::PARAM_INT);
	$statement->bindParam(':Erythema', $Erythema, PDO::PARAM_INT);
	$statement->bindParam(':Erythema_dup', $Erythema, PDO::PARAM_INT);
	$statement->bindParam(':Induration', $Induration, PDO::PARAM_INT);
	$statement->bindParam(':Induration_dup', $Induration, PDO::PARAM_INT);
	$statement->bindParam(':Result', $Result, PDO::PARAM_INT);
	$statement->bindParam(':Result_dup', $Result, PDO::PARAM_INT);
	$statement->bindParam(':Interpretation_of_Result', $Interpretation_of_Result, PDO::PARAM_INT);
	$statement->bindParam(':Interpretation_of_Result_dup', $Interpretation_of_Result, PDO::PARAM_INT);
	
	
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_INT);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_INT);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_INT);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_INT);
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