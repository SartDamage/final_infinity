<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
    $form = $_POST;	
    if (isset($form['consent_form_name'])){$name_form = $form['consent_form_name'];}else{  $name_form ="N.A.";}

    $AdminID = $form['ctl00_AdminID'];

    if(isset($_FILES['item_img'])){
    $target_dir = "certificate_upload/";

     $uploadOk = 1;
$name = $_FILES["item_img"]["name"];
$target_file = $target_dir . $name;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$temp = explode(".", $_FILES["item_img"]["name"]);
$random_no = rand(10,999999);
 $newfilename = 'certificate_upload/'.$random_no.'.'.end($temp);
 $newfilename1 = $random_no. '.' . end($temp);
   // Upload file
   move_uploaded_file($_FILES['item_img']['tmp_name'],$newfilename);
}else{
  $newfilename="";
}
      
    $db = getDB();
    $statement=$db->prepare("INSERT INTO `concent_form` (`name_form`,`path_cform`,`WhenEntered`,`EnteredBy`) VALUES (:name_form,:path_cform, NOW(),:AdminID)");    

    $statement->bindParam(':name_form', $name_form);
    $statement->bindParam(':path_cform', $newfilename1);
    $statement->bindParam(':AdminID', $AdminID);

    $statement->execute();
    if($statement->rowCount() > 0){
        echo "1";
    }else{
        echo "0";
    }

    $db=null;
?>