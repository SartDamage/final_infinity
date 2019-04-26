<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
/* if (isset($_POST['start']) && is_numeric($_POST['start'])  && is_int($_POST['start'] + 0)) {
  $start = (int) $_POST['start'];
}else{$start=1;} */
$db = getDB();

$stat=$db->prepare("SELECT	pprp.ID, pprp.instance_id, pprp.recieptID, pprp.amount, pprp.advance, pprp.paid, pprp.discount,
						sl.firstname,sl.lastname,sl.StaffID,
						pprm.admit_date_time, pprm.discharge_date_time, pprm.doctor_assigned, pprm.isMLC,pprm.bedno, pprm.wardno,pprm.bed_type,
						sl.firstname,sl.lastname,sl.StaffID,
                        bt.bed_charges,
						prm.FirstName,prm.LastName,prm.Mobile,prm.Gender,prm.Age,prm.RegistrationID 
							FROM ipd_bill AS pprp
                            JOIN patientipd as pprm ON pprm.patientID=pprp.instance_id
     						JOIN staff_ledger as sl ON sl.ID=pprm.doctor_assigned
							JOIN bed_type AS bt ON bt.ID=pprm.bed_type
							LEFT JOIN patientregistrationmaster as prm ON pprp.Registered_ID=prm.RegistrationID");
$stat->execute();
$parent = array() ;
$results=$stat->fetchAll(PDO::FETCH_ASSOC );


	foreach ($results as $row){
		$Test=array();
		$statement=$db->prepare("SELECT ibp.particulars,ibp.amount,ibp.amount,ibp.no_of_days FROM `ipd_bill_particulars` AS ibp
									WHERE ibp.reciept_id=:ipd_bill_recieptID");
		$statement->bindParam(':ipd_bill_recieptID', $row['recieptID'], PDO::PARAM_STR );
		$statement->execute();
		$result=$statement->fetchAll(PDO::FETCH_ASSOC );
		foreach ($result as $row1){
			//$item = array ("Test"=>$row1['PatientId']);
			$Test[]=array(	'particulars'=>$row1['particulars'],
							'amount'=>$row1['amount'],
							'days'=>$row1['no_of_days'],
							);
		}
		
		
		$parent[]=array(
				"ID"=>$row['ID'],
				"WhenEntered"=>$row['admit_date_time'],
				"Discharge"=>$row['discharge_date_time'],
				"Name"=>$row['FirstName']." ".$row['LastName'],
				"Mobile"=>$row['Mobile'],
				"Gender"=>$row['Gender'],
				"Age"=>$row['Age'],
				"RegistrationID"=>$row['RegistrationID'],
				"IPD_instance"=>$row['instance_id'],
				"dr_name"=>$row['firstname']." ".$row['lastname'],
				"staffid"=>$row['StaffID'],
				"Payment"=>$row['paid'],
				"amount"=>$row['amount'],
				"discount"=>$row['discount'],
				"advance"=>$row['advance'],
				"bill_particulars"=>$Test);
				
		
		
	}
$json=json_encode($parent);
echo $json;								
								

$db=null;
?>