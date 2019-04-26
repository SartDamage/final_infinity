<?php
/* @var $_SERVER type */
/*$var = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT', FILTER_DEFAULT);
//$var = filter_var(isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : NULL, FILTER_DEFAULT);
include $var.'/include/conection.php';
include $var.'/session.php';
include $var.'/include/global_variable.php';*/

include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);

/*
 * Darstek Trading and solution
 */
$form = $_POST;
$regId="";
if(isset($form['regId'])){$regId=$form['regId'];}
$delivery_patID="";
if(isset($form['delivery_patID'])){$delivery_patID=$form['delivery_patID'];}
$ctl00_AdminID="";
if(isset($form['ctl00_AdminID'])){$ctl00_AdminID=$form['ctl00_AdminID'];}
$ipd_opd_id="";
if(isset($form['ipd_opd_id'])){$ipd_opd_id=$form['ipd_opd_id'];}
$UHID="";
if(isset($form['UHID'])){$UHID=$form['UHID'];}
$ctl00_AdminID="";
if(isset($form['ctl00_AdminID'])){$ctl00_AdminID=$form['ctl00_AdminID'];}
$patient_name="";
if(isset($form['patient_name'])){$patient_name=$form['patient_name'];}
$delivery_gravida="";
if(isset($form['delivery_gravida'])){$delivery_gravida=$form['delivery_gravida'];}
$delivery_age="";
if(isset($form['delivery_age'])){$delivery_age=$form['delivery_age'];}
$gender="";
if(isset($form['gender'])){$gender=$form['gender'];}
$address="";
if(isset($form['address'])){$address=$form['address'];}
$contact_staff="";
if(isset($form['contact_staff'])){$contact_staff=$form['contact_staff'];}
$method_delivery="";
if(isset($form['method_delivery'])){$method_delivery=$form['method_delivery'];}
$delivery_weight="";
if(isset($form['delivery_weight'])){$delivery_weight=$form['delivery_weight'];}
$Born_child="";
if(isset($form['Born_child'])){$Born_child=$form['Born_child'];}
$wks="";
if(isset($form['wks'])){$wks=$form['wks'];}
$delivery_date="";
if(isset($form['delivery_date'])){$delivery_date=$form['delivery_date'];}
$delivery_time="";
if(isset($form['delivery_time'])){$delivery_time=$form['delivery_time'];}
$dr_name="";
if(isset($form['dr_name'])){$dr_name=$form['dr_name'];}
if(isset($form['ot_id'])){$ot_id=$form['ot_id'];}






$db = getDB();

	$statement=$db->prepare("INSERT INTO `add_delivery_details`(`reg_id`, `pat_id`, `ipd_opd_id`, `uhid`, `patient_name`, `gravida`, `age_of_wife`, `address`, `contact`, `child_gender`, `method`, `weight`, `no_child_born`, `wks`, `date_of_dl`, `time_of_dl`, `doctor`, `WhenEntered`, `EnteredBy`,`ot_id`) VALUES ( :regId, :delivery_patID, :ipd_opd_id, :UHID, :patient_name, :delivery_gravida, :delivery_age, :address, :contact_staff, :gender, :method_delivery, :delivery_weight, :Born_child, :wks, :delivery_date, :delivery_time, :dr_name, NOW(), :ctl00_AdminID,:ot_id) ON DUPLICATE KEY UPDATE `child_gender`=:gender_dup, `method`=:method_delivery_dup, `weight`=:delivery_weight_dup,`no_child_born`=:Born_child_dup,`wks`=:wks_dup, `date_of_dl`=:delivery_date_dup ,`time_of_dl`=:delivery_time_dup,`doctor`=:dr_name_dup,`ot_id`=:ot_id1;");

	$statement->bindParam(':regId',$regId);
        $statement->bindParam(':ipd_opd_id',$ipd_opd_id);
        $statement->bindParam(':UHID',$UHID);
        $statement->bindParam(':patient_name',$patient_name);
        $statement->bindParam(':delivery_patID',$delivery_patID);


        $statement->bindParam(':delivery_gravida',$delivery_gravida);
        $statement->bindParam(':delivery_age',$delivery_age);
        $statement->bindParam(':address',$address);
        $statement->bindParam(':contact_staff',$contact_staff);
        $statement->bindParam(':gender',$gender);
        $statement->bindParam(':gender_dup',$gender);
        $statement->bindParam(':method_delivery',$method_delivery);
        $statement->bindParam(':method_delivery_dup',$method_delivery);
        $statement->bindParam(':delivery_weight',$delivery_weight);
        $statement->bindParam(':delivery_weight_dup',$delivery_weight);
        $statement->bindParam(':Born_child',$Born_child);
        $statement->bindParam(':Born_child_dup',$Born_child);
        $statement->bindParam(':wks',$wks);
        $statement->bindParam(':wks_dup',$wks);
        $statement->bindParam(':delivery_date',$delivery_date);
        $statement->bindParam(':delivery_date_dup',$delivery_date);
        $statement->bindParam(':delivery_time',$delivery_time);
        $statement->bindParam(':delivery_time_dup',$delivery_time);
        $statement->bindParam(':dr_name',$dr_name);
        $statement->bindParam(':dr_name_dup',$dr_name);
        $statement->bindParam(':ot_id',$ot_id);
        $statement->bindParam(':ot_id1',$ot_id);

        $statement->bindParam(':ctl00_AdminID',$ctl00_AdminID);

	$statement->execute();

if (($statement->rowCount()>0))
   {

		//echo "succesful";
            $get_data=$db->prepare("SELECT * FROM `patientregistrationmaster` WHERE `RegistrationID`=:RegID;");
            $get_data->bindParam(':RegID', $regId, PDO::PARAM_STR);
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
	echo "unsuccesful 1";
}


//$results=$statement->fetch(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
//return true;
$db=null;
?>
