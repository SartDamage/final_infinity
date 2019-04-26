<?php
include('./include/conection.php');
include('./session.php');
include('./include/global_variable.php');
$userDetails=$userClass->userDetails($session_id);
		try{
			$db = getDB();
			$stmt = $db->prepare("SELECT * FROM `daily_patient_count` as dpr WHERE 1"); 
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			$db = null;
			if($count){
				$json=json_encode($data);
			}else {
				$json=false;
			}
		}catch(PDOException $e) {}
echo $json;
//return $json;
$db=null;
?>