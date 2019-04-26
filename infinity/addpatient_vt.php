<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_POST;
        $regID="";
        if(isset($form['regId'])){$regID=$form['regId'];}
        $UHID="";
        if(isset($form['UHID'])){$UHID=$form['UHID'];}
        $tl_patID="";
        if(isset($form['tl_patID'])){$tl_patID=$form['tl_patID'];}
        $tl_ipd_opd_ID="";
        if(isset($form['tl_ipd_opd_ID'])){$tl_ipd_opd_ID=$form['tl_ipd_opd_ID'];}
        $patID="";
        if(isset($form['patID'])){$patID=$form['patID'];}
        $is_ipd_patient="";
        if(isset($form['is_ipd_patient'])){$is_ipd_patient=$form['is_ipd_patient'];}
        $ctl00_AdminID="";
        if(isset($form['ctl00_AdminID'])){$ctl00_AdminID=$form['ctl00_AdminID'];}
        $tl_anually="";
        if(isset($form['tl_anually'])){$tl_anually=$form['tl_anually'];}
        $tl_monthly="";
        if(isset($form['tl_monthly'])){$tl_monthly=$form['tl_monthly'];}
        $tl_patient_name="";
        if(isset($form['tl_patient_name'])){$tl_patient_name=$form['tl_patient_name'];}
        $tl_address="";
        if(isset($form['tl_address'])){$tl_address=$form['tl_address'];}
        $tl_age_husband="";
        if(isset($form['tl_age_husband'])){$tl_age_husband=$form['tl_age_husband'];}
        $tl_age_wife="";
        if(isset($form['tl_age_wife'])){$tl_age_wife=$form['tl_age_wife'];}
        $tl_education_husband="";
        if(isset($form['tl_education_husband'])){$tl_education_husband=$form['tl_education_husband'];}
        $tl_education_wife="";
        if(isset($form['tl_education_wife'])){$tl_education_wife=$form['tl_education_wife'];}
        $tl_living_male="";
        if(isset($form['tl_living_male'])){$tl_living_male=$form['tl_living_male'];}
        $tl_living_female="";
        if(isset($form['tl_living_female'])){$tl_living_female=$form['tl_living_female'];}
        $tl_age_of_last_child_male="";
        if(isset($form['tl_age_of_last_child_male'])){$tl_age_of_last_child_male=$form['tl_age_of_last_child_male'];}
        $tl_age_of_last_child_female="";
        if(isset($form['tl_age_of_last_child_female'])){$tl_age_of_last_child_female=$form['tl_age_of_last_child_female'];}
        $tl_doctor="";
        if(isset($form['tl_doctor'])){$tl_doctor=$form['tl_doctor'];}
        $tl_methode="";
        if(isset($form['tl_methode'])){$tl_methode=$form['tl_methode'];}
        $tl_date="";
        if(isset($form['tl_date'])){$tl_date=$form['tl_date'];}
        $tl_monthly_income="";
        if(isset($form['tl_monthly_income'])){$tl_monthly_income=$form['tl_monthly_income'];}
        $vt_remark="";
        if(isset($form['vt_remark'])){$vt_remark=$form['vt_remark'];}
        if(isset($form['ot_id'])){$ot_id=$form['ot_id'];}

        //if(isset($form['assisting_nurse'])){$assisting_nurse=$form['assisting_nurse'];}

	$db = getDB();

	$statement=$db->prepare("INSERT INTO `add_vt_details`( `reg_id`, `ipd_opd_id`, `uhid`, `anually_no`, `monthly_no`, `patient_name`, `age_of_husband`, `age_of_wife`, `education_of_husband`, `education_of_wife`, `living_male`, `livinmg_female`, `age_of_Last_child_male`, `age_of_Last_child_female`,
		 `doctor`, `method`, `date_of_vt`, `monthly_income`, `remark`,
		  `WhenEntered`, `EnteredBy`,`ot_id`) VALUES (:regId, :tl_ipd_opd_ID, :UHID, :tl_anually, :tl_monthly, :tl_patient_name, :tl_age_husband, :tl_age_wife, :tl_education_husband, :tl_education_wife, :tl_living_male, :tl_living_female, :tl_age_of_last_child_male, :tl_age_of_last_child_female, :tl_doctor , :tl_methode ,:tl_date, :tl_monthly_income, :vt_remark, NOW(),:ctl00_AdminID,:ot_id)");

        $statement->bindParam(':regId',$regID);
        $statement->bindParam(':tl_ipd_opd_ID',$tl_ipd_opd_ID);
        $statement->bindParam(':UHID',$UHID);
        $statement->bindParam(':tl_anually',$tl_anually);
        $statement->bindParam(':tl_monthly',$tl_monthly);
        $statement->bindParam(':tl_patient_name',$tl_patient_name);
        $statement->bindParam(':tl_age_husband',$tl_age_husband);
        $statement->bindParam(':tl_age_wife',$tl_age_wife);
        $statement->bindParam(':tl_education_husband',$tl_education_husband);
        $statement->bindParam(':tl_education_wife',$tl_education_wife);
        $statement->bindParam(':tl_living_male',$tl_living_male);
        $statement->bindParam(':tl_living_female',$tl_living_female);
        $statement->bindParam(':tl_age_of_last_child_male',$tl_age_of_last_child_male);
        $statement->bindParam(':tl_age_of_last_child_female',$tl_age_of_last_child_female);
        $statement->bindParam(':tl_doctor',$tl_doctor);
        $statement->bindParam(':tl_methode',$tl_methode);
        $statement->bindParam(':tl_date',$tl_date);
        $statement->bindParam(':tl_monthly_income',$tl_monthly_income);
        $statement->bindParam(':vt_remark',$vt_remark);

        //$statement->bindParam(':is_ipd_patient',$is_ipd_patient);
        $statement->bindParam(':ctl00_AdminID',$ctl00_AdminID);
        $statement->bindParam(':ot_id',$ot_id);


        $statement->execute();

        $stat_row_count=$statement->rowCount();

        if($stat_row_count>0){
            $get_data=$db->prepare("SELECT * FROM `patientregistrationmaster` WHERE `RegistrationID`=:RegID;");
            $get_data->bindParam(':RegID', $regID, PDO::PARAM_STR);
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
