<?php
 include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
//include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
 
//echo "1349";

	
$db = getDB();
$statement=$db->prepare("SELECT * from attendance_manager order by att_time ASC");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
//return $json;
echo $json;
$db=null;

?>