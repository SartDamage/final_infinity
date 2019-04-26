<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$form = $_POST;
$session_id=$_SESSION['id'];

$history=$form['history_finding'];


$operating_notes=$form['operating_notes'];

    foreach($form["Test"] as $key => $text_field){
        $test = $text_field;
    $comment = $form['Comment'][$key];

   }

$checkBoxDeliverySummary="N";
$Port_placement_images_upload="N";
$surgery_image="N";
$Baby_Photo="N";

if(isset($form['checkBoxDeliverySummary'])){
  $checkBoxDeliverySummary=$form['checkBoxDeliverySummary'];
}

if(isset($form['Port_placement_images_upload'])){
  $Port_placement_images_upload=$form['Port_placement_images_upload'];
  $port_placement_in=$_FILES['port_placement_in'];
}
if(isset($form['surgery_image'])){
  $surgery_image=$form['surgery_image'];
  $surgery_photo=$_FILES['surgery_photo'];
}
if(isset($form['Baby_Photo'])){
  $Baby_Photo=$form['Baby_Photo'];
  $baby_pic=$_FILES['baby_pic'];
}
$dateofmtp=$form['dateofmtp'];
$gender=$form['gender'];
$delivery_time=$form['delivery_time'];
$Delivery_regId=$form['Delivery_regId'];
$treatment_inves=$form['treatment_inves'];
$type=$form['type'];
$med_on_disc=$form['med_on_disc'];
$pat_id=$form['pat_id'];
$reg_id=$form['reg_id'];

//binary variable
$query_from_if="INSERT INTO `discharge_summary`(
  `patient_id`,
  `reg_id`,
  `pt_history`,
  `op_notes`,
  `delivery_type`,
  `delivery_date`,
  `delivery_time`,
  `sex`,
  `weight`,
  `pp_img`,
  `surgery_img`,
  `baby_photo`,
  `treatment_inv`,
  `meds_discharge`,
  `entered_by`,
  `checkBoxDeliverySummary_chk`,
  `Port_placement_images_upload_chk`,
  `surgery_image_chk`,
  `Baby_Photo_ckh`)
  VALUES
   (
   :patient_id,
   :reg_id,
   :pt_history,
   :op_notes,
   :delivery_type,
  :delivery_date,
  :delivery_time,
  :sex,
  :weight,
  :pp_img,
  :surgery_img,
  :baby_photo,
  :treatment_inv,
  :meds_discharge,
  :entered_by,
  :checkBoxDeliverySummary_chk,
  :Port_placement_images_upload,
  :surgery_image,
  :Baby_Photo_chk
  )ON DUPLICATE KEY UPDATE
  `pt_history`=:patient_history_dup,
  `op_notes`=:op_notes_dup,
  `delivery_type`=:delivery_type_dup,
  `delivery_date`=:delivery_date_dup,
  `delivery_time`=:delivery_time_dup,
  `sex`=:sex_dup,`weight`=:weight_dup,
  `treatment_inv`=:treatment_inv_dup,
  `meds_discharge`=:meds_discharge_dup,
  `checkBoxDeliverySummary_chk`=:checkBoxDeliverySummary_chk_dup,
  `Port_placement_images_upload_chk`=:Port_placement_images_upload_dup,
  `surgery_image_chk`=:surgery_image_dup,
  `Baby_Photo_ckh`=:Baby_Photo_chk_dup";


    //Baby photo
        if(isset($_FILES['baby_pic']) && $_FILES["baby_pic"]["name"]!=""){
        	$target_dir = "baby_pic/";

        	 $uploadOk = 1;
        $name = $_FILES["baby_pic"]["name"];
        $target_file = $target_dir . $name;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $temp = explode(".", $_FILES["baby_pic"]["name"]);
        $random_no =time();
         $baby_pic_url = "baby_pic/".$random_no. '.' . end($temp);
         $newfilename1 = $random_no. '.' . end($temp);
           // Upload file
           move_uploaded_file($_FILES['baby_pic']['tmp_name'],$baby_pic_url);
           $query_from_if .=" ,`baby_photo`=:baby_photo_dup";
        }else{
          $baby_pic_url="";
        }

    //port placement photo
        if(isset($_FILES['surgery_photo']) && $_FILES["surgery_photo"]["name"]!=""){
          $target_dir = "discharge_img/";

           $uploadOk = 1;
        $name = $_FILES["surgery_photo"]["name"];
        $target_file = $target_dir . $name;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $temp = explode(".", $_FILES["surgery_photo"]["name"]);
        $random_no =time();
         $surgery_pic_url = "discharge_img/".$random_no. '.' . end($temp);
         $newfilename1 = $random_no. '.' . end($temp);
           // Upload file
           move_uploaded_file($_FILES['surgery_photo']['tmp_name'],$surgery_pic_url);
           $query_from_if .=",`surgery_img`=:surgery_img_dup";
        }else{
          $surgery_pic_url="";
        }




    //Surgery photo

        if(isset($_FILES['port_placement_in']) && $_FILES["port_placement_in"]["name"]!=""){
          $target_dir = "pp_img/";

           $uploadOk = 1;
        $name = $_FILES["port_placement_in"]["name"];
        $target_file = $target_dir . $name;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $temp = explode(".", $_FILES["port_placement_in"]["name"]);
        $random_no =time();
         $port_placement_in = "pp_img/".$random_no. '.' . end($temp);
         $newfilename1 = $random_no. '.' . end($temp);
           // Upload file
           move_uploaded_file($_FILES['port_placement_in']['tmp_name'],$port_placement_in);
           $query_from_if .=",`pp_img`=:pp_img_dup";
        }else{
          $port_placement_in="";
        }
//ends hers
//echo $query_from_if;
         $db = getDB();

                $stmt=$db->prepare ($query_from_if);

                  $stmt->bindParam(':patient_id',$pat_id, PDO::PARAM_STR);
                  $stmt->bindParam(':reg_id',$reg_id, PDO::PARAM_STR);
                  $stmt->bindParam(':pt_history',$history, PDO::PARAM_STR);
                  $stmt->bindParam(':patient_history_dup',$history, PDO::PARAM_STR);
                  $stmt->bindParam(':op_notes',$operating_notes, PDO::PARAM_STR);
                  $stmt->bindParam(':op_notes_dup',$operating_notes, PDO::PARAM_STR);
                  $stmt->bindParam(':delivery_type',$type, PDO::PARAM_STR);
                  $stmt->bindParam(':delivery_type_dup',$type, PDO::PARAM_STR);
                  $stmt->bindParam(':delivery_date',$dateofmtp, PDO::PARAM_STR);
                  $stmt->bindParam(':delivery_date_dup',$dateofmtp, PDO::PARAM_STR);
                  $stmt->bindParam(':delivery_time',$delivery_time, PDO::PARAM_STR);
                  $stmt->bindParam(':delivery_time_dup',$delivery_time, PDO::PARAM_STR);
                  $stmt->bindParam(':sex',$gender, PDO::PARAM_STR);
                  $stmt->bindParam(':sex_dup',$gender, PDO::PARAM_STR);
                  $stmt->bindParam(':weight',$Delivery_regId, PDO::PARAM_STR);
                  $stmt->bindParam(':weight_dup',$Delivery_regId, PDO::PARAM_STR);
                  $stmt->bindParam(':pp_img',$port_placement_in, PDO::PARAM_STR);
                  if(isset($_FILES['port_placement_in']) && $_FILES["port_placement_in"]["name"]!=""){

                    $stmt->bindParam(':pp_img_dup',$port_placement_in, PDO::PARAM_STR);
                  }
                  $stmt->bindParam(':surgery_img',$surgery_pic_url, PDO::PARAM_STR);
                  if(isset($_FILES['surgery_photo']) && $_FILES["surgery_photo"]["name"]!=""){

                    $stmt->bindParam(':surgery_img_dup',$surgery_pic_url, PDO::PARAM_STR);
                  }
                  $stmt->bindParam(':baby_photo',$baby_pic_url, PDO::PARAM_STR);
                  if(isset($_FILES['baby_pic']) && $_FILES["baby_pic"]["name"]!=""){

                    $stmt->bindParam(':baby_photo_dup',$baby_pic_url, PDO::PARAM_STR);
                  }
                  $stmt->bindParam(':treatment_inv',$treatment_inves, PDO::PARAM_STR);
                  $stmt->bindParam(':treatment_inv_dup',$treatment_inves, PDO::PARAM_STR);
                  $stmt->bindParam(':meds_discharge',$med_on_disc, PDO::PARAM_STR);
                  $stmt->bindParam(':meds_discharge_dup',$med_on_disc, PDO::PARAM_STR);

                  $stmt->bindParam(':checkBoxDeliverySummary_chk',$checkBoxDeliverySummary, PDO::PARAM_STR);
                  $stmt->bindParam(':Port_placement_images_upload',$Port_placement_images_upload, PDO::PARAM_STR);
                  $stmt->bindParam(':surgery_image',$surgery_image, PDO::PARAM_STR);
                  $stmt->bindParam(':Baby_Photo_chk',$Baby_Photo, PDO::PARAM_STR);

                  $stmt->bindParam(':Port_placement_images_upload_dup',$Port_placement_images_upload, PDO::PARAM_STR);
                  $stmt->bindParam(':surgery_image_dup',$surgery_image, PDO::PARAM_STR);
                  $stmt->bindParam(':Baby_Photo_chk_dup',$Baby_Photo, PDO::PARAM_STR);
                  $stmt->bindParam(':checkBoxDeliverySummary_chk_dup',$checkBoxDeliverySummary, PDO::PARAM_STR);

                  $stmt->bindParam(':entered_by',$session_id, PDO::PARAM_STR);

              $stmt->execute();
              $count = $stmt->rowCount();
              if($count == 2 || $count==1){
                echo "Successfully Uploaded";
              }else{
                print_r($stmt);
              }
              return $count;

              $db=null;









?>
