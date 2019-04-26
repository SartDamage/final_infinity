<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    
	
    $pao2 = $FORM['ctl00_reportmaster_txt_pao2'];
	$paco2 = $FORM['ctl00_reportmaster_txtpaco2'];
	$hco3 = $FORM['ctl00_reportmaster_txthco3'];
	$ph = $FORM['ctl00_reportmaster_txtph'];
	$oxygen_saturation = $FORM['ctl00_reportmaster_txto2'];
	
	
	$admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
	/* echo "test reg id".$RegID;
	echo "test pat id".$PatID; */
    $statement=$db->prepare("INSERT INTO p_abg_analysis (`RegistrationID`, `PatientId`, 
	
	`pao2`, `paco2`, `hco3`, `ph`, `oxygen_saturation`,
	
	`WhenEntered`, `EnteredBy`, `IsActive`) VALUES (:RegID,:PatID,
	
	:pao2, :paco2, :hco3, :ph, :oxygen_saturation,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE 
			`pao2`=:pao2_dup,
			`paco2`=:paco2_dup,
			`hco3`=:hco3_dup,
			`ph`=:ph_dup,
			`oxygen_saturation`=:oxygen_saturation_dup,
			
			ModifiedBy=:AdminID_dup,LastModified=NOW()"); 
	/* $statement->bindParam(':quickVar1a', $quickVar1a, PDO::PARAM_INT); */
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
	
	$statement->bindParam(':pao2', $pao2, PDO::PARAM_INT);
	$statement->bindParam(':pao2_dup', $pao2, PDO::PARAM_INT);
	$statement->bindParam(':paco2', $paco2, PDO::PARAM_INT);
	$statement->bindParam(':paco2_dup', $paco2, PDO::PARAM_INT);
	$statement->bindParam(':hco3', $hco3, PDO::PARAM_INT);
	$statement->bindParam(':hco3_dup', $hco3, PDO::PARAM_INT);
	$statement->bindParam(':ph', $ph, PDO::PARAM_INT);
	$statement->bindParam(':ph_dup', $ph, PDO::PARAM_INT);
	$statement->bindParam(':oxygen_saturation', $oxygen_saturation, PDO::PARAM_INT);
	$statement->bindParam(':oxygen_saturation_dup', $oxygen_saturation, PDO::PARAM_INT);
	
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_INT);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_INT);
	
	$statement->execute();
	$db=null;
	$db = getDB();
	if ($statement->rowCount() > 0)
    {
			$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.Report_generated='1',pprm.LastModified=NOW() WHERE `PatientId`=:PatID");
			$state->bindParam(':PatID', $PatID, PDO::PARAM_STR);
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