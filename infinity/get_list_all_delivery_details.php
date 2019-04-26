<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$form = $_POST;
/* if (isset($form['start']) && is_numeric($form['start'])  && is_int($form['start'] + 0)) {
  $start = (int) $form['start'];
}else{$start=0;} */
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
if(isset($form['to_date'])){
  if($form['from_date']!=""){
    $statement=$db->prepare("SELECT * FROM add_delivery_details WHERE Date(`WhenEntered`)>=:from_date AND Date(`WhenEntered`) <=:to_date");
    $statement->bindParam(':from_date', $dateTime);
    $statement->bindParam(':to_date', $dateTime1);
  }
}else{
  $statement=$db->prepare("SELECT * FROM add_delivery_details WHERE 1");
}
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$parent = array();
$variable_1="";

foreach ($results as $row){

           //doctor name
         $statement=$db->prepare("SELECT ID ,firstname,lastname from  staff_ledger Where   ID =:assisting_doctor");
          $statement->bindParam(':assisting_doctor', $row['doctor']);
          $statement->execute();

         $result_2=$statement->fetchAll(PDO::FETCH_ASSOC);


  foreach ($result_2 as $row_2){
      $assisting_doctorF=$row_2['firstname'];
      $assisting_doctorL=$row_2['lastname'];
      $assistingDoctorName=$assisting_doctorF.' '.$assisting_doctorL;
                    }

   $parent[]=array(

     "pID"=>$row['id'],
      "patientID"=>$row['pat_id'],
      "PatientUHID"=>$row['uhid'],
      "RegID"=>$row['reg_id'],
      "ipd_opd_id"=>$row['ipd_opd_id'],
      "patient_name"=>$row['patient_name'],
      "gravida"=>$row['gravida'],
      "age_of_wife"=>$row['age_of_wife'],
      "address"=>$row['address'],
      "contact"=>$row['contact'],
      "child_gender"=>$row['child_gender'],
      "method"=>$row['method'],
      "weight"=>$row['weight'],
      "no_child_born"=>$row['no_child_born'],
      "wks"=>$row['wks'],
      "date_of_dl"=>$row['date_of_dl'],
      "time_of_dl"=>$row['time_of_dl'],
      "WhenEntered"=>$row['WhenEntered'],
      "EnteredBy"=>$row['EnteredBy'],
      "doctorName"=>$assistingDoctorName,
      "doctor"=>$row['doctor'],
      "ot_id"=>$row['ot_id']

   );


}

$json=json_encode($parent);
//return $json;
echo $json;
$db=null;
?>
