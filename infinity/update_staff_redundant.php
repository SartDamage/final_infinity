<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);

/*POST DATA*/
$form = $_POST;
$staffid = $form['staffid'];
$fname=$form['first_name'];
$lname=$form['last_name'];
//	$username=$form['username'];
$set_password="0";
if (isset($form['password'])){$password=$form['password'];$set_password="1";$password= hash('sha256', $password);}
//$password= hash('sha256', $password); //Password encryption
$email=$form['email'];
$contact=$form['contact_staff'];
if (isset($form['gender'])){$gender=$form['gender'];}else{$gender="";}
$martial_status=$form['martial_status'];
$dob=$form['dob'];
$dob = date("Y-m-d",strtotime($dob));
if($form['department_hidden']==("" || null)){
$designation=$form['department'];
}else{$designation=$form['department_hidden'];}
$address=$form['address'];
$bloodgroup=$form['bloodgroup'];
$avatar = "0";
$ice_name=$form['ICE_name'];
if(isset($form['ICE_relation'])){$ice_relation=$form['ICE_relation'];}else{ $ice_relation=""; };
$ice_contact=$form['ICE_contact'];
$ice_address=$form['ICE_address'];
$roleid=$form['role'];
$bio_id=$form['bio_id'];


$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
$contact = preg_replace("/[^0-9]/", '', $contact);
$ice_contact = preg_replace("/[^0-9]/", '', $ice_contact);
/*POST DATA END*/
/*image upload |_| below*/

$target_dir = "upload/";
//echo $_FILES["fileToUpload"]["name"];
if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["name"]<>""){
	//$encoded_data = $_FILES['fileToUpload'];
	
	$uploadOk = 1;
	$name = $_FILES["fileToUpload"]["name"];
	$target_file = $target_dir . $name;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$temp = explode(".", $_FILES["fileToUpload"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp); 
	//$newfilename = $name;
	/*image upload |^| above*/

	/*image upload |_| below*/
	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check !== false) {
		$errmsg = '"File is an image - '.$check["mime"].';" ';
		$uploadOk = 1;
	} else {
		$errmsg = "File is not an image.";
		$uploadOk = 0;
	} 
	// Check if file already exists
 	if (file_exists($target_dir.$newfilename)) {
		$errmsg = "Sorry, file already exists.";
		echo $errmsg;
		$uploadOk = 0;
	} 
	// Check file size					  
 	if ($_FILES["fileToUpload"]["size"] > 10485760) {
		$errmsg = "Sorry, your file is too large.";
			echo $errmsg;
		$uploadOk = 0;
	} 
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		$errmsg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$errmsg = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	}else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename)) { 
			//if (file_put_contents($target_dir.$newfilename,$binary_data)) {
			if($uploadOk=1){$avatar=$newfilename;}
			if($fname==null || $fname == "" || $contact==null||$contact=="" || $address==null||$address=="" ){
					//echo '<script>alert("Please Fill All Required Field")</script>';
					//header("Location: ./add_new_staff.php"); /* Redirect browser */		
					echo 	"Some Error Occured";
					exit();
			}else{
					if($set_password=="0"){
							$password="";
						}
					$reg_patient=$userClass->updatestaff($staffid,$fname,$lname,$password,$email,$contact,$martial_status,$dob,$gender,$designation,$address,$bloodgroup,$avatar,$ice_name,$ice_relation,$ice_contact,$ice_address,$roleid,$bio_id);//,$history);
					
					if($reg_patient){
						//echo "<script>alert('staff added Successfully')</script>";
						echo "staff added Successfully";
						//header("Location: ./manage_accounts.php"); /* Redirect browser */
						exit();
					}else{echo "error";}
			}
		} else {
			$errmsg = "Sorry, there was an error uploading your file.";
			echo $errmsg;
		}
	}
	
	}else{
		if($fname==null || $fname == "" || $contact==null||$contact=="" || $address==null||$address==""){
					
					//echo '<script>alert("Please Fill All Required Field")</script>';
					//header("Location: ./add_new_staff.php"); /* Redirect browser */		
					echo 	"Some Error Occured";
					exit();
			}else{
					if($set_password=="0"){
					$password="";
					}
					$reg_patient=$userClass->updatestaff($staffid,$fname,$lname,$password,$email,$contact,$martial_status,$dob,$gender,$designation,$address,$bloodgroup,$avatar,$ice_name,$ice_relation,$ice_contact,$ice_address,$roleid,$bio_id);//,$history);
					
					if($reg_patient){
						//echo "<script>alert('staff added Successfully')</script>";
						echo "staff added Successfully";
						//header("Location: ./manage_accounts.php"); /* Redirect browser */
						exit();
					}else{echo "error";}
			}
	}		
		 
	


	

	

/* $db = getDB();
$statement=$db->prepare("SELECT * FROM patientregistrationmaster");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//echo $json;
$db=null; */
?>