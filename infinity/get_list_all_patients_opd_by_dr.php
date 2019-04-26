<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$form = $_POST;
$db = getDB();
if (isset($form['dr_id'])){
	$dr_assigned=$form['dr_id'];
	$statement=$db->prepare("SELECT * FROM patientopd AS popd LEFT JOIN patientregistrationmaster AS prm ON prm.RegistrationID = popd.RegID where popd.doctor_assigned=:dr_assigned order by popd.WhenEntered DESC ");
/*$statement->bindParam(':start', $start, PDO::PARAM_INT);
$statement->bindParam(':rows',$limit_entries_per_page, PDO::PARAM_INT);*/
$statement->bindParam(':dr_assigned',$dr_assigned, PDO::PARAM_INT);
}else{
	
	$statement=$db->prepare("SELECT * FROM patientopd AS popd LEFT JOIN patientregistrationmaster AS prm ON prm.RegistrationID = popd.RegID where 1 order by popd.WhenEntered DESC ");
	/*$statement->bindParam(':start', $start, PDO::PARAM_INT);
	$statement->bindParam(':rows',$limit_entries_per_page, PDO::PARAM_INT);*/
}


$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;
?>