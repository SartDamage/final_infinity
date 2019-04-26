<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$db = getDB();
$userDetails=$userClass->userDetails($session_id);
$form= $_POST;
if (isset($form['uid'])) {
  $roleID = $form['uid'];
  if($roleID != ""){
  $statement=$db->prepare("SELECT * FROM staff_ledger WHERE `roleid`=:roleID order by WhenEntered desc");
  $statement->bindParam(':roleID', $roleID, PDO::PARAM_INT);
  }else{
	  $statement=$db->prepare("SELECT * FROM staff_ledger WHERE `isactive`='1' order by WhenEntered desc");
  }
}else{$roleID="";
	$statement=$db->prepare("SELECT * FROM staff_ledger WHERE `isactive`='1' order by WhenEntered desc");
	}


$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;
?>