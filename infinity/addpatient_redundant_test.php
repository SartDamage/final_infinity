<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);


	$form = $_POST;
	$fname=$form['first_name'];
	$lname=$form['last_name'];
	/*$patient_type=$form['patient_type'];*/
	$email=$form['email'];
	$contact=$form['contact'];
	$gender=$form['sex'];
	$marital_status=$form['marital_status'];
	$age=$form['age'];
	$alt_contact=$form['alt_contact'];
	$height=$form['height'];
	$weight=$form['weight'];
	$address=$form['address'];
	$bloodgroup=$form['blood_group'];
	$ICE_name=$form['ICE_name'];
	$ICE_relation=$form['ICE_relation'];
	$ICE_contact=$form['ICE_contact'];
	$RegID=$form['RegID'];
	$ICE_address=$form['ICE_address'];
	$GI_type=$form['GI_type'];
	$GI_type= base64_encode($GI_type);
	$GI_number=$form['GI_number'];
	$GI_number=base64_encode($GI_number);
	$med_history=$form['med_history'];
	$history=$form['med_history_detail'];
	$AdminID=$form['AdminID'];
	
	$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
	$contact = preg_replace("/[^0-9]/", '', $contact);
	$alt_contact = preg_replace("/[^0-9]/", '', $alt_contact);
	$ICE_contact = preg_replace("/[^0-9]/", '', $ICE_contact);
	
	if($gender==null || $gender == "" || $fname==null || $fname == "" || $contact==null||$contact=="" || $address==null||$address=="" ||  $ICE_contact==null || $ICE_contact==""){
			/*header("Location: ./addpatientform.php"); /* Redirect browser */
	}else{
			 $reg_patient=$userClass->updatePatient($RegID,$fname,$lname,$email,$alt_contact,$gender,$marital_status,$age,$contact,$height,$weight,$address,$bloodgroup,$ICE_name,$ICE_relation,$ICE_contact,$ICE_address,$med_history,$history,$AdminID,$GI_type,$GI_number);
			 if($reg_patient){
			/* echo $reg_patient;*/
			/* header("Location: ./addpatientform.php"); // Redirect browser */
			echo "Patient updated successfully";
			exit();
			}else{echo "Patient not Updated, some error occured";}
			/*header("Location: ./addpatientform.php");*/
		}
/* 
$db = getDB();
$statement=$db->prepare("SELECT * FROM patientregistrationmaster");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//echo $json; */
$db=null;
?>