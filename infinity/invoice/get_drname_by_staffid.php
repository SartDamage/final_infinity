<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
if (isset($_GET['ID'])){
$ID=$_GET['ID'];
//$ID=base64_decode($ID);
}else{$ID="";echo "No input ID";}
		try{
			$dr_name="";
			$db = getDB();
			$stmt = $db->prepare("SELECT 
			 sf.firstname,sf.lastname from staff_ledger AS sf WHERE `ID`=:ID");
			$stmt->bindParam("ID", $ID,PDO::PARAM_STR) ;
			$stmt->execute();
			$count=$stmt->rowCount();
			//$data=$stmt->fetch(PDO::FETCH_OBJ);
			
			$db = null;
			while ($data=$stmt->fetch(PDO::FETCH_ASSOC)){
								$dr_name = $data['firstname']." ".$data['lastname'];
								echo $dr_name;
						}		
			
		}catch(PDOException $e) {echo $e;}

//return $json;
$db=null;
?>