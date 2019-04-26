<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
$statement=$db->prepare("SELECT pprm.ID,pprm.PatientId,pprm.RegistrationID,pprm.TestCategory,pprm.TestName,pprm.Department,pprm.ConsultedBy,pprm.EnteredBy,pprm.IsActive,pprm.`WhenEntered`,pprm.payment,prm.FirstName,prm.LastName,prm.Mobile,pscm.PathologySubCategoryName,pcm.PathologyCategoryName,pscm.PathologySubCategoryID,pscm.PathologyCategoryID FROM `pathopatientregistrationmaster` AS pprm 
	LEFT JOIN patientregistrationmaster AS prm ON pprm.RegistrationID=prm.RegistrationID
    RIGHT JOIN pathologysubcategorymaster AS pscm ON pprm.TestName=pscm.PathologySubCategoryID
    RIGHT JOIN pathologycategorymaster AS pcm ON pprm.TestCategory=pcm.PathologyCategoryID
	WHERE pprm.IsActive=1  order by pprm.WhenEntered desc");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;
?> 