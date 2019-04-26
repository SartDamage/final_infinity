<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
	$type_id="";
	$form = $_POST;
		if(isset($form['date'])){
		$fromdate=$form['date'];
		$todate=$form['date2'];
		$holidayname=$form["holidayname"];
		if(isset($form['comment']))
		{
		$comment=$form['comment'];
		}
		else{
			$comment="public holiday";
			}
				
	}
	
	$db = getDB();
	
		$statement=$db->prepare("INSERT INTO `public_holidays` 
					(`holiday_name`, `fromdate`,`todate`, `comment`, `asignedon`) 
			VALUES  (
			:category_main,:category_type,:vendor,:brand,NOW())");
			
		
		$statement->bindParam(':category_main', $holidayname, PDO::PARAM_STR);
		$statement->bindParam(':category_type', $fromdate, PDO::PARAM_STR);
		$statement->bindParam(':brand',$comment, PDO::PARAM_STR);
		
		$statement->bindParam(':vendor',$todate, PDO::PARAM_STR);
	
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