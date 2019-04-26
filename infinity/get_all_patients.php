<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
/* if (isset($_POST['start']) && is_numeric($_POST['start'])  && is_int($_POST['start'] + 0)) {
  $start = (int) $_POST['start'];
}else{$start=1;} */
$form=$_POST;
if(isset($form['from_date'])){
  $from_date = $form['from_date'];
  //echo "in from date - ".$from_date;
}else{
  $from_date = date('Y-m-d',strtotime("-1 year"));
}
if(isset($form['to_date'])){
  if($form['to_date']==""){
    $to_date = date("Y-m-d");
  }else{
      $to_date = $form['to_date'];
  }
}else{
  $to_date = date("Y-m-d");
}

$dateTime = new DateTime($from_date);
$dateTime = $dateTime->format('Y-m-d');
$dateTime1 = new DateTime($to_date);
$dateTime1 = $dateTime1->format('Y-m-d');

$db = getDB();
$statement=$db->prepare("SELECT * FROM patientregistrationmaster AS prm where Date(`WhenEntered`)>=:from_date AND Date(`WhenEntered`) <=:to_date");

$statement->bindParam(':from_date', $dateTime);
$statement->bindParam(':to_date', $dateTime1);
/* $statement=$db->prepare("SELECT * FROM patientregistrationmaster order by WhenEntered desc LIMIT :start ,:rows");
$statement->bindParam(':start', $start, PDO::PARAM_INT);
$statement->bindParam(':rows',$limit_entries_per_page, PDO::PARAM_INT); */
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;

/*
$statement=$db->prepare("SELECT * FROM patientregistrationmaster AS prm where date(prm.WhenEntered) BETWEEN :frmdate and :todate");
$statement->bindParam(':frmdate', $frmdate);
$statement->bindParam(':todate', $todate);
*/
?>
