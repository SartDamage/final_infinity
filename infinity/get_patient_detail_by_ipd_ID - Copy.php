<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
if (isset($_GET['ID'])){
$ID=$_GET['ID'];
if(!isset($_GET['IDnormal'])){
	$ID=base64_decode($ID);
}else{$ID=$_GET['IDnormal'];}

}else{$ID="";echo "No input ID";}
		try{
			$db = getDB();/* popd.bed_type, */
			$stmt = $db->prepare("SELECT * FROM `pharmacy_bill` where recieptID=:ID");
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
			echo $json;
		}catch(PDOException $e) {echo $e;}

//return $json;
$db=null;
?>