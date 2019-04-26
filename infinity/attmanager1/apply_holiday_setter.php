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
		$username=$form["holidayname"];
		$leavereason=$form["leavereason"];	
		$realattid=$form["idforprimary"];	
		if(isset($form['comment']))
		{
		$comment=$form['comment'];
		}
		else{
			$comment="Paid leave";
			}
				
	}
	$token=0;
	$db = getDB();
	
		$statement=$db->prepare("INSERT INTO `paid_leave_user` 
					(`useridl`, `name`,`leave_reason`, `fromdate`, `todate`,`comment`,`token` ) 
			VALUES  (
			:id,:name,:leavereason,:fromdate,:todate,:comments,:tokens)");
			
		
		$statement->bindParam(':id', $realattid, PDO::PARAM_STR);
		$statement->bindParam(':name', $username, PDO::PARAM_STR);
		$statement->bindParam(':leavereason',$leavereason, PDO::PARAM_STR);
		
		$statement->bindParam(':fromdate',$fromdate, PDO::PARAM_STR);
		$statement->bindParam(':comments',$comment, PDO::PARAM_STR);
		$statement->bindParam(':tokens',$token, PDO::PARAM_STR);
		
		
		$statement->bindParam(':todate',$todate, PDO::PARAM_STR);
	
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