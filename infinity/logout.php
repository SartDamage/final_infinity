<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
	////inserting into log
	$userDetails=$userClass->userDetails($session_id);
	$usernameEmail=$userDetails->email;
	
try{
	//echo $usernameEmail;
	$db = getDB();
	$Activity="logged out successfully";
	$loginhistory="loginhistory";
	$statement=$db->prepare("INSERT INTO $loginhistory ( `EmailID`, `Logout_date`, `Activity`) VALUES (:usernameEmail,NOW(),:activity)");
	$statement->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
	$statement->bindParam("activity", $Activity,PDO::PARAM_STR) ;
	$statement->execute();
	$db = null;
	}
	catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}
//////////////////

 $session_uid='';
$_SESSION['uid']=''; 
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();

if(empty($session_uid) && empty($_SESSION['uid']))
{
	$url= $_SERVER['DOCUMENT_ROOT'].'/index.php';
//$url='index.php';
	header("Location:index.php");
/*//echo window.href=.$url.</script>;*/
}
?>