<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['ctl00_reportmaster_AdminID'])):
	$FORM = $_GET;
    $Red_Blood_Cells = $FORM['ctl00_reportmaster_txtRBC'];
$Pus_Cells = $FORM['ctl00_reportmaster_txtPC'];
$Epithelial_Cells = $FORM['ctl00_reportmaster_txtEC'];
$Yeast_Cells = $FORM['ctl00_reportmaster_txtYC'];
$Culture_Examination = $FORM['ctl00_reportmaster_txtCE'];
$Amikacin = $FORM['ctl00_reportmaster_txtAmikacin'];
$Amoxycilin = $FORM['ctl00_reportmaster_txtAmoxycilin'];
$Ampicillin = $FORM['ctl00_reportmaster_txtAmpicillin'];
$Cefaclor = $FORM['ctl00_reportmaster_txtCefaclor'];
$Cefotaxime_Sodium = $FORM['ctl00_reportmaster_txtCS'];
$Ceftazidime = $FORM['ctl00_reportmaster_txtCeftazidime'];
$Ceftizoxime = $FORM['ctl00_reportmaster_txtCeftizoxime'];
$Cefuroxime = $FORM['ctl00_reportmaster_txtCefuroxime'];
$Chloromycetin = $FORM['ctl00_reportmaster_txtChloromycetin'];
$Ciprofloxacin = $FORM['ctl00_reportmaster_txtCiprofloxacin'];
$Clavulanic_Acid_amox = $FORM['ctl00_reportmaster_txtClavulanic'];
$Doxycycline = $FORM['ctl00_reportmaster_txtDoxycycline'];
$Furadantin = $FORM['ctl00_reportmaster_txtFuradantin'];
$Furazolidone = $FORM['ctl00_reportmaster_txtFurazolidone'];
$Gentamycin = $FORM['ctl00_reportmaster_txtGentamycin'];
$Nalidixic_Acid = $FORM['ctl00_reportmaster_txtNalidixic'];
$Netromycin = $FORM['ctl00_reportmaster_txtNetromycin'];
$Norflox = $FORM['ctl00_reportmaster_txtNorflox'];
$Ofloxacin = $FORM['ctl00_reportmaster_txtOfloxacin'];
$Piperacillin = $FORM['ctl00_reportmaster_txtPiperacillin'];
$Rifampicin = $FORM['ctl00_reportmaster_txtRifampicin'];
$Septran = $FORM['ctl00_reportmaster_txtSeptran'];
$Sulbactum_ampicillin = $FORM['ctl00_reportmaster_txtSulbactum'];
$Tetracycline = $FORM['ctl00_reportmaster_txtTetracycline'];
$Tobramycin = $FORM['ctl00_reportmaster_txtTobramycin'];

    
	$admin_ID = $FORM['ctl00_reportmaster_AdminID'];
    $admin_ID = base64_decode($admin_ID);
    $RegID = $FORM['ctl00_reportmaster_RegID'];
    $PatID = $FORM['ctl00_reportmaster_PatID'];
    $statement=$db->prepare("INSERT INTO p_stool_of_cultural_examination (`RegistrationID`, `PatientId`, 
	
	Red_Blood_Cells, Pus_Cells, Epithelial_Cells, Yeast_Cells, Culture_Examination, Amikacin, Amoxycilin, Ampicillin, Cefaclor, Cefotaxime_Sodium, Ceftazidime, Ceftizoxime, Cefuroxime, Chloromycetin, Ciprofloxacin, Clavulanic_Acid_amox, Doxycycline, Furadantin, Furazolidone, Gentamycin, Nalidixic_Acid, Netromycin, Norflox, Ofloxacin, Piperacillin, Rifampicin, Septran, Sulbactum_ampicillin, Tetracycline, Tobramycin,
	
	`WhenEntered`, `EnteredBy`, `IsActive`) VALUES (:RegID,:PatID,
	
	:Red_Blood_Cells, :Pus_Cells, :Epithelial_Cells, :Yeast_Cells, :Culture_Examination, :Amikacin, :Amoxycilin, :Ampicillin, :Cefaclor, :Cefotaxime_Sodium, :Ceftazidime, :Ceftizoxime, :Cefuroxime, :Chloromycetin, :Ciprofloxacin, :Clavulanic_Acid_amox, :Doxycycline, :Furadantin, :Furazolidone, :Gentamycin, :Nalidixic_Acid, :Netromycin, :Norflox, :Ofloxacin, :Piperacillin, :Rifampicin, :Septran, :Sulbactum_ampicillin, :Tetracycline, :Tobramycin,

	
	NOW(),:AdminID,'1')
		ON DUPLICATE KEY UPDATE 
			Red_Blood_Cells=:Red_Blood_Cells_dup, Pus_Cells=:Pus_Cells_dup, Epithelial_Cells=:Epithelial_Cells_dup, Yeast_Cells=:Yeast_Cells_dup, Culture_Examination=:Culture_Examination_dup, Amikacin=:Amikacin_dup, Amoxycilin=:Amoxycilin_dup, Ampicillin=:Ampicillin_dup, Cefaclor=:Cefaclor_dup, Cefotaxime_Sodium=:Cefotaxime_Sodium_dup, Ceftazidime=:Ceftazidime_dup, Ceftizoxime=:Ceftizoxime_dup, Cefuroxime=:Cefuroxime_dup, Chloromycetin=:Chloromycetin_dup, Ciprofloxacin=:Ciprofloxacin_dup, Clavulanic_Acid_amox=:Clavulanic_Acid_amox_dup, Doxycycline=:Doxycycline_dup, Furadantin=:Furadantin_dup, Furazolidone=:Furazolidone_dup, Gentamycin=:Gentamycin_dup, Nalidixic_Acid=:Nalidixic_Acid_dup, Netromycin=:Netromycin_dup, Norflox=:Norflox_dup, Ofloxacin=:Ofloxacin_dup, Piperacillin=:Piperacillin_dup, Rifampicin=:Rifampicin_dup, Septran=:Septran_dup, Sulbactum_ampicillin=:Sulbactum_ampicillin_dup, Tetracycline=:Tetracycline_dup, Tobramycin=:Tobramycin_dup,
			
			ModifiedBy=:AdminID_dup,LastModified=NOW()"); 
	/* $statement->bindParam(':quickVar1a', $quickVar1a, PDO::PARAM_INT); */
	$statement->bindParam(':Red_Blood_Cells', $Red_Blood_Cells, PDO::PARAM_INT);
$statement->bindParam(':Pus_Cells', $Pus_Cells, PDO::PARAM_INT);
$statement->bindParam(':Epithelial_Cells', $Epithelial_Cells, PDO::PARAM_INT);
$statement->bindParam(':Yeast_Cells', $Yeast_Cells, PDO::PARAM_INT);
$statement->bindParam(':Culture_Examination', $Culture_Examination, PDO::PARAM_INT);
$statement->bindParam(':Amikacin', $Amikacin, PDO::PARAM_INT);
$statement->bindParam(':Amoxycilin', $Amoxycilin, PDO::PARAM_INT);
$statement->bindParam(':Ampicillin', $Ampicillin, PDO::PARAM_INT);
$statement->bindParam(':Cefaclor', $Cefaclor, PDO::PARAM_INT);
$statement->bindParam(':Cefotaxime_Sodium', $Cefotaxime_Sodium, PDO::PARAM_INT);
$statement->bindParam(':Ceftazidime', $Ceftazidime, PDO::PARAM_INT);
$statement->bindParam(':Ceftizoxime', $Ceftizoxime, PDO::PARAM_INT);
$statement->bindParam(':Cefuroxime', $Cefuroxime, PDO::PARAM_INT);
$statement->bindParam(':Chloromycetin', $Chloromycetin, PDO::PARAM_INT);
$statement->bindParam(':Ciprofloxacin', $Ciprofloxacin, PDO::PARAM_INT);
$statement->bindParam(':Clavulanic_Acid_amox', $Clavulanic_Acid_amox, PDO::PARAM_INT);
$statement->bindParam(':Doxycycline', $Doxycycline, PDO::PARAM_INT);
$statement->bindParam(':Furadantin', $Furadantin, PDO::PARAM_INT);
$statement->bindParam(':Furazolidone', $Furazolidone, PDO::PARAM_INT);
$statement->bindParam(':Gentamycin', $Gentamycin, PDO::PARAM_INT);
$statement->bindParam(':Nalidixic_Acid', $Nalidixic_Acid, PDO::PARAM_INT);
$statement->bindParam(':Netromycin', $Netromycin, PDO::PARAM_INT);
$statement->bindParam(':Norflox', $Norflox, PDO::PARAM_INT);
$statement->bindParam(':Ofloxacin', $Ofloxacin, PDO::PARAM_INT);
$statement->bindParam(':Piperacillin', $Piperacillin, PDO::PARAM_INT);
$statement->bindParam(':Rifampicin', $Rifampicin, PDO::PARAM_INT);
$statement->bindParam(':Septran', $Septran, PDO::PARAM_INT);
$statement->bindParam(':Sulbactum_ampicillin', $Sulbactum_ampicillin, PDO::PARAM_INT);
$statement->bindParam(':Tetracycline', $Tetracycline, PDO::PARAM_INT);
$statement->bindParam(':Tobramycin', $Tobramycin, PDO::PARAM_INT);

$statement->bindParam(':Red_Blood_Cells_dup', $Red_Blood_Cells, PDO::PARAM_INT);
$statement->bindParam(':Pus_Cells_dup', $Pus_Cells, PDO::PARAM_INT);
$statement->bindParam(':Epithelial_Cells_dup', $Epithelial_Cells, PDO::PARAM_INT);
$statement->bindParam(':Yeast_Cells_dup', $Yeast_Cells, PDO::PARAM_INT);
$statement->bindParam(':Culture_Examination_dup', $Culture_Examination, PDO::PARAM_INT);
$statement->bindParam(':Amikacin_dup', $Amikacin, PDO::PARAM_INT);
$statement->bindParam(':Amoxycilin_dup', $Amoxycilin, PDO::PARAM_INT);
$statement->bindParam(':Ampicillin_dup', $Ampicillin, PDO::PARAM_INT);
$statement->bindParam(':Cefaclor_dup', $Cefaclor, PDO::PARAM_INT);
$statement->bindParam(':Cefotaxime_Sodium_dup', $Cefotaxime_Sodium, PDO::PARAM_INT);
$statement->bindParam(':Ceftazidime_dup', $Ceftazidime, PDO::PARAM_INT);
$statement->bindParam(':Ceftizoxime_dup', $Ceftizoxime, PDO::PARAM_INT);
$statement->bindParam(':Cefuroxime_dup', $Cefuroxime, PDO::PARAM_INT);
$statement->bindParam(':Chloromycetin_dup', $Chloromycetin, PDO::PARAM_INT);
$statement->bindParam(':Ciprofloxacin_dup', $Ciprofloxacin, PDO::PARAM_INT);
$statement->bindParam(':Clavulanic_Acid_amox_dup', $Clavulanic_Acid_amox, PDO::PARAM_INT);
$statement->bindParam(':Doxycycline_dup', $Doxycycline, PDO::PARAM_INT);
$statement->bindParam(':Furadantin_dup', $Furadantin, PDO::PARAM_INT);
$statement->bindParam(':Furazolidone_dup', $Furazolidone, PDO::PARAM_INT);
$statement->bindParam(':Gentamycin_dup', $Gentamycin, PDO::PARAM_INT);
$statement->bindParam(':Nalidixic_Acid_dup', $Nalidixic_Acid, PDO::PARAM_INT);
$statement->bindParam(':Netromycin_dup', $Netromycin, PDO::PARAM_INT);
$statement->bindParam(':Norflox_dup', $Norflox, PDO::PARAM_INT);
$statement->bindParam(':Ofloxacin_dup', $Ofloxacin, PDO::PARAM_INT);
$statement->bindParam(':Piperacillin_dup', $Piperacillin, PDO::PARAM_INT);
$statement->bindParam(':Rifampicin_dup', $Rifampicin, PDO::PARAM_INT);
$statement->bindParam(':Septran_dup', $Septran, PDO::PARAM_INT);
$statement->bindParam(':Sulbactum_ampicillin_dup', $Sulbactum_ampicillin, PDO::PARAM_INT);
$statement->bindParam(':Tetracycline_dup', $Tetracycline, PDO::PARAM_INT);
$statement->bindParam(':Tobramycin_dup', $Tobramycin, PDO::PARAM_INT);

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