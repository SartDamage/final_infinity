<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['dr_ID'])):
    $dr_ID = $_GET['dr_ID'];
	$statement=$db->prepare("SELECT pscm.PathologySubCategoryID,pscm.PathologySubCategoryName,pscm.PathologyCategoryID,pscm.PathologyTestCharges,pscm.WhenEntered,pscm.EnteredBy,pscm.IsActive,pcm.PathologyCategoryName FROM `pathologysubcategorymaster` AS pscm  LEFT JOIN pathologycategorymaster AS pcm ON pscm.PathologyCategoryID = pcm.PathologyCategoryID where pscm.PathologyCategoryID=:dr_ID");
	$statement->bindParam(':dr_ID', $dr_ID, PDO::PARAM_INT);
	$statement->execute();
	$results=$statement->fetchAll();
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