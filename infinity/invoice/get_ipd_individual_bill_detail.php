<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$form=$_GET;
if(isset($form['reciept_id'])){

$ipd_bill_recieptID=base64_decode($form['reciept_id']);
$db = getDB();
$Test=array();
		$statement=$db->prepare("SELECT ibp.particulars,ibp.amount,ibp.amount,ibp.no_of_days FROM `ipd_bill_particulars` AS ibp
									WHERE ibp.instance_id=:ipd_bill_recieptID");
		$statement->bindParam(':ipd_bill_recieptID',$ipd_bill_recieptID , PDO::PARAM_STR );
		$statement->execute();
		$result=$statement->fetchAll(PDO::FETCH_ASSOC );
		foreach ($result as $row1){
			//$item = array ("Test"=>$row1['PatientId']);
			$Test[]=array(	'particulars'=>$row1['particulars'],
							'amount'=>$row1['amount'],
							'days'=>$row1['no_of_days'],
							);
	}
$json=json_encode($Test);
echo $json;								
}else{
	echo "no response";
}							

$db=null;
?>