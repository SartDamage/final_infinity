<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
$ID = $_POST['ID'];
$statement=$db->prepare("SELECT a.*,prm.*,b.*,pd.*,o.surgery,s.surgery FROM `patientipd` a LEFT JOIN `patientregistrationmaster` AS prm ON a.RegID=prm.RegistrationID INNER JOIN patientdetails AS pd ON prm.RegistrationID=pd.RegID LEFT JOIN `bed_type` AS b ON a.bed_type=b.ID LEFT JOIN `patientot` AS o ON o.RegID=a.RegID LEFT JOIN `surgery_list` AS s ON s.ID=o.surgery WHERE a.patientID=:ID Order by prm.WhenEntered Desc");
$statement->bindParam(':ID', $ID, PDO::PARAM_INT);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;
?>
