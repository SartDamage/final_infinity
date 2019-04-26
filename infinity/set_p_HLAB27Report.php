<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $result = $FORM['ctl00_reportmaster_txtResult'];
    $method = $FORM['ctl00_reportmaster_txtMethod'];
    $admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO p_hla_b27 (`RegistrationID`, `PatientId`, `Result`, `WhenEntered`, `EnteredBy`, `IsActive`,`Method`) VALUES (:RegID,:PatID,:result,NOW(),:AdminID,'1',:method)
		ON DUPLICATE KEY UPDATE 
			Result=:result_dup,Method=:method_dup,ModifiedBy=:AdminID_dup,LastModified=NOW()");
	/* $statement->bindParam(':quickVar1a', $quickVar1a, PDO::PARAM_INT); */
	$statement->bindParam(':result', $result, PDO::PARAM_STR);
	$statement->bindParam(':result_dup', $result, PDO::PARAM_STR);
	$statement->bindParam(':method', $method, PDO::PARAM_STR);
	$statement->bindParam(':method_dup', $method, PDO::PARAM_STR);
	$statement->bindParam(':AdminID', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':AdminID_dup', $admin_ID, PDO::PARAM_STR);
	$statement->bindParam(':RegID', $RegID, PDO::PARAM_STR);
	$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
	$statement->execute();
	if ($statement->rowCount() > 0)
    {
			$state=$db->prepare("UPDATE `pathopatientregistrationmaster` as pprm SET pprm.Report_generated='1',pprm.LastModified=NOW() WHERE `PatientId`=:PatID");
			$state->bindParam(':PatID', $PatID, PDO::PARAM_STR);
			$state->execute();
        echo "Data Saved";
		
    }
	else{echo "no insert";}
	 
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