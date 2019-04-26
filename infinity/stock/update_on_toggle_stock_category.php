<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$db = getDB();
$form=$_GET;
$iscategory="";
if(isset($form['stock_category'])){
	$iscategory = $form['stock_category'];
}else{
    $iscategory="false";
}
    $quickVar1a = $form['value_active'];/*value to be set*/
    $pathodrID = $form['dr_ID'];/*id of the category ID*/	
	if (isset($form['value_active']) && $iscategory=="true"){
		$statement=$db->prepare("UPDATE `stock_category` SET isactive = :quickVar1a where ID=:pathodrID;"); 
		$statement->bindParam(':quickVar1a', $quickVar1a, PDO::PARAM_STR);
		$statement->bindParam(':pathodrID', $pathodrID, PDO::PARAM_STR);
		$statement->execute();
		$db=null;
		$db = getDB();
		$stmt=$db->prepare("SELECT sc.isactive FROM `stock_category` AS sc WHERE sc.ID=:pathodrID1");
		$stmt->bindParam(':pathodrID1', $pathodrID, PDO::PARAM_STR);
        }else if(isset($form['value_active']) && $iscategory == "false"){
		
		$statement=$db->prepare("UPDATE `stock_type` SET isactive = :quickVar1a where ID=:pathodrID;"); 
		$statement->bindParam(':quickVar1a', $quickVar1a, PDO::PARAM_STR);
		$statement->bindParam(':pathodrID', $pathodrID, PDO::PARAM_STR);
		$statement->execute();
		$db=null;
		$db = getDB();
		$stmt=$db->prepare("SELECT st.isactive FROM `stock_type` AS st WHERE st.ID=:pathodrID1");
		$stmt->bindParam(':pathodrID1', $pathodrID, PDO::PARAM_STR);		
        }else if(isset($form['value_active']) && $iscategory == "stock_individual"){
		
		$statement=$db->prepare("UPDATE `stock_individual` SET isActive = :quickVar1a where ID=:pathodrID;"); 
		$statement->bindParam(':quickVar1a', $quickVar1a, PDO::PARAM_STR);
		$statement->bindParam(':pathodrID', $pathodrID, PDO::PARAM_STR);
		$statement->execute();
		$db=null;
		$db = getDB();
		$stmt=$db->prepare("SELECT st.isActive FROM `stock_individual` AS st WHERE st.ID=:pathodrID1");
		$stmt->bindParam(':pathodrID1', $pathodrID, PDO::PARAM_STR);		
	}
	
	$stmt->execute();
	$results=$stmt->fetch(PDO::FETCH_ASSOC);
	$json=json_encode($results);
	//return $json;
	echo $json;
	
	$db=null;

?>