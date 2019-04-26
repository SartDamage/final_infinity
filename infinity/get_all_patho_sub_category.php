<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
$statement=$db->prepare("SELECT pscm.PathologySubCategoryID,pscm.PathologySubCategoryName,pscm.PathologyCategoryID,pscm.PathologyTestCharges,pscm.WhenEntered,pscm.EnteredBy,pscm.IsActive,pcm.PathologyCategoryName FROM `pathologysubcategorymaster` AS pscm  LEFT JOIN pathologycategorymaster AS pcm ON pscm.PathologyCategoryID = pcm.PathologyCategoryID where 1");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;
?>