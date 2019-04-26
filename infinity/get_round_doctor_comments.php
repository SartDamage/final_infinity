<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
if (isset($_GET['ID'])){
$ID=$_GET['ID'];
}
else {
	$ID="";
}
//$ID=base64_decode($ID);

			//$dr_name="";
			$db = getDB();
			$stmt = $db->prepare("SELECT
			 * from round_doctor_comments WHERE `Patient_id`=:ID");
			$stmt->bindParam("ID", $ID,PDO::PARAM_STR);
			$stmt->execute();
			//$count=$stmt->rowCount();
			$data=$stmt->fetchAll(PDO::FETCH_OBJ);
			$json=json_encode($data);
			echo $json;
			$db = null;
?>
