<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;
        $regID="";
        $patID="";
        $is_ipd_patient="";
        $ctl00_AdminID="";
        $patient_id="";
        $UHID="";
        $first_name="";
        $age_input="";
        $address="";
        $tel_input_staff="";
        $operating_surgeon="";
        $surgery_name="";
        $anaesthetist="";
        $assisting_doctor="";
        $assisting_doctor_local="";
        $assisting_nurse="";
        $assisting_nurse_local="";
        $remark="";
				$surgery_final_name="";
				$ot_date="";
				$ot_time="";

        if(isset($form['regID'])){$regID=$form['regID'];}
        if(isset($form['patID'])){$patID=$form['patID'];}
        if(isset($form['is_ipd_patient'])){$is_ipd_patient=$form['is_ipd_patient'];}
        if(isset($form['ctl00_AdminID'])){$ctl00_AdminID=$form['ctl00_AdminID'];}
        if(isset($form['patient_id'])){$patient_id=$form['patient_id'];}
        if(isset($form['UHID'])){$UHID=$form['UHID'];}
        if(isset($form['first_name'])){$first_name=$form['first_name'];}
        if(isset($form['age_input'])){$age_input=$form['age_input'];}
        if(isset($form['address'])){$address=$form['address'];}
        if(isset($form['tel-input-staff'])){$tel_input_staff=$form['tel-input-staff'];}
        if(isset($form['operating_surgeon'])){$operating_surgeon=$form['operating_surgeon'];}
				if(isset($form['ot_date'])){$ot_date=$form['ot_date'];}
				if(isset($form['ot_time'])){$ot_time=$form['ot_time'];}

				/////for geting all surgery list AJ///////////////
				 if(isset($form['surgery_name'])){
					   $surgery_name=$form['surgery_name'];
						 $array_size = sizeof( $surgery_name);
						 	$size=1;
					 foreach($surgery_name as $row) {
						 if($size ==  $array_size ){
							 $surgery_final_name.=$row ;
						 }else {
						 	 $surgery_final_name.=$row.",";
						 }

							$size++;
					 }
				}

				/////////////////////////////////////////////
        if(isset($form['anaesthetist'])){$anaesthetist=$form['anaesthetist'];}
        if(isset($form['remark'])){$remark=$form['remark'];}

        if(isset($form['assisting_doctor'])){

            $assisting_doctor=$form['assisting_doctor'];

            /*foreach ($assisting_doctor as $assisting_doctor_ind) {
                //$assisting_doctor_local=$form['assisting_doctor'];
                $assisting_doctor_local=$assisting_doctor_local+","+$assisting_doctor_ind;
            }*/
        }
        if(isset($form['assisting_nurse'])){

            $assisting_nurse=$form['assisting_nurse'];
            /*foreach ($assisting_nurse as $assisting_nurse_ind) {
                //$assisting_doctor_local=$form['assisting_doctor'];
                $assisting_nurse_local=$assisting_nurse_local+","+$assisting_nurse_ind;
            }*/
        }
        //if(isset($form['assisting_nurse'])){$assisting_nurse=$form['assisting_nurse'];}

	$db = getDB();

	$statement=$db->prepare("INSERT INTO `patientot` (`UHID`, `ot_id`, `patientID`, `RegID`, `surgery`, `admit_date_time`, `operating_surgeon`, `anaesthetist`, `WhenEntered`, `EnteredBy`, `assisting_doctor`, `assisting_nurse`, `remark`,`date_surgery`,`time_surgery`) VALUES (:UHID, :ot_id, :patient_id, :regID, :surgery_name, NOW(), :operating_surgeon, :anaesthetist, NOW(), :ctl00_AdminID, :assisting_doctor, :assisting_nurse,:remark,:date_surgery,:time_surgery)");
        $statement->bindParam(':UHID',$UHID);
        $statement->bindParam(':ot_id',$patID);
        $statement->bindParam(':patient_id',$patient_id);
        $statement->bindParam(':regID',$regID);
        $statement->bindParam(':surgery_name',$surgery_final_name);

        $statement->bindParam(':operating_surgeon',$operating_surgeon);
        $statement->bindParam(':anaesthetist',$anaesthetist);

        $statement->bindParam(':ctl00_AdminID',$ctl00_AdminID);
        $statement->bindParam(':assisting_doctor',$assisting_doctor);
        $statement->bindParam(':assisting_nurse',$assisting_nurse);
        $statement->bindParam(':remark',$remark);
				$statement->bindParam(':date_surgery',$ot_date);
				$statement->bindParam(':time_surgery',$ot_time);
        $statement->execute();

        $stat_row_count=$statement->rowCount();
        if($stat_row_count>0){
            $get_data=$db->prepare("SELECT pati.*,ot.date_surgery,ot.time_surgery FROM patientregistrationmaster AS pati LEFT JOIN patientot AS ot ON pati.RegistrationID = ot.RegID  WHERE `ot_id`=:ot_id");
            $get_data->bindParam(':ot_id',$patID, PDO::PARAM_STR);
            $get_data->execute();
            $results=$get_data->fetchAll();
            if($get_data->rowCount() > 0){
                    echo json_encode($results);
            }else{
                    echo "unsuccesful";
            }

        }else{
            $error = $statement->errorInfo();
            echo $error;
        }
$db=null;
?>