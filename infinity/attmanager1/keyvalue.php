<?php
 include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
//include $_SERVER['DOCUMENT_ROOT']."/session.php";
include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";
 
//echo "1349";

	
 	$db = getDB();
$statement=$db->prepare("SELECT MAX(position_key) from attendance_manager");

$statement->execute();
$results=$statement->fetch(PDO::FETCH_ASSOC);

foreach($results as $lastvalue)
{
	echo $lastvalue;
} 

?>