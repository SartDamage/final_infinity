<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;
	$patientID=$form['ctl00_ptID'];
	$AdminID=$form['ctl00_AdminID'];
	$symptom=$form['ctl00_ptsymptoms'];
	$diagnosis=$form['ctl00_diagnosis'];
	$prescription=$form['ctl00_ptprescription'];
	$Add_Procedure=$form['Add_Procedure'];
	$Investigation_Advice=$form['Investigation_Advice'];
$db = getDB();
$statement=$db->prepare("UPDATE `patientopd` SET `symptom`=:symptom,`prescription`=:prescription,`diagnosis`=:diagnosis,`Add_Procedure`=:Add_Procedure,`Investigation_Advice`=:Investigation_Advice,`WhenModified`=NOW(),`ModifiedBy`=:AdminID WHERE patientID=:patientID");
$statement->bindParam(':patientID', $patientID);
$statement->bindParam(':symptom', $symptom);
$statement->bindParam(':diagnosis', $diagnosis);
$statement->bindParam(':prescription',$prescription);
$statement->bindParam(':Add_Procedure',$Add_Procedure);
$statement->bindParam(':Investigation_Advice',$Investigation_Advice);

$statement->bindParam(':AdminID',$AdminID);
$statement->execute();
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
echo "success";
$db=null;

?>
