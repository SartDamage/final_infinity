<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($_SESSION['id']);

$form = $_POST;
		
		$id=$form['id'];
                $db = getDB();
          
                $stmt=$db->prepare ("SELECT * from `certificate_details`");
              /*}*/
              $stmt->execute();
              $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
              $json=json_encode($results);
              //return $json;
              echo $json;
              $db=null;
?>
	