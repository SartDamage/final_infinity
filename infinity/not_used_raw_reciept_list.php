<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
/* if (isset($_POST['start']) && is_numeric($_POST['start'])  && is_int($_POST['start'] + 0)) {
  $start = (int) $_POST['start'];
}else{$start=1;} */
$db = getDB();

$stat=$db->prepare("SELECT pprp.WhenEntered,prm.FirstName,prm.LastName,prm.Mobile,prm.Gender,prm.Age,prm.RegistrationID FROM pathopatientregistrationparent AS pprp
							LEFT JOIN patientregistrationmaster as prm ON pprp.RegistrationID=prm.RegistrationID");
$stat->execute();
$parent = array() ;
$results=$stat->fetchAll(PDO::FETCH_ASSOC );
	$parent = array() ;
	foreach ($results as $row){
		$parent[]=array(
				"WhenEntered"=>$row['WhenEntered'],
				"Name"=>$row['FirstName']." ".$row['LastName'],
				"Mobile"=>$row['Mobile'],
				"Gender"=>$row['Gender'],
				"Age"=>$row['Age'],
				"RegistrationID"=>$row['RegistrationID'],
		);
		$statement=$db->prepare("SELECT 
							pprm.PatientId,
							pscm.PathologySubCategoryID,pscm.PathologySubCategoryName,pscm.PathologyTestCharges,
							pcm.PathologyCategoryID,pcm.PathologyCategoryName
							
							from  pathopatientregistrationmaster as pprm 
							 JOIN patientregistrationmaster as prm on pprm.RegistrationID=prm.RegistrationID
							 JOIN pathologysubcategorymaster as pscm on pprm.TestName=pscm.PathologySubCategoryID
							 JOIN pathologycategorymaster as pcm ON pcm.PathologyCategoryID=pprm.TestCategory Where pprm.Department=:PathoRegID");
		
	}
$json=json_encode($parent);
echo $json;								
								

$db=null;
?>