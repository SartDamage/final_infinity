<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
    $form = $_POST;
    $ot_id = $form['ot_id'];
    $feedback1 = $form['feedback1'];
    $feedback2 = $form['feedback2'];
    $feedback3 = $form['feedback3'];
    $AdminID   =$form['AdminID'];
    $db = getDB();

    $statement=$db->prepare("UPDATE `patientot` SET `feedback1`=:feedback1, `feedback2`=:feedback2,`feedback3`=:feedback3, `WhenModified`=NOW(), `ModifiedBy`=:AdminID WHERE `ot_id`=:ot_id");
    $statement->bindParam(':feedback1', $feedback1, PDO::PARAM_STR);
    $statement->bindParam(':feedback2',$feedback2, PDO::PARAM_STR );
    $statement->bindParam(':feedback3',$feedback3, PDO::PARAM_STR );
    $statement->bindParam(':ot_id',$ot_id, PDO::PARAM_STR);
    $statement->bindParam(':AdminID',$AdminID, PDO::PARAM_INT);


    $statement->execute();

    $count = $statement->rowCount();

    echo $count;
    $db=null;
?>
