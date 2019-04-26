<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$pat_id=$_POST['ID'];
$db = getDB();

$statement1=$db->prepare("SELECT * from cashless_receipt where patientID=:pat_id");
$statement1->bindParam(':pat_id', $pat_id);
$statement1->execute();
$results1=$statement1->fetchAll(PDO::FETCH_ASSOC);
//$json1=json_encode($results1);
//return $json;
$parent = array() ;

foreach ($results1 as $row){
  $Test=array();

$statement=$db->prepare("SELECT * from cashless_receipt_particulars where patientID=:pat_id");
$statement->bindParam(':pat_id', $pat_id);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
//$json=json_encode($results);
//return $json;
//echo $json;
foreach ($results as $row1){
  //$item = array ("Test"=>$row1['PatientId']);
  $Test[]=array('amount'=>$row1['amount'],
          'particulars'=>$row1['particulars'],
          );
}
$parent[]=array(
    "ID"=>$row['ID'],
    "receiptID"=>$row['receiptID'],
    "patientID"=>$row['patientID'],
    "Registration_id"=>$row['Registration_id'],
    "comapny_name"=>$row['comapny_name'],
    "company_detail"=>$row['company_detail'],
    "policy_no"=>$row['policy_no'],
    "card_no_gmc"=>$row['card_no_gmc'],
    "AI_no"=>$row['AI_no'],
    "reg_no"=>$row['reg_no'],
    "lot_no"=>$row['lot_no'],
    "mfg_dt"=>$row['mfg_dt'],
    "exp_dt"=>$row['exp_dt'],
    "Hospital_reg_no"=>$row['Hospital_reg_no'],
    "WhenEntered"=>$row['WhenEntered'],
    "cost"=>$row['cost'],
    "authorized_doctor"=>$row['authorized_doctor'],
    "remark"=>$row['remark'],
    "Test"=>$Test);

}
$json=json_encode($parent);
echo $json;

$db=null;

?>
