<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$type_id="";
	$form = $_POST;
		if(isset($form['ctl00_AdminID'])){
		$AdminID=$form['ctl00_AdminID'];
		$category_main=$form["category_main"];
		$category_type=$form["category_type"];
		$brand=$form["brand"];
		$model=$form["model"];
		$vendor=$form["vendor"];
		$department=$form["department"];
		$comment=$form["comment"];
		$no_of_units=$form["units"];
		$unit_price=$form["unit_price"];
		//$condition_stock=$form["condition_stock"];
		$condition_stock="test";
		$batch_no=$form["batch_no"];
		$exp_date=$form["exp_date"];

		if(isset($form['ctl00_type_ID'])){
			$type_id=$form['ctl00_type_ID'];
		}
		$unix_timestamp=time();
//echo($unix_timestamp . "<br>");
//echo(date("Y-m-d",$t));
	}

	//$bed_name=$form['ctl00_bed_name'];
	$db = getDB();
	/* if($type_id<>""){
		$statement=$db->prepare("UPDATE `stock_type` SET `category`=:stock_category, `type`=:type_name , `WhenModified`=NOW(),`ModifiedBy`=:AdminID WHERE `ID`=:type_id");

		$statement->bindParam(':AdminID', $AdminID, PDO::PARAM_STR);
		$statement->bindParam(':stock_category', $category_main, PDO::PARAM_STR);
		$statement->bindParam(':type_name', $type_name, PDO::PARAM_STR);
		$statement->bindParam(':type_id', $type_id, PDO::PARAM_STR);
	}else{ */
		$statement=$db->prepare("INSERT INTO `stock_individual`
					(`category`, `type`, `brand`, `model_no`,`vendor`, `department`, `comment`, `number_stock`, `price`, `condition_stock`,`unix_timestamp`,`batch_no`,`exp_date`,
					`EnteredBy`,`WhenEntered`)
			VALUES  (
			:category_main,:category_type,:vendor,:brand,:model,:department,:comment,:units,:price,:condition_stock,:unix_timestamp,:batch_no,:exp_date,

			:EnteredBy,NOW())");

		$statement->bindParam(':EnteredBy', $AdminID, PDO::PARAM_STR);
		$statement->bindParam(':category_main', $category_main, PDO::PARAM_STR);
		$statement->bindParam(':category_type', $category_type, PDO::PARAM_STR);
		$statement->bindParam(':vendor',$vendor, PDO::PARAM_STR);
		$statement->bindParam(':brand',$brand, PDO::PARAM_STR);
		$statement->bindParam(':model',$model, PDO::PARAM_STR);
		$statement->bindParam(':department',$department, PDO::PARAM_STR);
		$statement->bindParam(':comment',$comment, PDO::PARAM_STR);
		$statement->bindParam(':units',$no_of_units, PDO::PARAM_STR);
		$statement->bindParam(':price',$unit_price, PDO::PARAM_STR);
		$statement->bindParam(':condition_stock',$condition_stock, PDO::PARAM_STR);
		$statement->bindParam(':unix_timestamp',$unix_timestamp, PDO::PARAM_STR);
		$statement->bindParam(':batch_no',$batch_no, PDO::PARAM_STR);
		$statement->bindParam(':exp_date',$exp_date, PDO::PARAM_STR);
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
