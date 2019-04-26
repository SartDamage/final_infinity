<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$form=$_GET;
if(isset($form['reciept_id'])){

//$ipd_bill_recieptID=base64_decode($form['ID']);
$ipd_bill_recieptID=base64_decode($form['reciept_id']);
$db = getDB();
$Test=array();
		$statement=$db->prepare("SELECT ibp.payment_type,ibp.transaction_id,ibp.cheque_no, ibp.total,ibp.amount_paid,ibp.discount FROM `advance_ipd_record` AS ibp
									WHERE ibp.recieptID=:ipd_bill_recieptID");
		$statement->bindParam(':ipd_bill_recieptID',$ipd_bill_recieptID , PDO::PARAM_STR );
		$statement->execute();
		$result=$statement->fetchAll(PDO::FETCH_ASSOC );
		foreach ($result as $row1){
			//$item = array ("Test"=>$row1['PatientId']);
			$Test[]=array(	'amount'=>(int)$row1['total'],
							'amount_sub'=>(int)$row1['total']-(int)$row1['discount'],
							'paid'=>(int)$row1['amount_paid'],
							'discount'=>(int)$row1['discount'],
							'due'=>(int)$row1['total']-(int)$row1['discount']-(int)$row1['amount_paid'],
							'payment_type'=>$row1['payment_type'],
							'cheque_no'=>$row1['cheque_no'],
							'transaction_id'=>$row1['transaction_id'],
							);
	}
$json=json_encode($Test);
echo $json;								
}else{
	echo "no response";
}							

$db=null;
?>