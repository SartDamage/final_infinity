<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
    $form = $_POST;
    $mtpDataDischage = $form['from_date'];
    $mtpRemark = $form['mtp_Remark'];
    $AdminID = $form['ctl00_AdminID'];

  $mtpPatientID =$form['mtpPatientID'];

    $db = getDB();
    $statement=$db->prepare("UPDATE `add_mtp_details` SET `Result_and_remark`=:mtpRemark, `Date_of_discharge`=:mtpDataDischage , `When_modified`=NOW(),`Modified_by`=:AdminID WHERE `PatID`=:patientID");
    $statement->bindParam(':mtpDataDischage', $mtpDataDischage, PDO::PARAM_STR);
    $statement->bindParam(':mtpRemark',$mtpRemark, PDO::PARAM_STR );
    $statement->bindParam(':patientID',$mtpPatientID, PDO::PARAM_STR );
    $statement->bindParam(':AdminID',$AdminID, PDO::PARAM_INT);

    $statement->execute();

    $count = $statement->rowCount();

    echo $count;
    $db=null;
?>
