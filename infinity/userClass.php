<?php
class userClass
{
/* User Login */
public function userLogin($usernameEmail,$password)
{
    try
        {
         $db = getDB();
				 $hash_password= hash('sha256', $password); /*Password encryption */
				 $stmt = $db->prepare("SELECT * FROM staff_ledger WHERE (username=:usernameEmail OR email=:usernameEmail) AND password=:hash_password");
				 $stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
				 $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
				 $stmt->execute();
				 $count=$stmt->rowCount();
				 $data=$stmt->fetch(PDO::FETCH_OBJ);
				 $db = null;
				 if($count!=0)
				 {
					session_start();
					$_SESSION['loggedin'] = true;
					$_SESSION['uid']=$data->roleid; /*Storing user session value*/
					$_SESSION['id']=$data->ID;
					/*inserting into log*/
					try
					{
						$db = getDB();
						$Activity="login attemp successful";
						$loginhistory="loginhistory";
						$statement=$db->prepare("INSERT INTO $loginhistory ( `EmailID`, `Login_date`, `Activity`) VALUES (:usernameEmail,NOW(),:activity)");
						$statement->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
						$statement->bindParam("activity", $Activity,PDO::PARAM_STR) ;
						$statement->execute();
						$db = null;
					}
					catch(PDOException $e)
					{
						$_SESSION['error']=$e->getMessage();
						echo '{"error":{"text":'. $e->getMessage() .'}}';
					}
					return $_SESSION['uid'];
				}
				else
				{
					$db = getDB();
					$Activity="login attemp Failed";
					$loginhistory="loginhistory";
					$statement=$db->prepare("SELECT * FROM staff_ledger WHERE  (username=:usernameEmail OR email=:usernameEmail)");
					$statement->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
					$statement->execute();
 				 	$count_is_email=$statement->rowCount();
					if($count_is_email == 0)
					{
						$_SESSION['errorcode']="User Name or Email is invalid/Not available.";
					}else if($count_is_email != 0){
						$_SESSION['errorcode']="Password is Incorrect.";
					}
					$db = null;
					try{
						$db = getDB();
						$Activity="login attemp Failed";
						$loginhistory="loginhistory";
						$statement=$db->prepare("INSERT INTO $loginhistory ( `EmailID`, `Login_date`, `Activity`) VALUES (:usernameEmail,NOW(),:activity)");
						$statement->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
						$statement->bindParam("activity", $Activity,PDO::PARAM_STR) ;
						$statement->execute();
						$db = null;
					}
					catch(PDOException $e)
					{
						echo '{"error":{"text":'. $e->getMessage() .'}}';
					}
					return false;
				}
			}
			catch(PDOException $e)
			{
				echo '{"error":{"text":'. $e->getMessage() .'}}';
			}
}

/* User Registration */
public function userRegistration($username,$password,$email){
	try{
		$db = getDB();
		$st = $db->prepare("SELECT * FROM adminmaster WHERE username=:username OR EmailID=:email");
		$st->bindParam("username", $username,PDO::PARAM_STR);
		$st->bindParam("email", $email,PDO::PARAM_STR);
		$st->execute();
		$count=$st->rowCount();
		if($count<1){
			$stmt = $db->prepare("INSERT INTO `adminmaster`(`UserName`, `RoleID`, `EmailID`, `Password`, `Mobile`, `WhenEntered`, `EnteredBy`, `LastModified`, `ModifiedBy`, `WhenDeactivated`, `DeactivatedBy`, `IsActive`, `Address`)
			VALUES (:username,:roleid,:email,:hash_password,:mobile,NOW(),:enteredby,NOW(),:Modby,:null,:null_1,:isactive,:address)");
			$RoleID='1';
			$Mobile='9870242880';
			$EnteredBy='9';
			$myNull = null;
			$IsActive='1';
			$Address='kalyan';

			$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
			$stmt->bindParam("roleid", $RoleID,PDO::PARAM_STR) ;
			$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
			$hash_password= hash('sha256', $password); //Password encryption
			$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
			$stmt->bindParam("mobile", $Mobile,PDO::PARAM_STR) ;
			$stmt->bindParam("enteredby", $EnteredBy,PDO::PARAM_STR) ;
			$stmt->bindParam("Modby", $EnteredBy,PDO::PARAM_STR) ;
			$stmt->bindParam('null', $myNull, PDO::PARAM_NULL);
			$stmt->bindParam('null_1', $myNull, PDO::PARAM_NULL);
			$stmt->bindParam("isactive", $IsActive,PDO::PARAM_STR) ;
			$stmt->bindParam("address", $Address,PDO::PARAM_STR) ;
			//$stmt->bindParam("name", $name,PDO::PARAM_STR) ;
			$stmt->execute();
			$uid=$db->lastInsertId(); // Last inserted row id
			$db = null;
			$_SESSION['uid']=$uid;
			return true;
		}else{
			$db = null;
			return false;
		}
	}
	catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/* User Details */
public function userDetails($uid)
{
try{
	$db = getDB();
	$stmt = $db->prepare("SELECT * FROM staff_ledger WHERE ID=:id");
	$stmt->bindParam("id", $uid,PDO::PARAM_INT);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_OBJ);/*User data*/
	return $data;
}
catch(PDOException $e) {
  echo '{"error":{"text":'.$e->getMessage().'}}';
  }
}
/* check patient */
public function checkpatient($fname,$lname,$contact,$gender){
		try{
			$db = getDB();
			$stmt = $db->prepare("SELECT * FROM patientregistrationmaster WHERE (FirstName=:fname AND LastName=:lname AND Mobile=:contact AND Gender=:sex)");
			$stmt->bindParam("fname", $fname,PDO::PARAM_STR) ;
			$stmt->bindParam("lname", $lname,PDO::PARAM_STR) ;
			$stmt->bindParam("contact", $contact,PDO::PARAM_STR) ;
			$stmt->bindParam("sex", $gender,PDO::PARAM_STR) ;
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			$db = null;
			if($count){
				return true;
			}else {
				return false;
			}
		}catch(PDOException $e) {}
}

/* patient details */
public function addPatient($fname,$mname,$lname,$email,$alt_contact,$gender,$marital_status,$age,$contact,$height,$weight,$address,$avatar,$avatar1,$bloodgroup,$ICE_name,$ICE_relation,$ICE_contact,$ICE_address,$med_history,$history,$AdminID,$GI_type,$GI_number){/*,$history){*/

				$db = getDB();
				
				$stmt=$db->prepare ("INSERT INTO `patientregistrationmaster`( PreFix, RegistrationID, FirstName, MiddleName, LastName, Email, Age, Gender, EnteredBy, WhenEntered, Mobile, IsActive, Address,avatar,avatar1) VALUES ( :prefix, :RegistrationID, :fname, :mname, :lname, :email, :age, :gender, :enteredby, NOW(), :mobile, :isactive, :address,:avatar,:avatar1)");
				/*echo "<script>console.log( 'Debug Objects: error in addPatient.php' );</script>";*/
			/*if($patient_type=="IPD"){$prefix="IPD";}elseif($patient_type=="OPD"){$prefix="OPD";}else{$prefix="OPD";}*/
				$prefix="R";
				$RoleID='1';
				/* $dts = new DateTime(); //this returns the current date time */
				/* $gender="male"; */
				$date=new DateTime(); /*this returns the current date time*/
				$result = $date->format('Y-m-d-H-i-s');
				$krr = explode('-',$result);
				$result = implode("",$krr);
				$RegID = ''.$prefix.''.$result.'';
				/* $Mobile='9870242880'; */
				/*$EnteredBy='9';*/
				$myNull = null;
				$IsActive='1';
				/* $age="50"; */
				/* $address="kalyan"; */
				$stmt->bindParam("prefix", $prefix,PDO::PARAM_STR) ;
				$stmt->bindParam("RegistrationID", $RegID,PDO::PARAM_STR) ;
				$stmt->bindParam("fname", $fname,PDO::PARAM_STR) ;
				$stmt->bindParam("mname", $mname,PDO::PARAM_STR) ;
				$stmt->bindParam("lname", $lname,PDO::PARAM_STR) ;
				$stmt->bindParam("age", $age,PDO::PARAM_STR) ;
				$stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
				$stmt->bindParam("mobile", $contact,PDO::PARAM_STR) ;
				$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
				$stmt->bindParam("address", $address,PDO::PARAM_STR) ;
				$stmt->bindParam("avatar", $avatar,PDO::PARAM_STR) ;
				$stmt->bindParam("enteredby", $AdminID,PDO::PARAM_STR) ;
				$stmt->bindParam("isactive", $IsActive,PDO::PARAM_STR) ;
        $stmt->bindParam("avatar1", $avatar1,PDO::PARAM_STR) ;
				$stmt->execute();
				$db = null;
				$db = getDB();
				$intopatdet=$db->prepare ("INSERT INTO `patientdetails`(`RegID`,`GI_type`,`GI_number`, `bloodgroup`, `height` , `weight`, `alternate_contact` , `marital_status`, `ice_name`, `ice_relation`, `ice_contact`, `ice_address`) VALUES ( :RegistrationID,:GI_type,:GI_number, :bloodgroup, :height, :weight, :alternate_contact, :marital_status, :ice_name, :ice_relation, :ice_contact, :ice_address)");
				$intopatdet->bindParam("RegistrationID", $RegID,PDO::PARAM_STR);
				$intopatdet->bindParam("bloodgroup", $bloodgroup,PDO::PARAM_STR);
				$intopatdet->bindParam("height", $height,PDO::PARAM_STR);
				$intopatdet->bindParam("weight", $weight,PDO::PARAM_STR);
				$intopatdet->bindParam("marital_status", $marital_status,PDO::PARAM_STR);
				$intopatdet->bindParam("alternate_contact", $alt_contact,PDO::PARAM_STR);
				$intopatdet->bindParam("ice_name", $ICE_name,PDO::PARAM_STR);
				$intopatdet->bindParam("ice_relation", $ICE_relation,PDO::PARAM_STR);
				$intopatdet->bindParam("ice_contact", $ICE_contact,PDO::PARAM_STR);
				$intopatdet->bindParam("ice_address", $ICE_address,PDO::PARAM_STR);
				$intopatdet->bindParam("GI_type", $GI_type,PDO::PARAM_STR);
				$intopatdet->bindParam("GI_number", $GI_number,PDO::PARAM_STR);
				/*$intopatdet->bindParam("ipd_opd", $patient_type,PDO::PARAM_STR);
				$intopatdet->bindParam("amount_deposit", $amount_deposit,PDO::PARAM_STR);*/
				$value =$intopatdet->execute();
				if($value){
					/*true  successfully registered patient*/
					$db = getDB();
					$stmt=$db->prepare ("SELECT prm.* FROM patientregistrationmaster AS prm ORDER BY `ID` DESC LIMIT 1");
					$value =$stmt->execute();
					if($value){
						$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
						$json=json_encode($results);
						return $json;
						}else{return "patient successfully registered";}

				}else{
					/*false 	not registered patient*/
					return "patient not registered";
				}
				$db = null;
				/* $regpatient=$userClass->PatientRegistration($fname,$lname,$email,$age,$contact,$height);
				if($regpatient){
				echo "<script>console.log( 'success' );</script>";
				}
				else{
				$echo="<script>console.log( 'Username or Email already exists' );</script>";
				} */

}

/* staff registration  */
public function addstaff($fname,$lname,$username,$password,$email,$contact,$gender,$martial_status,$dob,$designation,$address,$bloodgroup,$avatar,$ice_name,$ice_contact,$ice_address,$roleid,$bio_id,$user_id){//*,$history){*/
				$db = getDB();
				$stmt=$db->prepare ("INSERT INTO `staff_ledger`(`firstname`, `lastname`, `username`, `password`, `email`, `contact`, `gender`, `user_id`, `matitalstatus`, `dob`, `designation`, `address`, `bloodgroup`, `avatar`, `ice_name`, `ice_contact`, `ice_address` , enteredby , whenentered , isactive , roleid , `bio_id`) VALUES (:fname, :lname, :username, :password, :email, :contact, :gender, :user_id, :martial_status, :dob, :designation, :address, :bloodgroup, :avatar, :ice_name, :ice_contact, :ice_address, :enteredby, NOW(), :isactive, :roleid, :bio_id)");

				/*$RoleID='1';*/
				/* $dts = new DateTime(); //this returns the current date time */
				/* $gender="male"; */
				$date=new DateTime(); /*this returns the current date time*/
				$result = $date->format('Y-m-d-H-i-s');
				$krr = explode('-',$result);
				$result = implode("",$krr);
				/*$RegID = ''.$prefix.''.$result.'';*/
				/* $Mobile='9870242880'; */
				$EnteredBy='9';
				$myNull = null;
				$IsActive='1';
				/* $age="50"; */
				/* $address="kalyan"; */
				$stmt->bindParam("fname", $fname,PDO::PARAM_STR) ;
				$stmt->bindParam("lname", $lname,PDO::PARAM_STR) ;
				$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
				$hash_password= hash('sha256', $password); /*Password encryption*/
				$stmt->bindParam("password", $hash_password,PDO::PARAM_STR);
				$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
				$stmt->bindParam("contact", $contact,PDO::PARAM_STR) ;
				$stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
				$stmt->bindParam("user_id", $user_id,PDO::PARAM_STR) ;
				$stmt->bindParam("martial_status", $martial_status,PDO::PARAM_STR) ;
				$stmt->bindParam("dob", $dob,PDO::PARAM_STR) ;
				$stmt->bindParam("designation", $designation,PDO::PARAM_STR) ;
				$stmt->bindParam("address", $address,PDO::PARAM_STR) ;
				$stmt->bindParam("bloodgroup", $bloodgroup,PDO::PARAM_STR) ;
				$stmt->bindParam("avatar", $avatar,PDO::PARAM_STR) ;
				$stmt->bindParam("ice_name", $ice_name,PDO::PARAM_STR) ;
				$stmt->bindParam("ice_contact", $ice_contact,PDO::PARAM_STR) ;
				$stmt->bindParam("ice_address", $ice_address,PDO::PARAM_STR) ;
				$stmt->bindParam("enteredby", $EnteredBy,PDO::PARAM_STR) ;
				$stmt->bindParam("isactive", $IsActive,PDO::PARAM_STR) ;
				$stmt->bindParam("roleid", $roleid,PDO::PARAM_STR) ;
				$stmt->bindParam("bio_id", $bio_id,PDO::PARAM_STR) ;
				/*$stmt->execute();*/
				$value =$stmt->execute();
				if($value){
					/*true*/
					return "staff successfully registered";
				}else{
					/*false*/
					return "staff not registered";
				}
				$db = null;
				/*echo "<script>console.log( 'success' );</script>";*/
				/* $regpatient=$userClass->PatientRegistration($fname,$lname,$email,$age,$contact,$height);
				if($regpatient){echo "<script>console.log( 'success' );</script>";}
				else{$echo="<script>console.log( 'Username or Email already exists' );</script>";} */
}

/*Update Patient */
public function updatePatient($RegID,$fname,$lname,$email,$alt_contact,$gender,$marital_status,$age,$contact,$height,$weight,$address,$bloodgroup,$ICE_name,$ICE_relation,$ICE_contact,$ICE_address,$med_history,$history,$AdminID,$GI_type,$GI_number){

				$db = getDB();
				$stmt=$db->prepare ("UPDATE `patientregistrationmaster` SET `FirstName`=:fname,`LastName`=:lname,`Age`=:age,`Gender`=:gender,`Mobile`=:mobile,`Email`= :email,`Address`=:address,`LastModified`=NOW(),`ModifiedBy`=:enteredby  Where  `RegistrationID`=:RegistrationID");
				$myNull = null;
				$IsActive='1';
				$stmt->bindParam("RegistrationID", $RegID,PDO::PARAM_STR) ;
				$stmt->bindParam("fname", $fname,PDO::PARAM_STR) ;
				$stmt->bindParam("lname", $lname,PDO::PARAM_STR) ;
				$stmt->bindParam("age", $age,PDO::PARAM_STR) ;
				$stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
				$stmt->bindParam("mobile", $contact,PDO::PARAM_STR) ;
				$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
				$stmt->bindParam("address", $address,PDO::PARAM_STR) ;
				$stmt->bindParam("enteredby", $AdminID,PDO::PARAM_STR) ;
				$stmt->execute();
				$db = null;
				$db = getDB();
				$intopatdet=$db->prepare ("INSERT INTO `patientdetails`
          (`bloodgroup`,
            `height`,
            `weight`,
          `marital_status`,
          `alternate_contact`,
          `ice_name`,
          `ice_relation`,
          `ice_contact`,
          `ice_address`,
          `GI_type`,
          `GI_number`,
          `history`,
          `med_history_detail`,
          `RegID`)
        VALUES (
          :dup_bloodgroup,
          :dup_height,
          :dup_weight,
          :dup_marital_status,
          :dup_alternate_contact,
        :dup_ice_name,
        :dup_ice_relation,
        :dup_ice_contact,
        :dup_ice_address,
        :dup_GI_type,
        :dup_GI_number,
        :dup_history,
        :dup_med_history_detail,
        :dup_RegID)
        ON DUPLICATE KEY UPDATE `bloodgroup`=:bloodgroup,`height`=:height,`weight`=:weight,`marital_status`=:marital_status,`alternate_contact`=:alternate_contact,`ice_name`=:ice_name,`ice_relation`=:ice_relation,`ice_contact`=:ice_contact,
        `ice_address`=:ice_address,
        `GI_type`=:GI_type,`GI_number`=:GI_number,`history`=:history,`med_history_detail`=:med_history_detail");
				//$intopatdet->bindParam("RegID", $RegID);
				$intopatdet->bindParam("bloodgroup", $bloodgroup);
				$intopatdet->bindParam("height", $height);
				$intopatdet->bindParam("weight", $weight);
				$intopatdet->bindParam("marital_status", $marital_status);
				$intopatdet->bindParam("alternate_contact", $alt_contact);
				$intopatdet->bindParam("ice_name", $ICE_name);
				$intopatdet->bindParam("ice_relation", $ICE_relation);
				$intopatdet->bindParam("ice_contact", $ICE_contact);
				$intopatdet->bindParam("ice_address", $ICE_address);
				$intopatdet->bindParam("GI_type", $GI_type);
				$intopatdet->bindParam("GI_number", $GI_number);
				$intopatdet->bindParam("history", $med_history);
				$intopatdet->bindParam("med_history_detail", $history);

        $intopatdet->bindParam("dup_RegID", $RegID);
				$intopatdet->bindParam("dup_bloodgroup", $bloodgroup);
				$intopatdet->bindParam("dup_height", $height);
				$intopatdet->bindParam("dup_weight", $weight);
				$intopatdet->bindParam("dup_marital_status", $marital_status);
				$intopatdet->bindParam("dup_alternate_contact", $alt_contact);
				$intopatdet->bindParam("dup_ice_name", $ICE_name);
				$intopatdet->bindParam("dup_ice_relation", $ICE_relation);
				$intopatdet->bindParam("dup_ice_contact", $ICE_contact);
				$intopatdet->bindParam("dup_ice_address", $ICE_address);
				$intopatdet->bindParam("dup_GI_type", $GI_type);
				$intopatdet->bindParam("dup_GI_number", $GI_number);
				$intopatdet->bindParam("dup_history", $med_history);
				$intopatdet->bindParam("dup_med_history_detail", $history);

				$value =$intopatdet->execute();
				if($value){
					/*true*///successfully registered patient
					$db = getDB();
					$stmt=$db->prepare ("SELECT prm.RegistrationID FROM patientregistrationmaster AS prm ORDER BY `ID` DESC LIMIT 1");
					$value =$stmt->execute();
					if($value){
						$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
						$json=json_encode($results);
						return $json;
						}else{return "patient successfully Updated";}
				}else{
					/*false //not registered patient*/
					return "patient not Updated";
				}
				$db = null;
}

/* Update staff */
public function updatestaff($staffid,$fname,$lname,$password,$email,$contact,$martial_status,$dob,$gender,$designation,$address,$bloodgroup,$avatar,$ice_name,$ice_relation,$ice_contact,$ice_address,$roleid,$bio_id,$user_id){//*,$history){*/
				$db = getDB();
				if($avatar=="0"){
					if($password==""){
							$stmt=$db->prepare ("Update `staff_ledger` SET `firstname`=:fname, `lastname`= :lname, `email`= :email, `contact`=:contact, `matitalstatus`= :martial_status, `dob`= :dob,`gender`=:gender, `designation`= :designation, `address`= :address, `bloodgroup`= :bloodgroup, `ice_name`= :ice_name,`ice_relation`=:ice_relation `ice_contact`=:ice_contact, `ice_address`= :ice_address, `ModifiedBy`= :enteredby, `WhenModified`=NOW() , isactive= :isactive, roleid= :roleid, `bio_id`=:bio_id, `user_id`=:user_id Where `StaffID`=:staffid");
						}else{
							$stmt=$db->prepare ("Update `staff_ledger` SET `firstname`=:fname, `lastname`= :lname, `email`= :email, `contact`=:contact, `matitalstatus`= :martial_status, `dob`= :dob,`gender`=:gender, `designation`= :designation, `address`= :address, `bloodgroup`= :bloodgroup, `ice_name`= :ice_name,`ice_relation`=:ice_relation ,`ice_contact`=:ice_contact, `ice_address`= :ice_address, `ModifiedBy`= :enteredby, `WhenModified`=NOW() , `isactive`=:isactive, `roleid`= :roleid, `password`=:password,`bio_id`=:bio_id, `user_id`=:user_id Where `StaffID`=:staffid");
							//$hash_password= hash('sha256', $password); /*Password encryption*/
							$stmt->bindParam("password", $password,PDO::PARAM_STR);
						}


					/*$RoleID='1';*/
					/* $dts = new DateTime(); //this returns the current date time */
					/* $gender="male"; */
					$date=new DateTime(); /*this returns the current date time*/
					$result = $date->format('Y-m-d-H-i-s');
					$krr = explode('-',$result);
					$result = implode("",$krr);
					/*$RegID = ''.$prefix.''.$result.'';*/
					/* $Mobile='9870242880'; */
					$EnteredBy='9';
					$myNull = null;
					$IsActive='1';
					/* $age="50"; */
					/* $address="kalyan"; */
					$stmt->bindParam("fname", $fname,PDO::PARAM_STR) ;
					$stmt->bindParam("lname", $lname,PDO::PARAM_STR) ;
					//$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
					//$stmt->bindParam("password", $hash_password,PDO::PARAM_STR);
					$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
					$stmt->bindParam("contact", $contact,PDO::PARAM_STR) ;
					$stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
					$stmt->bindParam("martial_status", $martial_status,PDO::PARAM_STR) ;
					$stmt->bindParam("dob", $dob,PDO::PARAM_STR) ;
					$stmt->bindParam("designation", $designation,PDO::PARAM_STR) ;
					$stmt->bindParam("address", $address,PDO::PARAM_STR) ;
					$stmt->bindParam("bloodgroup", $bloodgroup,PDO::PARAM_STR) ;
					$stmt->bindParam("ice_name", $ice_name,PDO::PARAM_STR) ;
					$stmt->bindParam("ice_contact", $ice_contact,PDO::PARAM_STR) ;
					$stmt->bindParam("ice_relation", $ice_relation,PDO::PARAM_STR) ;
					$stmt->bindParam("ice_address", $ice_address,PDO::PARAM_STR) ;
					$stmt->bindParam("enteredby", $EnteredBy,PDO::PARAM_STR) ;
					$stmt->bindParam("isactive", $IsActive,PDO::PARAM_STR) ;
					$stmt->bindParam("roleid", $roleid,PDO::PARAM_STR) ;
					$stmt->bindParam("staffid", $staffid,PDO::PARAM_STR) ;
					$stmt->bindParam("bio_id", $bio_id,PDO::PARAM_STR);
					$stmt->bindParam("user_id", $user_id,PDO::PARAM_STR);
					/*$stmt->execute();*/
					$value =$stmt->execute();
				}else{

					if($password==""){
							$stmt=$db->prepare ("Update `staff_ledger` SET `firstname`=:fname, `lastname`= :lname, `email`= :email, `contact`=:contact, `matitalstatus`= :martial_status, `dob`= :dob, `designation`= :designation, `address`= :address, `bloodgroup`= :bloodgroup, `ice_name`= :ice_name, `ice_contact`=:ice_contact, `ice_address`= :ice_address, `ModifiedBy`= :enteredby, `WhenModified`=NOW() , isactive= :isactive, roleid= :roleid , `ice_relation`=:relation, `avatar`=:avatar,`bio_id`=:bio_id, `user_id`=:user_id  Where `StaffID`=:staffid");
						}else{
							$stmt=$db->prepare ("Update `staff_ledger` SET `firstname`=:fname, `lastname`= :lname, `email`= :email, `contact`=:contact, `matitalstatus`= :martial_status, `dob`= :dob, `designation`= :designation, `address`= :address, `bloodgroup`= :bloodgroup, `ice_name`= :ice_name, `ice_contact`=:ice_contact, `ice_address`= :ice_address, `ModifiedBy`= :enteredby, `WhenModified`=NOW() , isactive= :isactive, roleid= :roleid, password=:password, `avatar`=:avatar,`ice_relation`=:relation, `bio_id`=:bio_id, `user_id`=:user_id Where `StaffID`=:staffid");
							//$hash_password= hash('sha256', $password); /*Password encryption*/
							$stmt->bindParam("password", $password,PDO::PARAM_STR);
						}
				/* $stmt=$db->prepare ("Update `staff_ledger` SET `firstname`=:fname, `lastname`= :lname, `username`= :username, `email`= :email, `contact`=:contact, `gender`=:gender, `matitalstatus`= :martial_status, `dob`= :dob, `designation`= :designation, `address`= :address, `bloodgroup`= :bloodgroup, `avatar`= :avatar, `ice_name`= :ice_name, `ice_contact`=:ice_contact, `ice_address`= :ice_address,`ice_relation`:relation, `ModifiedBy`= :enteredby, `WhenMofified`=NOW() , isactive= :isactive, roleid= :roleid Where `StaffID`=:staffid"); */

				/*$RoleID='1';*/
				/* $dts = new DateTime(); //this returns the current date time */
				/* $gender="male"; */
				$date=new DateTime(); /*this returns the current date time*/
				$result = $date->format('Y-m-d-H-i-s');
				$krr = explode('-',$result);
				$result = implode("",$krr);
				/*$RegID = ''.$prefix.''.$result.'';*/
				/* $Mobile='9870242880'; */
				$EnteredBy='9';
				$myNull = null;
				$IsActive='1';
				$relation='1';
				/* $age="50"; */
				/* $address="kalyan"; */

				$stmt->bindParam("fname", $fname,PDO::PARAM_STR) ;
				$stmt->bindParam("lname", $lname,PDO::PARAM_STR) ;
				//$stmt->bindParam("username", $username,PDO::PARAM_STR) ;

				$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
				$stmt->bindParam("contact", $contact,PDO::PARAM_STR) ;
				//$stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
				$stmt->bindParam("martial_status", $martial_status,PDO::PARAM_STR) ;
				$stmt->bindParam("dob", $dob,PDO::PARAM_STR) ;
				$stmt->bindParam("designation", $designation,PDO::PARAM_STR) ;
				$stmt->bindParam("address", $address,PDO::PARAM_STR) ;
				$stmt->bindParam("bloodgroup", $bloodgroup,PDO::PARAM_STR) ;
				$stmt->bindParam("avatar", $avatar,PDO::PARAM_STR) ;
				$stmt->bindParam("ice_name", $ice_name,PDO::PARAM_STR) ;
				$stmt->bindParam("relation", $relation,PDO::PARAM_STR) ;
				$stmt->bindParam("ice_contact", $ice_contact,PDO::PARAM_STR) ;
				$stmt->bindParam("ice_address", $ice_address,PDO::PARAM_STR) ;
				$stmt->bindParam("enteredby", $EnteredBy,PDO::PARAM_STR) ;
				$stmt->bindParam("isactive", $IsActive,PDO::PARAM_STR) ;
				$stmt->bindParam("roleid", $roleid,PDO::PARAM_STR) ;
				$stmt->bindParam("staffid", $staffid,PDO::PARAM_STR) ;
				$stmt->bindParam("bio_id", $bio_id,PDO::PARAM_STR);
				$stmt->bindParam("user_id", $user_id,PDO::PARAM_STR);
				///*$stmt->execute();*/
				$value = $stmt->execute();
				}
				if($value){
					/*true*/
					//echo "staff updated";
					return true;
				}else{
					/*false*/
					//echo "staff not updated";
					echo false;
				}
				$db = null;
}


}
?>
