<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$RPB=$userDetails->ID;
if (isset($_GET['ID'])):
$PatID = $_GET['ID'];
$db = getDB();
$statement=$db->prepare("UPDATE `pathology_reciepts` SET `ReportPrintedBy`=:RPB,`report_printed`= `report_printed` + 1 WHERE `PatientId` = :PatID;
UPDATE `pathopatientregistrationmaster` SET `Printed`= `Printed` + 1 WHERE `Department` = :PatID1");
$statement->bindParam(':PatID', $PatID, PDO::PARAM_INT);
$statement->bindParam(':PatID1', $PatID, PDO::PARAM_INT);
$statement->bindParam(':RPB', $RPB, PDO::PARAM_INT);
$statement->execute();
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
if ($statement->rowCount() > 0){ 
	echo "hello";
}
//return $json;
endif;
//echo "endif";
$db=null;
?>