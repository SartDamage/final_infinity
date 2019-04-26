<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$registration=$_GET['regid'];
	
	$db = getDB();
	
	$query=$db->prepare("SELECT pi.discharge_date_time FROM `patientipd` as pi WHERE pi.RegID=:registrationid");
	$query->bindParam(":registrationid", $registration);
	$query->execute();
	$query_results=$query->fetch();
	//echo $query_results;
	$discharge_date ="";
	if($query_results['discharge_date_time'] <> null){
		$date= substr($query_results['discharge_date_time'],0,10);
		$date = explode('-', $date);
		$discharge_date = $date[2]."-".$date[1]."-".$date[0];
	}else{
		echo "is null";
	}
	echo $discharge_date;
	
?>