<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
/* if (isset($_POST['start']) && is_numeric($_POST['start'])  && is_int($_POST['start'] + 0)) {
  $start = (int) $_POST['start'];
}else{$start=1;} */
$db = getDB();

$stat=$db->prepare("select * from pharmacy_bill");
$stat->execute();

$results=$stat->fetchAll(PDO::FETCH_ASSOC );
	
$json=json_encode($results);
echo $json;								
								

$db=null;
?>