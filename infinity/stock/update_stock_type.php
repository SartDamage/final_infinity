<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$form = $_GET;
	$update_price=$form['add_price_up'];
	$old_quantity=$form['add_quantity_upd'];
	$row_id=$form['add_type_ID'];
	$new_value=$form['add_new_quan'];

	$update_number_stock=$old_quantity+$new_value;


	//$type_id="";



	//$bed_name=$form['ctl00_bed_name'];
$db = getDB();

	$statement=$db->prepare("UPDATE `stock_individual` SET `number_stock`=:stock_newquan, `price`=:new_price , `WhenModified`=NOW() WHERE `ID`=:row_id");

	$statement->bindParam(':stock_newquan', $update_number_stock, PDO::PARAM_STR);
	$statement->bindParam(':new_price', $update_price, PDO::PARAM_STR);
	$statement->bindParam(':row_id', $row_id, PDO::PARAM_STR);



$statement->execute();
$count = $statement->rowCount();
//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
echo $count;
$db=null;
?>
