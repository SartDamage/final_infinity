<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
if (isset($_POST['start']) && is_numeric($_POST['start'])  && is_int($_POST['start'] + 0)) {
  $start = (int) $_POST['start'];
}else{$start=1;}
$db = getDB();
$statement=$db->prepare("SELECT * FROM staff_ledger order by WhenEntered desc ");
//$statement->bindParam(':start', $start, PDO::PARAM_INT);
//$statement->bindParam(':rows',$limit_entries_per_page_all_user, PDO::PARAM_INT);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;
?>
