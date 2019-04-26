<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/conection.php';
include $_SERVER['DOCUMENT_ROOT'].'/session.php';
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$userDetails=$userClass->userDetails($session_id);
 $form = $_GET;
 //$RegID=$form['ID'];

if($form['token'] == 1){

 $db = getDB();
 $stat=$db->prepare("SELECT MAX(`recieptID`) FROM receipt");
 $stat->execute();
 $results=$stat->fetchColumn();

 preg_match_all('!\d+!', $results, $matches);
 if( $results==null){
       $matches=1;
     }else{
       $matches = $matches[0][0]+1;
     }
 $RecieptID = "RCPT".str_pad($matches, 8, "0", STR_PAD_LEFT);

echo "$RecieptID";
 $db=null;
}
?>
