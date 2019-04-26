<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
/* if (isset($_POST['start']) && is_numeric($_POST['start'])  && is_int($_POST['start'] + 0)) {
  $start = (int) $_POST['start'];
}else{$start=0;} */
$form = $_POST;

if(isset($form['from_date'])){
  $from_date = $form['from_date'];
}else{
  $from_date = date('Y-m-d',strtotime("-1 year"));
}
if(isset($form['to_date'])){
  if($form['to_date']==""){
    $to_date = date("Y-m-d");
  }else{
      $to_date = $form['to_date'];
  }
}else{
  $to_date = date("Y-m-d");
}   

$dateTime = new DateTime($from_date);
$dateTime = $dateTime->format('Y-m-d');
$dateTime1 = new DateTime($to_date);
$dateTime1 = $dateTime1->format('Y-m-d');

$db = getDB();
$statement=$db->prepare("SELECT bn.ID,pipd.`patientID`,pipd.`UHID`,pipd.`isUHID`,pipd.`RegID`,pipd.`admit_date_time`,pipd.`discharge_date_time`,pipd.`tests_Assigned`,pipd.`doctor_assigned`,pipd.`amount_deposit`,pipd.`charges`,pipd.`symptoms`,pipd.`precription`,pipd.`diagnosis`,pipd.`isMLC`,pipd.`MLC_type`,pipd.`MLC_place`,pipd.`MLC_station`,pipd.`bedno`,pipd.`wardno`,pipd.`bed_type`,pipd.`ReferredBy`,pipd.`detailcharges`,pipd.`WhenEntered`,pipd.`EnteredBy`,pipd.`WhenModified`,pipd.`ModifiedBy`,prm.`RegistrationID`,prm.`FirstName`,prm.`LastName`,prm.`Age`,prm.`Gender`,prm.`Mobile`,prm.`avatar`,prm.`Email`,prm.`Address`,prm.`IsActive` FROM patientipd AS pipd LEFT JOIN patientregistrationmaster AS prm ON prm.RegistrationID = pipd.RegID JOIN bed_number as bn on pipd.bedno=bn.ID where Date(pipd.admit_date_time) >=:from_date AND Date(pipd.admit_date_time) <=:to_date AND NULLIF(`discharge_date_time`, ' ') IS NOT NULL  order by pipd.whenentered DESC");
/* $statement->bindParam(':start', $start, PDO::PARAM_INT);
$statement->bindParam(':rows',$limit_entries_per_page, PDO::PARAM_INT); */
$statement->bindParam(':from_date', $dateTime);
$statement->bindParam(':to_date', $dateTime1);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);

$parent = array() ;

	foreach ($results as $row){
		$Test=array();
		 $reciept_value="";
                $reciept_id_invoice="";
                $reciept_amount="";
                $Reciept_When_Entered="";

		$statement=$db->prepare("SELECT 
			   				avd.patientID,avd.recieptID,avd.amount_paid,avd.WhenEntered
	
							from  advance_ipd_record as avd 
							 Where avd.patientID=:PathoRegID 
							 ORDER BY avd.WhenEntered ASC");
		$statement->bindParam(':PathoRegID', $row['patientID'], PDO::PARAM_STR );
		$statement->execute();
		$result=$statement->fetchAll(PDO::FETCH_ASSOC );
		foreach ($result as $row1){
			$Test[]=array(	'PatientId'=>$row1['patientID'],
							'avd_recieptID'=>$row1['recieptID'],
							'avd_amount_paid'=>$row1['amount_paid'],

							);
		}

        $statement_1=$db->prepare("SELECT 

							avd.WhenEntered,avd.instance_id,avd.recieptID,avd.amount
							
							from  ipd_bill as avd 
							 Where avd.instance_id=:PathoRegID");
		$statement_1->bindParam(':PathoRegID', $row['patientID'], PDO::PARAM_STR );
		$statement_1->execute();
		$result_1=$statement_1->fetchAll(PDO::FETCH_ASSOC );
		foreach ($result_1 as $row1_1){
			$reciept_value=$row1_1['amount'];
            $reciept_id_invoice=$row1_1['recieptID'];
           $Reciept_When_Entered=$row1_1['WhenEntered'];
		}


	$parent[]=array(
					"ID"=>$row['ID'],
					"patientID"=>$row['patientID'],
					"RegID"=>$row['RegID'],
					"UHID" =>$row['UHID'],
					"isUHID" =>$row['isUHID'],
					"admit_date_time"=>$row['admit_date_time'],
					"discharge_date_time"=>$row['discharge_date_time'],
					"tests_Assigned"=>$row['tests_Assigned'],
					"doctor_assigned"=>$row['doctor_assigned'],
					"amount_deposit"=>$row['amount_deposit'],
					"charges"=>$reciept_value,
                                        "reciept_id_invoice"=>$reciept_id_invoice,
                                        "recieptwhenentered"=>$Reciept_When_Entered,
					/*"charges"=>$row['charges'],*/
					"advance_record_ipd"=>$Test,
					"symptoms"=>$row['symptoms'],
					"precription"=>$row['precription'],
					"diagnosis"=>$row['diagnosis'],
					"isMLC"=>$row['isMLC'],
					"MLC_type"=>$row['MLC_type'],
					"MLC_place"=>$row['MLC_place'],
					"MLC_station"=>$row['MLC_station'],
					"bedno"=>$row['bedno'],
					"wardno"=>$row['wardno'],
					"bed_type"=>$row['bed_type'],
					"ReferredBy"=>$row['ReferredBy'],
					"detailcharges"=>$row['detailcharges'],
					"WhenEntered"=>$row['WhenEntered'],
					"EnteredBy"=>$row['EnteredBy'],
					"WhenModified"=>$row['WhenModified'],
					"ModifiedBy"=>$row['ModifiedBy'],
					"RegistrationID"=>$row['RegistrationID'],
					"FirstName"=>$row['FirstName'],
					"LastName"=>$row['LastName'],
					"Age"=>$row['Age'],
					"Gender"=>$row['Gender'],
					"Mobile"=>$row['Mobile'],
					"avatar"=>$row['avatar'],
					"Email"=>$row['Email'],
					"Address"=>$row['Address'],
					"IsActive"=>$row['IsActive'],
			);
	}

$json=json_encode($parent);
//return $json;
echo $json;
$db=null;
?>