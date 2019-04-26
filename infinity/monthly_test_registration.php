<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
		try{
			$db = getDB();
			$stmt = $db->prepare("(SELECT DAY(WhenEntered),MONTHNAME(WhenEntered),count(ID) FROM pathology_reciepts GROUP BY YEAR(WhenEntered),MONTH(WhenEntered),DAY(WhenEntered) LIMIT 30)");
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetchALL(PDO::FETCH_ASSOC);
					$Test=array();
					foreach ($data as $row1){
			//$item = array ("Test"=>$row1['PatientId']);
			$Test[]=array(	'date'=>$row1['DAY(WhenEntered)']."-".$row1['MONTHNAME(WhenEntered)'],
							'count'=>$row1['count(ID)'],
							);
							}						
			$db = null;
			if($count){
				$json=json_encode($Test);
			}else {
				$json=false;
			}
		}catch(PDOException $e) {}
print $json;
//return $json;
$db=null;
?>