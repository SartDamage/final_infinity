<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$form = $_POST;
/* if (isset($form['start']) && is_numeric($form['start'])  && is_int($form['start'] + 0)) {
  $start = (int) $form['start'];
}else{$start=0;} */

$db = getDB();
$statement=$db->prepare("SELECT * FROM patientot WHERE 1");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$parent = array();

foreach ($results as $row){
              //global_variable declaration
              $patientFullname="";


       //address of patient
        $statement=$db->prepare("SELECT ID ,FirstName,LastName from  patientregistrationmaster Where  RegistrationID =:RegID");
         $statement->bindParam(':RegID', $row['RegID']);
         $statement->execute();

        $result_2=$statement->fetchAll(PDO::FETCH_ASSOC);

      foreach ($result_2 as $row_2){
                   $fname=$row_2['FirstName'];
                   $lname=$row_2['LastName'];
                $patientFullname = $fname .' '. $lname;
                   }

            //feedback value


                  $parent[]=array(
                     "patientID"=>$row['patientID'],
                     "RegID"=>$row['RegID'],
                     "ot_id"=>$row['ot_id'],
                     "patientName"=>$patientFullname,
                     "feedback1"=>$row['feedback1'],
                     "feedback2"=>$row['feedback2'],
                     "feedback3"=>$row['feedback3'],
                 );
}
$json=json_encode($parent);

echo $json;
$db=null;
?>
