<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_GET;
	$sub_test=$form['sub_test'];
$db = getDB();
$statement=$db->prepare("SELECT * FROM `pathologysubcategorymaster` AS pscm LEFT JOIN pathologycategorymaster AS pcm ON pscm.`PathologyCategoryID`=pcm.`PathologyCategoryID` WHERE pscm.IsActive=1 AND pscm.`PathologySubCategoryID`=:p_s_c_m");
$statement->bindParam(':p_s_c_m', $sub_test, PDO::PARAM_INT);
/* $statement->execute(); */
if ($statement->execute() && ($statement->rowCount()>0))
   {/* Update worked because query affected X amount of rows. */
	$results=$statement->fetch(PDO::FETCH_ASSOC);
	$json=json_encode($results);
	//return $json;
	echo $json;
	}
else
    {
		echo false;
		$error = $statement->errorInfo();
}
//$results=$statement->fetch(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
//return true;
$db=null;
?>