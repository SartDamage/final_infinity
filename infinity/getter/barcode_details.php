<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($_SESSION['id']);

$form = $_POST;
$barcode_val=$form['barcode'];

$barcode_val1=explode(" ",$barcode_val);
$barcode_val2=$barcode_val1[0];
$db = getDB();
          
                $stmt=$db->prepare ("SELECT * from `stock_individual` where `unix_timestamp`=:unix_timestamp");
              /*}*/
              $stmt->bindParam(':unix_timestamp', $barcode_val2);									

              $stmt->execute();
              $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
              $json=json_encode($results);
              //return $json;
              echo $json;
              $db=null;
?>