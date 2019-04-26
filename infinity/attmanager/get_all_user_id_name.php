<?php
	include $_SERVER['DOCUMENT_ROOT']."/include/conection.php";
	include $_SERVER['DOCUMENT_ROOT']."/session.php";
	include $_SERVER['DOCUMENT_ROOT']."/include/global_variable.php";

	
 	$db = getDB();
	$statement=$db->prepare("SELECT * from staff_ledger");
	$statement->execute();
	$results=$statement->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($results);
		
		
		
		
	?>