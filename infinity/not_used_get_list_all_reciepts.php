<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
/* if (isset($_POST['start']) && is_numeric($_POST['start'])  && is_int($_POST['start'] + 0)) {
  $start = (int) $_POST['start'];
}else{$start=1;} */
$PathoRegID =  $_GET['PathoRegID'];
$db = getDB();
$statement=$db->prepare("SELECT 
							pprm.PatientId,
							pscm.PathologySubCategoryID,pscm.PathologySubCategoryName,pscm.PathologyTestCharges,
							pcm.PathologyCategoryID,pcm.PathologyCategoryName
							
							from  pathopatientregistrationmaster as pprm 
							 JOIN patientregistrationmaster as prm on pprm.RegistrationID=prm.RegistrationID
							 JOIN pathologysubcategorymaster as pscm on pprm.TestName=pscm.PathologySubCategoryID
							 JOIN pathologycategorymaster as pcm ON pcm.PathologyCategoryID=pprm.TestCategory Where pprm.Department=:PathoRegID");
/* $statement=$db->prepare("SELECT pprp.*,pprm.PatientId,pprm.TestCategory,pprm.TestName,
								prm.FirstName,prm.LastName,prm.Gender,prm.Age,prm.Mobile FROM pathopatientregistrationparent AS pprp 
							LEFT JOIN patientregistrationmaster as prm on pprp.RegistrationID=prm.RegistrationID AND DATE(pprp.`WhenEntered`) =DATE(prm.WhenEntered)
							Right JOIN pathopatientregistrationmaster as pprm on pprp.PathoRegID=pprm.Department*/
							$statement->bindParam(':PathoRegID', $PathoRegID, PDO::PARAM_STR );
$statement->execute();

$results=$statement->fetchAll(PDO::FETCH_ASSOC );
$count = $statement->rowCount();
$json=json_encode($results);
echo $json;

		

$db=null;
?>