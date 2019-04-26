<?php
 include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
//include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";



		$db = getDB();
		$statement=$db->prepare("SELECT * FROM `biometric_details` WHERE `token`='0'");

	$statement->execute();
	$results=$statement->fetchAll(PDO::FETCH_ASSOC);
	//var_dump($results);

	//print_r($json_results);
	foreach ($results as $key) {
		
		echo $key['uid'];
		echo ",";
		echo $key['user_id'];
		echo ",";
		echo $key['name'];
	
		echo "/";
	

	}

	
?>