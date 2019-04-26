<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$ID=$_GET['ID'];
$ID=base64_decode($ID);
		try{
			$db = getDB();
			$stmt = $db->prepare("SELECT * FROM `pathopatientregistrationmaster` AS pprm 
	INNER JOIN patientdetails AS pd ON pprm.RegistrationID=pd.RegID 
    INNER JOIN patientregistrationmaster AS prm ON pprm.RegistrationID=prm.RegistrationID

    WHERE (pprm.RegistrationID=:ID or pprm.PatientId=:ID1)");//    INNER JOIN pathology_dr_assigned AS pdr ON pdr.pathodrID=pprm.ConsultedBy   ?what was i doing 
			$stmt->bindParam("ID", $ID,PDO::PARAM_STR) ;
			$stmt->bindParam("ID1", $ID,PDO::PARAM_STR) ;
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			$db = null;
			if($count){
				$json=json_encode($data);
			}else {
				$json="false";
			}
		}catch(PDOException $e) {echo $e;}
echo $json;
//return $json;
$db=null;
?>