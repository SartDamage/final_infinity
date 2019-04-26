<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$form=$_GET;
if(isset($form['reciept_id'])){

if(!isset($form['sms'])){
	$ipd_bill_recieptID=base64_decode($form['reciept_id']);
}else{$ipd_bill_recieptID=$form['reciept_id'];}/* added later foe sms */
$db = getDB();
$Test=array();
		$statement=$db->prepare("SELECT ibp.WhenModified,ibp.payment_type,ibp.cheque_no,ibp.electronic_id, ibp.advance, ibp.amount, ibp.paid, ibp.discount FROM `ipd_bill` AS ibp
									WHERE ibp.instance_id=:ipd_bill_recieptID");
		$statement->bindParam(':ipd_bill_recieptID',$ipd_bill_recieptID , PDO::PARAM_STR );
		$statement->execute();
		$result=$statement->fetchAll(PDO::FETCH_ASSOC );
		foreach ($result as $row1){
			
			//$item = array ("Test"=>$row1['PatientId']);
			 $Test[]=array(	'advance'=>(int)$row1['advance'],
							'amount'=>(int)$row1['amount'],
							'amount_sub'=>(int)$row1['amount']-(int)$row1['discount'],
							'paid'=>(int)$row1['paid'],
							'payment_type'=>$row1['payment_type'],
							'cheque_no'=>$row1['cheque_no'],
							'electronic_id'=>$row1['electronic_id'],
							'discount'=>(int)$row1['discount'],
							'total_paid'=>(int)$row1['paid']+(int)$row1['advance'],
							'due'=>(int)$row1['amount']-(int)$row1['discount']-(int)$row1['paid']-(int)$row1['advance'],
							'WhenModified'=>$row1['WhenModified']
							); 
							//echo json_encode($row1);
	}
	$json=json_encode($Test);
	echo $json;								
}else{
	echo "no response";
}							

$db=null;
?>