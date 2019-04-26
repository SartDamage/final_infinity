<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$pat_id=$_POST['ID'];
$db = getDB();

$statement1=$db->prepare("SELECT * from reimbursement_receipt where instance_id=:pat_id");
$statement1->bindParam(':pat_id', $pat_id);
$statement1->execute();
$results1=$statement1->fetchAll(PDO::FETCH_ASSOC);
//$json1=json_encode($results1);
//return $json;
$parent = array() ;

foreach ($results1 as $row){
  $Test=array();

$statement=$db->prepare("SELECT * from reimbursement_rcpt_particulars where instance_id=:pat_id");
$statement->bindParam(':pat_id', $pat_id);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
foreach ($results as $row1){
  //$item = array ("Test"=>$row1['PatientId']);
  $Test[]=array(	'no_of_days'=>$row1['no_of_days'],
          'amount'=>$row1['amount'],
          'particulars'=>$row1['particulars'],
          );
}
$parent[]=array(
    "ID"=>$row['ID'],
    "recieptID"=>$row['recieptID'],
    "instance_id"=>$row['instance_id'],
    "Registered_ID"=>$row['Registered_ID'],
    "amount"=>$row['amount'],
    "paid"=>$row['paid'],
    "discount"=>$row['discount'],
    "balance"=>$row['balance'],
    "payment_type"=>$row['payment_type'],
    "cheque_no"=>$row['cheque_no'],
    "electronic_id"=>$row['electronic_id'],
    "WhenEntered"=>$row['WhenEntered'],
    "Test"=>$Test,
    "authorized_doctor"=>$row['authorized_doctor'],
    "remark"=>$row['remark']
     );

}
$json=json_encode($parent);
echo $json;

$db=null;

?>
