<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
if (isset($_GET['value_active'])):
	$FORM = $_GET;
    $quickVar1a = $FORM['value_active'];
    $pathodrID = $FORM['dr_ID'];
    $admin_ID = $FORM['admin_ID'];
    $statement=$db->prepare("UPDATE pathologysubcategorymaster SET IsActive = :quickVar1a,WhenDeactivated=NOW(),DeactivatedBy=:admin_ID where PathologySubCategoryID=:pathodrID;"); 
	$statement->bindParam(':quickVar1a', $quickVar1a, PDO::PARAM_INT);
	$statement->bindParam(':pathodrID', $pathodrID, PDO::PARAM_INT);
	$statement->bindParam(':admin_ID', $admin_ID, PDO::PARAM_INT);
	$statement->execute();
	$db=null;
	$db = getDB();
	$stmt=$db->prepare("SELECT pda.IsActive FROM pathologysubcategorymaster AS pda WHERE pda.PathologySubCategoryID=:pathodrID1");
	$stmt->bindParam(':pathodrID1', $pathodrID, PDO::PARAM_INT);
	$stmt->execute();
	$results=$stmt->fetch(PDO::FETCH_ASSOC);
	$json=json_encode($results);
	//return $json;
	echo $json;
	$db=null;
endif;
?>