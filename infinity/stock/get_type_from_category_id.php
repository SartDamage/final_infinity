<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$form=$_GET;
$db = getDB();
if (isset($form['dr_ID'])):
    $dr_ID = $form['dr_ID'];
	$statement=$db->prepare("SELECT st.*,st.isactive FROM `stock_type` AS st  LEFT JOIN stock_category AS sc ON st.category = sc.ID where st.category=:dr_ID AND st.isactive='1' AND sc.isactive='1'");
	$statement->bindParam(':dr_ID', $dr_ID, PDO::PARAM_INT);
	$statement->execute();
	$results=$statement->fetchAll(PDO::FETCH_ASSOC);
	$json = [];
	$json=json_encode($results);
	/* foreach($results as $row) {
    $id = $row['PathologySubCategoryID'];
    $content = $row['PathologySubCategoryName'];
	echo $id;
	echo $content;
	} */
	//return $json;
	echo $json;
	
	$db=null;
endif;
?>