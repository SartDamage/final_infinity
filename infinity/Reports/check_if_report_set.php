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
$statement=$db->prepare("SELECT `Report_generated` FROM `pathopatientregistrationmaster` WHERE `PatientId`=:PatID1 AND `Report_generated`='1'");
$statement->bindParam(':PatID1', $PatID, PDO::PARAM_STR);
$statement->execute();
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
if ($statement->rowCount() <> 0){ 
	echo "Report Set";
}else{echo "Report Not Set";}
}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
//return $json;
endif;
//echo "endif";
$db=null;
?>