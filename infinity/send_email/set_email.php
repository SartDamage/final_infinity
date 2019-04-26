<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$type_id="";
	$form = $_POST;
		if(isset($form['adminID'])){
		$AdminID=$form['adminID'];
		$label=base64_decode($form["label"]);
		$editor_frola=$form["editor_frola"];
}
	
	
	$db = getDB();
	/* if($type_id<>""){
		$statement=$db->prepare("UPDATE `stock_type` SET `category`=:stock_category, `type`=:type_name , `WhenModified`=NOW(),`ModifiedBy`=:AdminID WHERE `ID`=:type_id");
		
		$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
		$statement->bindParam(':stock_category', $category_main, PDO::PARAM_STR);
		$statement->bindParam(':type_name', $type_name, PDO::PARAM_STR);
		$statement->bindParam(':type_id', $type_id, PDO::PARAM_STR);
	}else{ */
		$sql = "UPDATE `adminpageconfigmaster` SET `$label`=:value";
		$statement=$db->prepare($sql);

		$statement->bindParam(':value',$editor_frola, PDO::PARAM_STR);
		//$statement->bindParam(':bed_name', $bed_name, PDO::PARAM_STR);
	/* }
 */
$statement->execute();
$count = $statement->rowCount();
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
echo $count;
$db=null;
?>