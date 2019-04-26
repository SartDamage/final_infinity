<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);

if (isset($_GET['ID'])) {
  $regID = $_GET['ID'];
}else{$regID = $_GET['ID'];}
$db = getDB();
$statement=$db->prepare("SELECT t1.whenentered, t1.admit_date_time, t1.discharge_date_time,t1.symptoms,t1.patientID, t1.charges FROM patientipd AS t1 WHERE t1.RegID=:regIDt1 
    UNION ALL SELECT t2.whenentered, t2.visit_date, t2.doctor_assigned,t2.symptom, t2.patientID, t2.charges FROM patientopd AS t2 Where t2.RegID=:regIDt2 
    UNION ALL SELECT t3.WhenEntered,t3.LastModified,t3.ConsultedBy,pscm.PathologySubCategoryName,t3.PatientId,pscm.PathologyTestCharges 
	FROM pathopatientregistrationmaster as t3 
		LEFT JOIN pathologysubcategorymaster AS pscm ON t3.TestName=pscm.PathologySubCategoryID 
			WHERE t3.RegistrationID=:regIDt3 AND t3.IsActive='1' ORDER by whenentered DESC");
$statement->bindParam(':regIDt1', $regID, PDO::PARAM_STR);
$statement->bindParam(':regIDt2', $regID, PDO::PARAM_STR);
$statement->bindParam(':regIDt3', $regID, PDO::PARAM_STR);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
//echo $regID;
$db=null;
?>