<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
if (isset($_GET['ID'])){
$ID=$_GET['ID'];
}else{$ID="";echo "No input ID";}
		try{
			$db = getDB();
			$stmt = $db->prepare("SELECT
			popd.doctor_assigned,popd.patientID,popd.RegID,popd.visit_date,popd.symptom,popd.prescription,popd.diagnosis,popd.Add_Procedure,popd.Investigation_Advice,
			prm.FirstName,prm.LastName,prm.Age,prm.Gender,prm.Mobile
			FROM `patientopd` AS popd
	INNER JOIN patientdetails AS pd ON popd.RegID=pd.RegID
    INNER JOIN patientregistrationmaster AS prm ON pd.RegID=prm.RegistrationID
    WHERE popd.patientID=:ID");
			$stmt->bindParam("ID", $ID,PDO::PARAM_STR) ;
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			$db = null;
			if($count){
				$json=json_encode($data);
			}else {
				$json=false;
			}
			echo $json;
		}catch(PDOException $e) {echo $e;}

//return $json;
$db=null;
?>
