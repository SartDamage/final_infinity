<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$PatID="IPD00000039";
	$db = getDB();
	$bed_type_name="";
	$recieptID="";
	$bed_charge_fetched="";
	$getbeddetails=$db->prepare("select ib.recieptID,bt.bed_charges, bt.bed_type FROM ipd_bill ib  
					JOIN patientipd as pid on ib.instance_id = pid.patientID 
					JOIN bed_type as bt on bt.ID=pid.bed_type 
						WHERE ib.`instance_id`=:patid limit 1");
					$getbeddetails->bindParam(':patid', $PatID, PDO::PARAM_INT);
					$getbeddetails->execute();
					$c=$getbeddetails->rowCount();
					if($c<> "" || $c<> null){
					$res=$getbeddetails->fetchAll(PDO::FETCH_ASSOC);
						foreach ($res as $row1){
							//global $bed_charge_fetched,$bed_type_name;
							$recieptID = $row1['recieptID'];
							$bed_charge_fetched = $row1['bed_charges'];
							$bed_type_name = $row1['bed_type'];
							//echo $bed_type_name;
						}
						//echo $bed_type_name;
					}
	//echo $bed_type_name;
	//echo json_encode($getbeddetails);
	//return $bed_type_name;
	$getbeddetails=null;
	if(true){
		if($bed_type_name){
			echo "\n";
			echo "$bed_type_name \n$bed_charge_fetched \n$recieptID ";
		}
	}
$db=null;
?>