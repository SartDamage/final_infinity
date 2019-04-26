<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$form = $_POST;
/* if (isset($form['start']) && is_numeric($form['start'])  && is_int($form['start'] + 0)) {
  $start = (int) $form['start'];
}else{$start=0;} */
$role_id = $userDetails->roleid;
if (isset($form['staff_id'])){
	$staff_id=$form['staff_id'];
	if ($role_id == "0" || $role_id ==  "3"){
			$query="SELECT * FROM patientipd AS popd LEFT JOIN patientregistrationmaster AS prm ON prm.RegistrationID = popd.RegID order by popd.WhenEntered DESC ";		
		}else {
			$query="SELECT * FROM patientipd AS popd LEFT JOIN patientregistrationmaster AS prm ON prm.RegistrationID = popd.RegID where popd.doctor_assigned=:staff_id order by popd.WhenEntered DESC ";
		}
}
$db = getDB();
$statement=$db->prepare($query);
/*$statement->bindParam(':start', $start, PDO::PARAM_INT);
$statement->bindParam(':rows',$limit_entries_per_page, PDO::PARAM_INT);*/
$statement->bindParam(':staff_id',$staff_id, PDO::PARAM_INT);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;
?>