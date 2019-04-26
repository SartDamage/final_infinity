<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$form = $_POST;
/* if (isset($form['start']) && is_numeric($form['start'])  && is_int($form['start'] + 0)) {
  $start = (int) $form['start'];
}else{$start=0;} */
/*$form=$_POST;
$from_date= "2019-04-05";
$to_date ="2019-04-05";*/
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
$statement=$db->prepare("SELECT pipd.* ,prm.FirstName,prm.LastName,prm.Age,prm.gender FROM patientot AS pipd LEFT JOIN patientregistrationmaster AS prm ON prm.RegistrationID = pipd.RegID WHERE  Date(pipd.WhenEntered) >=:from_date AND Date(pipd.WhenEntered) <=:to_date");
$statement->bindParam(':from_date', $dateTime);
$statement->bindParam(':to_date', $dateTime1);

$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$parent = array();
$variable_1="";
foreach ($results as $row){

           //surgeryname
				$statement=$db->prepare("SELECT sur.surgery from  surgery_list as sur Where  sur.ID=:surgery");
				$statement->bindParam(':surgery', $row['surgery']);
				$statement->execute();

				$result_1=$statement->fetchAll(PDO::FETCH_ASSOC);

				//print_r($result_1);
				    foreach ($result_1 as $row_1){
				        $SurgeryName =$row_1['surgery'];
				    }

               //doctor
                     $statement=$db->prepare("SELECT ID ,firstname,lastname from  staff_ledger Where   ID =:assisting_doctor");
				            $statement->bindParam(':assisting_doctor', $row['assisting_doctor']);
				              $statement->execute();

				           $result_2=$statement->fetchAll(PDO::FETCH_ASSOC);


				foreach ($result_2 as $row_2){
				        $assisting_doctorF=$row_2['firstname'];
				        $assisting_doctorL=$row_2['lastname'];
                                        $assistingDoctorName=$assisting_doctorF.''.$assisting_doctorL;

				    }

				    //operating surgeon

                    $statement=$db->prepare("SELECT ID,firstname,lastname FROM  staff_ledger WHERE ID = :operating_surgeon");
				            $statement->bindParam(':operating_surgeon', $row['operating_surgeon']);
				              $statement->execute();

				           $result_3=$statement->fetchAll(PDO::FETCH_ASSOC);


				foreach ($result_3 as $row_3){
				        $operating_surgeonF=$row_3['firstname'];
				        $operating_surgeonL=$row_3['lastname'];

				        $operatingSurgeonName = $operating_surgeonF.' '.$operating_surgeonL;
				    }

                       //anaesthetist

                     $statement=$db->prepare("SELECT ID,firstname,lastname FROM  staff_ledger WHERE ID = :anaesthetist");
				            $statement->bindParam(':anaesthetist', $row['anaesthetist']);
				              $statement->execute();

				           $result_4=$statement->fetchAll(PDO::FETCH_ASSOC);


				foreach ($result_4 as $row_4){
				        $anaesthetistF=$row_4['firstname'];
				        $anaesthetistL=$row_4['lastname'];
                $anaesthetistName =$anaesthetistF.' '.$anaesthetistL;

				    }

                         //assisting Nurse

                      $statement=$db->prepare("SELECT ID,firstname,lastname FROM  staff_ledger WHERE ID = :anaesthetist");
				            $statement->bindParam(':anaesthetist', $row['anaesthetist']);
				              $statement->execute();

				           $result_5=$statement->fetchAll(PDO::FETCH_ASSOC);


				foreach ($result_5 as $row_5){
				        $assisting_nurseF=$row_5['firstname'];
                                        $assisting_nurseL=$row_5['lastname'];
                                        $assistingNurseName =  $assisting_nurseF.' '.$assisting_nurseF;
				    }

           $parent[]=array(
           "pID"=>$row['ID'],
					"patientID"=>$row['patientID'],
					"UHID"=>$row['UHID'],
					"RegID"=>$row['RegID'],
          "ot_id"=>$row['ot_id'],
					"admit_date_time"=>$row['admit_date_time'],
					"discharge_date_time"=>$row['discharge_date_time'],
					"patientFirstName"=>$row['FirstName'],
					"patientLastName"=>$row['LastName'],
					"Age"=>$row['Age'],
					"gender"=>$row['gender'],
          "typeOfAnaesthesia"=>$row['typeOfAnaesthesia'],
	        "surgeryName"=>$SurgeryName,
	        "StartTime"=>$row['StartTime'],
					"EndTime"=>$row['EndTime'],
					"finalDiagnosis"=>$row['finalDiagnosis'],
					"operatingSurgeon"=>$operatingSurgeonName,
					"anaesthetist"=>$anaesthetistName,
					"assistingDoctor"=>$assistingDoctorName,
					"assistingNurse"=>$assistingNurseName,
					"remark"=>$row['remark'],
          "startDate"=>$row['startDate'],
          "endDate"=>$row['startDate'],
          "materialOfHpe"=>$row['Material_of_H.P.E'],

           );

}
$json=json_encode($parent);
//return $json;
echo $json;
$db=null;
?>
