<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$form = $_POST;
if(isset($_POST['years'])){$year=$_POST['years'];}else {$year='NA';}

      {
        $db = getDB();
        $statement=$db->prepare("SELECT * FROM add_tl_details WHERE YEAR(WhenEntered)=:year");
           $statement->bindParam(':year',$year);
        $statement->execute();
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
        $parent = array();

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
                //address of patient
                $statement=$db->prepare("SELECT ID ,Address from  patientregistrationmaster Where  RegistrationID =:reg_id");
                 $statement->bindParam(':reg_id', $row['reg_id']);
                 $statement->execute();

                $result_2=$statement->fetchAll(PDO::FETCH_ASSOC);

              foreach ($result_2 as $row_2){
                           $address_patient=$row_2['Address'];
                           }




                          $parent[]=array(
                            "pID"=>$row['id'],
                             "patientID"=>$row['pat_id'],
                             "PatientUHID"=>$row['uhid'],
                             "RegID"=>$row['reg_id'],
                             "ipd_opd_id"=>$row['ipd_opd_id'],
                             "anually_no"=>$row['anually_no'],
                             "monthly_no"=>$row['monthly_no'],
                             "patient_name"=>$row['patient_name'],
                             "age_of_husband"=>$row['age_of_husband'],
                             "age_of_wife"=>$row['age_of_wife'],
                             "education_of_husband"=>$row['education_of_husband'],
                             "education_of_wife"=>$row['education_of_wife'],
                             "living_male"=>$row['living_male'],
                             "livinmg_female"=>$row['livinmg_female'],
                             "age_of_Last_child_male"=>$row['age_of_Last_child_male'],
                             "age_of_Last_child_female"=>$row['age_of_Last_child_female'],
                             "assistingDoctorName"=>$assistingDoctorName,
                             "method"=>$row['method'],
                             "address_patient"=>$address_patient,
                             "date_of_tl"=>$row['date_of_tl'],
                           "monthly_income"=>$row['monthly_income'],

                         );


}

$json=json_encode($parent);

echo $json;
$db=null;

}
?>
