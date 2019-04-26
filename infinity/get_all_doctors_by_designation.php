<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['designation_get'])):
    $designation_get = $_GET['designation_get'];
	$statement=$db->prepare("SELECT st.`ID`,st.`firstname`,st.`lastname`,st.`designation`,st.`roleid` FROM `staff_ledger` AS st WHERE `IsActive`=1 and st.`designation`=:designation_get and st.roleid=2 order by st.`firstname` asc");
	$statement->bindParam(':designation_get', $designation_get, PDO::PARAM_INT);
	$statement->execute();
	$results=$statement->fetchAll();
	//$json = [];
	$Test = [];
	//$json=json_encode($results);
		foreach ($results as $row1){
			$Test[]=array(	'name'=>$row1['firstname']." ".$row1['lastname'],
							'designation'=>$row1['designation'],
							'ID'=>$row1['ID'],
							'RoleID'=>$row1['roleid'],
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