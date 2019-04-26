<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($_SESSION['id']);

$form = $_POST;
$patient_id=$form['patient_id'];
$reg_id=$form['reg_id'];

$db = getDB();
          
                $stmt=$db->prepare ("SELECT * from `discharge_summary` where `patient_id`=:patient_id AND `reg_id`=:reg_id");
              /*}*/
              $stmt->bindParam(':patient_id', $patient_id);									
              $stmt->bindParam(':reg_id', $reg_id);									

              $stmt->execute();
              $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
              $json=json_encode($results);
              //return $json;
              echo $json;
              $db=null;
?>