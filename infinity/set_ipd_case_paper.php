<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;
	$patientID =$form['ctl00_ptID'];
	$AdminID =$form['ctl00_AdminID'];
	$symptom =$form['ctl00_ptsymptoms'];
	$diagnosis =$form['ctl00_diagnosis'];
	$prescription =$form['ctl00_ptprescription'];
	$past_history =$form['past_history'];
	$immunization =$form['immunization'];
	if(isset($form['smok'])){$smok=$form['smok'];}else{$smok="";}
	if(isset($form['alco'])){$alco=$form['alco'];}else{$alco="";}
	if(isset($form['chew'])){$chew=$form['chew'];}else{$chew="";}
	if(isset($form['veg'])){$veg=$form['veg'];}else{$veg="";}
	if(isset($form['non_veg'])){$non_veg=$form['non_veg'];}else{$non_veg="";}
	$allergy=$form['allergy'];
	$discharge_note=$form['ctl00_ptpdischarge'];
$db = getDB();
$statement=$db->prepare("UPDATE `patientipd` SET `symptoms`=:symptom,`precription`=:prescription,`diagnosis`=:diagnosis,`past_history`=:past_history,`immunization`=:immunization,`smok`=:smok,`alco`=:alco,`chew`=:chew,`veg`=:veg,`non_veg`=:non_veg,`allergy`=:allergy,`discharge_note`=:discharge_note,`WhenModified`=NOW(),`ModifiedBy`=:AdminID WHERE `patientID`=:patientID");
$statement->bindParam(':patientID', $patientID, PDO::PARAM_INT);
$statement->bindParam(':symptom', $symptom, PDO::PARAM_INT);
$statement->bindParam(':diagnosis', $diagnosis, PDO::PARAM_INT);
$statement->bindParam(':prescription',$prescription, PDO::PARAM_INT);
$statement->bindParam(':past_history',$past_history, PDO::PARAM_INT);
$statement->bindParam(':immunization',$immunization, PDO::PARAM_INT);
$statement->bindParam(':smok',$smok, PDO::PARAM_INT);
$statement->bindParam(':alco',$alco, PDO::PARAM_INT);
$statement->bindParam(':chew',$chew, PDO::PARAM_INT);
$statement->bindParam(':veg',$veg, PDO::PARAM_INT);
$statement->bindParam(':non_veg',$non_veg, PDO::PARAM_INT);
$statement->bindParam(':allergy',$allergy, PDO::PARAM_INT);
$statement->bindParam(':discharge_note',$discharge_note, PDO::PARAM_INT);
$statement->bindParam(':AdminID',$AdminID, PDO::PARAM_INT);
//$statement->execute();
if ($statement->execute())
{
  echo "Success";
}
else
{
	echo "Couldn't Enter";
  // failure
}
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
$db=null;
?>