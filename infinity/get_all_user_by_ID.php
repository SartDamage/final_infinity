<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$db = getDB();
$userDetails=$userClass->userDetails($session_id);
$form= $_GET;
$Test=array();
if (isset($form['ID'])) {
  $roleID = $form['ID'];
  if(isset($form['set_ind'])){
	  $roleID = base64_decode($roleID);
  }
  if($roleID != ""){
  $statement=$db->prepare("SELECT sl.firstname,sl.lastname FROM staff_ledger as sl WHERE `ID`=:roleID ");
  $statement->bindParam(':roleID', $roleID, PDO::PARAM_INT);
  }
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row){
			//$item = array ("Test"=>$row1['PatientId']);
			echo $row['firstname']." ".$row['lastname'];
		}
}
$db=null;
?>