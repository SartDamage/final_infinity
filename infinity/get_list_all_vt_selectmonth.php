<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
$form = $_POST;
if(isset($_POST['years'])){$year=$_POST['years'];}else {$year='2018';}

      {
        $db = getDB();
        $statement=$db->prepare("SELECT DISTINCT MONTH(WhenEntered) as akki FROM add_vt_details WHERE YEAR(WhenEntered)=:year");
           $statement->bindParam(':year',$year);
        $statement->execute();
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);


    $json=json_encode($results);

     echo $json;
     $db=null;

      }
?>
