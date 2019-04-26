<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$pat_id=$_POST['ID'];
$db = getDB();

$statement1=$db->prepare("SELECT * from demo_receipt where patientID=:pat_id");
$statement1->bindParam(':pat_id', $pat_id);
$statement1->execute();
$results1=$statement1->fetchAll(PDO::FETCH_ASSOC);
//$json1=json_encode($results1);
//return $json;
$parent = array() ;

foreach ($results1 as $row){
  $Test=array();

$statement=$db->prepare("SELECT * from demo_receipt_particular where patientID=:pat_id");
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
    "patientID"=>$row['patientID'],
    "registrationID"=>$row['registrationID'],
    "total"=>$row['total'],
    "amount_paid"=>$row['amount_paid'],
    "discount"=>$row['discount'],
    "balance"=>$row['balance'],
    "payment_type"=>$row['payment_type'],
    "cheque_no"=>$row['cheque_no'],
    "transaction_id"=>$row['transaction_id'],
    "WhenEntered"=>$row['WhenEntered'],
    "authorized_doctor"=>$row['authorized_doctor'],
    "remark"=>$row['remark'],
    "Test"=>$Test);

}
$json=json_encode($parent);
echo $json;

$db=null;

?>
