<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['dr_ID'])):
    $dr_ID = $_GET['dr_ID'];
	//$statement=$db->prepare("SELECT * FROM `bed_number` AS bn JOIN bed_type AS bt ON bt.ID = bn.bed_type where bn.bed_type=:dr_ID");
	$statement=$db->prepare("SELECT bn.ID,wd.ward_name,bn.`bed_name`,bn.`bed_status`,bn.`ward_id`,bt.`bed_type`,bt.`bed_charges` FROM `bed_number` AS bn JOIN bed_type AS bt ON bt.`ID` = bn.`bed_type` JOIN ward_details AS wd ON wd.ID=bn.ward_id where bn.`bed_type`=:dr_ID AND bn.`bed_status`='0' AND bn.`IsActive`='1' ORDER by wd.ward_name ASC");
	$statement->bindParam(':dr_ID', $dr_ID, PDO::PARAM_INT);
	$statement->execute();
	$results=$statement->fetchAll();
	$json = [];
	$Test = [];
	$json=json_encode($results);
		foreach ($results as $row1){
			//$item = array ("Test"=>$row1['PatientId']);
			$ward_name = substr($row1['ward_name'],0,3);
			$bed_type = substr($row1['bed_type'],0,3);
			$Test[] = array(	'bed_name'=>$ward_name."-".$bed_type."-0".$row1['bed_name'],
							'charges'=>$row1['bed_charges'],
							'ID'=>$row1['ID'],
							'status'=>$row1['bed_status'],
							'ward_id'=>$row1['ward_id'],
							'ward_name'=>$row1['ward_name'],
							'bed_type'=>$row1['bed_type'],
							);
							}
	/* foreach($results as $row) {
    $id = $row['PathologySubCategoryID'];
    $content = $row['PathologySubCategoryName'];
	echo $id;
	echo $content;
	} */
	//return $json;
	echo json_encode($Test);
	
	$db=null;
endif;
?>