<?php
include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
$userDetails=$userClass->userDetails($session_id);
$currdate=date("Y-m-d");
$valufrompost=$_POST['uid'];
//$valufrompost=10019;
$db = getDB();
$statement=$db->prepare("SELECT * from paid_leave_user where useridl=:idfrompost ORDER BY fromdate DESC");
$statement->bindParam(':idfrompost', $valufrompost, PDO::PARAM_STR);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;

$db=null;
?>