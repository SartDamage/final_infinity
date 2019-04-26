<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
    $form = $_POST;

    if (isset($form['anaesthesia_type'])){$anaesthesia_type = $form['anaesthesia_type'];}else{  $anaesthesia_type ="N.A.";}
    if (isset($form['start_date'])){$start_date = $form['start_date'];}else{ $start_date ="N.A.";}
    if (isset($form['star_time'])){$star_time = $form['star_time'];}else{  $star_time ="N.A.";}
    if (isset($form['end_date'])){$end_date = $form['end_date'];}else{  $end_date ="N.A.";}
    if (isset($form['end_time'])){$end_time = $form['end_time'];}else{  $end_time ="N.A.";}
    if (isset($form['material_of_hpe'])){$material_of_hpe = $form['material_of_hpe'];}else{  $material_of_hpe ="N.A.";}
    if (isset($form['remarkID'])){$remark = $form['remarkID'];}else{  $remark ="N.A.";}
    if (isset($form['final_diagnosis'])){$diagnosis = $form['final_diagnosis'];}else{  $diagnosis ="N.A.";}

    $pID = $form['pid'];
    $AdminID = $form['add_stock_type_AdminID'];

    $db = getDB();

    $statement=$db->prepare("UPDATE  `patientot` SET `typeOfAnaesthesia`=:typeOfAnaesthesia,`startDate`=:start_date,`StartTime`=:star_time,`EndDate`=:end_date,`EndTime`=:end_time,`Material_of_H.P.E`=:material_of_hpe,`remark`=:remark,`finalDiagnosis`=:diagnosis,`ModifiedBy`=:AdminID,`WhenModified`=NOW()  WHERE `ID`=:pID");
    $statement->bindParam(':typeOfAnaesthesia',$anaesthesia_type);
    $statement->bindParam(':start_date',$start_date);
    $statement->bindParam(':star_time',$star_time);
    $statement->bindParam(':end_date',$end_date);
    $statement->bindParam(':end_time',$end_time);
    $statement->bindParam(':material_of_hpe',$material_of_hpe);
    $statement->bindParam(':remark',$remark);
    $statement->bindParam(':diagnosis',$diagnosis);
    $statement->bindParam(':pID',$pID);
    $statement->bindParam(':AdminID',$AdminID);


    $statement->execute();
    if($statement->rowCount() > 0){
        echo "1";
    }else{
        echo "0";
    }

    $db=null;
?>
