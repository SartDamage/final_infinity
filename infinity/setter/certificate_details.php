<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$form = $_POST;
$session_id=$_SESSION['id'];


if($form['hd_id']!="")
{
     $first_name_input=$form['first_name_input'];
     $s_date_of_Certificate=$form['s_date_of_Certificate'];
     $e_date_of_Certificate=$form['e_date_of_Certificate'];
    // $newfilename1=$_FILES["item_img"];

     $db1 = getDB();
          
                $stmt1=$db1->prepare ("UPDATE `certificate_details` SET `certificate_name`=:certificate_name,`starting_date`=:starting_date,`expiry_date`=:expiry_date WHERE `id`=:id");

                  $stmt1->bindParam(':certificate_name',$first_name_input);
                  $stmt1->bindParam(':starting_date',$s_date_of_Certificate);
                  $stmt1->bindParam(':expiry_date',$e_date_of_Certificate);
                  $stmt1->bindParam(':id',$form['hd_id']);
                //  $stmt1->bindParam(':img', $newfilename1, PDO::PARAM_STR);
                  //$stmt1->bindParam(':CreatedBy', $session_id, PDO::PARAM_STR);
            
              
              $stmt1->execute();
              $count = $stmt1->rowCount();
              echo $count;

              
              
              return $count;
              
              $db1=null;
  


    

}
else{

        if(isset($form['first_name_input'])){
          $first_name_input=$form['first_name_input'];
        }else{
          $first_name_input="";
        }

        if(isset($form['s_date_of_Certificate'])){
          $s_date_of_Certificate=$form['s_date_of_Certificate'];
        }else{
          $s_date_of_Certificate="";
        }
        if(isset($form['e_date_of_Certificate'])){
          $e_date_of_Certificate=$form['e_date_of_Certificate'];
        }else{
          $e_date_of_Certificate="";
        }
        if(isset($_FILES['item_img'])){
        	$target_dir = "certificate_upload/";

        	 $uploadOk = 1;
        $name = $_FILES["item_img"]["name"];
        $target_file = $target_dir . $name;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $temp = explode(".", $_FILES["item_img"]["name"]);
        $random_no = rand(10,999999);
         $newfilename = "certificate_upload/".$random_no. '.' . end($temp);
         $newfilename1 = $random_no. '.' . end($temp);
           // Upload file
           move_uploaded_file($_FILES['item_img']['tmp_name'],$newfilename);
        }else{
          $newfilename="";
        }
         $db = getDB();
          
                $stmt=$db->prepare ("INSERT INTO `certificate_details`(`certificate_name`, `starting_date`, `expiry_date`, `img`, `CreatedBy`, `WhenCreated`) 
                  VALUES
                   (
                   :certificate_name,
                   :starting_date,
                   :expiry_date,
                   :img,
                   :CreatedBy,
                    NOW()                 
                  )");
                  $stmt->bindParam(':certificate_name', $first_name_input, PDO::PARAM_STR);
                  $stmt->bindParam(':starting_date', $s_date_of_Certificate, PDO::PARAM_STR);
                  $stmt->bindParam(':expiry_date', $e_date_of_Certificate, PDO::PARAM_STR);
                  $stmt->bindParam(':img', $newfilename1, PDO::PARAM_STR);
                  $stmt->bindParam(':CreatedBy', $session_id, PDO::PARAM_STR);
            
              /*}*/
              $stmt->execute();
              $count = $stmt->rowCount();
              echo $count;

              
              
              return $count;
              
              $db=null;
    }

  


    




?>	