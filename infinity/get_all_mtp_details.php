<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
/* if (isset($form['start']) && is_numeric($form['start'])  && is_int($form['start'] + 0)) {
  $start = (int) $form['start'];
}else{$start=0;} */

$form=$_POST;
if(isset($form['from_date'])){
  $from_date = $form['from_date'];
  //echo "in from date - ".$from_date;
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
$statement=$db->prepare("SELECT * FROM add_mtp_details AS prm where Date(`When_entered`)>=:from_date AND Date(`When_entered`) <=:to_date");
$statement->bindParam(':from_date', $dateTime);
$statement->bindParam(':to_date', $dateTime1);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$parent = array();

foreach ($results as $row){

           //doctor name
         $statement=$db->prepare("SELECT  ID ,Date(admit_date_time) DateAdmit from  patientot Where  ot_id =:ot_id");
          $statement->bindParam(':ot_id', $row['ot_id']);
          $statement->execute();

         $result_2=$statement->fetchAll(PDO::FETCH_ASSOC);
$admissionDate="";
  foreach ($result_2 as $row2) {
    // code...
    $admissionDate=$row2['DateAdmit'];
  }

   $parent[]=array(

     "mtpID"=>$row['Mtp_id'],
      "patientID"=>$row['PatID'],

      "RegID"=>$row['RegID'],
      "ipd_opd_id"=>$row['IPD_OPD_ID'],
      "UHID"=>$row['UHID'],
      "PatientName"=>$row['PatientName'],
      "Wife_Daughter_of"=>$row['Wife_Daughter_of'],
      "Age"=>$row['Age'],
      "Address"=>$row['Address'],
      "ContactNo"=>$row['ContactNo'],
      "Religion"=>$row['Religion'],
      "Duration_of_pregnancy"=>$row['Duration_of_pregnancy'],
      "Reason_of_mtp"=>$row['Reason_of_mtp'],
      "Date_of_mtp"=>$row['Date_of_mtp'],
      "Date_of_discharge"=>$row['Date_of_discharge'],
      "Result_and_remark"=>$row['Result_and_remark'],
      "Opinion_formed_by"=>$row['Opinion_formed_by'],
      "Pregnancy_terminated_by"=>$row['Pregnancy_terminated_by'],
      "When_entered"=>$row['When_entered'],
      "Entered_by"=>$row['Entered_by'],
      "When_modified"=>$row['When_modified'],
      "Modified_by"=>$row['Modified_by'],
      "admissionDate"=>$admissionDate,
   );


}

$json=json_encode($parent);
//return $json;
echo $json;
$db=null;
?>
