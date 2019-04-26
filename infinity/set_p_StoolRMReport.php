<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    
	$Colour = $FORM['ctl00_reportmaster_txtColour'];
$Form_and_Consistency = $FORM['ctl00_reportmaster_txtConsistency'];
$Mucus = $FORM['ctl00_reportmaster_txtMucus'];
$Frank_Blood = $FORM['ctl00_reportmaster_txtFrankBlood'];
$Adult_Worms = $FORM['ctl00_reportmaster_txtAdultWorms'];
$Reaction = $FORM['ctl00_reportmaster_txtReaction'];
$Occult_Blood = $FORM['ctl00_reportmaster_txtOccultBlood'];
$Pus_Cells = $FORM['ctl00_reportmaster_txtPusCell'];
$Red_Blood_Cells = $FORM['ctl00_reportmaster_txtRedBlood'];
$Epithelial_Cells = $FORM['ctl00_reportmaster_txtEpithelial'];
$Ova = $FORM['ctl00_reportmaster_txtOva'];
$Cysts = $FORM['ctl00_reportmaster_txtCysts'];
$Trophozoites = $FORM['ctl00_reportmaster_txtTrophozoites'];
$Form_and_Consistency = $FORM['ctl00_reportmaster_txtConsistency'];
$Fat_Bodies = $FORM['ctl00_reportmaster_txtFat'];
$Budding_Yeasts = $FORM['ctl00_reportmaster_txtBudding'];
$Others = $FORM['ctl00_reportmaster_txtOthers'];

	$admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO p_stool_examination_rm (`RegistrationID`, `PatientId`, 
	
	Colour, Form_and_Consistency, Mucus, Frank_Blood, Adult_Worms, Reaction, Occult_Blood, Pus_Cells, Red_Blood_Cells, Epithelial_Cells, Ova, Cysts, Trophozoites,  Fat_Bodies, Budding_Yeasts, Others
,
	
	`WhenEntered`, `EnteredBy`, `IsActive`) VALUES (:RegID,:PatID,
	
	:Colour, :Form_and_Consistency, :Mucus, :Frank_Blood, :Adult_Worms, :Reaction, :Occult_Blood, :Pus_Cells, :Red_Blood_Cells, :Epithelial_Cells, :Ova, :Cysts, :Trophozoites, :Fat_Bodies, :Budding_Yeasts, :Others,
	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE 
			Colour = :Colour_dup, Form_and_Consistency = :Form_and_Consistency_dup, Mucus = :Mucus_dup, Frank_Blood = :Frank_Blood_dup, Adult_Worms = :Adult_Worms_dup, Reaction = :Reaction_dup, Occult_Blood = :Occult_Blood_dup, Pus_Cells = :Pus_Cells_dup, Red_Blood_Cells = :Red_Blood_Cells_dup, Epithelial_Cells = :Epithelial_Cells_dup, Ova = :Ova_dup, Cysts = :Cysts_dup, Trophozoites = :Trophozoites_dup, Fat_Bodies = :Fat_Bodies_dup, Budding_Yeasts = :Budding_Yeasts_dup, Others = :Others_dup,
				
			ModifiedBy=:AdminID_dup,LastModified=NOW()"); 
	/* $statement->bindParam(':quickVar1a', $quickVar1a, PDO::PARAM_INT); */
	$statement->bindParam(':Colour', $Colour, PDO::PARAM_INT);
$statement->bindParam(':Form_and_Consistency', $Form_and_Consistency, PDO::PARAM_INT);
$statement->bindParam(':Mucus', $Mucus, PDO::PARAM_INT);
$statement->bindParam(':Frank_Blood', $Frank_Blood, PDO::PARAM_INT);
$statement->bindParam(':Adult_Worms', $Adult_Worms, PDO::PARAM_INT);
$statement->bindParam(':Reaction', $Reaction, PDO::PARAM_INT);
$statement->bindParam(':Occult_Blood', $Occult_Blood, PDO::PARAM_INT);
$statement->bindParam(':Pus_Cells', $Pus_Cells, PDO::PARAM_INT);
$statement->bindParam(':Red_Blood_Cells', $Red_Blood_Cells, PDO::PARAM_INT);
$statement->bindParam(':Epithelial_Cells', $Epithelial_Cells, PDO::PARAM_INT);
$statement->bindParam(':Ova', $Ova, PDO::PARAM_INT);
$statement->bindParam(':Cysts', $Cysts, PDO::PARAM_INT);
$statement->bindParam(':Trophozoites', $Trophozoites, PDO::PARAM_INT);
$statement->bindParam(':Fat_Bodies', $Fat_Bodies, PDO::PARAM_INT);
$statement->bindParam(':Budding_Yeasts', $Budding_Yeasts, PDO::PARAM_INT);
$statement->bindParam(':Others', $Others, PDO::PARAM_INT);
$statement->bindParam(':Colour_dup', $Colour, PDO::PARAM_INT);
$statement->bindParam(':Form_and_Consistency_dup', $Form_and_Consistency, PDO::PARAM_INT);
$statement->bindParam(':Mucus_dup', $Mucus, PDO::PARAM_INT);
$statement->bindParam(':Frank_Blood_dup', $Frank_Blood, PDO::PARAM_INT);
$statement->bindParam(':Adult_Worms_dup', $Adult_Worms, PDO::PARAM_INT);
$statement->bindParam(':Reaction_dup', $Reaction, PDO::PARAM_INT);
$statement->bindParam(':Occult_Blood_dup', $Occult_Blood, PDO::PARAM_INT);
$statement->bindParam(':Pus_Cells_dup', $Pus_Cells, PDO::PARAM_INT);
$statement->bindParam(':Red_Blood_Cells_dup', $Red_Blood_Cells, PDO::PARAM_INT);
$statement->bindParam(':Epithelial_Cells_dup', $Epithelial_Cells, PDO::PARAM_INT);
$statement->bindParam(':Ova_dup', $Ova, PDO::PARAM_INT);
$statement->bindParam(':Cysts_dup', $Cysts, PDO::PARAM_INT);
$statement->bindParam(':Trophozoites_dup', $Trophozoites, PDO::PARAM_INT);
$statement->bindParam(':Fat_Bodies_dup', $Fat_Bodies, PDO::PARAM_INT);
$statement->bindParam(':Budding_Yeasts_dup', $Budding_Yeasts, PDO::PARAM_INT);
$statement->bindParam(':Others_dup', $Others, PDO::PARAM_INT);

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