<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    
	$CA_125 = $FORM['ctl00_reportmaster_txtca'];
    
	$admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO p_ca125 (`RegistrationID`, `PatientId`, 
	
	`CA_125`,
	
	`WhenEntered`, `EnteredBy`, `IsActive`) VALUES (:RegID,:PatID,
	
	:CA_125,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE 
			CA_125=:CA_125_dup,
			
			ModifiedBy=:AdminID_dup,LastModified=NOW()"); 
	/* $statement->bindParam(':quickVar1a', $quickVar1a, PDO::PARAM_INT); */
	$statement->bindParam(':CA_125', $CA_125, PDO::PARAM_INT);
	$statement->bindParam(':CA_125_dup', $CA_125, PDO::PARAM_INT);
	
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_INT);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_INT);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_INT);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_INT);
	$statement->execute();
	$db=null;
	$db = getDB();
	if ($statement->rowCount() > 0)
    {
			$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.Report_generated='1',pprm.LastModified=NOW() WHERE `PatientId`=:PatID");
			$state->bindParam(':PatID', $PatID, PDO::PARAM_INT);
			$state->execute();
        echo "Data Saved";
		
    }
	else{echo "no insert";}
	/* $db = getDB();
	$stmt=$db->prepare("SELECT pda.IsActive FROM pathologycategorymaster AS pda WHERE pda.PathologyCategoryID=:pathodrID1");
	$stmt->bindParam(':pathodrID1', $pathodrID, PDO::PARAM_INT);
	$stmt->execute();*/
	// $results=$statement->fetch(PDO::FETCH_ASSOC);
	// $json=json_encode($results);
	//return $json;
	// echo $json;
	$db=null; 
endif;
?>