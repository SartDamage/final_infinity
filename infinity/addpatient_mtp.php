<?php
/* @var $_SERVER type */
//$var = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT', FILTER_DEFAULT);
//$var = filter_var(isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : NULL, FILTER_DEFAULT);
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;
	$RegID=$form['regID'];
	if (isset($form['mtp_patID'])){$PatID=$form['mtp_patID'];}else{}
	if (isset($form['mtp_ipd_opd_ID'])){$IPD_OPD_ID=$form['mtp_ipd_opd_ID'];}else{}
	if (isset($form['mtp_uhid_ID'])){$UHID=$form['mtp_uhid_ID'];}else{}
	if (isset($form['mtp_name'])){$PatientName=$form['mtp_name'];}else{}
	if (isset($form['mtp_wife_daughter_of'])){$Wife_Daughter_of=$form['mtp_wife_daughter_of'];}else{}
	if (isset($form['mtp_age'])){$Age=$form['mtp_age'];}else{}
	if (isset($form['mtp_address'])){$Address=$form['mtp_address'];}else{}
	if (isset($form['mtp_contact_no'])){$ContactNo=$form['mtp_contact_no'];}else{}
	if (isset($form['mtp_religion'])){$Religion=$form['mtp_religion'];}else{}
	if (isset($form['mtp_dop'])){$Duration_of_pregnancy=$form['mtp_dop'];}else{}
	if (isset($form['mtp_reason'])){$Reason_of_mtp=$form['mtp_reason'];}else{}
	if (isset($form['mtp_date'])){$mtp_date=$form['mtp_date'];}else{}
	if (isset($form['mtp_date_discharge'])){
		$Date_of_discharge=$form['mtp_date_discharge'];
		if($Date_of_discharge!="")
		{
			$var_que="INSERT INTO `add_mtp_details` (`RegID`,`PatID`,`IPD_OPD_ID`,`UHID`,`PatientName`,`Wife_Daughter_of`,`Age`,`Address`,`ContactNo`,`Religion`,`Duration_of_pregnancy`,`Reason_of_mtp`,`Date_of_mtp`,`Date_of_discharge`,`Result_and_remark`,`Opinion_formed_by`,`Pregnancy_terminated_by`,`When_entered`,`Entered_by`,`ot_id`) VALUES (:RegID,:PatID,:IPD_OPD_ID,:UHID,:PatientName,:Wife_Daughter_of,:Age,:Address,:ContactNo,:Religion,:Duration_of_pregnancy,:Reason_of_mtp,:mtp_date,:Date_of_discharge,:Result_and_remark,:Opinion_formed_by,:Pregnancy_terminated_by, NOW(),:AdminID,:ot_id)";
		}
		else{
				$var_que="INSERT INTO `add_mtp_details` (`RegID`,`PatID`,`IPD_OPD_ID`,`UHID`,`PatientName`,`Wife_Daughter_of`,`Age`,`Address`,`ContactNo`,`Religion`,`Duration_of_pregnancy`,`Reason_of_mtp`,`Date_of_mtp`,`Result_and_remark`,`Opinion_formed_by`,`Pregnancy_terminated_by`,`When_entered`,`Entered_by`,`ot_id`) VALUES (:RegID,:PatID,:IPD_OPD_ID,:UHID,:PatientName,:Wife_Daughter_of,:Age,:Address,:ContactNo,:Religion,:Duration_of_pregnancy,:Reason_of_mtp,:mtp_date,:Result_and_remark,:Opinion_formed_by,:Pregnancy_terminated_by, NOW(),:AdminID,:ot_id)";
			}
	}else{
		$Date_of_discharge="";
	}
	if (isset($form['mtp_result'])){$Result_and_remark=$form['mtp_result'];}else{}
	if (isset($form['mtp_opini_on_by_input'])){$Opinion_formed_by=$form['mtp_opini_on_by_input'];}else{}
	if (isset($form['mtp_terminated_by_input'])){$Pregnancy_terminated_by=$form['mtp_terminated_by_input'];}else{}
	if (isset($form['ot_id'])){$ot_id=$form['ot_id'];}else{}

	//echo "$Wife_Daughter_of";

	$AdminID=$form['ctl00_AdminID'];


	$db = getDB();

	$statement=$db->prepare($var_que);

	$statement->bindParam(':RegID', $RegID);
	$statement->bindParam(':PatID', $PatID);
	$statement->bindParam(':IPD_OPD_ID',$IPD_OPD_ID);
	$statement->bindParam(':UHID', $UHID);
	$statement->bindParam(':PatientName', $PatientName);
	$statement->bindParam(':Wife_Daughter_of', $Wife_Daughter_of);
	//$statement->bindParam(':visit_date', $RegID, PDO::PARAM_STR);
	$statement->bindParam(':Age', $Age);
	$statement->bindParam(':Address', $Address);
	$statement->bindParam(':ContactNo', $ContactNo);
	$statement->bindParam(':Religion', $Religion);
	$statement->bindParam(':Duration_of_pregnancy', $Duration_of_pregnancy);
	$statement->bindParam(':Reason_of_mtp', $Reason_of_mtp);
	$statement->bindParam(':mtp_date', $mtp_date);
	if($Date_of_discharge!=""){
		$statement->bindParam(':Date_of_discharge', $Date_of_discharge);
	}
	$statement->bindParam(':Result_and_remark', $Result_and_remark);
	$statement->bindParam(':Opinion_formed_by', $Opinion_formed_by);
	$statement->bindParam(':Pregnancy_terminated_by', $Pregnancy_terminated_by);
	$statement->bindParam(':AdminID',$AdminID);
	$statement->bindParam(':ot_id',$ot_id);
	$statement->execute();

if (($statement->rowCount()>0))
   {

		//echo "succesful";
            $get_data=$db->prepare("SELECT * FROM `patientregistrationmaster` WHERE `RegistrationID`=:RegID;");
            $get_data->bindParam(':RegID', $RegID, PDO::PARAM_STR);
            $get_data->execute();
            $results=$get_data->fetchAll();
            if($get_data->rowCount() > 0){
                    echo json_encode($results);
            }else{
                    echo "unsuccesful";
            }
}else{
	echo false;
	$error = $statement->errorInfo();
	echo "unsuccesful";
}


//$results=$statement->fetch(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
//return true;
$db=null;
?>
