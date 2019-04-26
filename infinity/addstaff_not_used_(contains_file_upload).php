<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
$userDetails=$userClass->userDetails($session_id);



/*image upload |_| below*/

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
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
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		$errmsg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$errmsg = "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename)) {
			/*******************************************************************************/ //create user
	$form = $_POST;
	$fname=$form['first_name'];
	$lname=$form['last_name'];
	$username=$form['username'];
	$password=$form['password'];
	//$password= hash('sha256', $password); //Password encryption
	$email=$form['email'];
	$contact=$form['contact_staff'];
	$gender=$form['sex'];
	$martial_status=$form['martial_status'];
	$dob=$form['dob'];
	$dob = date("Y-m-d",strtotime($dob));
	$designation=$form['designation'];
	$address=$form['address'];
	$bloodgroup=$form['bloodgroup'];
	$avatar=$newfilename;
	$ice_name=$form['ICE_name'];
	$ice_contact=$form['ICE_contact'];
	$ice_address=$form['ICE_address'];
	$roleid=$form['role'];
	
	$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
	$contact = preg_replace("/[^0-9]/", '', $contact);
	$ice_contact = preg_replace("/[^0-9]/", '', $ice_contact);
/*****/
	
	if($gender==null || $gender == "" || $fname==null || $fname == "" || $contact==null||$contact=="" || $address==null||$address=="" || $username==null||$username==""){
			
			//echo '<script>alert("Please Fill All Required Field")</script>';
			//header("Location: ./add_new_staff.php"); /* Redirect browser */		
			return 	"Some Error Occured";
			exit();
	}else{
			$reg_patient=$userClass->addstaff($fname,$lname,$username,$password,$email,$contact,$gender,$martial_status,$dob,$designation,$address,$bloodgroup,$avatar,$ice_name,$ice_contact,$ice_address,$roleid);//,$history);
			if($reg_patient){
				//echo "<script>alert('staff added Successfully')</script>";
				echo "staff added Successfully";
				//header("Location: ./manage_accounts.php"); /* Redirect browser */
				exit();
			}else{}
		
		
	}
	/*********************************************************************************************/
		} else {
			$errmsg = "Sorry, there was an error uploading your file.";
		}
		//echo $errmsg;
	}
	/*image upload |^| above*/


	

	

/* $db = getDB();
$statement=$db->prepare("SELECT * FROM patientregistrationmaster");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//echo $json;
$db=null; */
?>