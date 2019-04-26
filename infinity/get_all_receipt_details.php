<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);

if($_POST['token']==1){

  $pat_id=$_POST['patient_id'];

$db = getDB();
$statement=$db->prepare("SELECT * FROM `receipt` a LEFT JOIN `patientregistrationmaster` AS prm ON a.registrationID=prm.RegistrationID INNER JOIN patientdetails AS pd ON prm.RegistrationID=pd.RegID WHERE a.patientID=:pat_id Order by prm.WhenEntered Desc");
$statement->bindParam(':pat_id', $pat_id, PDO::PARAM_INT);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
}
else if($_POST['token']==2){
  $db = getDB();
  $statement=$db->prepare("SELECT * FROM `receipt` a LEFT JOIN `patientregistrationmaster` AS prm ON a.registrationID=prm.RegistrationID INNER JOIN patientdetails AS pd ON prm.RegistrationID=pd.RegID Order by prm.WhenEntered Desc");
  $statement->execute();
  $results=$statement->fetchAll(PDO::FETCH_ASSOC);
  $json=json_encode($results);
  //return $json;
  echo $json;
  $db=null;
}
?>
