<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$ID=$_GET['ID'];
		try{
			$db = getDB();
			$stmt = $db->prepare("SELECT * FROM `patientopd` AS popd 
	INNER JOIN patientdetails AS pd ON popd.RegID=pd.RegID 
    INNER JOIN patientregistrationmaster AS prm ON pd.RegID=prm.RegistrationID
    WHERE popd.patientID=:ID");
			$stmt->bindParam("ID", $ID,PDO::PARAM_STR) ;
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