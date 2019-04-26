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
$paid = 0;
		$statement=$db->prepare("SELECT ibp.payment_type,ibp.transaction_id,ibp.cheque_no, ibp.total,ibp.amount_paid,ibp.discount FROM `advance_ipd_record` AS ibp
									WHERE ibp.patientID=:ipd_bill_recieptID");
		$statement->bindParam(':ipd_bill_recieptID',$ipd_bill_recieptID , PDO::PARAM_STR );
		$statement->execute();
		$result=$statement->fetchAll(PDO::FETCH_ASSOC );
		foreach ($result as $row1){
			//$item = array ("Test"=>$row1['PatientId']);
			$row_value=(int)$row1['amount_paid'];
			$paid+=$row_value;
	}
	if($paid!=""){}else{$paid="0";}
echo $paid;								
}else{
	echo "no response";
}							

$db=null;
?>