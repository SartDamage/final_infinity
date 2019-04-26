<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
		try{
			$db = getDB();
			$stmt = $db->prepare("(SELECT * FROM `daily_patient_count` as dpr order by ID desc LIMIT  0,:rows) ORDER BY ID asc");
			$stmt->bindParam(':rows',$no_of_entries_displayed_admin_dashboard_patient_count, PDO::PARAM_INT);
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetchALL(PDO::FETCH_OBJ);
			$db = null;
			if($count){
				$json=json_encode($data);
			}else {
				$json=false;
			}
		}catch(PDOException $e) {}
print $json;
//return $json;
$db=null;
?>