<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
/* if (isset($_POST['start']) && is_numeric($_POST['start'])  && is_int($_POST['start'] + 0)) {
  $start = (int) $_POST['start'];
}else{$start=1;} */
$db = getDB();

$stat=$db->prepare("SELECT 		
						pprp.ID,pprp.PathoRegID,pprp.WhenEntered,pprp.Payment,
						prm.FirstName,prm.LastName,prm.Mobile,prm.Gender,prm.Age,prm.RegistrationID 
					FROM pathopatientregistrationparent AS pprp
							LEFT JOIN patientregistrationmaster as prm ON pprp.RegistrationID=prm.RegistrationID");
$stat->execute();
$parent = array() ;
$results=$stat->fetchAll(PDO::FETCH_ASSOC );
	$parent = array() ;

	foreach ($results as $row){
		$Test=array();
		$statement=$db->prepare("SELECT 
							pprm.PatientId,pprm.Report_generated,pprm.Printed,
							pscm.PathologySubCategoryID,pscm.PathologySubCategoryName,pscm.PathologyTestCharges,
							pcm.PathologyCategoryID,pcm.PathologyCategoryName
							
							from  pathopatientregistrationmaster as pprm 
							 JOIN patientregistrationmaster as prm on pprm.RegistrationID=prm.RegistrationID
							 JOIN pathologysubcategorymaster as pscm on pprm.TestName=pscm.PathologySubCategoryID
							 JOIN pathologycategorymaster as pcm ON pcm.PathologyCategoryID=pprm.TestCategory Where pprm.Department=:PathoRegID 
							 ORDER BY pprm.WhenEntered ASC");
		$statement->bindParam(':PathoRegID', $row['PathoRegID'], PDO::PARAM_STR );
		$statement->execute();
		$result=$statement->fetchAll(PDO::FETCH_ASSOC );
		foreach ($result as $row1){
			//$item = array ("Test"=>$row1['PatientId']);
			$Test[]=array(	'PatientId'=>$row1['PatientId'],
							'PathologySubCategoryID'=>$row1['PathologySubCategoryID'],
							'PathologySubCategoryName'=>$row1['PathologySubCategoryName'],
							'PathologyTestCharges'=>$row1['PathologyTestCharges'],
							'PathologyCategoryID'=>$row1['PathologyCategoryID'],
							'PathologyCategoryName'=>$row1['PathologyCategoryName'],
							'Report_generated'=>$row1['Report_generated'],
							'Printed'=>$row1['Printed'],
							);
		}
		
		
		$parent[]=array(
				"ID"=>$row['ID'],
				"WhenEntered"=>$row['WhenEntered'],
				"Name"=>$row['FirstName']." ".$row['LastName'],
				"Mobile"=>$row['Mobile'],
				"Gender"=>$row['Gender'],
				"Age"=>$row['Age'],
				"RegistrationID"=>$row['RegistrationID'],
				"PathoRegID"=>$row['PathoRegID'],
				"Payment"=>$row['Payment'],
				"Test"=>$Test);
				
		
		
	}
$json=json_encode($parent);
echo $json;								
								

$db=null;
?>