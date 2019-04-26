<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$RPB=$userDetails->ID;
if (isset($_GET['ID'])):
$PatID = $_GET['ID'];
$db = getDB();
try {
$statement=$db->prepare("UPDATE `pathology_reciepts` SET `ReportPrintedBy`=:RPB,`report_printed`= `report_printed` + 1 WHERE pathology_reciepts.PatientId = (SELECT `Department` FROM `pathopatientregistrationmaster` WHERE `PatientId`=:PatID);
UPDATE `pathopatientregistrationmaster` SET `Printed`= `Printed` + 1 WHERE `PatientId`=:PatID1");
$statement->bindParam(':PatID', $PatID, PDO::PARAM_STR);
$statement->bindParam(':PatID1', $PatID, PDO::PARAM_STR);
$statement->bindParam(':RPB', $RPB, PDO::PARAM_STR);
$statement->execute();
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
if ($statement->rowCount() > 0){ 
	echo "Report printed";
}else{echo "Report not printed";}
}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
//return $json;
endif;
//echo "endif";
$db=null;
?>