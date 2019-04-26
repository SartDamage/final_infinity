<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    
	$Prothrombin_TIme_Test = $FORM['ctl00_reportmaster_txtProthrombin'];
    $Mean_Normal_Prothrombin_TIme = $FORM['ctl00_reportmaster_txtNMPT'];
    $Prothrombin_Ratio = $FORM['ctl00_reportmaster_txtProthrombinRatio'];
    $Prothrombin_Index = $FORM['ctl00_reportmaster_txtProthrombinIndex'];
    $INR = $FORM['ctl00_reportmaster_txtINR'];
    $ISI = $FORM['ctl00_reportmaster_txtISI'];
    
	$admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO p_prothrombin_time (`RegistrationID`, `PatientId`, 
	
	Prothrombin_TIme_Test, Mean_Normal_Prothrombin_TIme, Prothrombin_Ratio, Prothrombin_Index, INR, ISI,
	
	`WhenEntered`, `EnteredBy`, `IsActive`) VALUES (:RegID,:PatID,
	
	:Prothrombin_TIme_Test,:Mean_Normal_Prothrombin_TIme,:Prothrombin_Ratio,:Prothrombin_Index,:INR,:ISI,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE 
			Prothrombin_TIme_Test=:Prothrombin_TIme_Test_dup,Mean_Normal_Prothrombin_TIme=:Mean_Normal_Prothrombin_TIme_dup,Prothrombin_Ratio=:Prothrombin_Ratio_dup,Prothrombin_Index=:Prothrombin_Index_dup,INR=:INR_dup,ISI=:ISI_dup,
			
			ModifiedBy=:AdminID_dup,LastModified=NOW()"); 
	/* $statement->bindParam(':quickVar1a', $quickVar1a, PDO::PARAM_INT); */
	$statement->bindParam(':Prothrombin_TIme_Test', $Prothrombin_TIme_Test);/*, PDO::PARAM_INT);*/
	$statement->bindParam(':Prothrombin_TIme_Test_dup', $Prothrombin_TIme_Test);/*, PDO::PARAM_INT);*/
	$statement->bindParam(':Mean_Normal_Prothrombin_TIme', $Mean_Normal_Prothrombin_TIme);/*, PDO::PARAM_INT);*/
	$statement->bindParam(':Mean_Normal_Prothrombin_TIme_dup', $Mean_Normal_Prothrombin_TIme);/*, PDO::PARAM_INT);*/
	$statement->bindParam(':Prothrombin_Ratio', $Prothrombin_Ratio);/*, PDO::PARAM_INT);*/
	$statement->bindParam(':Prothrombin_Ratio_dup', $Prothrombin_Ratio);/*, PDO::PARAM_INT);*/
	$statement->bindParam(':Prothrombin_Index', $Prothrombin_Index);/*, PDO::PARAM_INT);*/
	$statement->bindParam(':Prothrombin_Index_dup', $Prothrombin_Index);/*, PDO::PARAM_INT);*/
	$statement->bindParam(':INR', $INR);/*, PDO::PARAM_INT);*/
	$statement->bindParam(':INR_dup', $INR);/*, PDO::PARAM_INT);*/
	$statement->bindParam(':ISI', $ISI);/*, PDO::PARAM_INT);*/
	$statement->bindParam(':ISI_dup', $ISI);/*, PDO::PARAM_INT);*/
	
	$statement->bindParam(':AdminID', $admin_ID);/*, PDO::PARAM_INT);*/
	$statement->bindParam(':AdminID_dup', $admin_ID);/*, PDO::PARAM_INT);*/
	$statement->bindParam(':RegID', $RegID);/*, PDO::PARAM_INT);*/
	$statement->bindParam(':PatID', $PatID);/*, PDO::PARAM_INT);*/
	$statement->execute();
	$db=null;
	$db = getDB();
	if ($statement->rowCount() > 0)
    {
			$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.Report_generated='1',pprm.LastModified=NOW() WHERE `PatientId`=:PatID");
			$state->bindParam(':PatID', $PatID);/*, PDO::PARAM_INT);*/
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