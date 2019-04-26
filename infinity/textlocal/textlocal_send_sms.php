<?php
	// Account details
	include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session.php';
	include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
	$userDetails=$userClass->userDetails($session_id);
	$FORM =$_GET;

	$apiKey = $textlocal_api;
	$apiKey = urlencode($apiKey);
	$type="";
	$message="";



	if(isset($FORM['type'])){
		$type = $FORM['type'];
	}
	if(isset($FORM['username'])){
		$username = $FORM['username'];
	}
	if(isset($FORM['number'])){
		$number = $FORM['number'];
	}
	 if($type=="bill"){
		$patient_id = $FORM['patient_id'];
		if(isset($FORM['amount'])){$bill_amount = $FORM['amount'];}else{$bill_amount="";}
	 if(isset($FORM['date_admit'])){$bill_discharge_date = $FORM['date_admit'];}else{$bill_discharge_date="";}
	}
	if($type=="billdischarged"){
		$patient_id = $FORM['patient_id'];
		if(isset($FORM['amount'])){$bill_amount = $FORM['amount'];}else{$bill_amount="";}
		if(isset($FORM['date_admit'])){$bill_discharge_date = $FORM['date_admit'];}else{$bill_discharge_date="";}
	}
	 if($type=="welcome_ipd"){
		$patient_id = $FORM['patient_id'];
		$date_admit = $FORM['date_admit'];
	}
	if($type=="welcome_opd"){
		$patient_id = $FORM['patient_id'];
		$date_admit = $FORM['date_admit'];
	}
	////////////////for geting value  for OT Aj/////////////////
  if($type == "welcome_ot"){
		$patient_id = $FORM['patient_id'];
		$date_surgery = $FORM['date_of_surgery'];
		$date_time =$FORM['time_of_surgery'];
	}
	/////////////////////////////////////////////////////
	if($type=="welcome_patho"){
		$patient_id = $FORM['patient_id'];
		$date_admit = $FORM['date_admit'];
		$test1 = $FORM['test1'];
		$test2 = $FORM['test2'];
		$test3 = $FORM['test3'];
		$test4 = $FORM['test4'];
		$test5 = $FORM['test5'];
		if($test1<>"" && $test1<>"undefined")$test = $test1;
		if($test2<>"" && $test2<>"undefined")$test = $test1.", ".$test2;
		if($test3<>"" && $test3<>"undefined")$test = $test1.", ".$test2.", ".$test3;
		if($test4<>"" && $test4<>"undefined")$test = $test1.", ".$test2.", ".$test3.", ".$test4;
		if($test5<>"" && $test5<>"undefined"){$test = $test1.", ".$test2.", ".$test3.", ".$test5.", ".$test5;}
		//echo $test."\n";
	}
	//type
	//welcome == for welcome
	//bill == for billing
	//

	if($type=="welcome"){
		$wel_sms_temp = str_replace("[username]", $username, $wel_sms_temp);
		$wel_sms_temp = str_replace("[hospital_name]", $hos_name, $wel_sms_temp);
		$message = $wel_sms_temp;
	}
	if($type=="bill" && $bill_amount<>""){
		$bill_sms_temp = str_replace("[username]", $username, $bill_sms_temp);
		$bill_sms_temp = str_replace("[hospital_name]", $hos_name, $bill_sms_temp);
		$bill_sms_temp = str_replace("[patient_id]", $patient_id, $bill_sms_temp);
		$bill_sms_temp = str_replace("[bill_amount]", $bill_amount, $bill_sms_temp);
		$bill_sms_temp = str_replace("[bill_discharge_date]", $bill_discharge_date, $bill_sms_temp);
		$message = "$bill_sms_temp";
	}
	if($type=="welcome_ipd"){
		$wel_ipd_sms_temp = str_replace("[username]", $username, $wel_ipd_sms_temp);
		$wel_ipd_sms_temp = str_replace("[hospital_name]", $hos_name, $wel_ipd_sms_temp);
		$wel_ipd_sms_temp = str_replace("[patient_id]", $patient_id, $wel_ipd_sms_temp);
		$wel_ipd_sms_temp = str_replace("[date_admit]",$date_admit,$wel_ipd_sms_temp);
		$message = "$wel_ipd_sms_temp";
  ///for OT Messg send Aj///////////////////////////////////////////////////////
 }elseif ($type=="welcome_ot"){
  $wel_ot_sms_temp = str_replace("[username]",$username,$wel_ot_sms_temp);
	$wel_ot_sms_temp = str_replace("[hospital_name]",$hos_name,$wel_ot_sms_temp);
	$wel_ot_sms_temp = str_replace("[patient_id]",$patient_id,$wel_ot_sms_temp);
	$wel_ot_sms_temp = str_replace("[date_surgery]",$date_surgery,$wel_ot_sms_temp);
	$wel_ot_sms_temp = str_replace("[date_surgery]",$date_surgery,$wel_ot_sms_temp);
////////////////////////////////////////////////////////////////////////////////
	}else if($type=="welcome_opd"){
		$wel_opd_sms_temp = str_replace("[username]", $username, $wel_opd_sms_temp);
		$wel_opd_sms_temp = str_replace("[hospital_name]", $hos_name, $wel_opd_sms_temp);
		$wel_opd_sms_temp = str_replace("[patient_id]", $patient_id, $wel_opd_sms_temp);
		$wel_opd_sms_temp = str_replace("[date_admit]",$date_admit,$wel_opd_sms_temp);

		$message = "$wel_opd_sms_temp";
	}else if($type=="welcome_patho"){
		$wel_patho_sms_temp = str_replace("[username]", $username, $wel_patho_sms_temp);
		$wel_patho_sms_temp = str_replace("[hospital_name]", $hos_name, $wel_patho_sms_temp);
		$wel_patho_sms_temp = str_replace("[patient_id]", $patient_id, $wel_patho_sms_temp);
		$wel_patho_sms_temp = str_replace("[date_admit]",$date_admit,$wel_patho_sms_temp);
		$wel_patho_sms_temp = str_replace("[test]",$test,$wel_patho_sms_temp);
		//echo $wel_patho_sms_temp."\n";
		$message = $wel_patho_sms_temp;
		//echo $message."\n";
	}else if($type=="billdischarged"){
		$bill_sms_temp = str_replace("[username]", $username, $bill_sms_temp);
		$bill_sms_temp = str_replace("[hospital_name]", $hos_name, $bill_sms_temp);
		$bill_sms_temp = str_replace("[patient_id]", $patient_id, $bill_sms_temp);
		$bill_sms_temp = str_replace("[bill_amount]", $bill_amount, $bill_sms_temp);
		$bill_sms_temp = str_replace("[bill_discharge_date]", $bill_discharge_date, $bill_sms_temp);
		$message = "$bill_sms_temp";
		//echo $wel_patho_sms_temp."\n";
		$message = $bill_sms_temp;
		//echo $message."\n";
	}
	//template for //Hi [username],%nFollowing is your patient id : [patient_id], with visit on [date_admit], for test%n[test] at [hospital_name].
	//Hi [username],Following is your patient id [patient_id], with visit on [date_admit], for test%n [test] at [hospital_name].
	// Message details
	$numbers = urlencode($number);
	$sender = urlencode('DARSTK');
	$message = rawurlencode($message);

	// Prepare data for POST request
	$data = 'apikey=' . $apiKey . '&numbers=' . $numbers . "&sender=" . $sender . "&message=" . $message;

	if( ($type=="welcome" || $type=="bill" || $type=="welcome_ipd" || $type=="welcome_opd" || $type=="welcome_patho" || $type == "billdischarged" ) && ($message !="")){
		// Send the GET request with cURL
		$ch = curl_init('https://api.textlocal.in/send/?' . $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                // Process your response here
                echo $response;
                $responseArray = json_decode($response, true);
                echo $responseArray;
                $cost = $responseArray['status'];
                echo $cost;
	}else{
		$response=("Message type not set");
	}
	// Process your response here
	//echo $message."\n";
	echo $response;
?>
