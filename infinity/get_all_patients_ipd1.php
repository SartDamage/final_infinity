<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
/* if (isset($_POST['start']) && is_numeric($_POST['start'])  && is_int($_POST['start'] + 0)) {
  $start = (int) $_POST['start'];
}else{$start=0;} */
$db = getDB();
if(isset($_GET['pat_id']))
{
  $pat_id=$_GET['pat_id'];
}
else
{
  $pat_id="";
}

if($pat_id=="")
{
  $statement=$db->prepare("SELECT bn.ID,pipd.`patientID`,pipd.`RegID`,pipd.`isUHID`,pipd.`UHID`,pipd.`admit_date_time`,pipd.`discharge_date_time`,pipd.`tests_Assigned`,pipd.`doctor_assigned`,
  pipd.`amount_deposit`,pipd.`charges`,pipd.`symptoms`,pipd.`precription`,pipd.`diagnosis`,pipd.`isMLC`,pipd.`MLC_type`,pipd.`MLC_place`,pipd.`MLC_station`,pipd.`bedno`,pipd.`wardno`,pipd.`bed_type`,
  pipd.`ReferredBy`,pipd.`detailcharges`,pipd.`WhenEntered`,pipd.`EnteredBy`,pipd.`WhenModified`,pipd.`ModifiedBy`,prm.`RegistrationID`,prm.`FirstName`,prm.`LastName`,prm.`Age`,prm.`Gender`,prm.`Mobile`,
  prm.`avatar`,prm.`Email`,prm.`Address`,prm.`IsActive` FROM patientipd AS pipd LEFT JOIN patientregistrationmaster AS prm ON prm.RegistrationID = pipd.RegID JOIN bed_number as bn on pipd.bedno=bn.ID where 1 order by pipd.whenentered DESC");
}
else
{
  $statement=$db->prepare("SELECT ot.`operating_surgeon`,ot.`assisting_doctor`,ot.`assisting_nurse`,ot.`anaesthetist`,ot.`surgery` as surgery_id,s_l.`surgery`,bn.`ID`,pipd.`patientID`,pipd.`RegID`,
    pipd.`isUHID`,pipd.`UHID`,pipd.`admit_date_time`,pipd.`discharge_date_time`,pipd.`tests_Assigned`,pipd.`doctor_assigned`,
    sl.`firstname`,sl.`lastname`,pipd.`amount_deposit`,pipd.`charges`,pipd.`symptoms`,pipd.`precription`,pipd.`diagnosis`,pipd.`isMLC`,pipd.`MLC_type`,pipd.`MLC_place`,pipd.`MLC_station`,
    pipd.`bedno`,pipd.`wardno`,pipd.`bed_type`,pipd.`ReferredBy`,pipd.`detailcharges`,pipd.`WhenEntered`,pipd.`EnteredBy`,pipd.`WhenModified`,pipd.`ModifiedBy`,
    prm.`RegistrationID`,prm.`FirstName`,prm.`LastName`,prm.`Age`,prm.`Gender`,prm.`Mobile`,prm.`avatar`,prm.`Email`,prm.`Address`,prm.`IsActive` FROM patientipd AS pipd
  LEFT JOIN patientregistrationmaster AS prm ON prm.RegistrationID = pipd.RegID
  JOIN bed_number as bn on pipd.bedno=bn.ID
  JOIN staff_ledger as sl on sl.ID = pipd.`doctor_assigned`
  JOIN patientot as ot on ot.patientID=pipd.`patientID`
  JOIN surgery_list as s_l on s_l.ID=ot.surgery
  where pipd.`patientID`=:pat_id
  order by pipd.whenentered DESC");
  $statement->bindParam(':pat_id', $pat_id);
}
/* $statement->bindParam(':start', $start, PDO::PARAM_INT);
$statement->bindParam(':rows',$limit_entries_per_page, PDO::PARAM_INT); */
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
if($pat_id=="")
{
  $parent = array();
	foreach ($results as $row)
  {
    $Test=array();
    $reciept_value="";
    $reciept_id_invoice="";
    $reciept_amount="";
    $Reciept_When_Entered="";
		$statement=$db->prepare("SELECT avd.patientID,avd.recieptID,avd.amount_paid from  advance_ipd_record as avd Where avd.patientID=:PathoRegID ORDER BY avd.WhenEntered ASC");
		$statement->bindParam(':PathoRegID', $row['patientID'], PDO::PARAM_STR );
		$statement->execute();
		$result=$statement->fetchAll(PDO::FETCH_ASSOC );
		foreach ($result as $row1)
    {
			$Test[]=array(	'PatientId'=>$row1['patientID'],
							        'avd_recieptID'=>$row1['recieptID'],
			                'avd_amount_paid'=>$row1['amount_paid'],
							      );
		}
		$statement_1=$db->prepare("SELECT avd.instance_id,avd.recieptID,avd.amount,avd.WhenEntered from  ipd_bill as avd Where avd.instance_id=:PathoRegID");
		$statement_1->bindParam(':PathoRegID', $row['patientID'], PDO::PARAM_STR );
		$statement_1->execute();
		$result_1=$statement_1->fetchAll(PDO::FETCH_ASSOC );
		foreach ($result_1 as $row1_1)
    {
      $reciept_value=$row1_1['amount'];
      $reciept_id_invoice=$row1_1['recieptID'];
      $Reciept_When_Entered=$row1_1['WhenEntered'];
		}
    $parent[]=array("ID"=>$row['ID'],
					"patientID"=>$row['patientID'],
					"UHID"=>$row['UHID'],
					"isUHID"=>$row['isUHID'],
					"RegID"=>$row['RegID'],
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
					"IsActive"=>$row['IsActive']);
	}
  $json=json_encode($parent);
  //return $json;
  echo $json;
}
else
{
  $json=json_encode($results);
  //return $json;
  echo $json;
}
$db=null;

?>
