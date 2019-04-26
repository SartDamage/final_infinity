<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$db = getDB();
	$form = $_GET;
	$bed_number_id= $form['bed_number_id'];
	$patID = $form['patID'];
	$ID="";
	if(isset($form['ID'])){
		$ID=$form['ID'];
	}
	$AdminID = $userDetails->ID;
	$statement=$db->prepare("UPDATE `patientipd` SET `discharge_date_time`=NOW(),`WhenModified`=NOW(),`ModifiedBy`=:AdminID WHERE `patientID`= :patID ");
	$statement->bindParam(':patID', $patID, PDO::PARAM_STR);
	$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
	$statement->execute();
	if($statement->rowCount() > 0){
		$state=$db->prepare("UPDATE `bed_number` SET `bed_status`='0' WHERE `ID`=:bed_no ");
		$state->bindParam(':bed_no', $bed_number_id, PDO::PARAM_STR);
		$state->execute();
		if($state->rowCount() > 0){
			//echo "Discharged Successfully";
					$get_data=$db->prepare("SELECT * FROM `patientregistrationmaster` WHERE `RegistrationID`=:RegID;");
					$get_data->bindParam(':RegID', $ID, PDO::PARAM_STR);
					$get_data->execute();
					$results=$get_data->fetchAll();
					if($get_data->rowCount() > 0){
						echo json_encode($results);
					}else{
						echo "Some error occured, \n please try again. or is already discharged";
					}
			
		}else{
			echo "Some error occured, \n please try again. or is already discharged";
			$error = $state->errorInfo();
		}
	}else{
		echo "Some error occured, \n please try again. or is already discharged";
		$error = $state->errorInfo();
	}
?>